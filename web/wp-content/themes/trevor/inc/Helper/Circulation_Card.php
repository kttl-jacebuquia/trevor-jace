<?php namespace TrevorWP\Theme\Helper;

use TrevorWP\CPT\RC\RC_Object;

/**
 * Circulation Card Helper
 */
class Circulation_Card {
	/* Types */
	const TYPE_TREVORSPACE = 'trevorspace';
	const TYPE_RC = 'rc';
	const TYPE_GET_HELP = 'get_help';

	/* Settings */
	const SETTINGS = [
			self::TYPE_TREVORSPACE => [ 'name' => 'TrevorSpace' ],
			self::TYPE_RC          => [ 'name' => 'Resources Center' ],
			self::TYPE_GET_HELP    => [ 'name' => 'Get Help' ],
	];

	/**
	 * @var array
	 */
	protected $_args = [];

	/**
	 * @param array $args
	 *  $title string
	 *  $desc string
	 *  $cta_text string
	 *  $cta_url string
	 *  $bg string Can be a gradient type or bg class.
	 *  $cls array
	 */
	public function __construct( array $args ) {
		$args = array_merge( [
				'type'     => 'rc',
				'title'    => '',
				'desc'     => '',
				'cta_text' => '',
				'cta_url'  => '',
				'bg'       => '',
				'cls'      => [],
		], $args );

		$this->_args = $args;
	}

	/**
	 * @return string|null
	 */
	public function render(): ?string {
		$cls = [ 'circulation-card', "type-{$this->_args['type']}" ];

		$gradient = null;
		if ( 0 === strpos( $this->_args['bg'], 'gradient' ) ) {
			$cls[] = 'bg-gradient';
			$cls[] = $this->_args['bg'];
		} else {
			$cls[] = "bg-{$this->_args['bg']}";
		}

		$class = implode( ' ', array_merge( $cls, $this->_args['cls'] ) );
		ob_start(); ?>
		<div class="<?= esc_attr( $class ) ?>">
			<!-- Not Fully Implemented Yet-->
			<div class="inner">
				<h3 class="circulation-card-title"><?= $this->_args['title'] ?></h3>
				<p class="circulation-card-desc"><?= $this->_args['desc'] ?></p>
				<a class="circulation-card-cta"
				   href="<?= esc_attr( $this->_args['cta_url'] ) ?>"><?= $this->_args['cta_text'] ?></a>
			</div>
			<!-- Not Fully Implemented Yet-->
		</div>
		<?php return ob_get_clean();
	}

	/**
	 * Renders the Trevorspace card.
	 *
	 * @return string
	 */
	static public function render_trevorspace(): string {
		// TODO: Get variables from the theme customizer
		return ( new self( [
				'type'     => 'trevorspace',
				'title'    => 'Meet new LGBTQ <tilt>friends</tilt> in TrevorSpace.',
				'desc'     => 'Join an international community for LGBTQ young people ages 13-24. Sign up and start a conversation now.',
				'cta_text' => 'Check It Out',
				'cta_url'  => home_url( RC_Object::PERMALINK_TREVORSPACE ),
				'bg'       => 'gradient-type-trevorspace',
		] ) )->render();
	}

	/**
	 * Renders the resources Center card.
	 *
	 * @return string
	 */
	static public function render_rc(): string {
		// TODO: Get variables from the theme customizer
		return ( new self( [
				'type'     => 'rc',
				'title'    => 'Get answers for <tilt>everything</tilt> LGBTQ',
				'desc'     => 'Is there something you want to learn more about? Find topics you’re interested in here.',
				'cta_text' => 'Find Answers',
				'cta_url'  => home_url( RC_Object::PERMALINK_BASE ),
				'bg'       => 'gradient-type-rc',
		] ) )->render();
	}

	/**
	 * Renders the Get Help card.
	 *
	 * @return string
	 */
	static public function render_get_help(): string {
		// TODO: Get variables from the theme customizer
		return ( new self( [
				'type'     => 'get_help',
				'title'    => 'We’re here <tilt>for you.</tilt>',
				'desc'     => 'If you ever need immediate help or support — you aren’t alone. Call, text, or chat with a trained counselor 24/7, all year round. For free.',
				'cta_text' => 'Reach a Counselor',
				'cta_url'  => home_url( RC_Object::PERMALINK_GET_HELP ),
				'bg'       => 'gradient-type-get_help',
		] ) )->render();
	}
}
