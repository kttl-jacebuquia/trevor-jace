<?php namespace TrevorWP;

use TrevorWP\Util\Activate;

const VERSION = '1.0.0-alpha';

class Main {
	/*
	 * Global Keys
	 */
	const GLOBALS_PREFIX = 'trevor__';
	const GLOBALS_VAR_MAIN = self::GLOBALS_PREFIX . 'main';
	const GLOBALS_VAR_TWIG = self::GLOBALS_PREFIX . 'twig';

	/*
	 * Option Keys
	 */
	const OPTION_KEY_PREFIX = 'trevor__';
	const OPTION_KEY_VERSION = self::OPTION_KEY_PREFIX . 'version';

	/*
	 * Post Types
	 */
	const POST_TYPE_PREFIX = 'trevor__';

	/*
	 * Meta Keys
	 */
	const META_KEY_PREFIX = '_trevor_';

	/**
	 * Main constructor.
	 */
	public function __construct() {
		# Check for previously initiated class
		if ( self::is_initiated() ) {
			throw new Exception\Internal( 'Already initiated.' );
		}

		# Attach itself
		$GLOBALS[ self::GLOBALS_VAR_MAIN ] = $this;

		# Register hooks
		Util\Hooks::register_all();

		if ( version_compare( $old = get_option( self::OPTION_KEY_VERSION ), VERSION, '<' ) ) {
			Util\Log::info( 'Looks like plugin is updated. Starting upgrading process.', [
				'old' => $old,
				'new' => VERSION
			] );

			add_action( 'init', [ Activate::class, 'activate' ], 10, 0 );
		}
	}

	/**
	 * @return bool
	 */
	static public function is_initiated() {
		$self = self::self();

		return is_object( $self ) && $self instanceof self;
	}

	/**
	 * @return Main|null
	 */
	static public function self() {
		return $GLOBALS[ self::GLOBALS_VAR_MAIN ] ?? null;
	}

	/**
	 * @return \Twig\Environment
	 */
	static public function get_twig() {
		if ( ! isset( $GLOBALS[ static::GLOBALS_VAR_TWIG ] ) ) {
			$GLOBALS[ static::GLOBALS_VAR_TWIG ] = Twig\Environment::create();
		}

		return $GLOBALS[ self::GLOBALS_VAR_TWIG ];
	}
}
