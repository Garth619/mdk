<footer id='consultation'>

  <div id='footer-inner'>

    <div id='footer-form-wrapper'>

      <span id='footer-form-title'>Request Free Consultation</span><!-- footer-form-title -->

      <span id='footer-form-description'>Use the form below to tell us about your legal inquiry, and we’ll call you back
        to schedule an appointment.</span><!-- footer-form-description -->

      <?php gravity_form(1, false, false, false, '', true, 12);?>

    </div><!-- footer-form-wrapper -->

    <?php if (!is_page_template('page-templates/template-contact.php')) {?>

    <div id='footer-info-wrapper'>

      <span id='footer-info-title'>CONTACT MDK LAw</span><!-- footer-info-title -->

      <div id='footer-info-inner'>

        <div class='footer-info-row footer-info-row-one'>

          <span class='footer-info-subtitle'>Location</span><!-- footer-info-subtitle -->

          <div class='footer-info-row-inner'>

            <span class='footer-info-content'>4105 N. 20th Street, Suite 260<br> Phoenix Az 85016</span>
            <!-- footer-info-subtitle -->

            <a class='footer-info-content directions'
              href='https://www.google.com/maps/place/Tudor+Plaza+Office+Condominium,+4105+N+20th+St+STE+260,+Phoenix,+AZ+85016/@33.4957353,-112.0408288,17z/data=!3m1!4b1!4m5!3m4!1s0x872b0d79aab07657:0xc5ed7a49ced85afc!8m2!3d33.4957353!4d-112.0386401'
              target="_blank" rel="noopener">DIRECTIONs</a>
            <!-- directions -->

          </div><!-- footer-info-row-inner -->

        </div><!-- footer-info-row -->

        <div class='footer-info-row footer-info-row-two'>

          <span class='footer-info-subtitle'>Office Hours</span><!-- footer-info-subtitle -->

          <div class='footer-info-row-inner'>

            <span class='footer-info-content'>Monday - Friday<br> 8AM - 6PM</span>
            <!-- footer-info-subtitle -->

          </div><!-- footer-info-row-inner -->

        </div><!-- footer-info-row -->

        <div class='footer-info-row footer-info-row-three'>

          <span class='footer-info-subtitle'>Call Today</span><!-- footer-info-subtitle -->

          <div class='footer-info-row-inner'>

            <span class='footer-info-content'><a href='tel:6232255635'> <span>(623) 225-5635</span>
              </a>Se Habla Español</span>
            <!-- footer-info-subtitle -->

          </div><!-- footer-info-row-inner -->

        </div><!-- footer-info-row -->

        <div class='footer-info-row footer-info-row-four'>

          <span class='footer-info-subtitle'>Social</span><!-- footer-info-subtitle -->

          <div class='footer-info-row-inner'>

            <a class='social-icon' href='https://www.facebook.com/mdkattorneys' target="_blank" rel="noopener">

              <?php echo file_get_contents(get_template_directory() . '/images/social-fb.svg'); ?>

            </a><!-- social-icon -->

            <a class='social-icon' href='https://www.instagram.com/mdklawgroup' target="_blank" rel="noopener">

              <?php echo file_get_contents(get_template_directory() . '/images/social-insta.svg'); ?>

            </a><!-- social-icon -->

          </div><!-- footer-info-row-inner -->

        </div><!-- footer-info-row -->

      </div><!-- footer-info-inner -->

    </div><!-- footer-info-wrapper -->

    <?php }?>

  </div><!-- footer-inner -->

  <div id='copyright-wrapper'>

    <div id='copyright-inner'>

      <ul>
        <li>&copy; <?php echo date('Y'); ?> MDK Law Group</li>
        <li>All Rights Reserved</li>
        <li><a href='<?php bloginfo('url');?>/disclaimer'>Disclaimer</a></li>
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