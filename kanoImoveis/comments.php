<?php if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
die ('Please do not load this page directly. Thanks!');
if ( post_password_required() ) { ?>
	Post protegido, entre com o seu usuário para poder acessar.
<?php return; } ?>

<?php if ( have_comments() ) : ?>
	<h2 id="comments"><?php comments_number('Sem Comentários', 'Uma Comentário', 'Comentários' );?></h2>
	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
	<ol class="commentlist">
		<?php wp_list_comments(array('avatar_size' => '0'))?> 
	</ol>
	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>
 <?php else : // isto é exibido se não há nenhum comentário até agora ?>
	<?php if ( comments_open() ) : ?>
		<!-- If comentarios fechados, abertos -->
	<?php else : // comentarios fechados ?>
		<p>Comentários fechados</p>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<div id="respond">
	<h2><?php comment_form_title( 'Comente', 'Comente para %s' ); ?></h2>
	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>Voce precisa estar logado<a href="<?php echo wp_login_url( get_permalink() ); ?>">para publicar um comentário</a></p>
	<?php else : ?>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		<?php if ( is_user_logged_in() ) : ?>
			<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>
		<?php else : ?>
			<p class="clearfix"><label for="author">Nome:</label> <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /></p>
			<p class="clearfix"><label for="email">Email:</label> <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /></p>
			<p><label for="url">Site</label><input type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" /></p>
		<?php endif; ?>
		<p class="clearfix">
			<label for="comments">Mensagem:</label>
			<textarea name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
		</p>
		<div>
			<input name="submit" type="submit" id="submit" tabindex="5" value="ENVIAR" />
			<?php comment_id_fields(); ?>
		</div>
		<?php do_action('comment_form', $post->ID); ?>
	</form>
	<?php endif; // If registro que diz que precisa estar logado ?>
</div>
<?php endif; ?>
