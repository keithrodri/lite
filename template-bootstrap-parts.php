<?php /* Template Name: Bootstrap Parts Page Template */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php the_title(); ?></h1>

		<?php if (have_posts()): while (have_posts()) : the_post(); ?>

			<!-- article -->
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				<?php the_content(); ?>

				<h1 class="h1">Heading 1 Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</h1>

				<h2 class="h2">Heading 2 Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</h2>

				<h3 class="h3">Heading 3 Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</h3>

				<h4 class="h4">Heading 4 Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</h4>

				<h5 class="h5">Heading 5 Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</h5>

				<h6 class="h6">Heading 6 Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</h6>

				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante venenatis dapibus posuere velit aliquet. Nulla vitae elit libero, a pharetra augue. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>

				<p>Maecenas sed diam eget risus varius blandit sit amet non magna. Maecenas faucibus mollis interdum. Donec sed odio dui. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nullam id dolor id nibh ultricies vehicula ut id elit. Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit.</p>

				<hr>

				<hr class="minor">

				<p>this is a para with <a href="#">link</a> here.</p>

				<a href="#" class="btn_1">button A</a>

				<a href="#" class="btn_2">button B</a>

				<a href="#" class="btn_3">button C</a>

				<a href="#" class="btn_4">button D</a>

<a href="#openModalContact">11111</a>
				<!-- Contact Modal -->
				<div id="openModalContact" class="modalContact">
						<div class="containerModal left">	<a href="#close" title="Close" class="closeModal">
							<?php echo file_get_contents(__DIR__.'/img/close.svg');?>
						</a>
								<h1 class="h2">Hello!</h1>
								<p>Natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
								<?php echo do_shortcode( '[gravityform id="4" title="true" description="true" ajax="true"]' ); ?>

					 </div>
				</div>

				<script>

				jQuery(document).ready(function($) {

					$modal = $('.containerModal');
					$overlay = $('#openModalContact');

				$('#openModalContact').on('click', function() {
					$overlay.fadeOut();
					// $modal.removeClass('state-leave').addClass('state-appear');
				});

			});

				</script>
				<!-- /Contact Modal -->



				<!-- IG FEED -->

<script type="text/javascript">
		var feed = new Instafeed({
			get: 'user',
				userId: '481507042',
				clientId: ' 3a0813c625b8491abe5a1495db0c8ca8',
				accessToken: '481507042.3a81a9f.856410166e6e4544b0619f2d4c724870',
			limit: '8',
			resolution: 'standard_resolution',
			sortBy: 'most-recent',
			template: '<div class="instafeed_single"><a class="ig_outer" target="_blank" href="{{link}}"><div class="ig_post"><img src="{{image}}"/></div></a></div>',

		});
		feed.run();
</script>

			<div class="ig_footer">
				<div class="row">
					<div id="instafeed" class=""></div>
					<div class="col-md-12">
									<a href="#" class="btn_a">View All</a>
					</div>
				</div>
			</div>

				<?php comments_template( '', true ); // Remove if you don't want comments ?>

				<br class="clear">

				<?php edit_post_link(); ?>

			</article>
			<!-- /article -->

		<?php endwhile; ?>

		<?php else: ?>

			<!-- article -->
			<article>

				<h2><?php _e( 'Sorry, nothing to display.', 'brass' ); ?></h2>

			</article>
			<!-- /article -->

		<?php endif; ?>

		</section>
		<!-- /section -->
	</main>


<?php get_sidebar(); ?>

<?php get_footer(); ?>
