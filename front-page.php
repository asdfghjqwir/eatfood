<?php get_header(); ?>
<?php // get_header('logged-in'); // header-logged-in.php 
?>

<?php if (is_home()): ?>
  <section class="kv">
    <div class="kv_inner">
      <h1 class="kv_title">FOOD SCIENCE<br>TOKYO</h1>
      <p class="kv_subtitle">FROM JAPAN</p>
    </div>

    <?php
    $args = [
      'post_type' => 'main-visual',
      'posts_per_page' => -1,

      // 公開終了日(カスタムフィールド)による条件設定
      'meta_query' => [
        'relation' => 'OR',
        // 条件1: 公開終了日が未来のもの
        [
          'key' => 'end_date',
          'type' => 'DATETIME',
          'compare' => '>',
          'value' => date('Y-m-d H:i:s'),
        ],
        // 条件2: 公開終了日が登録されていないもの
        [
          'key' => 'end_date',
          'value' => '',
        ],
        // 条件3: 公開終了日フィールドをそもそも持っていないもの
        [
          'key' => 'end_date',
          'compare' => 'NOT EXISTS',
        ],
      ],
    ];
    $the_query = new WP_Query($args);
    ?>

    <?php if ($the_query->have_posts()): ?>
      <div class="kv_slider js-slider">
        <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
          <?php $pic = get_field('pic'); ?>
          <div class="kv_sliderItem" style="background-image: url('<?= $pic['url']; ?>');"></div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

    <div class="kv_overlay"></div>

    <div class="kv_scroll">
      <a href="#concept" class="kv_scrollLink">
        <p>SCROLL DOWN</p>
        <div class="kv_scrollIcon"><i class="fa-solid fa-chevron-down"></i></div>
      </a>
    </div>
  </section>
<?php endif; ?>


<section class="section section-concept" id="concept">
  <div class="section_inner">
    <div class="section_headerWrapper">
      <header class="section_header">
        <h2 class="heading heading-primary"><span>コンセプト</span>CONCEPT</h2>
      </header>
      <div class="section_pic">
        <div><img src="<?= get_template_directory_uri(); ?>/assets/img/home/concept_img01@2x.png" alt=""></div>
        <div><img src="<?= get_template_directory_uri(); ?>/assets/img/home/concept_img02@2x.png" alt=""></div>
        <div><img src="<?= get_template_directory_uri(); ?>/assets/img/home/concept_img03@2x.png" alt=""></div>
      </div>
    </div>
    <div class="section_body">
      <p>
        ご提供するメキシコ料理は、当店の店主が修行したローカルフードを中心にした、ご家族でも楽しめる、美味しいメキシカンです。<br>
        スパイシーでヘルシーな本場の味をお楽しみ下さい。
      </p>
      <div class="section_btn">
        <a href="<?= get_permalink(35); ?>" class="btn btn-more">もっと見る</a>
      </div>
    </div>
  </div>
</section>

<?php if (have_posts()): ?>
  <section class="section">
    <div class="section_inner">
      <header class="section_header">
        <h2 class="heading heading-primary"><span>最新情報</span>NEWS</h2>
        <?php
        $news = get_term_by('slug', 'news', 'category');
        $news_link = get_term_link($news);
        ?>
        <div class="section_headerBtn"><a href="<?= $news_link; ?>" class="btn btn-more">もっと見る</a></div>
      </header>
      <div class="section_body">

        <div class="cardList cardList-1row">

          <?php while (have_posts()): the_post(); ?>

            <?php get_template_part('template-parts/loop', 'news'); ?>

          <?php endwhile; ?>

        </div>
      </div>
    </div>
  </section>
<?php endif; ?>

<section class="section section-info">
  <div class="section_inner">
    <div class="section_content">
      <header>
        <h2 class="heading heading-primary"><span>インフォメーション</span>INFORMATION</h2>
      </header>

      <ul class="infoList">
        <li class="infoList_item">
          <span class="infoList_prepend">営業時間</span>
          <span class="infoList_num">09:00〜21:00</span><span class="infoList_time">(LO 20:00)</span>
          <span class="infoList_append">店休日：火曜日</span>
        </li>
        <li class="infoList_item">
          <span class="infoList_prepend">お電話でのお問い合わせ</span>
          <span class="infoList_num">03-0000-0123</span>
        </li>
        <li class="infoList_item">
          <span class="infoList_prepend">メールでのお問い合わせ</span>
          <div class="infoList_btn">
            <a href="<?= home_url('/contact/'); ?>" class="btn btn-primary">お問い合わせ</a>
          </div>
        </li>
      </ul>
    </div>

    <div class="section_pic">
      <img src="<?= get_template_directory_uri(); ?>/assets/img/home/info_img01@2x.png" alt="">
    </div>
  </div>
</section>


<section class="section section-access">
  <div class="section_inner">
    <div class="section_content">
      <header class="section_header">
        <h2 class="heading heading-secondary">アクセス</h2>
      </header>
      <div class="section_body">
        <p>〒162-0846 東京都新宿区市谷左内町21-13</p>
        <div class="section_btn">
          <a href="<?= get_permalink(43); ?>" class="btn btn-primary">アクセスはこちら</a>
        </div>
      </div>
    </div>
    <div class="section_pic">
      <img src="<?= get_template_directory_uri(); ?>/assets/img/home/access_img01@2x.png" alt="">
    </div>
  </div>
</section>

<?php get_footer(); ?>