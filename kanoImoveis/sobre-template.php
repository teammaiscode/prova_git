<section id="sobre">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
        <?php if ( have_posts() ) {
          while ( have_posts() ) { the_post(); ?>
            <div class="col-xs-12 col-md-6 text-left">
              <h2><?php the_field('titulo_sobre');?></h2>
              <?php the_field('texto_sobre'); ?>
              <span class="lkSobre"><a href="<?php echo esc_url( home_url( '/sobre-nos' ) ); ?>">Sobre Nós</a></span>
            </div>
            <div class="hidden-xs col-md-6 sempadding">
              <?php $image = get_field('imagem_sobre');
              if(!empty($image)){ ?>
                  <div style="background: url('<?php echo $image; ?>')" class="imgImo hidden-sm"></div>
              <?php } else{ ?>
                  <div style="background: url('<?php echo $image; ?>')" class="imgImo"></div>
              <?php } ?>
            </div>
          <?php }
        } wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section>