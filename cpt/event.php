<?php
function cbet_register_post_type() {

	$singular = 'Event';
	$plural = 'Events';
  //Used for the rewrite slug below.
  $plural_slug = str_replace( ' ', '_', $plural );

  //Setup all the labels to accurately reflect this post type.
	$labels = array(
		'name' 					        => $plural,
		'singular_name' 		    => $singular,
		'add_new' 			       	=> 'Add New',
		'add_new_item' 	    		=> 'Add New ' . $singular,
		'edit'		            	=> 'Edit',
		'edit_item'	          	=> 'Edit ' . $singular,
		'new_item'	           	=> 'New ' . $singular,
		'view' 					        => 'View ' . $singular,
		'view_item' 			      => 'View ' . $singular,
		'search_term'       		=> 'Search ' . $plural,
		'parent' 				        => 'Parent ' . $singular,
		'not_found' 	       		=> 'No ' . $plural .' found',
		'not_found_in_trash'  	=> 'No ' . $plural .' in Trash'
	);

        //Define all the arguments for this post type.
	$args = array(
    		'labels' 			        => $labels,
    		'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'show_in_nav_menus'   => true,
        'show_ui'             => fasle,
        'show_in_menu'        => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-calendar-alt',
        'can_export'          => true,
        'delete_with_user'    => false,
        'hierarchical'        => false,
        'has_archive'         => true,
        'query_var'           => true,
        'capability_type'     => 'page',
        'map_meta_cap'        => true,
        // 'capabilities' => array(),
        'rewrite'             => array(
        	'slug' => strtolower( $plural_slug ),
        	'with_front' => true,
        	'pages' => true,
        	'feeds' => false,

        ),
        'supports'            => array(
        	'title', 'thumbnail'
        )
	);



        //Create the post type using the above two varaiables.
	register_post_type( 'event', $args);
}
add_action( 'init', 'cbet_register_post_type' );


//Custom columns
// add_filter ("manage_edit-event_columns", "event_edit_columns");
// add_action ("manage_posts_custom_column", "event_custom_columns");

// function event_edit_columns($columns) {

//     $columns = array(
//         "cb" => "<input type=\"checkbox\" />",
//         "tf_col_ev_cat" => "Category",
//         "tf_col_ev_date" => "Dates",
//         "tf_col_ev_times" => "Times",
//         "title" => "Event",
//         "tf_col_ev_desc" => "Description",
//         );

//     return $columns;

// }

// function event_custom_columns($column) {

//     global $post;
//     $custom = get_post_custom();
//     switch ($column)

//         {
//             case "tf_col_ev_cat":
//                 // - show taxonomy terms -
//                 $eventcats = get_the_terms($post->ID, "tf_eventcategory");
//                 $eventcats_html = array();
//                 if ($eventcats) {
//                     foreach ($eventcats as $eventcat)
//                     array_push($eventcats_html, $eventcat->name);
//                     echo implode($eventcats_html, "");
//                 } else {
//                 _e('None', 'themeforce');;
//                 }
//             break;


//             case "tf_col_ev_date":
//                 // - show dates -
//                 $startd = $custom["tf_events_startdate"][0];
//                 $endd = $custom["tf_events_enddate"][0];
//                 $startdate = date("F j, Y", $startd);
//                 $enddate = date("F j, Y", $endd);
//                 echo $startdate . '<br /><em>' . $enddate . '</em>';
//             break;

//             case "tf_col_ev_times":
//                 // - show times -
//                 $startt = $custom["tf_events_startdate"][0];
//                 $endt = $custom["tf_events_enddate"][0];
//                 $time_format = get_option('time_format');
//                 $starttime = date($time_format, $startt);
//                 $endtime = date($time_format, $endt);
//                 echo $starttime . ' - ' .$endtime;
//             break;
//             case "tf_col_ev_thumb":
//                 // - show thumb -
//                 $post_image_id = get_post_thumbnail_id(get_the_ID());
//                 if ($post_image_id) {
//                     $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
//                     if ($thumbnail) (string)$thumbnail = $thumbnail[0];
//                     echo '<img src="';
//                     echo bloginfo('template_url');
//                     echo '/timthumb/timthumb.php?src=';
//                     echo $thumbnail;
//                     echo '&h=60&w=60&zc=1" alt="" />';
//                 }
//             break;







