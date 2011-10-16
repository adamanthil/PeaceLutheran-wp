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
        <div class="header">
          <h3>Timeless Quote</h3>
        </div>
        <div class="quote-box">
          <img src="<?php bloginfo("template_url"); ?>/images/openquote.png" />
          <?php
            query_posts( 'post_type=peace_featuredquote&post_status=publish&limit=1&order=ASC');
            if (have_posts()) : while (have_posts()) : the_post();
            echo get_post_meta($post->ID, "quote", $single = true);
            $author = get_post_meta($post->ID, "author", $single = true);
          ?>
          <?php endwhile; endif; ?>
          <img src="<?php bloginfo("template_url"); ?>/images/closequote.png" />
          <div class="author">-<?php echo $author; ?></div>
        </div>
      </div>
      <div class="column">
        <div class="header">
          <h3>News</h3>
        </div>
        <ul id="news">
        <?php query_posts( 'post_type=peace_news&post_status=publish&posts_per_page=1'); ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <li>
                <h5><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
                <p><?php the_excerpt(); ?></p>
            </li>
        <?php endwhile; endif; ?>
      </div>
      <div class="column">
        <div class="header">
          <h3>Upcoming Events</h3>
        </div>
        <ul id="events">
        <?php 
            $args = array('limit=2');
            $events = array();
            if (class_exists('EM_Events')) {
                $events = EM_Events::get($args);
            }
        ?>
        <?php foreach($events as $event): ?>
        <li>
          <h5><a href="#"><?php echo $event->name; ?></a></h5>
          <span class="date"><?php $date = new \DateTime($event->start_date); echo $date->format('l F j') ?></span>
          <p><?php echo $event->notes; ?></p>
        </li>
        <?php endforeach; ?>
      </div>
    </div>
  </div> <!-- /content -->
<?php get_footer(); ?>
