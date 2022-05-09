<div class="col-xs-12 text-left">
  <div class="cxprodutoArchive">
    <div class="col-xs-12 col-md-4 sempadding">
      <?php $image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()));
      if(!empty($image)){ ?>
        <div style="background: url('<?php echo $image; ?>')" class="imgarchive"></div>
      <?php } else{ ?>
        <div style="background: url('<?php echo $image; ?>')" class="imgarchive"></div>
      <?php } ?>
    </div>
    <div class="col-xs-12 col-md-2">
      <h2><?php $vendido = get_field('foi_vendido');
      if($vendido==2){
        echo 'VENDIDO';
      } else {
        the_field('valor');
      } ?></h2>
      <ul class="ulIcons">
        <?php $quartos = get_field_object('quartos');
        $qvalue = $quartos['value'];
        $suites = get_field_object('suites');
        $svalue = $suites['value'];
        $garagem = get_field_object('garagem');
        $gvalue = $garagem['value'];
        if($qvalue){ ?>
          <li><i class="iconArq iconQuarto"></i><?php echo $quartos['choices'][ $qvalue ]; ?></li>
        <?php }
        if($svalue){ ?>
          <li><i class="iconArq iconSuite"></i><?php echo $suites['choices'][ $svalue ]; ?></li>
        <?php }
        if($gvalue != ""){ ?>
          <li><i class="iconArq iconCarro"></i><?php echo $garagem['choices'][ $gvalue ]; ?></li>
        <?php }
        if(get_field('metragem')){ ?>
          <li><i class="iconArq iconArea"></i><?php the_field('metragem'); echo "m²"; ?></li>
        <?php } ?>
      </ul>
    </div>
    <div class="col-xs-12 col-md-6">
      <h3><?php the_field('bairro'); ?></h3>
      <span class="spEnderco"><?php //the_field('endereco_imovel'); ?></span>
      <span class="spTipo"><?php echo get_the_term_list( $post->ID, 'tipo', ' ', ', ' ); ?></span>
    <div class="textoIm">
      <?php the_excerpt(); ?>
    </div>
      <span class="lnkDetalhes"><a href="<?php the_permalink(); ?>">Ver Mais Detalhes</a></span>
    </div>
  </div>
</div>