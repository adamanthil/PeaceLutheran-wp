<?php
/**
 *	Template Name: Media
*/
?>

<?php get_header(); ?>
	<div id='content'>
		<?php if ( ! dynamic_sidebar( 'Alert' ) ) : ?>
			<!--Wigitized 'Alert' for the home page -->
		<?php endif ?>
		<div style="margin-bottom: 20px">
			<h2>Sermons</h2>
			<?php query_posts( 'post_type=peace_sermon&post_status=publish&posts_per_page=5'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post-single">
					<h3><?php the_time('F j, Y'); ?>: <?php the_title(); ?></h3>
					<?php if( function_exists('the_powerpress_content') ) the_powerpress_content(); ?>
				</div><!--.post-single-->
			<?php endwhile; ?>
			<a href='sermons'>See All</a>
			<?php endif; ?>
		</div>
		<div style="margin-bottom: 20px">
			<h2>Congregation at Prayer</h2>
			<?php query_posts( 'post_type=peace_congpray&post_status=publish&posts_per_page=5'); ?>
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
					<h3><?php the_time('F j, Y'); ?>: <?php the_title(); ?></h3>
					<?php echo $attachment_link; ?>
					<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
					<div class="post-content">
						<?php the_content(__('Read more'));?>
					</div>
					<div class="post-meta">
						<p>
							
						</p>
					</div><!--.postMeta-->
				</div><!--.post-single-->
			<?php endwhile; ?>
			<a href='congregation-at-prayer'>See All</a>
			<?php endif; ?>
		</div>
		<div>
			<h2>Bulletins</h2>
			<?php query_posts( 'post_type=peace_bulletin&post_status=publish&posts_per_page=5'); ?>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<div class="post-single">
					<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
					<div class="post-content">
						<?php the_content(__('Read more'));?>
					</div>
					<div class="post-meta">
						<p>
							<?php the_time('F j, Y'); ?>
						</p>
					</div><!--.postMeta-->
				</div><!--.post-single-->
			<?php endwhile; ?>
			<a href='bulletins'>See All</a>
			<?php endif; ?>
		</div>
	</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
