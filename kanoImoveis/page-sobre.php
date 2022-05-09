<?php
/**
* Template Name: Pagina Sobre
*
* @package WordPress
* @author Mais Code Tecnologia
* @since First Version
*/
get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <!-- Header -->
    <header id="sobreHeader" style="background: url(<?php the_post_thumbnail_url(); ?>) no-repeat top center; background-size:cover;">
      <?php get_template_part('header', 'template'); ?>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center chamadaSobre">
            <h1><?php the_title(); ?></h1>
          </div>
        </div>
      </div>
    </header>
    <section id="quemSomos">
      <div class="container">
        <div class="row">
          <div class="col-xs-12">
            <h2><?php the_title(); ?></h2>
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>
    <section id="mvv">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-4 text-center">
            <div class="imgmvv" style="background: url(<?php the_field('imagem_missao'); ?>) no-repeat top center; background-size:contain;"></div>
            <h3>Missão</h3>
            <?php the_field('missao_texto'); ?>
          </div>
          <div class="col-xs-12 col-md-4 text-center">
            <div class="imgmvv" style="background: url(<?php the_field('imagem_visao'); ?>) no-repeat top center; background-size:contain;"></div>
            <h3>Visão</h3>
            <?php the_field('visao'); ?>
          </div>
          <div class="col-xs-12 col-md-4 text-center">
            <div class="imgmvv" style="background: url(<?php the_field('imagem_valores'); ?>) no-repeat top center; background-size:contain;"></div>
            <h3>Valores</h3>
            <?php the_field('valores'); ?>
          </div>
        </div>
      </div>
    </section>
  <?php endwhile; endif; ?>
  <?php wp_reset_postdata(); ?>
<?php get_template_part('contato', 'template'); ?>
<?php get_footer(); ?>