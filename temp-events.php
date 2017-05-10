<?php
/**
 * Template Name: Events Page Template
 *
 * Template for displaying a page just with the header and footer area and a "naked" content area in between.
 * Good for landingpages and other types of pages where you want to add a lot of custom markup.
 *
 * @package understrap
 */

get_header();  ?>


<div class="container">

  <div class="event_page">

    <div class="event_heading heading">
      <h1 class="h1">Future Events</h1>
      <h3 class="h3 stone narrow_w">Stay up-to-date by following us on Facebook and Instagram</h3>
    </div>

    <div class="event_area narrow_w">

      <!-- EVENT LOOP START -->


      <div class="row">
      <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
      query_posts(array(
        'post_type'      	    => array('event'), // You can add a custom post type if you like
        'paged'          	    => $paged,
        'posts_per_page'      => 3,
        'orderby' 		        => 'DESC',

      ));

      if ( have_posts() ) : ?>

        <!-- Post Meta Variables -->
        <?php while ( have_posts() ) : the_post(); ?>
        <?php $event_address = get_post_meta(get_the_ID(), 'event_address', true);
        $event_link = get_post_meta(get_the_ID(), 'event_link', true);
        $event_start = get_post_meta(get_the_ID(), 'event_start', true);
        $event_stop = get_post_meta(get_the_ID(), 'event_stop', true);
        $rsvp_text = get_post_meta(get_the_ID(), 'rsvp_text', true);
        $rsvp_link = get_post_meta(get_the_ID(), 'rsvp_link', true);
        $event_month = get_post_meta(get_the_ID(), 'event_month', true);
        $event_day = get_post_meta(get_the_ID(), 'event_day', true);
        $imgURL = get_the_post_thumbnail_url();
        ?>

        <!-- Event Card Template -->
        <div class="event_card">
              <div class="event_thumb" style="background-image:url('<?php echo $imgURL;?>');">
                <h4 class="h4"><?php echo $event_month;?></h4>
                <h4 class="date_number"><?php echo $event_day;?></h4>
              </div>
              <div class="event_info">
                <h2 class="h2 event_title"><?php echo get_the_title();?></h2>
                <h4 class="h4 event_address"><a href="<?php echo $event_link;?>" target="_blank"><?php echo $event_address;?></a></h4>
                <h5 class="h5 event_time"><?php echo $event_start;?> - <?php echo $event_stop;?></h5>

                <a href="<?php echo $rsvp_link; ?>" target="_blank" class="btn_b"><?php echo $rsvp_text;?></a>
              </div>
        </div>

      <?php endwhile ?>

      <?php endif; ?>
      <?php wp_reset_query(); ?>

      <!-- EVENT LOOP END -->


       </div>


    </div>
  </div>


</div> <!--container-->

<?php
get_footer(); ?>
