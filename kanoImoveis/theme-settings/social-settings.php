<?php
/**
*Author: Mais Code Tecnologia - Equipe Gestão Ativa
*Tema: Dr. Paulo Saraceni - WordPress Theme
*Produção: Gestao Ativa - Solucoes Web
*Arquivo: Arquivo de Redes Sociais
*@link http://www.gestaoativa.com.br
*@package WordPress Communicate English Theme
*@since: 05/10/2015
*/

	add_action('admin_menu', 'create_menu');
	add_action('widgets_init', create_function('', 'return register_widget("social_widget");'));


	function create_menu() {
		//create new top-level menu
		add_menu_page('Redes Sociais', 'Redes Sociais', 'read', __FILE__, 'settings_page', 'dashicons-share');
		//call register settings function
		add_action( 'admin_init', 'register_mysettings' );
	}


	function register_mysettings() {
		register_setting( 'settings-group', 'facebook' );
		register_setting( 'settings-group', 'instagram' );
		register_setting( 'settings-group', 'twitter' );
		register_setting( 'settings-group', 'google' );
		register_setting( 'settings-group', 'youtube' );
		register_setting( 'settings-group', 'endereco' );
		register_setting( 'settings-group', 'telefone' );
		register_setting( 'settings-group', 'email' );
		register_setting( 'settings-group', 'mapa' );
	}

// Setter
	function settings_page() {
		?>
			<div class="wrap">
			<!--area exibida no painel no wordpress-->
				<form method="post" action="options.php" style="float:left; width:70%">
				    <?php settings_fields( 'settings-group' ); ?>
				        <fieldset style=" width:100%; padding:20px; margin:30px;">
				        	<h2 style="font-weight:bold; font-size:24px;">Configurações de Redes Sociais</h2>
				        	<div class="clear" style="margin-bottom:20px">
				        		<label style="font-weight:bold; color:#173C69; margin: 10px 0 3px 0; display:block; font-size:16px;">Twitter</label>
				        		<input style="width:100%; background:#fff; border-radius:5px; height:40px" name="twitter" type="text" value="<?php echo get_option('twitter'); ?>" />
				        		<p style="color: #999999;font-size: 11px;margin: 5px 0 0 5px">Ex: http://www.twitter.com/</p>
							</div>
							<div class="clear" style="margin-bottom:20px">
						        <label style="font-weight:bold; color:#173C69; margin: 10px 0 3px 0; display:block; font-size:16px;">Facebook</label>
						        <input style="width:100%; background:#fff; border-radius:5px; height:40px" name="facebook" type="text" value="<?php echo get_option('facebook'); ?>" />
						        <p style="color: #999999;font-size: 11px;margin: 5px 0 0 5px">Ex: http://www.facebook.com/</p>
				        	</div>
				        	<div class="clear" style="margin-bottom:20px">
						        <label style="font-weight:bold; color:#173C69; margin: 10px 0 3px 0; display:block; font-size:16px;">Instagram</label>
						        <input style="width:100%; background:#fff; border-radius:5px; height:40px" name="instagram" type="text" value="<?php echo get_option('instagram'); ?>" />
						        <p style="color: #999999;font-size: 11px;margin: 5px 0 0 5px">Ex: http://www.instagram.com/</p>
				        	</div>
				        	<div class="clear" style="margin-bottom:20px">
						        <label style="font-weight:bold; color:#173C69; margin: 10px 0 3px 0; display:block; font-size:16px;">Youtube</label>
						        <input style="width:100%; background:#fff; border-radius:5px; height:40px" name="youtube" type="text" value="<?php echo get_option('youtube'); ?>" />
						        <p style="color: #999999;font-size: 11px;margin: 5px 0 0 5px">Ex: http://www.youtube.com/</p>
				        	</div>
				        	<div class="clear" style="margin-bottom:20px">
						        <label style="font-weight:bold; color:#173C69; margin: 10px 0 3px 0; display:block; font-size:16px;">E-mail</label>
						        <input style="width:100%; background:#fff; border-radius:5px; height:40px" name="email" type="text" value="<?php echo get_option('email'); ?>" />
						        <p style="color: #999999;font-size: 11px;margin: 5px 0 0 5px">Ex: mail@mail.com.br/</p>
				        	</div>
				        	<div class="clear" style="margin-bottom:20px">
						        <label style="font-weight:bold; color:#173C69; margin: 10px 0 3px 0; display:block; font-size:16px;">Mapa</label>
						        <textarea style="width:100%; background:#fff; border-radius:5px; height:40px" name="mapa"  ><?php echo get_option('mapa'); ?></textarea>
						        <p style="color: #999999;font-size: 11px;margin: 5px 0 0 5px">Ex: Mapa</p>
				        	</div>
				        	<div class="clear" style="margin-bottom:20px">
						        <label style="font-weight:bold; color:#173C69; margin: 10px 0 3px 0; display:block; font-size:16px;">Endereço</label>
						        <input style="width:100%; background:#fff; border-radius:5px; height:40px" name="endereco" type="text" value="<?php echo get_option('endereco'); ?>" />
						        <p style="color: #999999;font-size: 11px;margin: 5px 0 0 5px">Ex: Rua xxx, 1234</p>
				        	</div>
				        	<div class="clear" style="margin-bottom:20px">
						        <label style="font-weight:bold; color:#173C69; margin: 10px 0 3px 0; display:block; font-size:16px;">Telefone</label>
						        <input style="width:100%; background:#fff; border-radius:5px; height:40px" name="telefone" type="text" value="<?php echo get_option('telefone'); ?>" />
						        <p style="color: #999999;font-size: 11px;margin: 5px 0 0 5px">Ex: (67)3333-3456</p>
				        	</div>
				        </fieldset>		
						<div style="clear:both"></div>
				    <p class="submit">
				    <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
				    </p>
				</form>
			</div>
		<?php };

	// Getter
		function redes_sociais(){
			$facebook = get_option('facebook'); 
			$twitter = get_option('twitter'); 
			$google = get_option('google');
			$youtube = get_option('youtube');
			echo "<ul class='list-inline list-unstyled' id='redes_sociais'>";
				if (!empty($facebook)) {
					echo "<li><a target='_blank' class='icon facebook' href='$facebook'></a></li>";
				};
				if (!empty($twitter)) {
					echo "<li><a target='_blank' class='icon twitter' href='$twitter'></a></li>";
				}
				if (!empty($google)) {
					echo "<li><a target='_blank' class='icon google' href='$google'></a></li>";
				}
				if (!empty($youtube)) {
					echo "<li><a target='_blank' class='icon youtube' href='$youtube'></a></li>";
				}
			echo "</ul>";
		}
				
	class social_widget extends WP_Widget {
	 
	    // constructor
	    function social_widget() {
	        parent::WP_Widget(false, $name = __('Links Redes Sociais', 'wp_widget_plugin') );
	    }
	 
	    // display widget
	    function widget($args, $instance) {
	       extract( $args );
	 
	       echo $before_widget; ?>
	        
	        <div class="widget-text social_widget_box">
	             <?php redes_sociais(); ?>
	        </div>
	         
	       <?php echo $after_widget;
	    }
	}
 

?>