<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Radiated Pixel
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="colophon" role="contentinfo">
    <div class="row">
      <div class="large-12 columns">
        <p><strong>© Radiated Pixel</strong> – <?php echo get_bloginfo ( 'description' );  ?></p>
        <p>Source code published on this site is licensed under <a href="http://opensource.org/licenses/mit-license.php">The MIT License</a>.</p>
        <?php do_action( 'rp_credits' ); ?>
        <p><?php printf( __( 'This theme – made and maintained by %1$s – is available on %2$s.', 'rp' ), '<a href="http://www.manuelwieser.com/" rel="designer">Manuel Wieser</a>', '<a href="https://github.com/Lorti/radiated-pixel-theme">GitHub</a>' ); ?></p>
      </div>
      <div class="colophon__developer">
        <div class="colophon__bubble">
          Having trouble with our new site?<br>
          You want to give us feedback?<br>
          <span id="feedback">Send a message to Manuel Wieser!</span>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/developer.png" alt="Manuel Wieser">
      </div>
    </div>

	</footer>

</div><!-- #page -->



<?php wp_footer(); ?>

</body>
</html>