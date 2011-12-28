<?php get_header(); ?>

<div id="core" class="columns">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    <?php
    $images = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full');
    $image = array_key_exists(0, $images) ? $images[0] : '';
    ?>
    <?php if(!$image): ?>
		<div id="post-<?php the_ID(); ?>" <?php post_class('page'); ?>>
			<article>
				<h1><?php the_title(); ?></h1>
					
				<div class="post-content page-content">
					<?php the_content(); ?>
        </div><!--.post-content .page-content -->
        <?php edit_post_link('<small>Edit this entry</small>','',''); ?>

			</article>
		</div><!--#post-# .post-->
		<?php else: ?>
		<div id="post-<?php the_ID(); ?> class='page-left' " <?php post_class('page'); ?>>
			<article>
				<h1><?php the_title(); ?></h1>

        <img class='page-right' src='<?php echo $image; ?>' />
				<div class="post-content page-content">
					<?php the_content(); ?>
        </div><!--.post-content .page-content -->
        <?php edit_post_link('<small>Edit this entry</small>','',''); ?>

			</article>
		</div><!--#post-# .post-->
    <?php endif; ?>

	<?php endwhile; ?>

</div> <!-- / core -->


<?php get_footer(); ?>
