<div class="filtroChamada">
  <section id="produtos">
    <div class="container">
      <div class="row">
        <div class="col-xs-12 text-center">
          <div class="seta"><span class="glyphicon glyphicon-triangle-bottom"></span></div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-xs-12 text-center" id="dvitens">
        <h2>Sugestões de Imóveis pra você</h2>
        <div class="col-xs-12 detImoveis">
        <?php $args = array('post_type'=>'imoveis',
        'post_status' => 'publish',
        'posts_per_page' => '3',
        'orderby ' => 'date',
        'order' => 'DESC',
        'meta_query' => array(
              array(
                'key' => 'destaque',
                'value' => '1'
              ),
               array(
                'key' => 'foi_vendido',
                'value' => '1'
              )
            )
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) {
            while ( $query->have_posts() ) { $query->the_post(); ?>
              <div class="col-xs-12 col-md-4 text-left">
                <div class="cxproduto">
                  <div class="col-xs-12 col-md-6 sempadding">
                    <?php $image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
                    if(!empty($image)){ ?>
                        <div style="background: url('<?php echo $image; ?>')" class="imgImo"></div>
                    <?php } else{ ?>
                        <div style="background: url('<?php echo $image; ?>')" class="imgImo"></div>
                    <?php } ?>
                  </div>
                  <div class="col-xs-12 col-md-6">
                    <h4><?php the_field('valor');?></h4>
                    <span class="spbairro"><?php the_field('bairro'); ?></span>
                    <span class="spTipo"><?php echo get_the_term_list( $post->ID, 'tipo', ' ', ', ' ); ?></span>
                    <ul class="ulqldades">
                      <?php $quartos = get_field_object('quartos');
                      $qvalue = $quartos['value'];
                      $suites = get_field_object('suites');
                      $svalue = $suites['value'];
                      $garagem = get_field_object('garagem');
                      $gvalue = $garagem['value']; ?>
                      <li><?php echo $quartos['choices'][ $qvalue ]; ?> | </li>
                      <li><?php echo $suites['choices'][ $svalue ]; ?> | </li>
                      <li><?php echo $garagem['choices'][ $gvalue ]; ?> | </li>
                      <li><?php the_field('metragem'); echo "m²"; ?></li>
                    </ul>
                    <?php the_excerpt(); ?>
                    <span class="linkvjmais"><a href="<?php the_permalink(); ?>">Veja Mais</a></span>
                  </div>
                </div>
              </div>
            <?php }
          } wp_reset_postdata(); ?>
          </div>
          <div class="col-xs-12 text-center">
            <a href="<?php echo esc_url( home_url( '/imoveis' ) ); ?>" class="bttpadraocenter">Veja Mais imóveis</a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>