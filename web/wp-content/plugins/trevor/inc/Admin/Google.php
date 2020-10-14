<?php namespace TrevorWP\Admin;

use TrevorWP\Main;
use TrevorWP\Util\Tools;
use TrevorWP\Util\Google_API;

/**
 * Admin Google Controller
 */
class Google {
	const MENU_SLUG = Main::ADMIN_MENU_SLUG_PREFIX . 'google-api';

	/**
	 * Fires after WordPress has finished loading but before any headers are sent.
	 *
	 * @link https://developer.wordpress.org/reference/hooks/admin_menu/
	 * @see \TrevorWP\Util\Hooks::register_all()
	 */
	public static function register() {
		add_menu_page(
				'Google API',
				'Google API',
				'update_core',
				self::MENU_SLUG,
				[ self::class, 'render' ],
				'none',
				102
		);
	}

	public static function render() {
		if ( ! empty( $_GET['auth_success'] ) ) {
			Tools::add_update_msg( "Authentication successful." );
		}

		$has_token = Google_API::has_token();
		$auth_url  = Google_API::get_return_url();

		// TODO: Form Field: View Id

		?>
		<div class="wrap">
			<h1>Google API</h1>
			<div class="app-wrap">
				<?php
				if ( $has_token ) {
					$options = [
							'auth' => [
									'has_token' => $has_token,
									'auth_url'  => $auth_url
							],
							'page' => [
									'form_action' => admin_url( 'admin.php?page=' . self::MENU_SLUG )
							]
					];
					?>
					<div id="app-root"></div>
					<script>
						jQuery(function () {
							TrevorWP.adminApps.google(document.getElementById('app-root'), <?=json_encode( $options )?>);
						});
					</script>
				<?php
				}else{
				?>
					<p>
						To be able to use this feature please <a href="<?= esc_attr( $auth_url ) ?>">authorize</a>.
					</p>
					<?php
				}
				?>
			</div>
		</div>
		<?php
	}
}
