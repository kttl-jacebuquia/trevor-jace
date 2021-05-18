<?php namespace TrevorWP\Theme\Helper;

use TrevorWP\CPT\Donate\Donate_Object;
use TrevorWP\CPT\RC\RC_Object;

/**
 * Circulation Card Helper
 */
class Circulation_Card {
	/* Types */
	const TYPE_TREVORSPACE = 'trevorspace';
	const TYPE_RC          = 'rc';
	const TYPE_GET_HELP    = 'get_help';
	const TYPE_DONATION    = 'donation';
	const TYPE_FUNDRAISER  = 'fundraiser';
	const TYPE_COUNSELOR   = 'counselor';

	/* Settings */
	const SETTINGS = array(
		self::TYPE_TREVORSPACE => array( 'name' => 'TrevorSpace' ),
		self::TYPE_RC          => array( 'name' => 'Resources Center' ),
		self::TYPE_GET_HELP    => array( 'name' => 'Get Help' ),
		self::TYPE_DONATION    => array( 'name' => 'Donation' ),
		self::TYPE_FUNDRAISER  => array( 'name' => 'Fundraiser' ),
		self::TYPE_COUNSELOR   => array( 'name' => 'Counselor' ),
	);

	/**
	 * @var array
	 */
	protected $_args = array();

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
		$args = array_merge(
			array(
				'type'         => 'rc',
				'title'        => '',
				'desc'         => '',
				'cta_text'     => '',
				'cta_url'      => '',
				'cls'          => array(),
				'bg-inner-cls' => 'bg-white',
			),
			$args
		);

