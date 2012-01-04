<?php get_header(); ?>

<?php
// --------------------------------------------------------
// Get the weekly downloads
// --------------------------------------------------------
$sermon = '';
$congpray = '';
$bulletin = '';
$weekOfYear = '';

query_posts( 'post_type=peace_sermon&post_status=publish&posts_per_page=1&order=DESC');
if (have_posts()) : while (have_posts()) : the_post();
    // Pull the second link using fun string parsing hax
    if( function_exists('the_powerpress_content') ) {
        $content = get_the_powerpress_content();
        $start = strpos($content, '<a', strpos($content, '<a') + 1);
        $end = strpos($content, '>', strpos($content, '<a', strpos($content, '<a') + 1));
        $sermon = substr($content, $start, $end - $start);
        $sermon .= ' style="width: 58px; text-align: center">Play</a>';
    } 
endwhile; endif; 

query_posts( 'post_type=peace_congpray&post_status=publish&posts_per_page=1&order=DESC');
if (have_posts()) : while (have_posts()) : the_post();
    $congpray = '#';
    $args = array(
    	'post_type' => 'attachment',
    	'numberposts' => null,
    	'post_status' => null,
    	'post_parent' => $post->ID
    );
    $attachments = get_posts($args);
    if ($attachments) {
    	foreach ($attachments as $attachment) {
    		$congpray = wp_get_attachment_link($attachment->ID, false, false, false, 'Download');
    	}
    }
endwhile; endif;

query_posts( 'post_type=peace_bulletin&post_status=publish&posts_per_page=1&order=DESC');
if (have_posts()) : while (have_posts()) : the_post();
    $weekOfYear = get_the_title();  // Assume bulletin title is week of church year (e.g. 16th Sunday after Pentecost)
    $bulletin = '#';
    $args = array(
    	'post_type' => 'attachment',
    	'numberposts' => null,
    	'post_status' => null,
    	'post_parent' => $post->ID
    );
    $attachments = get_posts($args);
    if ($attachments) {
    	foreach ($attachments as $attachment) {
    		$bulletin = wp_get_attachment_link($attachment->ID, false, false, false, 'Download');
    	}
    }
endwhile; endif;

?>

  <div id="top">
    <div id="main-pics">
      <img class="main-pic" src="<?php bloginfo("template_url"); ?>/images/top_<?php echo PEACE_COLOR; ?>.jpg" />
    </div>
    <div id="welcome">
      <h3>Welcome</h3>
      <p>
      Peace Lutheran Church is a member congregation of The Lutheran Church—Missouri Synod (LCMS). We believe, teach, and confess that
      there is only one true God—the Holy Trinity (God the Father, God the Son, and God the Holy Spirit), as confessed in the three ecumenical creeds of historic Christianity, who is the Creator and Sustainer of all things.
      Jesus Christ, the Son of God, is our Lord and Savior from sin, death, and hell. He is both true God and true man, born of the Virgin Mary, who lived a perfect and holy life for us, shed His blood for us on the cross to atone for our sins, and rose from the dead on the third day declaring His victory over Satan and the grave for us.
      </p>
    </div>
  </div> <!-- /top -->

  <div id="content">
    <div id="mid" class="columns">
      <div id="downloads" class="column">
        <h3><a href='downloads'>Weekly Downloads</a></h3>
        <h4><?php echo $weekOfYear; ?></h4>
        <ul class="inside">
          <li>Congegration at Prayer <?php echo $congpray; ?></li>
          <li>Bulletin <?php echo $bulletin; ?></li>
          <li>Sermon <?php echo $sermon; ?></li>
        </ul>
      </div>
      <div id="schedule" class="column">
        <h3>Weekly Schedule</h3>
        <h4>Divine Services &amp; Catechesis</h4>
        <div class="inside columns">
          <div class="column">
            <h5>Divine Services</h5>
            Sundays:  7:45am and 10:30am<br />
            Wednesdays:  6:45pm<br />
            <span style='margin-left: 20px'>in Advent and Lent at 2:30 & 6:45</span><br />
            Festivals, Feast Days, and Holidays
          </div>
          <div class="column">
            <h5>Catechesis</h5>
            Sundays: 9:15am Adult Bible Class<br />
            Sundays: 9:15am Sunday School (Sept-May)<br/>
            Mondays: 7pm Didache<br/>
            Thursdays: 9am Coffee Break Bible Study
          </div>
        </div>
      </div>
    </div> <!-- / mid -->
    <div id="bottom" class="columns">
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
            $args = array('limit' => 3, 'category' => '5,7');
            $events = array();
            if (class_exists('EM_Events')) {
                $events = EM_Events::get($args);
            }
        ?>
        <?php foreach($events as $event): ?>
        <li>
          <h5><?php echo $event->output('#_EVENTLINK'); ?></h5>
          <span class="date">
            <?php 
              $startDate = new \DateTime($event->start_date . ' ' . $event->start_time); 
              $endDate = new \DateTime($event->end_date);
              if($startDate->format('Ymd') == $endDate->format('Ymd') ) {
                echo $startDate->format('l F j');
                if($event->start_time != '00:00:00') {
                  echo ' &#8226; ' . $startDate->format('g:i a');
                }
              }
              else {
                echo $startDate->format('l F j') . " - " . $endDate->format('l F j');
              }
            ?>
          </span>
          <p><?php echo $event->notes; ?></p>
        </li>
        <?php endforeach; ?>
      </div>
      <div class="column">
        <div class="header">
          <h3>Shepherd of Peace</h3>
          <h4>The Pastoral Newsletter of Peace Lutheran</h4>
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
      </div>
    </div>
  </div> <!-- /content -->
<?php get_footer(); ?>
