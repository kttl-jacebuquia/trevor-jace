<?php get_header(); ?>

<main id="site-content" class="container" role="main">

	<div class="my-12">
		<input type="text" placeholder="Auto Complete Test" class="border p-2 w-full" id="input-search">
	</div>

	<script>
		<?php
		$ac_options = [
				'source' => admin_url( 'admin-ajax.php?action=autocomplete-test' )
		];
		?>
		jQuery(function ($) {
			$('#input-search').autocomplete({
				source: function (request, response) {
					$.post('<?= esc_js( admin_url( 'admin-ajax.php?action=autocomplete-test' ) ); ?>', request, function (resp) {
						console.log(request.term, resp);

						response(resp.suggestions?resp.suggestions[0].words.map(function(word){
							return word.word
						}):[]);
					});
				}
			});
		});
	</script>


	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );
		}
	}

	get_template_part( 'template-parts/pagination' );
	?>
</main> <!-- #site-content -->

<?php get_footer(); ?>
