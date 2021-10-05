<footer id='consultation'>

  <div id='footer-inner'>

    <div id='footer-form-wrapper'>

      <span id='footer-form-title'><?php the_field('footer_form_title', 'option');?></span><!-- footer-form-title -->

      <span id='footer-form-description'><?php the_field('footer_form_description', 'option');?></span>
      <!-- footer-form-description -->

      <?php gravity_form(1, false, false, false, '', true, 12);?>

    </div><!-- footer-form-wrapper -->

    <?php if (!is_page_template('page-templates/template-contact.php')) {?>

    <div id='footer-info-wrapper'>

      <span id='footer-info-title'><?php the_field('footer_title_verbiage', 'option');?></span>
      <!-- footer-info-title -->

      <div id='footer-info-inner'>

        <div class='footer-info-row footer-info-row-one'>

          <span class='footer-info-subtitle'><?php the_field('location_title', 'option');?></span>
          <!-- footer-info-subtitle -->

          <div class='footer-info-row-inner'>

            <span class='footer-info-content'><?php the_field('address', 'option');?></span>
            <!-- footer-info-subtitle -->

            <a class='footer-info-content directions' href='<?php the_field('address_link', 'option');?>'
              target="_blank" rel="noopener">DIRECTIONs</a>
            <!-- directions -->

          </div><!-- footer-info-row-inner -->

        </div><!-- footer-info-row -->

        <div class='footer-info-row footer-info-row-two'>

          <span class='footer-info-subtitle'><?php the_field('office_hours_title', 'option');?></span>
          <!-- footer-info-subtitle -->

          <div class='footer-info-row-inner'>

            <span class='footer-info-content'><?php the_field('office_hours', 'option');?></span>
            <!-- footer-info-subtitle -->

          </div><!-- footer-info-row-inner -->

        </div><!-- footer-info-row -->

        <div class='footer-info-row footer-info-row-three'>

          <span class='footer-info-subtitle'><?php the_field('call_today_title', 'option');?></span>
          <!-- footer-info-subtitle -->

          <div class='footer-info-row-inner'>

            <span class='footer-info-content'><a
                href='tel:+1<?php echo str_replace(['-', '(', ')', ' '], '', get_field('phone', 'option')); ?>'>
                <span><?php the_field('phone', 'option');?></span>
              </a><?php the_field('call_today_content', 'option');?></span>
            <!-- footer-info-subtitle -->

          </div><!-- footer-info-row-inner -->

        </div><!-- footer-info-row -->

        <div class='footer-info-row footer-info-row-four'>

          <span class='footer-info-subtitle'><?php the_field('social_title', 'option');?></span>
          <!-- footer-info-subtitle -->

          <div class='footer-info-row-inner'>

            <?php if (get_field('facebook_link', 'option')) {?>

            <a class='social-icon' href='<?php the_field('facebook_link', 'option');?>' target="_blank" rel="noopener">

              <?php echo file_get_contents(get_template_directory() . '/images/social-fb.svg'); ?>

            </a><!-- social-icon -->

            <?php }?>

            <?php if (get_field('instagram_link', 'option')) {?>

            <a class='social-icon' href='<?php the_field('instagram_link', 'option');?>' target="_blank" rel="noopener">

              <?php echo file_get_contents(get_template_directory() . '/images/social-insta.svg'); ?>

            </a><!-- social-icon -->

            <?php }?>

            <?php if (get_field('google_business_link', 'option')) {?>

            <a class='social-icon' href='<?php the_field('google_business_link', 'option');?>' target="_blank"
              rel="noopener">

              <?php echo file_get_contents(get_template_directory() . '/images/social-google.svg'); ?>

            </a><!-- social-icon -->

            <?php }?>

            <?php if (get_field('yelp_link', 'option')) {?>

            <a class='social-icon' href='<?php the_field('yelp_link', 'option');?>' target="_blank" rel="noopener">

              <?php echo file_get_contents(get_template_directory() . '/images/social-yelp.svg'); ?>

            </a><!-- social-icon -->

            <?php }?>

          </div><!-- footer-info-row-inner -->

        </div><!-- footer-info-row -->

      </div><!-- footer-info-inner -->

    </div><!-- footer-info-wrapper -->

    <?php }?>

  </div><!-- footer-inner -->

  <div id='copyright-wrapper'>

    <div id='copyright-inner'>

      <ul>
        <li>&copy; <?php echo date('Y'); ?> <?php the_field('lawfirm_name', 'option');?></li>
        <li><?php the_field('all_rights_reserved', 'option');?></li>
        <?php if (get_field('disclaimer_link', 'option')) {?>
        <li><a
            href='<?php the_field('disclaimer_link', 'option');?>'><?php the_field('disclaimer_title', 'option');?></a>
        </li>
        <?php }?>
      </ul>

    </div><!-- copyright-inner -->

  </div><!-- copyright-wrapper -->

</footer>

<?php wp_footer();?>

<?php the_field('footer_scripts', 'option');?>

<?php if (get_field('live_chat', 'option')) {?>

<script type="text/javascript">
// load all other scripts
function delayScript(src, timeout, attributes) {
  return new Promise((resolve, reject) => {
    setTimeout(() => {
      const scriptElem = document.createElement("script");
      scriptElem.src = src;
      for (const key in attributes) {
        const attribute = key;
        const value = attributes[key];
        scriptElem.setAttribute(attribute, value ? value : "");
      }
      scriptElem.addEventListener("readystatechange", () => {
        resolve();
      });
      document.head.appendChild(scriptElem);
    }, timeout);
  });
}
delayScript("<?php the_field('live_chat', 'option');?>", 2000);
</script>

<?php }?>

</body>

</html>