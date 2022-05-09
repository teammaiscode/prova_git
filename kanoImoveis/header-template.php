<nav class="navbar navbar-default navbar-static-top" role="navigation">
  <div class="container">
    <div class="row">
      <div class="col-xs-8 col-sm-6 col-md-4">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ) ;?>/img/logo.png" alt="<?php bloginfo('name'); ?>" />
        </a>
      </div>
      <div class="col-xs-4 visible-xs">
        <button>
          <span></span>
          <span></span>
          <span></span>
        </button>
      </div>
      <div class="col-xs-12 col-sm-6 col-md-6 pull-sm-4 col-md-offset-2 text-right sempadding">
        <?php $defaults = array(
          'theme_location'  => 'header-menu',
          'container'       => false,
          'menu_class'      => 'list-inline list-unstyled',
          'menu_id'         => 'menu',
          'echo'            => true
        );
        wp_nav_menu($defaults); ?>
      </div>
    </div>
  </div>
</nav>