<?php get_header(); ?>
<div id="core" class="columns">
  
  <div id="feed" class="column">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
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
		<div id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

			<article>
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
				<?php edit_post_link('<small>Edit this entry</small>','',''); ?>
				<?php if ( has_post_thumbnail() ) { /* loades the post's featured thumbnail, requires Wordpress 3.0+ */ echo '<div class="featured-thumbnail">'; the_post_thumbnail(); echo '</div>'; } ?>
				<div class="post-content">
					<?php the_content(); ?>
					<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
				</div><!--.post-content-->
			</article>
			<?php if($postType->_builtin): ?>
				<div id="post-meta">
					<p>
						Posted on <?php the_time('F j, Y'); ?> at <?php the_time() ?>
					</p>
					<p>
						<?php comments_popup_link('No comments', 'One comment', '% comments', 'comments-link', 'Comments are closed'); ?> 
					</p>
					<p>
						Categories: <?php the_category(', ') ?>
						<br />
						<?php the_tags('Tags: ', ', ', ' '); ?>
					</p>
				<p>
					Receive new post updates: <a href="<?php bloginfo('rss2_url'); ?>" rel="nofollow">Entries (RSS)</a>
					<br />
					Receive follow up comments updates: <?php comments_rss_link('RSS 2.0'); ?>
				</p>
				</div><!--#post-meta-->

			<?php /* If a user fills out their bio info, it's included here */ ?>
				<div id="post-author">
					<h3>Written by <?php the_author_posts_link() ?></h3>
					<p class="gravatar"><?php if(function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '80' ); /* This avatar is the user's gravatar (http://gravatar.com) based on their administrative email address */  } ?></p>
					<div id="authorDescription">
						<?php the_author_meta('description') ?> 
						<div id="author-link">
							<p>View all posts by: <?php the_author_posts_link() ?></p>
						</div><!--#author-link-->
					</div><!--#author-description -->
				</div><!--#post-author-->
			<?php endif; ?>
		</div><!-- #post-## -->

		<div class="newer-older">
			<div class="older">
				<p>
					<?php previous_post_link('%link', '&laquo; Previous post') ?>
				</p>
			</div><!--.older-->
			<div class="newer">
				<p>
					<?php next_post_link('%link', 'Next Post &raquo;') ?>
				</p>
			</div><!--.older-->
		</div><!--.newer-older-->
		
		<?php if($postType->_builtin): ?>
			<?php comments_template( '', true ); ?>
		<?php endif; ?>

	<?php endwhile; /* end loop */ ?>
      </div>
      <?php get_sidebar(); ?>

    </div> <!-- / core -->
<?php get_footer(); ?>