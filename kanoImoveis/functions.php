<?php
	
  // Clean up wp_head
    // Remove Really simple discovery link
    remove_action('wp_head', 'rsd_link');
    // Remove Windows Live Writer link
    remove_action('wp_head', 'wlwmanifest_link');
    // Remove the version number
    remove_action('wp_head', 'wp_generator');

    // Remove curly quotes
    remove_filter('the_content', 'wptexturize');
    remove_filter('comment_text', 'wptexturize');

    // Allow HTML in user profiles
    remove_filter('pre_user_description', 'wp_filter_kses');

    //Optimize Database
    function optimize_database(){
        global $wpdb;
        $all_tables = $wpdb->get_results('SHOW TABLES',ARRAY_A);
        foreach ($all_tables as $tables){
            $table = array_values($tables);
            $wpdb->query("OPTIMIZE TABLE ".$table[0]);
        }
    }


    function my_acf_google_map_api( $api ){
    	
    	$api['key'] = 'AIzaSyAqVf7TCLTwCJWqbh0sO_Z5KBBhQL_d46E';
    	
    	return $api;
    	
    }
    
    add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');


    function simple_optimization_cron_on(){
        wp_schedule_event(time(), 'daily', 'optimize_database');
    }

    function simple_optimization_cron_off(){
        wp_clear_scheduled_hook('optimize_database');
    }
    register_activation_hook(__FILE__,'simple_optimization_cron_on');
    register_deactivation_hook(__FILE__,'simple_optimization_cron_off');

    // Logout url link

    add_filter( 'login_headerurl', 'custom_logout' );
    function custom_logout($url) {
      return home_url('/');
    }


    // Sidebar
        if (function_exists('register_sidebar')) {
        	register_sidebar(array(
        		'name' => 'Sidebar Widgets',
        		'id'   => 'sidebar-widgets',
        		'description'   => 'These are widgets for the sidebar.',
        		'before_widget' => '<div id="%1$s" class="widget %2$s">',
        		'after_widget'  => '</div>',
        		'before_title'  => '<h2>',
        		'after_title'   => '</h2>'
        	));
        }
    
    // Menu Register
        function register_my_menus() {
            register_nav_menus(
              array(
                'header-menu' => __( 'Header Menu' ),
                'extra-menu' => __( 'Extra Menu' )
              )
            );
        }
        add_action( 'init', 'register_my_menus' );

    // Themes Supports
       remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );

	//Let WordPress manage the document title. / By adding theme support, we declare that this theme does not use a hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
    	add_theme_support('title-tag');

	// Thumbnail Support and Sizes
		add_theme_support('post-thumbnails');

	// Image sets
		if(isset($content_width)){
			$content_width = 1170; //pixels - Max Bootstrap width
		}



    // Script Register
    function theme_name_scripts() {
      wp_deregister_script('jquery');
      wp_enqueue_style( 'mainStyle', get_template_directory_uri() . '/css/stylesheet.concat.min.css' );
      wp_enqueue_style( 'slectcss', get_template_directory_uri() . '/css/bootstrap-select.min.css' );
      wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/concat.min.js', array(), '1.0.0', true );
      //wp_enqueue_script( 'slect', get_template_directory_uri() . '/js/bootstrap-select.js', array(), '1.0.0', false );
      //wp_enqueue_script( 'tab', get_template_directory_uri() . '/js/tabtogle.min.js', array(), '1.0.0', false );
      //wp_enqueue_script( 'tooltip', get_template_directory_uri() . '/js/tool-tip.min.js', array(), '1.0.0', false );
      wp_enqueue_script('google-map-api','https://maps.googleapis.com/maps/api/js?key=AIzaSyDgmrQxgmvvgqu7vr9AvDTH60xJWXSaDJA',array(), '1.0.0', false);
    }

    add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


    //Include to Custom Posts Types
      include (TEMPLATEPATH . '/theme-settings/cpt.php' );
      include (TEMPLATEPATH . '/theme-settings/social-settings.php' );
      include (TEMPLATEPATH . '/theme-settings/filtros-settings.php' );
      


      // Wp-Login.php customization stylesheet
          function my_login_stylesheet() {
              wp_enqueue_style( 'custom-login', get_template_directory_uri() . '/css/style-login.css' );
          }
          add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

      // Change the footer text
          function wptutsplus_admin_footer_text () {
              echo 'Tema desenvolvido por <br><a target="_blank" href="http://www.maiscode.com.br"><img src="' . get_template_directory_uri() . '/img/maiscode.png"></a>';
          }
          add_filter( 'admin_footer_text', 'wptutsplus_admin_footer_text' );
          
      // Admin styles
          function wptutsplus_admin_styles() {
              wp_register_style( 'wptuts_admin_stylesheet', get_template_directory_uri() . '/css/style-login.css' );
              wp_enqueue_style( 'wptuts_admin_stylesheet' );
          }
          add_action( 'admin_enqueue_scripts', 'wptutsplus_admin_styles' );
      
      // Paginacao
      //----------------------------------------//
          function paginacao() {
              if( is_singular() )
                return;
              global $wp_query;
              /** Stop execution if there's only 1 page */
              if( $wp_query->max_num_pages <= 1 )
                return;
              $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
              $max   = intval( $wp_query->max_num_pages );
              /** Add current page to the array */
              if ( $paged >= 1 )
                $links[] = $paged;
              /** Add the pages around the current page to the array */
              if ( $paged >= 3 ) {
                $links[] = $paged - 1;
                $links[] = $paged - 2;
              }
              if ( ( $paged + 2 ) <= $max ) {
                $links[] = $paged + 2;
                $links[] = $paged + 1;
              }
              echo '<div class="paginacao"><ul  class="list-unstyled list-inline">' . "\n";
              /** Previous Post Link */
              if ( get_previous_posts_link() )
                printf( '<li class="txt">%s</li>' . "\n", get_previous_posts_link("<") );
              /** Link to first page, plus ellipses if necessary */
              if ( ! in_array( 1, $links ) ) {
                $class = 1 == $paged ? ' class="active"' : '';
                printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url(get_pagenum_link(1)),'1');
                if ( ! in_array( 2, $links ) )
                  echo '<li>…</li>';
              }

              /** Link to current page, plus 2 pages in either direction if necessary */
              sort( $links );
              foreach ( (array) $links as $link ) {
                $class = $paged == $link ? ' class="active"' : '';
                printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
              }
              /** Link to last page, plus ellipses if necessary */
              if ( ! in_array( $max, $links ) ) {
                if ( ! in_array( $max - 1, $links ) )
                  echo '<li>…</li>' . "\n";
                $class = $paged == $max ? ' class="active"' : '';
                printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
              }

              /** Next Post Link */
              if ( get_next_posts_link() )
                printf( '<li class="txt">%s</li>' . "\n", get_next_posts_link(">") );
              echo '</ul"></div>' . "\n";
          }


      // Custom Dashboard Widget
          add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
          function my_custom_dashboard_widgets() {
              global $wp_meta_boxes;
              wp_add_dashboard_widget('custom_help_widget', 'Área de Suporte', 'custom_dashboard_help');
          }
        // Dashboard Box
           function custom_dashboard_help() { ?>
              <h2 style="font-weight: 700!important; text-transform: uppercase;">Suporte  <strong>MAISCODE</strong></h2>
              <p>Precisa de Ajuda? Entre em contato com nosso suporte <a href="mailto:suporte@maiscode.com.br">contato@maiscode.com.br</a> ou <a target="_blank" href="http://www.maiscode.com.br">click aqui</a> para acessar nosso site ou nos de uma ligada <a href="#">(67) 3211-8509</a> . Estamos a sua disposição para te ajudar.</p>
              <p><strong>Equipe MaisCode</strong></p>
          <?php }

            function custom_excerpt_length( $length ) {
              return 20;
            }
            add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//=== Função reponsável por busca em custom fields ==========================================================

/**
 * Extend WordPress search to include custom fields
 *
 * https://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }

    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;

    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

//===========================================================================================================

// RMC IMG
function mc_img($imgArray, $class = 'rmPicture' ,$desktop = 'large', $tablet = 'medium_large', $mobile = 'medium'){ ?>
  <picture class="<?php echo $class; ?>">
    <source srcset="<?php echo $imgArray['sizes'][$mobile]; ?>" media="(max-width: 567px)">
    <source srcset="<?php echo $imgArray['sizes'][$tablet]; ?>" media="(max-width: 768px)">
    <source srcset="<?php echo $imgArray['sizes'][$desktop]; ?>" >
    <img src="<?php echo $imgArray['sizes'][$desktop]; ?>">
  </picture>
<?php }
      
?>