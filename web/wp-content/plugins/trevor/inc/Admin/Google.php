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
					$client = \SolrPower_Api::get_instance()->get_solr();

					// get a select query instance
					$query = $client->createSelect();
					$query->setRows(0);

// add spellcheck settings
					$spellcheck = $query->getSpellcheck();
					$spellcheck->setQuery('pkwy');
					$spellcheck->setCount(10);
					$spellcheck->setBuild(true);
					$spellcheck->setCollate(true);
					$spellcheck->setExtendedResults(true);
					$spellcheck->setCollateExtendedResults(true);

// this executes the query and returns the result
					$resultset = $client->select($query);
					$spellcheckResult = $resultset->getSpellcheck();

					echo '<h1>Correctly spelled?</h1>';
					if ($spellcheckResult->getCorrectlySpelled()) {
						echo 'yes';
					} else {
						echo 'no';
					}

					echo '<h1>Suggestions</h1>';
					foreach ($spellcheckResult as $suggestion) {
						echo 'NumFound: '.$suggestion->getNumFound().'<br/>';
						echo 'StartOffset: '.$suggestion->getStartOffset().'<br/>';
						echo 'EndOffset: '.$suggestion->getEndOffset().'<br/>';
						echo 'OriginalFrequency: '.$suggestion->getOriginalFrequency().'<br/>';
						foreach ($suggestion->getWords() as $word) {
							echo '-----<br/>';
							echo 'Frequency: '.$word['freq'].'<br/>';
							echo 'Word: '.$word['word'].'<br/>';
						}

						echo '<hr/>';
					}

					$collations = $spellcheckResult->getCollations();
					echo '<h1>Collations</h1>';
					foreach ($collations as $collation) {
						echo 'Query: '.$collation->getQuery().'<br/>';
						echo 'Hits: '.$collation->getHits().'<br/>';
						echo 'Corrections:<br/>';
						foreach ($collation->getCorrections() as $input => $correction) {
							echo $input . ' => ' . $correction .'<br/>';
						}

					}

// display collation
//					echo 'Collation: '.$resultset->getCollation();


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
