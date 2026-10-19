<?php

/**
 * titleタグを出力する
 */
add_theme_support('title-tag');

/**
 * アイキャッチ画像を使用可能にする
 */
add_theme_support('post-thumbnails');

/**
 * カスタムメニュー機能を使用可能にする
 */
add_theme_support('menus');

/**
 * titleの区切り文字を変更する
 */
add_filter('document_title_separator', 'my_document_title_separator');
function my_document_title_separator(string $separator): string
{
  $separator = '|';
  return $separator;
}


function my_dump(mixed $data): void
{
  echo '<pre>';
  var_dump($data);
  echo '</pre>';
}


/**
 * Contact Form 7の時は整形機能をOFFにする
 */
add_filter('wpcf7_autop_or_not', 'my_wpcf7_autop');
function my_wpcf7_autop()
{
  return false;
}


/**
 * メインクエリを変更する
 *
 */
add_action('pre_get_posts', 'my_pre_get_posts');
function my_pre_get_posts(mixed $query)
{
  // 管理画面、メインクエリ以外 には設定しない
  if (is_admin() || !$query->is_main_query()) {
    return;
  }

  // トップページの場合
  if ($query->is_home()) {
    $query->set('posts_per_page', 3);
    return;
  }

  // カテゴリーページの場合
  // カスタム投稿ページの場合
}


/**
 * タイトルの「保護中」の文字を削除する
 */
add_filter('protected_title_format', 'my_protected_title');
function my_protected_title($title)
{
  // '🔑' . $title; //元のタイトルを使って編集したい場合
  return '%s';
}


/**
 * ブロックエディターにCSSを読み込む
 */
add_action('after_setup_theme', 'my_editor_support');
function my_editor_support()
{
  add_theme_support('editor-styles');
  add_editor_style('assets/css/editor-style.css');
}