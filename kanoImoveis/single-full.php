<?php
/**
* Single Post Template: Full Width Post
*
* @package WordPress
* @author Mais Code Tecnologia
* @since First Version
*/
    get_header(); ?>
<div class="container pageFull text-center">
    <div class="row">
        <div class="col-xs-12">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="post" id="post-<?php the_ID(); ?>">
                  <h1><?php the_title(); ?></h1>
                  <div class="entry">
                      <?php the_content(); ?>
                  </div>
                </div>
            <?php endwhile; endif; ?>
       </div>
    </div>
</div>    
<?php get_footer(); ?>