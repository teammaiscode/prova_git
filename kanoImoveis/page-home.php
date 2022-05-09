<?php
/**
* Template Name: Pagina Home
*
* @package WordPress
* @author Mais Code Tecnologia
* @since First Version
*/
get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- Header -->
    <header id="homeHeader" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat top center; background-size:cover;">
      <?php get_template_part('header', 'template'); ?>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center chamadahome">
            <span class="chamadaPrincipal"><?php the_field('chamada_principal_da_pagina'); ?></span>
            <h3><?php the_field('subtitulo_chamada'); ?></h3>
            <div id="divbuscahome" style="padding: 0" class="fundobuscahome col-xs-12 text-center chamadaSobre">
              <?php get_template_part('buscahome','template'); ?>
            </div>
          </div>
        </div>
      </div>
    </header>
  <?php endwhile; endif; ?>
  <?php wp_reset_postdata(); ?>
  <?php get_template_part('destaque', 'template'); ?>
  <?php get_template_part('sobre', 'template'); ?>
  <?php get_template_part('contato', 'template'); ?>
<?php get_footer(); ?>