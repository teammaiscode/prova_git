<?php
/**
* Template Name: Página de Contato
*
* @package WordPress
* @author Mais Code Tecnologia
* @since First Version
*/
get_header(); ?>
  <!-- Header -->
  <header id="sobreHeader" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat top center; background-size:cover;">
    <?php get_template_part('header', 'template'); ?>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 text-center chamadaSobre">
          <h1>Contato</h1>
        </div>
      </div>
    </div>
  </header>
<?php get_template_part('contato', 'template'); ?>   
<?php get_footer(); ?>