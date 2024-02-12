<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>
    <?php wp_title(''); ?>
  </title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Preload Hero Image -->
  <link rel="preload" as="image" href="<?= get_field('hero_image_mobile', 'option'); ?>">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

  <!-- Normalize -->
  <link id="normalize" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <?php wp_head(); ?>

  <!-- Favicon -->
  <link rel="icon" href="<?= get_stylesheet_directory_uri(); ?>/images/favicon.ico">

  <!-- Google tag (gtag.js) -->
  <?php $gtag = wp_kses_post(get_field('google_tag_manager', 'option')); ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=<?= $gtag; ?>"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    gtag('config', '<?= $gtag; ?>');
  </script>

  <!-- Schema -->
  <?php $schema = get_field('schema', 'option'); ?>
  <?= $schema; ?>

</head>

<body <?php body_class(); ?>>

  <!-- Header -->
  <header class="header">
    <div class="header__container container-fluid">
      <!-- Header Logo -->
      <?php
      if (get_field('header_logo', 'option')) :
        $header_logo = get_field('header_logo', 'option');
      ?>
        <a class="header__logo" href="<?= get_home_url(); ?>">
          <img loading="lazy" src="<?= $header_logo; ?>" alt="<?php bloginfo('name'); ?> logo">
        </a>
      <?php endif; ?>
      <!-- Header Nav -->
      <nav class="header__nav">
        <?php wp_nav_menu(array(
          'theme_location' => 'main',
          'container' => false,
          'menu_class' => 'header__menu',
        )); ?>
      </nav>
      <!-- Header CTA -->
      <?php
      if (get_field('header_phone_number', 'option')) :
        $hero_phone_number = get_field('header_phone_number', 'option');
        $hero_tagline = get_field('header_tagline', 'option');
      ?>
        <div class="header__cta">
          <a class="header__phone" href="<?= $hero_phone_number; ?>">
            <?= $hero_phone_number; ?>
          </a>
          <?php if (get_field('header_tagline', 'option')) : ?>
            <p class="header__tagline"><?= $hero_tagline; ?></p>
          <?php endif; ?>
        </div>
      <?php endif; ?>
      <div class="header__toggle text-center">
        Menu
        <i></i><i></i><i></i>
      </div>
    </div>
  </header>

  <?php
  if (is_page_template('page-home.php')) :
    $hero_home = 'hero__home';
  else :
    $hero_home = '';
  endif;
  ?>

  <!-- Hero -->
  <section class="hero <?= $hero_home; ?> text-center">

    <?php
    if (is_page_template('page-home.php')) : ?>
      <?php
      // Hero Video
      if (get_field('hero_video_mp4', 'option')) :
        $hero_video_mp4 = get_field('hero_video_mp4', 'option');
        $hero_video_webm = get_field('hero_video_webm', 'option');
      ?>
        <div class="hero__video">
          <video playsinline="" muted="" loop="loop" autoplay="autoplay">
            <source src="<?= $hero_video_mp4; ?>" type="video/mp4">
            <source src="<?= $hero_video_webm; ?>" type="video/webm">
          </video>
        </div>
      <?php endif; ?>
      <?php
      // Hero Images
      if (get_field('hero_image_desktop', 'option')) :
        $hero_image_desktop = get_field('hero_image_desktop', 'option');
        $hero_image_tablet = get_field('hero_image_tablet', 'option');
        $hero_image_mobile = get_field('hero_image_mobile', 'option');
      ?>
        <picture class="hero__image">
          <source media="(min-width: 1024px)" srcset="<?= $hero_image_desktop; ?>">
          <source media="(min-width: 768px)" srcset="<?= $hero_image_tablet; ?>">
          <img loading="lazy" src="<?= $hero_image_mobile; ?>" alt="<?php bloginfo('name'); ?> hero image">
        </picture>
      <?php endif; ?>
    <?php else : ?>
      <?php
      // Hero Images
      if (get_field('hero_image_desktop', 'option')) :
        $hero_image_desktop = get_field('hero_image_internal', 'option');
        $hero_image_tablet = get_field('hero_image_tablet', 'option');
        $hero_image_mobile = get_field('hero_image_mobile', 'option');
      ?>
        <picture class="hero__image">
          <source media="(min-width: 1024px)" srcset="<?= $hero_image_desktop; ?>">
          <source media="(min-width: 768px)" srcset="<?= $hero_image_tablet; ?>">
          <img src="<?= $hero_image_mobile; ?>" alt="<?php bloginfo('name'); ?> hero image">
        </picture>
      <?php endif; ?>
    <?php endif; ?>


    <?php
    // Hero Content
    if (get_field('hero_title', 'option')) :
      $hero_title = get_field('hero_title', 'option');
      $hero_tagline = get_field('hero_tagline', 'option');
    ?>
      <div class="hero__content">
        <div class="hero__title"><?= $hero_title; ?></h1>
        </div>
        <p class="hero__tagline"><?= $hero_tagline; ?></p>
        <?php
        $link = get_field('hero_button', 'option');
        if ($link) :
          $link_url = $link['url'];
          $link_title = $link['title'];
          $link_target = $link['target'] ? $link['target'] : '_self';
        ?>
          <a class="btn hero__btn smoothscroll" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
        <?php endif; ?>
      </div>
    <?php endif; ?>
  </section>