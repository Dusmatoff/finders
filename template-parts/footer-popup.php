<?php if(is_front_page()): 
$adults_image = get_field('adults_image', 'option');
$adults_title = get_field('adults_title', 'option');
$adults_text = get_field('adults_text', 'option');
$adults_link = get_field('adults_link', 'option');
$kids_image = get_field('kids_image', 'option');
$kids_title = get_field('kids_title', 'option');
$kids_text = get_field('kids_text', 'option');
$kids_link = get_field('kids_link', 'option');
$logo = get_field('logo', 'option');
?>
<div class="popup-wrapper active">
    <div class="bg-layer"></div>
    <div class="popup-content active" data-rel="2">
        <div class="layer-close"></div>
        <div class="popup-container size-2 splash-pop">
            <div class='splash-pop__con-des'>
                <?php if($logo): ?>
                <div class='logo-pop'>
                    <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
                </div>
                <?php endif; ?>
                <div class='item-adults'
                     style='background-image: url(<?php echo $adults_image ? $adults_image['url'] : ''; ?>)'>
                    <div class='context-sp'>
                        <?php if($adults_title): ?><div class='title'><span><?php echo $adults_title; ?></span></div><?php endif; ?>
                        <?php if($adults_text): ?><p class='text-pop'><b><?php echo $adults_text; ?></b></p><?php endif; ?>
                    </div>
                    <?php if($adults_link): ?><a href="<?php echo $adults_link; ?>" onclick='_functions.closePopup()' class='btn btn-splash'><?php esc_html_e('Explore!', 'finders') ?></a><?php endif; ?>
                </div>
                <div class='item-kids'
                     style='background-image: url(<?php echo $kids_image ? $kids_image['url'] : ''; ?>)'>
                    <div class='context-sp'>
                        <?php if($kids_title): ?><div class='title'><span><?php echo $kids_title; ?></span></div><?php endif; ?>
                        <?php if($kids_text): ?><p class='text-pop'><b><?php echo $kids_text; ?></b></p><?php endif; ?>
                    </div>
                    <?php if($kids_link): ?><a href="<?php echo $kids_link; ?>" class='btn btn-splash'><?php esc_html_e('Play!', 'finders') ?></a><?php endif; ?>
                </div>
            </div>
            <div class='splash-pop__con-mob'>
                <?php if($logo): ?>
                <div class='logo-pop'>
                    <img src="<?php echo $logo['url'] ?>" alt="<?php echo $logo['alt'] ?>">
                </div>
                <?php endif; ?>
                <?php if($adults_title): ?><div class='title'><span><?php echo $adults_title; ?></span></div><?php endif; ?>
                <div class='splash-pop__top'>
                    <?php if($adults_link): ?><a href="<?php echo $adults_link; ?>" onclick='_functions.closePopup()' class='btn btn-splash'><?php esc_html_e('Go to Grown-ups site!', 'finders') ?></a><?php endif; ?>
                </div>
                <div class='splash-pop__bottom'>
                    <?php if($kids_link): ?><a href="<?php echo $kids_link; ?>" class='btn btn-splash'><?php esc_html_e('Go to Kids site!', 'finders') ?></a><?php endif; ?>
                </div>
                <div class='splash-img-a'>
                    <img data-src='<?php echo get_template_directory_uri(); ?>/img/Layer-7.png' alt="img">
                </div>
                <div class='splash-img-b'>
                    <img data-src='<?php echo get_template_directory_uri(); ?>/img/Layer-2-copy.png' alt="img">
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>