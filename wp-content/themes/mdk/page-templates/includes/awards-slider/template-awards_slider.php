<?php if (is_front_page()) {

    $awardstitle = get_field('sec_six_awards_title');
    $awardsslider = 'sec_six_awards_slider';

}if (is_page_template('page-templates/template-bio.php')) {

    $awardstitle = get_field('bio_awards_title');
    $awardsslider = 'bio_awards_slider';

}if (is_page_template('page-templates/template-about.php')) {

    $awardstitle = get_field('about_awards_title');
    $awardsslider = 'about_awards_slider';

}?>

<?php if (have_rows($awardsslider)): ?>

<div id='awards-wrapper'>

  <span id='awards-title'><?php echo $awardstitle; ?></span><!-- awards-title -->

  <div id='awards-inner'>

    <div id='awards-arrow-left' class='awards-arrow'>

      <img class='svg-arrow' src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='arrow' />

    </div><!-- awards-arrow-left -->

    <div id='awards-slider'>

      <?php while (have_rows($awardsslider)): the_row();?>

      <div class='awards-slide'>

        <?php $image = get_sub_field('image');?>

        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

      </div><!-- awards-slide -->

      <?php endwhile;?>

    </div><!-- awards-slider -->

    <div id='awards-arrow-right' class='awards-arrow'>

      <img class='svg-arrow' src='<?php bloginfo('template_directory');?>/images/arrow.svg' alt='arrow' />

    </div><!-- awards-arrow-right -->

  </div><!-- awards-inner -->

</div><!-- awards-wrapper -->

<?php endif;?>