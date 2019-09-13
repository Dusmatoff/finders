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
                    'theme_location' => 'adults-footer-menu'
                );
                wp_nav_menu($footer_menu_args);
                ?>
            </div>
            <?php if (have_rows('social_links', 'option')): ?>
                <div class='social-block'>
                    <?php while (have_rows('social_links', 'option')): the_row();
                        $social_icon = get_sub_field('social_icon');
                        $social_link = get_sub_field('social_link');
                        ?>
                        <?php if($social_icon && $social_link): ?>
						<a href="<?php echo $social_link; ?>" target="_blank"><img
                                    src="<?php echo $social_icon['url']; ?>"
                                    alt="<?php echo $social_icon['alt']; ?>"></a>
						<?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</footer>
</div>

<?php get_template_part('template-parts/footer-popup'); ?>

<?php wp_footer(); ?>
</body>
</html>
