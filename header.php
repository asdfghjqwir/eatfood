<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no">
  <link rel="stylesheet" href="<?= get_template_directory_uri(); ?>/assets/css/app.css" type="text/css" />
  <?php wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css'); ?>
  <?php wp_enqueue_style('google-web-fonts', 'https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap'); ?>
  <?php wp_enqueue_script('jquery'); ?>
  <?php wp_enqueue_script('food-science-main', get_template_directory_uri() . '/assets/js/main.js'); ?>
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <header class="header">
    <div class="header_logo">
      <h1 class="logo"><a href="<?= home_url(); ?>">FOOD SCIENCE<span><?php bloginfo('description'); ?></span></a></h1>
    </div>

    <div class="header_nav">
      <div class="header_menu js-menu-icon"><span></span></div>
      <div class="gnav js-menu">
        <?php
        $args = [
          'menu' => 'global-navigation', // 管理画面のメニュー名
          'menu_class' => '', // ulからクラスが削除される
          'container' => false, // ulを囲んでいるdivを削除
        ];
        wp_nav_menu($args);
        ?>

        <div class="header_info">
          <form class="header_search" action="<?= home_url('/'); ?>" method="get">
            <input type="text" aria-label="Search" name="s" value="<?php the_search_query(); ?>">
            <button type="submit"><i class="fas fa-search"></i></button>
          </form>

          <div class="header_contact">
            <div class="header_time">
              <dl>
                <dt>OPEN</dt>
                <dd>09:00〜21:00</dd>
              </dl>
              <dl>
                <dt>CLOSED</dt>
                <dd>Tuesday</dd>
              </dl>
            </div>
            <p>
              <a href="#"><i class="fa-solid fa-envelope"></i><span>ご予約・お問い合わせ</span></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </header>