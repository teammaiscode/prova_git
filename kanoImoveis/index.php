<?php get_header(); ?>
<div class="span-17 colborder">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
			<?php include (TEMPLATEPATH . '/inc/meta.php' ); ?>
			<div class="entry">
				<?php the_content(); ?>
			</div>
			<div class="postmetadata">
				<?php the_tags('Tags: ', ', ', '<br />'); ?>
			</div>
			<hr class="space"/>
		</div>
	<?php endwhile; ?>
	<?php include (TEMPLATEPATH . '/inc/nav.php' ); ?>
	<?php else : ?>
		<h2>Nada Encontrado</h2>
	<?php endif; ?>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