//             case "tf_col_ev_desc";
//                 the_excerpt();
//             break;

//         }
// }

// add_action( 'admin_init', 'event_create' );

//End custom columns


function cbet_register_taxonomy() {

	$plural = __( 'Places' );
	$singular = __( 'Place' );


	$labels = array(
		'name'                       	=> $plural,
        'singular_name'              	=> $singular,
        'search_items'               	=> 'Search ' . $plural,
        'popular_items'              	=> 'Popular ' . $plural,
        'all_items'                  	=> 'All ' . $plural,
        'parent_item'                	=> null,
        'parent_item_colon'          	=> null,
        'edit_item'                  	=> 'Edit ' . $singular,
        'update_item'                	=> 'Update ' . $singular,
        'add_new_item'               	=> 'Add New ' . $singular,
        'new_item_name'              	=> 'New ' . $singular . ' Name',
        'separate_items_with_commas' 	=> 'Separate ' . $plural . ' with commas',
        'add_or_remove_items'        	=> 'Add or remove ' . $plural,
        'choose_from_most_used'      	=> 'Choose from the most used ' . $plural,
        'not_found'                  	=> 'No ' . $plural . ' found.',
        'menu_name'                  	=> $plural,
	);

	$args = array(
		'hierarchical'          		=> true,
        'labels'                		=> $labels,
        'show_ui'               		=> true,
        'show_admin_column'     		=> false,
        'update_count_callback' 		=> '_update_post_term_count',
        'query_var'             		=> true,
        'rewrite'               		=> array( 'slug' => strtolower( $singular ) ),
	);

	register_taxonomy( strtolower( $singular ), 'event', $args );

}

add_action( 'init', 'cbet_register_taxonomy' );

// function cbet_load_templates( $original_template ) {

//        if ( get_query_var( 'post_type' ) !== 'event' ) {

//                return;

//        }

//        if ( is_archive() || is_search() ) {

//                if ( file_exists( get_stylesheet_directory(). '/archive-event.php' ) ) {

//                      return get_stylesheet_directory() . '/archive-event.php';

//                } else {

//                        return plugin_dir_path( __FILE__ ) . 'templates/archive-event.php';

//                }

//        } elseif(is_singular('event')) {

//                if (  file_exists( get_stylesheet_directory(). '/single-event.php' ) ) {

//                        return get_stylesheet_directory() . '/single-event.php';

//                } else {

//                        return plugin_dir_path( __FILE__ ) . 'templates/single-event.php';

//                }

//        }else{
//        	return get_page_template();
//        }

//         return $original_template;


// }
// add_action( 'template_include', 'cbet_load_templates' );



function cbet_add_custom_metabox() {

	add_meta_box(
		'cbet_meta',
		__( 'Event Details' ),
		'cbet_meta_callback',
		'event',
		'normal',
		'core'
	);

}

add_action( 'add_meta_boxes', 'cbet_add_custom_metabox' );

