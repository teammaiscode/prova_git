<?php $endereco = get_option('endereco');
$telefone = get_option('telefone');
$email = get_option('email');
$mapa = get_option('mapa');
$facebook = get_option('facebook');
$instagram = get_option('instagram'); ?>
<footer>
	<div class="container">
    <div class="row">
    	<div class="col-xs-12 text-center logoRodape">
    		<img src="<?php echo esc_url( get_template_directory_uri() ) ;?>/img/logoRodape.png"/;>
    	</div>
    	<div class="col-xs-12 col-md-4 text-center">
    		<h5>Ligue Para nós</h5>
      	<?php
			if (!empty($telefone)) {
				echo '<p>';
				echo $telefone.'</p>';
			} ?>
    	</div>
    	<div class="col-xs-12 col-md-4 text-center">
    	<h5>Endereço</h5>
      <?php if (!empty($endereco)) {
				echo '<p>';
				echo $endereco.'</p>';
			} ?>
    	</div>
    	<div class="col-xs-12 col-md-4 text-center">
    	<h5>E-mail</h5>
      <?php if (!empty($email)) {
				echo '<p>';
				echo $email.'</p>';
			} ?>
    	</div>
    	<div class="col-xs-12 text-center redess">
			<?php if (!empty($facebook)) {
				echo '<a href="'.$facebook.'"><i class="logofacerodape"></i></a>';
			} 
			if (!empty($instagram)) {
				echo '<a href="'.$instagram.'"><i class="logoinstaRodape"></i></a>';
			} ?>
    	</div>
    	
    	<div class="col-xs-12 logoMaisCodeRodape"></div>
    </div>
  </div>
</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.js"></script>
<?php function jsScripts() { ?>
	<script>
		jQuery(document).ready(function($){
			$('header button').click(function(){
				$(this).hasClass("ativo")?($(this).removeClass("ativo"),$("#menu").slideUp()):($(this).addClass("ativo"),$("#menu").slideDown())
			});
			$( "input[type=radio]" ).on( "click", function(){
				$( this ).parent().addClass("active");
				verificaCheked();
			} );
			function verificaCheked(){
				$("input[type=radio]").each(function(){
  				if ($(this).prop('checked')!=true){ 
      			$( this ).parent().removeClass("active");
			    }
				});
			}
		});
	</script>
<?php } add_action('wp_footer', 'jsScripts'); wp_footer(); ?>
</body>
</html> 