<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package finders
 */
$copyright = get_field('copyright', 'option');
?>

<!-- FOOTER -->
<footer class='footer color-primary'>
    <div class='footer__bg'
         style='background-image: url(<?php echo get_template_directory_uri(); ?>/img/bottom-overylay.png)'></div>
    <div class='container-full'>
        <div class='footer__row'>
            <div class='footer__nav'>
                <?php if ($copyright): ?>
                    <div class='copyright'><span>© <?php echo $copyright; ?></span></div><?php endif; ?>
                <?php
                $footer_menu_args = array(
                    'menu_class' => 'menu',
                    'theme_location' => 'kids-footer-menu'
                );
                wp_nav_menu($footer_menu_args);
                ?>
            </div>
            
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>
