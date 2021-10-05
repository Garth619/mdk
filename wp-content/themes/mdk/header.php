<!DOCTYPE html>
<html <?php language_attributes();?>>

<head>
  <meta charset="<?php bloginfo('charset');?>" />
  <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
  <title><?php
/*
 * Print the <title> tag based on what is being viewed.
 */
global $page, $paged;

wp_title('|', true, 'right');

// Add the blog name.
bloginfo('name');

// Add the blog description for the home/front page.
$site_description = get_bloginfo('description', 'display');
if ($site_description && (is_home() || is_front_page())) {
    echo " | $site_description";
}

// Add a page number if necessary:
if (($paged >= 2 || $page >= 2) && !is_404()) {
    echo esc_html(' | ' . sprintf(__('Page %s', 'twentyten'), max($paged, $page)));
}

?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo('pingback_url');?>" />

  <?php if (get_field('host_google_fonts_locally', 'option') == "Yes"): ?>

  <style>
  <?php if (have_rows('locally_hosted_google_fonts_repeater', 'option')): ?><?php while (have_rows('locally_hosted_google_fonts_repeater', 'option')): the_row();

  ?>@font-face {
    font-family: '<?php the_sub_field('font_family', 'option');?>';
    font-style: <?php the_sub_field('font_style', 'option');
    ?>;
    font-weight: <?php the_sub_field('font_weight', 'option');
    ?>;
    font-display: <?php the_sub_field('font_display', 'option');
    ?>;
    src: local('<?php the_sub_field('src: local', 'option');?>'), local('<?php the_sub_field('local', 'option');?>'),
      url('<?php the_sub_field('font_file_woff2', 'option');?>') format('woff2');
  }

  <?php endwhile;
  ?><?php endif;
  ?>
  </style>

  <?php else: ?>

  <?php if (get_field('fonts', 'option')): ?>

  <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

  <style>
  <?php while (has_sub_field('fonts', 'option')): ?>@import url(<?php the_sub_field('font_url');
  ?>);

  <?php endwhile;
  ?>
  </style>

  <?php endif;
?>

  <?php endif;?>

  <style>
  <?php the_field('review_css', 'option');
  ?>
  </style>

  <?php wp_head();?>

  <?php the_field('schema_code', 'option');?>

  <?php the_field('analytics_code', 'option');?>

</head>

<?php

if (is_front_page()) {

    $header = 'front-page-header';

} else {

    $header = 'internal-header';

    if (get_field('disable_banner')) {
        $header .= ' no-banner';
    }
}

if (!cms_is_in_menu('main-menu')) {
    $header .= ' current-page-not-in-menu';
}

?>

<body <?php body_class($header);?>>

  <header>

    <div id='header-inner'>

      <div id='header-left'>

        <a href='<?php bloginfo('url');?>'>

          <?php $logo = get_field('logo', 'option');?>
          <?php if ($logo) {?>
          <img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>" />
          <?php }?>

        </a>

      </div><!-- header-left -->

      <div id='header-middle'>

        <div id='cta-wrapper'>

          <div id='cta'>

            <span id='available' class='notranslate'><?php the_field('available_verbiage', 'option');?></span>
            <!-- available -->

            <span id='free-consultation'><?php the_field('free_consultation_verbiage', 'option');?></span>
            <!-- available -->

          </div><!-- cta -->

          <a id='phone'
            href='tel:+1<?php echo str_replace(['-', '(', ')', ' '], '', get_field('phone', 'option')); ?>'><?php the_field('phone', 'option');?></a>
          <!-- phone -->

        </div><!-- cta-wrapper -->

        <nav>

          <div id='close-wrapper'>

            <span id='closex'></span><!-- close -->

            <span id='close-title'>Close</span><!-- close-title -->

          </div><!-- close -->

          <?php wp_nav_menu(array('container_class' => 'menu-header', 'theme_location' => 'main_menu'));?>

        </nav>

        <div id='nav-bg'></div><!-- nav-bg -->

      </div><!-- header-middle -->

      <div id='header-right'>

        <a id='spanish-cta' class="translation-cta glink nturl notranslate"
          onclick="doGTranslate('en|es');return false;" title="Spanish" href='#'></a><!-- spanish-cta -->

        <a id='english-cta' class="translation-cta glink nturl notranslate"
          onclick="doGTranslate('en|en');return false;" title="Spanish" href='#'></a><!-- spanish-cta -->

        <div id='menu-wrapper'>

          <span class='menu-bar'></span><!-- menu-bar -->
          <span class='menu-bar'></span><!-- menu-bar -->
          <span class='menu-bar'></span><!-- menu-bar -->

          <span id='menu-title'>Menu</span><!-- menu-title -->

        </div><!-- menu-wrapper -->

      </div><!-- header-right -->

    </div><!-- header-inner -->

  </header>