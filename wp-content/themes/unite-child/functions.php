<?php
/**
 * _s functions and definitions
 *
 * @package unite-child
 */
add_action( 'admin_notices', 'unite_child_dependencies' );

function unite_child_dependencies() {
    if( ! function_exists('the_field') )
        echo '<div class="error"><p>' . __( 'Warning: The theme needs Plugin <a href="http://downloads.wordpress.org/plugin/advanced-custom-fields.zip">Advanced Custom Fields</a> to function', 'unite-child' ) . '</p></div>';
}


function films_posttypes()

{

    $labels = array(

        'name'  => 'Films',

        'singular_name' => 'Films',

        'menu_name' => 'Films',

        'name_admin_bar' => 'Films',

        'add_new' => 'Add New',

       'add_new_item' => 'Add New Films',

       'all_items' => 'All Films',

       'search_items' => 'Search Films',

       'parent_item_colon' => 'Parent Films',

       'not_found' => 'No Films found.',

       'not_found_in_trash' => 'No Films found in Trash.',

 );



 $args = array(

     'labels' => $labels,

     'public' => true,

     'publicly_queryable' => true, // ?post_type={post_type_key}

     'show_ui' => true, // display user interface

     'show_in_nav_menus' => true, // whether post_type is available in navigation menus

     'show_in_menu' => true, // display in top of admin menu

     'menu_position' => 21,

     'menu_icon' => 'dashicons-groups',

     'query_var' => true,

     'rewrite' => array( 'slug' => 'films' ),

     'capability_type' => 'post',

     'has_archive' => false,

     'hierarchical' => false,

     'posts_per_page' => -1,

     'supports' => array( 'title', 'editor' )

 );

 register_post_type( 'films', $args);

}

add_action('init', 'films_posttypes' );



function films_flush() {

    // First, we “add” the custom post type via the above written function.

    // Note: “add” is written with quotes, as CPTs don't get added to the DB,

    // They are only referenced in the post_type column with a post entry,

    // when you add a post of this CPT.

    films_posttypes();



    // ATTENTION: This is *only* done during plugin activation hook in this example!

    // You should *NEVER EVER* do this on every page load!!

    flush_rewrite_rules();

}

register_activation_hook( __FILE__, 'films_flush' );










//hook into the init action and call taxonimies when it fires
add_action( 'init', 'create_taxonimies_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it taxonimies for your posts

function create_taxonimies_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI

    $labels = array(
        'name' => _x( 'Taxonimies', 'Taxonimy general name' ),
        'singular_name' => _x( 'Topic', 'Taxonimy singular name' ),
        'search_items' =>  __( 'Search Taxonimies' ),
        'all_items' => __( 'All Taxonimies' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Taxonimy' ),
        'update_item' => __( 'Update Taxonimy' ),
        'add_new_item' => __( 'Add New Taxonimy' ),
        'new_item_name' => __( 'New Taxonimy Name' ),
        'menu_name' => __( 'Taxonimies' ),
    );

// Now register the taxonomy

    register_taxonomy('taxonimies',array('films'), array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'update_count_callback' => '_update_post_term_count',
        'rewrite' => array( 'slug' => 'taxonimy' ),
    ));

}



/**
 * Register all shortcodes
 *
 * @return null
 */
function register_shortcodes() {
    add_shortcode( 'films', 'shortcode_films' );
}
add_action( 'init', 'register_shortcodes' );

/**
 * films Shortcode Callback
 *
 * @param Array $atts
 *
 * @return string
 */
function shortcode_films( $atts ) {
    global $wp_query,
           $post;

    $atts = shortcode_atts( array(
        'line' => ''
    ), $atts );

    $loop = new WP_Query( array(
        'posts_per_page'    => 5,
        'post_type'         => 'films',
        'order'             => 'ASC'
    ) );

    if( ! $loop->have_posts() ) {
        return false;
    }

    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th> Film";
    echo "</th>";
    echo "<th> Price";
    echo "</th>";
    echo "<th> Release Date";
    echo "</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    while( $loop->have_posts() ) {
        $loop->the_post();

        echo "<tr>";
        echo "<td width='100px'>";
        echo the_title();
        echo "</td>";
        echo "<td width='100px'>";
        echo the_field('ticket_price');
        echo "</td>";
        echo "<td>";
        echo the_field('release_date');
        echo "</td>";
        echo "</tr>";
    }

    echo "</tbody>";
    echo "</table>";
    wp_reset_postdata();
}
