<?php namespace TrevorWP\Theme\Helper;


class Sorter {
	public static $GET_key = 'order';
	/**
	 * @var Sorter|null
	 */
	protected static $_page_sorter = null;

	/**
	 * @var array
	 */
	protected $_options;

	/**
	 * @var string
	 */
	protected $_current;

	/**
	 * @param array $options
	 * @param string $default
	 */
	public function __construct( \WP_Query $query, array $options, string $default ) {
		self::$_page_sorter = $this; // attach itself to the static var
		$this->_options     = $options;
		$this->_current     = ( empty( $_GET[ self::$GET_key ] ) || ! array_key_exists( $_GET[ self::$GET_key ], $this->_options ) )
				? $default
				: $_GET[ self::$GET_key ];

		# Apply args
		foreach ( $this->get_current_option()['args'] as $key => $val ) {
			$query->set( $key, $val );
		}
	}

	public function render() {
		global $wp;
		$current = $this->get_current_option();

		ob_start();
		?>
		<div class="custom-select ajax-sorter">
			<ul>
				<li class="label">
					<button class="sort-select">Sort By: <?php echo $current['title']; ?></button>
					<ul class="dropdown">
						<?php foreach ( $this->_options as $key => $option ) : ?>
							<li class="<?php echo $this->_current == $key ? 'active' : ''; ?>">
								<a class="sort-link" href="<?php echo add_query_arg( self::$GET_key, $key, home_url( $wp->request ) ); ?>">
									Sort By: <?php echo $option['title']; ?>
								</a>
							</li>
						<?php endforeach; ?>
					</ul>
				</li>
			</ul>
		</div>
		<?php
		return ob_get_clean();
	}

	/**
	 * @return array
	 */
	public function get_current_option(): array {
		return $this->_options[ $this->_current ];
	}

	/**
	 * @return Sorter|null
	 */
	public static function get_page_sorter(): ?Sorter {
		return self::$_page_sorter;
	}

	/**
	 * @return string[][]
	 */
	public static function get_options_for_date(): array {
		return array(
			'new-old' => array(
				'title' => 'Newest to Oldest',
				'args'  => array(
					'order'   => 'DESC',
					'orderby' => 'date',
				),
			),
			'old-new' => array(
				'title' => 'Oldest to Newest',
				'args'  => array(
					'order'   => 'ASC',
					'orderby' => 'date',
				),
			),
		);
	}
}
