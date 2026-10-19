<?php get_header(); ?>

<main>
  <section class="section">
    <div class="section_inner">
      <div class="section_header">
        <h1 class="heading heading-primary"><span>最新情報</span>NEWS -
          <?php if (is_year()): ?>
            <?= get_query_var('year'); ?>年
          <?php else: ?>
            <?php wp_title(''); ?>
          <?php endif; ?>
        </h1>
      </div>

      <div class="archive">
        <div class="archive_category">
          <h2 class="archive_title">カテゴリー</h2>
          <ul class="archive_list">
            <?php
            $args = [
              'title_li' => '',
            ];
            wp_list_categories($args);
            ?>
          </ul>
        </div>

        <div class="archive_yealy">
          <h2 class="archive_title">年別</h2>
          <ul class="archive_list">
            <?php
            $args = [
              'type' => 'yearly',
            ];
            wp_get_archives($args);
            ?>
          </ul>
        </div>
      </div>

      <div class="section_body">
        <?php if (have_posts()): ?>
          <div class="cardList">
            <?php while (have_posts()): the_post(); ?>

              <?php get_template_part('template-parts/loop', 'news'); ?>

            <?php endwhile; ?>

          </div>
        <?php endif; ?>

        <?php if (function_exists('wp_pagenavi')): ?>
          <div class="pagination">
            <?php wp_pagenavi(); ?>
          </div>
        <?php endif; ?>

      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>