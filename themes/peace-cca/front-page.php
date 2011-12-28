<?php get_header(); ?>
  <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/scripts/jquery.cycle.lite.js"></script>
  <script type="text/javascript" src="<?php bloginfo("template_url"); ?>/scripts/front-page.js"></script>
  <div id="top">
    <div id="main-pics">
      <img class="main-pic" src="<?php bloginfo("template_url"); ?>/images/top.jpg" />
    </div>
    <div id="welcome">
      <h3>What is the CCA?</h3>
      <p>The CCA is an auxiliary organization of Peace Lutheran Church, Sussex, Wisconsin made up of Lutheran pastors and laymen. The Academy is dedicated to the promotion of Luther’s Small Catechism and faithful Lutheran catechesis. The CCA produces catechetical materials and sponsors seminars and lectures on subjects related to catechesis. The Annual Symposium on Catechesis is an event sponsored by the CCA on the third Thursday and Friday in June.</p>
    </div>
  </div> <!-- /top -->

  <div id="content">
    <div id="mid">
      <img src="<?php bloginfo("template_url"); ?>/images/mid_text.png" />
    </div> <!-- / mid -->
    <div id="bottom" class="columns">
      <div class="column left">
        <?php
          query_posts( 'post_type=peace_symposium&post_status=publish&limit=1&order=ASC');
          if (have_posts()) : while (have_posts()) : the_post();
          $year = get_post_meta($post->ID, "year", $single = true);
          $title = get_post_meta($post->ID, "title", $single = true);
          $dates = get_post_meta($post->ID, "dates", $single = true);
          $featuring = get_post_meta($post->ID, "featuring", $single = true);
        ?>
        <?php endwhile; endif; ?>
        <div class="header">
          <h3><?php echo $year; ?> CCA Symposium</h3>
        </div>
        <div class="grey-box">
          <strong><?php echo $title; ?></strong><br/>
          <?php echo $dates; ?>
        </div>
        
        <div id="featuring">
          featuring:
          <div class="grey-box">
            <div><?php echo str_replace("\n", "<br/>", $featuring); ?></div>
          </div>
        </div>
        <a href="/symposium">More Info</a>
      </div>
      <div class="column">
        <div class="header">
          <h3>Featured Publication</h3>
        </div>
        <ul id="featured-publication">
        <?php 
          query_posts( 'post_type=peace_featuredpub&post_status=publish&posts_per_page=1');
          if (have_posts()) : while (have_posts()) : the_post(); 
          $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ));
        ?>
            <li>
                <h5><span class='title'><?php the_title(); ?></span></h5>
                <?php if($image[0]): ?>
                <img class="featured-img" src="<?php echo $image[0]; ?>" />
                <?php endif; ?>
                <p class="featured-desc"><?php the_excerpt(); ?></p>
            </li>
        <?php endwhile; endif; ?>
        <a href="/store">View Store</a>
      </div>
      <div class="column">
        <div class="header">
          <h3><a href="/blog">The Catechist</a></h3>
          <h4>The Lutheran Catechesis Blog</h4>
        </div>
        <div class="lastest">
        <?php query_posts( 'post_type=post&post_status=publish&posts_per_page=1'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li>
                <h5><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
                <img class="blog-img" src="<?php bloginfo("template_url"); ?>/images/prbender.jpg" />
                <p><?php the_excerpt(); ?></p>
            </li>
        <?php endwhile; endif; ?>
        </div>
        <a href="/blog">Read More</a>
      </div>
    </div>
  </div> <!-- /content -->
<?php get_footer(); ?>
