<?php if (!have_posts()): ?>

<div id="post-0" class="post error404 not-found">

  <h2>Not Found</h2>

  <div class="entry-content">
    <p>Apologies, but no posts have been created</p>

  </div><!-- .entry-content -->
</div><!-- #post-0 -->

<?php endif;?>

<div id="blog_feed">

  <?php if (have_posts()): while (have_posts()): the_post();?>

  <?php if (get_the_post_thumbnail()) {?>

  <?php the_post_thumbnail();?>

  <?php }?>

  <h2 class="blog-header"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

  <div class="blog-meta">

    <span class='author'>By <?php the_author();?></span><!-- author -->

    <?php echo get_the_category_list(); ?>

    <span class="date"><?php $pfx_date = get_the_date();
        echo $pfx_date?></span>

  </div><!-- blog-meta -->

  <?php echo wp_trim_words(get_the_content(), 54, '...'); ?>

  <a class="read-more" href="<?php the_permalink();?>">Read More</a>

  <?php edit_post_link(__('Edit'), '', '');?>

  <?php endwhile; // end of loop ?>

  <?php endif;?>

</div><!-- blog_feed -->

<?php my_numeric_posts_nav();?>