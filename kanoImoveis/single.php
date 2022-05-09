<?php
/**
* 
* @package WordPress
* @author Mais Code Tecnologia
* @since First Version
*/
get_header(); ?>
<!-- Header -->
<header id="singleHeader">
  <?php get_template_part('header', 'template'); ?>
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center chamadaSobre">
        <h1>Imóveis</h1>
      </div>
    </div>
  </div>
</header>

<section id="produtosSingle">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
          <div class="col-xs-12 detImoveis" id="dvitens">
            <?php if ( have_posts() ) {
              while ( have_posts() ) { the_post(); ?>
                <div class="col-xs-12 text-left padding0resp">
                  <div class="cxprodutoSingle">
                    <div class="col-xs-12 col-md-6 sempadding">
                      <div id="galleryWrapper">
                        <ul id="galeria">
                          <?php if( have_rows('galeria') ):
                            while ( have_rows('galeria') ) : the_row(); ?>
                              <li data-thumb="<?php the_sub_field('imagens'); ?>" data-src="<?php the_sub_field('imagens'); ?>">
                                <a class="fancybox" href="<?php the_sub_field('imagens'); ?>">
                                  <span class="glyphicon glyphicon-zoom-in"></span>
                                </a>
                                <img src="<?php the_sub_field('imagens'); ?>" />
                              </li>
                            <?php endwhile;
                            else :
                          endif; ?>
                        </ul>
                      </div>
                    </div>
                  <div class="col-xs-12 col-md-6">
                    <h2><?php $vendido = get_field('foi_vendido');
                      if($vendido==2){
                        echo 'VENDIDO';
                      } else {
                        the_field('valor');
                      } ?></h2>
                    <ul class="ulIcons">
                      <?php $quartos = get_field_object('quartos');
                      $qvalue = $quartos['value'];
                      $terms = get_terms(
                        array(
                          'taxonomy'   => 'suites',                          
                        )
                      );
                      /*$svalue = $suites['value'];*/
                      $garagem = get_field_object('garagem');
                      $gvalue = $garagem['value'];
                      if($qvalue) { ?>
                        <li><i class="iconArq iconQuarto"></i><?php echo $quartos['choices'][ $qvalue ]; ?></li>
                      <?php } foreach($terms as $term): $suite = get_field('suites' , $term) ?>
                        <li><i class="iconArq iconSuite"></i><?php echo $term->name; ?></li>
                      <?php endforeach; if($gvalue != ""){ ?>
                        <li><i class="iconArq iconCarro"></i><?php echo $garagem['choices'][ $gvalue ]; ?></li>
                      <?php } if(get_field('metragem')){ ?>
                        <li><i class="iconArq iconArea"></i><?php the_field('metragem'); echo "m²"; ?></li>
                      <?php } ?>
                    </ul>
                    <div class="col-xs-12 col-md-6">
                      <h3><?php the_field('bairro'); ?></h3>
                      <h4><?php the_title(); ?></h4>
                      <span class="spEnderco"><?php //the_field('endereco_imovel'); ?></span>
                      <span class="spTipo"><?php echo get_the_term_list( $post->ID, 'tipo', ' ', ', ' ); ?></span>
                      <?php the_content(); ?>
                      <h5>Simulação</h5>
                      <ul class="bancos">
                        <li><a href="https://www42.bb.com.br/portalbb/cim/creditoimobiliario/simular,802,2250,2250.bbx"><img src="https://i2.wp.com/macmagazine.com.br/wp-content/uploads/2010/12/01-bb_icon.png?ssl=1" alt="Banco do Brasil"></a></li>
                        <li><a href="https://banco.bradesco/html/classic/produtos-servicos/emprestimo-e-financiamento/encontre-seu-credito/simuladores-imoveis.shtm#box1-comprar"><img src="https://banco.bradesco/portal/layout/imagens/geral/logo.png" alt="Bradesco"></a></li>
                        <li><a href="http://www8.caixa.gov.br/siopiinternet/simulaOperacaoInternet.do?method=inicializarCasoUso"><img src="http://www.mensagemdepaz.org.br/como_nos_ajudar/public/assets/images/caixa.png" alt="Caixa"></a></li>
                        <li><a href="https://www.itau.com.br/creditos-financiamentos/imoveis/simulador/"><img src="https://dialogospoliticos.files.wordpress.com/2012/02/itac3ba-logo.jpg" alt="Itaú"></a></li>
                        <li><a href="https://www.santander.com.br/br/resolva-on-line/simuladores/credito-imobiliario"><img src="https://i1.wp.com/macmagazine.com.br/wp-content/uploads/2011/08/15-santander_icon.png?resize=1%2C1&ssl=1" alt="Santander"></a></li>
                      </ul>
                    </div>
                      <div class="col-xs-12 col-md-6">
                        <h3>Entre em Contato</h3>
                        <?php echo do_shortcode('[inbound_forms id="64" name="Contato Imoveis"]'); ?>
                      </div>
                    </div>
                    <?php if($vendido==2){
                        get_template_part('sugestoes', 'template' ); 
                    } else { ?>
                     <?php get_template_part('mapa', 'template' ); 
                    } ?>
                  </div>
                </div>
              <?php }
          } else { ?>
            <h2>Nada Encontrado</h2>
          <?php } wp_reset_postdata(); ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
function galeria(){ ?>
<script type="text/javascript" src=""></script>
<script>
  jQuery(document).ready(function($) {
    $('#galeria').lightSlider({
      gallery:true,
      item:1,
      loop:true,
      thumbItem:5,
      slideMargin:0,
      enableDrag: false,
      currentPagerPosition:'left',
      adaptiveHeight:true,
      addClass:'galeriaItem',   
    });  
  });
</script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/jquery.fancybox.css">
<script src="<?php echo get_template_directory_uri();?>/js/jquery.fancybox.pack.js"></script>
<script>
  jQuery(document).ready(function($) {
    $('.fancybox').fancybox({
        padding:0
    });
  });
</script>
<?php }
add_action('wp_footer', 'galeria', 89 );

get_footer(); ?>