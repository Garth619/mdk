<?php

$wistia = get_field('wistia_or_youtube') == 'Wistia';
$wistiaID = get_sub_field('video_option_wistia_id');

$youtube = get_field('wistia_or_youtube') == 'Youtube';
$youtubeID = get_sub_field('video_option_youtube_id');
$youtube_image_link = 'https://img.youtube.com/vi/' . $youtubeID . '/0.jpg';

$video_options_thumbnail = get_sub_field('video_options_thumbnail');

if ($wistia) {
    $videolink = '#';
    if ($video_options_thumbnail) {
        $wistiaView = 'html';
    } else {
        $wistiaView = 'thumbnail';
    }
}

if ($youtube) {
    $videolink = 'https://www.youtube.com/embed/' . $youtubeID;
}

?>

<div class='single-video'>

  <div class='single-video-thumbnail-wrapper'>

    <?php if ($wistia) {?>

    <div
      class='single-wistia wistia_embed wistia_async_<?php echo $wistiaID; ?> popover=true popoverContent=<?php echo $wistiaView; ?>'>
    </div><!-- single-wistia -->

    <?php }

?>

    <a href='<?php echo $videolink; ?>' <?php if ($youtube) {echo 'data-lity';}?>>

      <?php

if ($video_options_thumbnail) {?>

      <img class='single-video-thumb' src="<?php echo $video_options_thumbnail['url']; ?>"
        alt="<?php echo $video_options_thumbnail['alt']; ?>" />

      <?php }

if (!$video_options_thumbnail && $youtube) {?>

      <img class='single-video-thumb' src="<?php echo $youtube_image_link; ?>" />

      <?php }?>

      <img class='single-video-spacer' src='<?php bloginfo('template_directory');?>/images/spacer.png'
        alt='Image Spacer' />

      <div class='single-video-overlay'>

        <span class='single-play-button'></span><!-- single-play-button -->

      </div><!-- single-video-overlay -->

  </div><!-- single-video-thumbnail-wrapper -->

  <span class='single-video-title'><?php the_sub_field('video_options_video_title');?></span>

  </a>

</div><!-- single-video -->