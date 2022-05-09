<?php
/**
* 
* @package WordPress
* @author Mais Code Tecnologia
* @since First Version
*/
get_header(); ?>
<!-- Header -->
<header id="sobreHeader">
  <?php get_template_part('header', 'template'); ?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center chamadaSobre">
        <h1>Imóveis</h1>
        <?php get_template_part('busca','template'); ?>
      </div>
    </div>
  </div>
</header>
<section id="produtos">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
        <div class="col-xs-12 detImoveis" id="dvitens">
          <?php if ( have_posts() ) {
            while ( have_posts() ) { the_post(); ?>
              <?php get_template_part('resultadomapa','template'); ?>
            <?php }
          } else { ?>
            <h2>Nada Encontrado</h2>
          <?php } wp_reset_postdata(); ?>
          <div class="clearfix"></div>
          <div class="text-center">
          <?php paginacao(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>

