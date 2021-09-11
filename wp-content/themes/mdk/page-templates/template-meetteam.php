<?php

/* Template Name: Meet the Team */

get_header();?>

<div id="internal-main">

  <?php if (!get_field('disable_banner')) {

    get_template_part('page-templates/includes/page_banner/template', 'banner_page_title');

}?>

  <div id='page-container'>

    <div id='meetteam'>

      <?php $meet_the_team = get_field('meet_the_team');?>
      <?php if ($meet_the_team): ?>

      <div id='meetteam-top'>
        <?php foreach ($meet_the_team as $post): ?>
        <?php setup_postdata($post);?>

        <div class='single-att'>

          <a href='<?php the_permalink();?>'>

            <?php $attorney_bio_image = get_field('attorney_bio_image');?>
            <?php if (!$attorney_bio_image) {$placeholder = 'placeholder';}?>

            <div class='single-att-img <?php echo $placeholder; ?>'>

              <?php if ($attorney_bio_image) {?>

              <img src="<?php echo $attorney_bio_image['url']; ?>" alt="<?php echo $attorney_bio_image['alt']; ?>" />

              <?php } else {?>

              <img src="<?php bloginfo('template_directory');?>/images/att-placeholder.jpg" alt="placeholder" />

              <?php }?>

            </div><!-- single-att-img -->

            <span class='single-att-title'><?php the_title();?></span><!-- single-att-title -->

            <?php if (get_field('attorney_positions')) {?>

            <span class='single-att-position'><?php the_field('attorney_positions');?></span><!-- single-att-title -->

            <?php }?>

          </a>

        </div><!-- single-att -->

        <?php endforeach;?>

      </div><!-- meetteam-top -->

      <?php wp_reset_postdata();?>
      <?php endif;?>

      <?php $attorneys = get_field('attorneys');?>
      <?php if ($attorneys): ?>

      <div id='meetteam-bottom'>

        <?php foreach ($attorneys as $post): ?>
        <?php setup_postdata($post);?>

        <div class='single-att'>

          <a href='<?php the_permalink();?>'>

            <?php $attorney_bio_image = get_field('attorney_bio_image');?>

            <?php if (!$attorney_bio_image) {$placeholder = 'placeholder';}?>

            <div class='single-att-img <?php echo $placeholder; ?>'>

              <?php if ($attorney_bio_image) {?>

              <img src="<?php echo $attorney_bio_image['url']; ?>" alt="<?php echo $attorney_bio_image['alt']; ?>" />

              <?php } else {?>

              <img src="<?php bloginfo('template_directory');?>/images/att-placeholder.jpg" alt="placeholder" />

              <?php }?>
            </div><!-- single-att-img -->

            <span class='single-att-title'><?php the_title();?></span><!-- single-att-title -->

            <?php if (get_field('attorney_positions')) {?>

            <span class='single-att-position'><?php the_field('attorney_positions');?></span><!-- single-att-title -->

            <?php }?>

          </a>

        </div><!-- single-att -->

        <?php endforeach;?>
        <?php wp_reset_postdata();?>

      </div><!-- meetteam-bottom -->

      <?php endif;?>

    </div><!-- meetteam -->

  </div><!-- page-container -->

</div><!-- internal-main -->

<?php get_footer();?>