function cbet_meta_callback( $post ) {
	wp_nonce_field( basename( __FILE__ ), 'cbet_events_nonce' );
	$cbet_stored_meta = get_post_meta( $post->ID ); ?>

<div>

	<h1>Address</h1>




			<div class="meta-td day-date">
				<h3>Event Address</h3>
				<input class="cbsc-textarea" id="event_address" name="event_address" type="text" value="<?php if ( ! empty ( $cbet_stored_meta['event_address'] ) ) { echo esc_attr( $cbet_stored_meta['event_address'][0] ); } ?>">
			</div>

           <div class="meta-td day-date">
                <h3>Google Link</h3>
                <input class="cbsc-textarea" id="event_link" name="event_link" type="text" value="<?php if ( ! empty ( $cbet_stored_meta['event_link'] ) ) { echo esc_attr( $cbet_stored_meta['event_link'][0] ); } ?>">
            </div>

            <br><br>
    <h1>Time</h1>

            <div class="meta-td day-date">
                <h3>Start Time</h3>
                <input class="cbsc-textarea" id="event_start" name="event_start" type="text" value="<?php if ( ! empty ( $cbet_stored_meta['event_start'] ) ) { echo esc_attr( $cbet_stored_meta['event_start'][0] ); } ?>">
            </div>

           <div class="meta-td day-date">
                <h3>Stop Time</h3>
                <input class="cbsc-textarea" id="event_stop" name="event_stop" type="text" value="<?php if ( ! empty ( $cbet_stored_meta['event_stop'] ) ) { echo esc_attr( $cbet_stored_meta['event_stop'][0] ); } ?>">
            </div>


            <br><br>
    <h1>RSVP</h1>

            <div class="meta-td day-date">
                <h3>RSVP Text</h3>
                <input class="cbsc-textarea" id="rsvp_text" name="rsvp_text" type="text" value="<?php if ( ! empty ( $cbet_stored_meta['rsvp_text'] ) ) { echo esc_attr( $cbet_stored_meta['rsvp_text'][0] ); } ?>">
            </div>

           <div class="meta-td day-date">
                <h3>RSVP Link</h3>
                <input class="cbsc-textarea" id="rsvp_link" name="rsvp_link" type="text" value="<?php if ( ! empty ( $cbet_stored_meta['rsvp_link'] ) ) { echo esc_attr( $cbet_stored_meta['rsvp_link'][0] ); } ?>">
            </div>


            <br><br>
    <h1>Featured Date</h1>

            <div class="meta-td day-date">
                <h3>Month</h3>
                <input class="cbsc-textarea" id="event_month" name="event_month" type="text" value="<?php if ( ! empty ( $cbet_stored_meta['event_month'] ) ) { echo esc_attr( $cbet_stored_meta['event_month'][0] ); } ?>">
            </div>

           <div class="meta-td day-date">
                <h3>Day</h3>
                <input class="cbsc-textarea" id="event_day" name="event_day" type="text" value="<?php if ( ! empty ( $cbet_stored_meta['event_day'] ) ) { echo esc_attr( $cbet_stored_meta['event_day'][0] ); } ?>">
            </div>
</div>






	<?php
}

function cbet_meta_save( $post_id ) {
	// Checks save status
    $is_autosave = wp_is_post_autosave( $post_id );
    $is_revision = wp_is_post_revision( $post_id );
    $is_valid_nonce = ( isset( $_POST[ 'cbet_events_nonce' ] ) && wp_verify_nonce( $_POST[ 'cbet_events_nonce' ], basename( __FILE__ ) ) ) ? 'true' : 'false';

    // Exits script depending on save status
    if ( $is_autosave || $is_revision || !$is_valid_nonce ) {
        return;
    }



    if ( isset( $_POST[
    		'event_address' ] ) ) {
    	update_post_meta( $post_id,
    		'event_address', sanitize_text_field( $_POST[
    		'event_address' ] ) );
    }


    if ( isset( $_POST[
            'event_link' ] ) ) {
        update_post_meta( $post_id,
            'event_link', sanitize_text_field( $_POST[
            'event_link' ] ) );
    }


    if ( isset( $_POST[
            'event_start' ] ) ) {
        update_post_meta( $post_id,
            'event_start', sanitize_text_field( $_POST[
            'event_start' ] ) );
    }


    if ( isset( $_POST[
            'event_stop' ] ) ) {
        update_post_meta( $post_id,
            'event_stop', sanitize_text_field( $_POST[
            'event_stop' ] ) );
    }


    if ( isset( $_POST[
            'rsvp_text' ] ) ) {
        update_post_meta( $post_id,
            'rsvp_text', sanitize_text_field( $_POST[
            'rsvp_text' ] ) );
    }


    if ( isset( $_POST[
            'rsvp_link' ] ) ) {
        update_post_meta( $post_id,
            'rsvp_link', sanitize_text_field( $_POST[
            'rsvp_link' ] ) );
    }




    if ( isset( $_POST[
            'event_month' ] ) ) {
        update_post_meta( $post_id,
            'event_month', sanitize_text_field( $_POST[
            'event_month' ] ) );
    }


    if ( isset( $_POST[
            'event_day' ] ) ) {
        update_post_meta( $post_id,
            'event_day', sanitize_text_field( $_POST[
            'event_day' ] ) );
    }



}
add_action( 'save_post', 'cbet_meta_save' );