		$this->_args = $args;
	}

	/**
	 * @return string|null
	 */
	public function render(): ?string {
		$class = implode(
			' ',
			array_merge(
				array(
					'circulation-card',
					"type-{$this->_args['type']}",
				),
				$this->_args['cls']
			)
		);

		ob_start(); ?>

		<div class="<?php echo esc_attr( $class ); ?>">
			<div class="bg-inner <?php echo $this->_args['bg-inner-cls']; ?>"></div>
			<div class="inner">
				<h3 class="circulation-card-title"><?php echo $this->_args['title']; ?></h3>
				<p class="circulation-card-desc"><?php echo $this->_args['desc']; ?></p>
				<a class="circulation-card-cta hover:opacity-90" href="<?php echo esc_attr( $this->_args['cta_url'] ); ?>"><?php echo $this->_args['cta_text']; ?></a>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Renders Circulation Block
	 *
	 * @param string $title
	 * @param string|null $desc
	 * @param array $cards
	 * @param array|null $options
	 *
	 * @return string
	 */
	static public function render_circulation( string $title, ?string $desc, array $cards, ?array $options ): string {
		$container_class = $options['container'] ? $options['container'] : null;
		$wrapper_class   = ( ! empty( $options['wrapper'] ) ) ? $options['wrapper'] : null;
		$option_class    = ( ! empty( $options['title'] ) ) ? $options['title'] : null;
		ob_start();
		?>
		<div class="pt-20 pb-24 text-teal-dark bg-white lg:pt-24 <?php echo $container_class; ?>">
			<div class="container mx-auto site-content-inner text-center <?php echo $wrapper_class; ?>">
				<div class="w-full mb-px60 md:mb-px50 lg:mb-px80 ">
					<h2 class="page-sub-title centered mb-0 <?php echo $option_class; ?>">
						<?php echo $title; ?>
					</h2>

					<?php if ( ! empty( $desc ) ) : ?>
						<p class="page-sub-title-desc centered mb-0 mt-px20 md:mt-px18 lg:mt-px20">
							<?php echo $desc; ?>
						</p>
					<?php endif; ?>
				</div>
				<div class="grid grid-cols-1 gap-y-6 max-w-lg mx-auto lg:grid-cols-2 lg:gap-x-7 lg:max-w-none xl:max-w-px1240">
					<?php
					foreach ( $cards as $card ) {
						echo call_user_func( array( self::class, "render_{$card}" ) );
					}
					?>
				</div>
			</div>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * Renders the Trevorspace card.
	 *
	 * @return string
	 */
	static public function render_trevorspace(): string {
		// TODO: Get variables from the theme customizer
		return ( new self(
			array(
				'type'         => self::TYPE_TREVORSPACE,
				'title'        => 'Meet new LGBTQ <tilt>friends</tilt> in TrevorSpace.',
				'desc'         => 'Join an international community for LGBTQ young people ages 13-24. Sign up and start a conversation now.',
				'cta_text'     => 'Check It Out',
				'cta_url'      => home_url( RC_Object::PERMALINK_TREVORSPACE ),
				'bg-inner-cls' => 'bg-gradient-trevorspace',
			)
		) )->render();
	}

	/**
	 * Renders the resources Center card.
	 *
	 * @return string
	 */
	static public function render_rc(): string {
		// TODO: Get variables from the theme customizer
		return ( new self(
			array(
				'type'         => self::TYPE_RC,
				'title'        => 'Get answers for <tilt>everything</tilt> LGBTQ',
				'desc'         => 'Is there something you want to learn more about? Find topics you’re interested in here.',
				'cta_text'     => 'Find Answers',
				'cta_url'      => home_url( RC_Object::PERMALINK_BASE ),
				'cls'          => array( 'bg-purple' ),
				'bg-inner-cls' => 'bg-gradient-rc',
			)
		) )->render();
	}

	/**
	 * Renders the Get Help card.
	 *
	 * @return string
	 */
	static public function render_get_help(): string {
		// TODO: Get variables from the theme customizer
		return ( new self(
			array(
				'type'         => self::TYPE_GET_HELP,
				'title'        => 'We’re here <tilt>for you.</tilt>',
				'desc'         => 'If you ever need immediate help or support — you aren’t alone. Call, text, or chat with a trained counselor 24/7, all year round. For free.',
				'cta_text'     => 'Reach a Counselor',
				'cta_url'      => home_url( RC_Object::PERMALINK_GET_HELP ),
				'bg-inner-cls' => 'bg-gradient-gethelp',
			)
		) )->render();
	}

	/**
	 * @return string
	 */
	static public function render_donation(): string {
		// TODO: Get variables from the theme customizer
		return ( new self(
			array(
				'type'         => self::TYPE_DONATION,
				'title'        => 'Your donation can <tilt>save lives.</tilt>',
				'desc'         => 'Every day, LGBTQ young people in crisis reach out. It is vital we make sure our volunteers can continue to offer that support.',
				'cta_text'     => 'Donate Now',
				'cta_url'      => home_url( Donate_Object::PERMALINK_DONATE ),
				'cls'          => array( 'bg-teal-dark' ),
				'bg-inner-cls' => 'bg-gradient-darkgreen-flip',
			)
		) )->render();
	}

	/**
	 * @return string
	 */
	static public function render_fundraiser(): string {
		// TODO: Get variables from the theme customizer
		return ( new self(
			array(
				'type'         => self::TYPE_FUNDRAISER,
				'title'        => 'Make an <tilt>impact.</tilt> Be a fundraiser.',
				'desc'         => 'Join our amazing community of online fundraisers, and start saving young LGBTQ lives today.',
				'cta_text'     => 'Fundraise Now',
				'cta_url'      => '#', // todo: fix url
				'cls'          => array( 'bg-teal-dark' ),
				'bg-inner-cls' => 'bg-gradient-darkgreen',
			)
		) )->render();
	}

	/**
	 * @return string
	 */
	static public function render_counselor(): string {
		// TODO: Get variables from the theme customizer
		return ( new self(
			array(
				'type'         => self::TYPE_COUNSELOR,
				'title'        => 'Train to be a <tilt>counselor.</tilt>',
				'desc'         => 'One volunteer can help support over 100 young people that wouldn’t be supported otherwise.',
				'cta_text'     => 'Volunteer Now',
				'cta_url'      => '#', // todo: fix url
				'cls'          => array( 'bg-teal-dark' ),
				'bg-inner-cls' => 'bg-gradient-darkgreen',
			)
		) )->render();
	}
}
