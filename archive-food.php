<?php get_header(); ?>

<main>
  <section class="section section-foodList">
    <div class="section_inner">
      <div class="section_header">
        <h2 class="heading heading-primary"><span>フード紹介</span>FOOD</h2>
      </div>

      <?php
      $args = [
        'taxonomy' => 'menu',
      ];
      $menu_terms = get_terms($args);
      minilog($menu_terms, 'メニューカテゴリのオブジェクト');
      ?>
      <?php if (!empty($menu_terms)): ?>
        <?php foreach ($menu_terms as $menu): ?>
          <section class="section_body">
            <h3 class="heading heading-secondary">
              <a href="<?= get_term_link($menu); ?>">
                <?= $menu->name; ?>
                <span><?= strtoupper($menu->slug); ?></span>
              </a>
            </h3>
            <ul class="foodList">
              <?php
              // 現在ループしているメニューカテゴリのデータのみ取得する
              $args = [
                'post_type' => 'food',  // 投稿タイプ: food
                'posts_per_page' => -1, // 1ページに表示する投稿数(-1は全件)
                'tax_query' => [        // タクソノミーの条件(配列で指定)
                  'relation' => 'AND',  // 条件を繋ぐ接続詞(ANDかORを指定。条件が複数ある場合に有効)

                  // 条件1
                  [
                    'taxonomy' => 'menu', // タクソノミー名
                    'field' => 'slug',    // 検索するフィールドの種類(ID、名前、スラッグなど)
                    'terms' => $menu->slug, // 実際のスラッグ名
                  ]
                ],
              ];
              $the_query = new WP_Query($args);
              ?>
              <?php if ($the_query->have_posts()): ?>
                <?php while ($the_query->have_posts()): $the_query->the_post(); ?>
                  <li class="foodList_item">

                    <?php get_template_part('template-parts/loop', 'food'); ?>

                  </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
              <?php endif; ?>

            </ul>
          </section>
        <?php endforeach; ?>
      <?php endif; ?>

    </div>
  </section>
</main>

<?php get_footer(); ?>