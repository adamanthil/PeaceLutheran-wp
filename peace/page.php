<?php get_header(); ?>

<div id="core" class="columns">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
			<article>
				<h1><?php the_title(); ?></h1>
					
				<div class="post-content page-content">
					<?php the_content(); ?>
        </div><!--.post-content .page-content -->
        <?php edit_post_link('<small>Edit this entry</small>','',''); ?>

			</article>
		</div><!--#post-# .post-->

	<?php endwhile; ?>

</div> <!-- / core -->


<?php get_footer(); ?>
