<?php
/**
 *	Template Name: Downloads
*/
?>

<?php get_header(); ?>

<div id="core" class="columns">
	<div style="margin-bottom: 20px">
		<h2>Congregation at Prayer</h2>
		<?php query_posts( 'post_type=peace_congpray&post_status=publish,future&posts_per_page=1&order=DESC'); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<?php
			$attachment_link = '#';
			$args = array(
				'post_type' => 'attachment',
				'numberposts' => null,
				'post_status' => null,
				'post_parent' => $post->ID
			);
			$attachments = get_posts($args);
			if ($attachments) {
				foreach ($attachments as $attachment) {
					$attachment_link = wp_get_attachment_link($attachment->ID, false, false, false, 'Download (Adobe PDF)');
				}
			}
		?>
			<div class="post-single">
				<h3 class='download-item'><?php the_time('F j, Y'); ?>: <?php the_title(); ?></h3>
				<?php echo $attachment_link; ?>
				<div class="post-content">
					<?php the_content(__('Read more'));?>
				</div>
				<div class="post-meta">
					<p>
						
					</p>
				</div><!--.postMeta-->
			</div><!--.post-single-->
		<?php endwhile; ?>
		<a href='congregation-at-prayer'>Congregation at Prayer Archive</a>
		<?php endif; ?>
	</div>
   	<div style="margin-bottom: 20px">
   		<h2>Bulletin</h2>
   		<?php query_posts( 'post_type=peace_bulletin&post_status=publish,future&posts_per_page=1&order=DESC'); ?>
   		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
   		<?php
   			$attachment_link = '#';
   			$args = array(
   				'post_type' => 'attachment',
   				'numberposts' => null,
   				'post_status' => null,
   				'post_parent' => $post->ID
   			);
   			$attachments = get_posts($args);
   			if ($attachments) {
   				foreach ($attachments as $attachment) {
   					$attachment_link = wp_get_attachment_link($attachment->ID, false, false, false, 'Download (Adobe PDF)');
   				}
   			}
   		?>
   			<div class="post-single">
   				<h3 class='download-item'><?php the_time('F j, Y'); ?>: <?php the_title(); ?></h3>
   				<?php echo $attachment_link; ?>
   			</div><!--.post-single-->
   		<?php endwhile; ?>
   		
   		<a href='<?php echo get_post_type_archive_link( 'peace_bulletin' ); ?>'>Bulletin Archive</a>
   		<?php endif; ?>
   	</div>
    <div>
		<h2>Sermon</h2>
		<?php query_posts( 'post_type=peace_sermon&post_status=publish,future&posts_per_page=1&order=DESC'); ?>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<div class="post-single">
				<h3><?php the_time('F j, Y'); ?>: <?php the_title(); ?></h3>
				<?php if( function_exists('the_powerpress_content') ) the_powerpress_content(); ?>
			</div><!--.post-single-->
		<?php endwhile; ?>
		<a href='sermons'>Sermon Archive</a>
		<?php endif; ?>
	</div>
</div> <!-- / core -->

<?php get_footer(); ?>