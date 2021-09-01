<footer id='consultation'>

  <div id='footer-inner'>

    <div id='footer-form-wrapper'>

      <span id='footer-form-title'>Request Free Consultation</span><!-- footer-form-title -->

      <span id='footer-form-description'>Use the form below to tell us about your legal inquiry, and we’ll call you back
        to schedule an appointment.</span><!-- footer-form-description -->

      <?php gravity_form(1, false, false, false, '', true, 12);?>

      <span id='footer-form-required'><span>*</span> Required Field</span><!-- footer-form-required -->

    </div><!-- footer-form-wrapper -->

    <div id='footer-info-wrapper'>

    </div><!-- footer-info-wrapper -->

  </div><!-- footer-inner -->

  <div id='copyright-wrapper'>

    <ul>
      <li>&copy; <?php echo date('Y'); ?> MDK Law Group</li>
      <li>All Rights Reserved</li>
      <li><a href=''>Disclaimer</a></li>
    </ul>

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