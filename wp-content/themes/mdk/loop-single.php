<?php if (have_posts()): while (have_posts()): the_post();?>

<div id='single_post'>

  <div class="blog_content">

    <?php the_content();?>

  </div><!-- blog_content -->

  <?php edit_post_link(__('Edit'), '', '');?>

</div><!-- single_post -->

<?php endwhile; // end of loop ?>

<?php endif;?>