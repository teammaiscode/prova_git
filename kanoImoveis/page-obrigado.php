<?php
/**
* Template Name: Pagina Obrigado
*
* @package WordPress
* @author Mais Code Tecnologia
* @since First Version
*/
get_header(); ?>
    <!-- Header -->
    <header id="sobreHeader" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat top center; background-size:cover;">
      <?php get_template_part('header', 'template'); ?>
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center chamadaSobre">
            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </header>
    <?php endwhile; endif; ?>
  <?php wp_reset_postdata(); ?>
<?php get_template_part('destaque', 'template'); ?>
<?php get_footer(); ?>