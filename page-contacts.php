<?php
/**
 * Template Name: Contact Us
 */
get_header();
//Get ACF
$contact_title = get_field('contact_title');
$contact_text = get_field('contact_text');
$customer_care = get_field('customer_care');
?>
<div class='wr-title color-primary'>
    <div class='container-full'>
        <div class='spacer-lg-6 spacer-md-4 spacer-sm-2'></div>
        <h1 class='h2 title-pg'><?php the_title(); ?></h1>
        <div class='spacer-lg-4 spacer-sm-2'></div>
    </div>
</div>
<section class='contacts-sec'>
    <div class='container-full'>
        <div class='spacer-lg-6 spacer-md-4'></div>
        <div class='row'>
            <?php if ($contact_title || $contact_text): ?>
                <div class='col-lg-5'>
                    <div class='color-secondary text'>
                        <?php if ($contact_title): ?><h4 class='h4'><?php echo $contact_title; ?></h4><?php endif; ?>
                        <?php echo $contact_text ? $contact_text : ''; ?>
                    </div>
                </div>
            <?php endif; ?>
            <div class='col-lg-5 offset-xl-2 offset-lg-1'>
                <div class='color-secondary text contacts-sec__info'>
                    <?php if ($customer_care): ?><h4 class='h4'><?php echo $customer_care; ?></h4><?php endif; ?>
                    <div>
                        <p><b><?php esc_html_e('Phone:', 'finders') ?></b></p>
                        <?php if (have_rows('phones')): ?>
                            <?php while (have_rows('phones')): the_row();
                                $phone = get_sub_field('phone'); ?>
                                <a class='link-phone'
                                   href="tel:<?php echo str_replace(array('(', ')', '-', ' '), '', $phone); ?>"><?php echo $phone; ?></a>
                            <?php endwhile; endif; ?>
                    </div>
                    <div>
                        <p><b><?php esc_html_e('Email:', 'finders') ?></b></p>
                        <?php if (have_rows('emails')): ?>
                            <?php while (have_rows('emails')): the_row();
                                $email = get_sub_field('email'); ?>
                                <p><?php echo $email; ?></p>
                            <?php endwhile; endif; ?>
                    </div>
                    <div>
                        <p><b><?php esc_html_e('Mail:', 'finders') ?></b></p>
                        <?php if (have_rows('mails')): ?>
                            <?php while (have_rows('mails')): the_row();
                                $mail = get_sub_field('mail'); ?>
                                <p><?php echo $mail; ?></p>
                            <?php endwhile; endif; ?>
                    </div>
					<?php if (have_rows('social_links', 'option')): ?>
                <div class='social-block'>
                    <?php while (have_rows('social_links', 'option')): the_row();
                        $social_icon_blue = get_sub_field('social_icon_blue');
                        $social_link = get_sub_field('social_link');
                        ?>
                        <a href="<?php echo $social_link; ?>" target="_blank"><img
                                    src="<?php echo $social_icon_blue['url']; ?>"
                                    alt="<?php echo $social_icon_blue['alt']; ?>"></a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
    <div class='spacer-lg-10 spacer-md-6'></div>
    <div class='spacer-lg-10 spacer-md-6'></div>
</section>

<?php get_footer(); ?>
