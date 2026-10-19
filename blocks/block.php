<div class="foodCard foodCard-border">
  <a href="<?php echo $attributes['url']; ?>">
      <div class="foodCard_pic">
        <?php
        $pic = $attributes['pic'];
        if(!empty($pic)):
        ?>
          <img src="<?php echo $pic['url']; ?>" alt="">
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri(); ?>/assets/img/common/noimage.png" alt="">
        <?php endif; ?>
      </div>
      <div class="foodCard_body">
        <h4 class="foodCard_title"><?php echo $attributes['name']; ?></h4>
        <p class="foodCard_price"><?php echo $attributes['price']; ?></p>
      </div>
  </a>
</div>