<section id="contatobg">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 text-center">
        <h2>Entre em contato</h2>
        <?php if ( have_posts() ) {
          while ( have_posts() ) { the_post(); ?>
            <div class="hidden-xs col-md-6 text-left sempadding">
              <?php $endereco = get_option('endereco');
              $telefone = get_option('telefone');
              $email = get_option('email');
              $mapa = get_option('mapa');
              $facebook = get_option('facebook');
              if (!empty($mapa)) {
                echo $mapa;
              } ?>
            </div>
            <div class="col-xs-12 col-md-6 bgpreto sempadding text-left">
              <div class="col-xs-12 paddig20">
                <?php if (!empty($endereco)) {
                  echo '<p><span class="glyphicon glyphicon-map-marker"></span>  ';
                  echo $endereco.'</p>';
                }
                if (!empty($telefone)) {
                  echo '<p><span class="glyphicon glyphicon-earphone"></span>  ';
                  echo $telefone.'</p>';
                }
                if (!empty($email)) {
                  echo '<p><span class="glyphicon glyphicon-envelope"></span>  ';
                  echo $email.'</p>';
                }
                if (!empty($facebook)) {
                  echo '<a href="'.$facebook.'" target="_blank"><p><i class="logoface"></i> ';
                  echo $facebook.'</p></a>';
                }
                if (!empty($instagram)) {
                  echo '<a href="'.$instagram.'" target="_blank"><p><i class="fa fa-instagram"></i> ';
                  echo $instagram.'</p></a>';
                } 
                echo do_shortcode('[inbound_forms id="34" name="contato"]'); ?>
              </div>
            </div>
          <?php }
        } wp_reset_postdata(); ?>
      </div>
    </div>
  </div>
</section>