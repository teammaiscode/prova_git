<?php function presentationJax(){
  parse_str($_POST['data']);
  if (isset($_POST['data'])) {
    $terms = $_POST['data'];
    $json= json_encode($terms);
    $obj = json_decode($json);
    $taxquery = [];
    $meta = [];
    foreach ($obj as $item) {
      if($item->filtro == 'tipo'){
        $tipo = $item->valor;
        $filter = array('taxonomy' => 'tipo','field' => 'term_id','terms' => $tipo);
        array_push($taxquery, $filter);
      }
      if($item->filtro == 'motivo'){
        $motivo = $item->valor;
        $filter = array('taxonomy' => 'motivo','field' => 'term_id','terms' => $motivo);
        array_push($taxquery, $filter);
      }
      if($item->filtro == 'txtfiltro'){
        $txtfiltro = $item->valor;
        $arrayFilter = array('key' => 'bairro','compare' => 'LIKE','value'  => $txtfiltro);
        array_push($meta ,$arrayFilter);
      }
       if($item->filtro == 'regiao'){
        $regiao = $item->valor;
        $arrayFilter = array('key' => 'regiao','compare' => '=','value'  => $regiao);
        array_push($meta ,$arrayFilter);
      }
    }
    $args = [];
    $args = array('paged' => get_query_var('paged') ? get_query_var('paged') : 1,
      'post_type'=>'imoveis',
      'post_status' => 'publish',
      'posts_per_page' => '5',
      'orderby ' => 'date',
      'order' => 'DESC',
      'tax_query'=> $taxquery,
      'meta_query'=> $meta         
    );
    $queryImoveis = new WP_Query( $args );
    if ( $queryImoveis->have_posts() ) {
      while ( $queryImoveis->have_posts() ) {
        $queryImoveis->the_post(); ?>
          <?php get_template_part('resultadomapa','template'); ?>
          <div class="text-center">
            <?php paginacao(); ?>
          </div>
        <?php }
    } else {
      echo "<div class='clearfix'></div><div class='alert clearfix alert-danger text-center' role='alert'>Nenhum Imóvel encontrado!</div><div class='clearfix'></div>";
    }
    wp_reset_postdata();
    exit();
  } else{
    echo "<div class='clearfix'></div><div class='alert clearfix alert-danger text-center' role='alert'>Selecione uma opção acima</div><div class='clearfix'></div>";
    exit();
  }
}
add_action('wp_ajax_presentationJax', 'presentationJax');
add_action( 'wp_ajax_nopriv_presentationJax', 'presentationJax' );

