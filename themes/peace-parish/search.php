<?php get_header(); ?>
<div id="core" class="columns">
	<div id="feed" class="column">
		<h1><?php the_search_query(); ?></h1>

		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<?php // Grab attachment link
				$attachment_link = null;
				if(get_post_type($post) != 'post') {
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
				}
				
				// Determine type of this post
				$postTypes = get_post_types(array('name' => get_post_type()), 'objects'); 
				$postType = $postTypes[get_post_type()];
			?>
			<div class="post-single">
				<?php if($postType->_builtin): ?>
					<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
				<?php else: ?>
					<h2 style='margin-bottom: 0px'><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
						<?php echo $postType->labels->singular_name . ': '; the_time('F j, Y'); ?>
					</a></h2>
					<h3 style='margin-top: 0px'><?php the_title(); ?></h3>
				<?php endif; ?>
				<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
				<?php echo $attachment_link; ?>
				<?php if($displayAuthor): ?>
					<p>
						Written on <?php the_time('F j, Y'); ?> at <?php the_time() ?>, by <?php the_author_posts_link() ?>
					</p>
				<?php endif; ?>
	
				<div class="post-excerpt">
					<?php the_excerpt(); /* the excerpt is loaded to help avoid duplicate content issues */ ?>
				</div><!--.post-excerpt-->
			</div><!--.post-single-->
		<?php endwhile; else: ?>
			<div class="no-results">
				<h2>No Results</h2>
				<p>Please feel free try again!</p>
				<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
			</div><!--no-results-->
		<?php endif; ?>

		<nav class="oldernewer">
			<div class="older">
				<p>
					<?php next_posts_link('&laquo; Older Entries') ?>
				</p>
			</div><!--.older-->
			<div class="newer">
				<p>
					<?php previous_posts_link('Newer Entries &raquo;') ?>
				</p>
			</div><!--.older-->
		</nav><!--.oldernewer-->
	
	</div><!-- #feed -->
	<?php get_sidebar(); ?>
</div> <!-- / core -->
<?php get_footer(); ?>