<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <meta name="viewport" content="width=device-width; initial-scale=1"/><?php /* Add "maximum-scale=1" to fix the Mobile Safari auto-zoom bug on orientation changes, but keep in mind that it will disable user-zooming completely. Bad for accessibility. */ ?>
    <link rel="icon" href="<?php bloginfo('template_url'); ?>/favicon.ico" type="image/x-icon" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
    <?php wp_enqueue_script("jquery"); /* Loads jQuery if it hasn't been loaded already */ ?>

    <link type="text/css" rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/stylesheets/normalize.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/stylesheets/site.css" media="screen" />
    <!--[if lt IE 9]>
      <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <title><?php if ( is_category() ) {
      echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
    } elseif ( is_tag() ) {
      echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
    } elseif ( is_archive() ) {
      wp_title(''); echo ' Archive | '; bloginfo( 'name' );
    } elseif ( is_search() ) {
      echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
    } elseif ( is_front_page() ) {
      bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
    }  elseif ( is_404() ) {
      echo 'Error 404 Not Found | '; bloginfo( 'name' );
    } elseif ( is_single() ) {
      wp_title('');
    } else {
      echo wp_title(''); 
      echo ' | '; bloginfo( 'name' );
    } ?></title>
    <script type="text/javascript" src="http://use.typekit.com/ltq7dhs.js"></script>
    <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
    <?php wp_head(); ?>
    <?php // Determine the current color from the church season
      $styles = array(
        'violet' => array(
          'background-home' => 'rgba(51, 10, 36, 0.7)',
          'background-menu' => 'rgba(51, 10, 36, 0.85)',
          'background' => '#4d3445',
          'titles' => '#4d3445',
          'color' => 'white',
          'sub-color' => '#E0E0E0'
        ),
        'green' => array(
          'background-home' => 'rgba(0, 59, 45, 0.7)',
          'background-menu' => 'rgba(0, 59, 45, 0.8)',
          'background' => '#2A4F48',
          'titles' => '#2A4F48',
          'color' => 'white',
          'sub-color' => '#E0E0E0'
        ),
        'blue' => array(
          'background-home' => 'rgba(35, 24, 88, 0.7)',
          'background-menu' => 'rgba(35, 24, 88, 0.8)',
          'background' => '#37315E',
          'titles' => '#37315E',
          'color' => 'white',
          'sub-color' => '#E0E0E0'
        ),
        'white' => array(
          'background-home' => 'rgba(255, 255, 255, 0.7)',
          'background-menu' => 'rgba(255, 255, 255, 0.75)',
          'background' => '#E9E9E9',
          'titles' => 'black',
          'color' => 'black',
          'sub-color' => '#222'
        ),
        'red' => array(
          'background-home' => 'rgba(83, 0, 15, 0.7)',
          'background-menu' => 'rgba(83, 0, 15, 0.8)',
          'background' => '#6D2633',
          'titles' => '#6D2633',
          'color' => 'white',
          'sub-color' => '#E0E0E0'
        )
      );

      require(ABSPATH . 'wp-content/themes/peace-parish/lib/LiturgicalCalendar.php');
      $litCal = new LiturgicalCalendar();
      $color = $litCal->getColor(new \DateTime());
      define('PEACE_COLOR', $color);
    ?>
  <style type="text/css">
    #main header { background: <?php echo $styles[$color]['background']; ?>; }
    .home #main header { background: <?php echo $styles[$color]['background-home']; ?>; }
    #main header #title a { color: <?php echo $styles[$color]['color']; ?>; }
    #main header nav a { color: <?php echo $styles[$color]['color']; ?>; }
    #main header #site-selector a { color: <?php echo $styles[$color]['color']; ?>; }
    #main header #title .loc { color: <?php echo $styles[$color]['sub-color']; ?>;}
    ul.dropdown ul {background-color: <?php echo $styles[$color]['background-menu']; ?>;}
    a:link { color: <?php echo $styles[$color]['titles']; ?>;}
    a:visited { color: <?php echo $styles[$color]['titles']; ?>;}
    #main #content #core h2 {color: <?php echo $styles[$color]['titles']; ?>;}
    #main #content #mid h3 {color: <?php echo $styles[$color]['titles']; ?>;}
    #main #content #bottom h3 {color: <?php echo $styles[$color]['titles']; ?>;}
    #main #content #core .staff-bio h4 {color: <?php echo $styles[$color]['background']; ?>;}
    #main footer { 
      background: <?php echo $styles[$color]['background']; ?>;
      color: <?php echo $styles[$color]['color']; ?>;
    }
    footer a:link, footer a:visited { color: <?php echo $styles[$color]['color']; ?>;}
  </style>
  </head>

  <body <?php body_class(); ?>>
    <section id="main" role="main">
      <header>
        <div id="title">
          <?php if( is_front_page() ): ?>
          <h1><a href="<?php bloginfo('url'); ?>">Peace Lutheran Church</a></h1>
          <?php else: ?>
          <a href="<?php bloginfo('url'); ?>">Peace Lutheran Church</a>
          <?php endif; ?>
          <span class="loc">Sussex, Wisconsin</span>
        </div>
        <nav role="navigation">
          <?php shailan_dropdown_menu(); ?>
        </nav>
        <ul id="site-selector">
          <li><a href="http://lutherancatechesis.org">CCA</a></li>
          <li><a href="http://peacelutheranacademy.org">Parish School</a></li>
        </ul>
      </header>
      <article id="content">


