<section id="post-<?php the_ID(); ?>" <?php post_class('cardList_item'); ?>>
  <a href="<?php the_permalink(); ?>" class="card">

    <?php
    $catgories = get_the_category();
    if ($catgories):
    ?>
      <div class="card_label">
        <?php foreach ($catgories as $category): ?>
          <span class="label label-black"><?= $category->name; ?></span>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <div class="card_pic">
      <?php if (has_post_thumbnail()): ?>
        <?php the_post_thumbnail('medium'); ?>
      <?php else: ?>
        <img src="<?= get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="">
      <?php endif; ?>
    </div>
    <div class="card_body">
      <h2 class="card_title"><?php the_title(); ?></h2>
      <time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('Y年m月d日'); ?>更新</time>
    </div>
  </a>
</section>