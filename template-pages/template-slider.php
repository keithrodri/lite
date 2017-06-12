<?php /* Template Name: Demo Slider Template */ get_header(); ?>

	<main role="main">
		<!-- section -->
		<section>

			<h1><?php the_title(); ?></h1>


			<script type="text/javascript">
				  $(document).ready(function(){
					var igFeed = new Instafeed({
						get: 'user',
						userId: '481507042',
						clientId: ' 3a0813c625b8491abe5a1495db0c8ca8',
						accessToken: '481507042.3a81a9f.856410166e6e4544b0619f2d4c724870',
						limit: '20',
						target: 'instafeed',
						resolution: 'standard_resolution',
						sortBy: 'most-recent',
						template: '<div class="ig_slide"><img src="{{image}}"/></div>',
						after: function () {
			        $('#instafeed').slick({
								slidesToShow: 8,
								slidesToScroll: 1,
								speed : 5500,
								arrows: false,
								autoplay: true,
								autoplaySpeed: 0,
								cssEase: 'linear',
								responsive: [{
						      breakpoint: 768,
						      settings: {
						        slidesToShow: 4,
						      }},{
						      breakpoint: 480,
						      settings: {
						        slidesToShow: 2,
						      }}]
					    });
				    }
					});
					igFeed.run();

					});
			</script>



						</div>




		<footer>
		  <script type="text/javascript">



		  </script>


		</section>
		<!-- /section -->
	</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
<div id="instafeed" class=""></div>
