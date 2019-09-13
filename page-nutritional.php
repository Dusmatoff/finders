<?php
/**
 * Template Name: Nutritional Facts
 */
get_header(); ?>
<div class='wr-title color-primary'>
    <div class='container-full'>
        <div class='spacer-lg-6 spacer-md-4 spacer-sm-2'></div>
        <h1 class='h2 title-pg'><?php the_title(); ?></h1>
        <div class='spacer-lg-6 spacer-md-4 spacer-sm-2'></div>
    </div>
</div>

<section class='info'>
    <?php if(have_rows('nutritional_items')): ?>
    <?php while (have_rows('nutritional_items')): the_row();
        $title = get_sub_field('title');
        $left_image = get_sub_field('left_image');
        $center_image = get_sub_field('center_image');
        $subtitle = get_sub_field('subtitle');
        $text = get_sub_field('text');
        $background = get_sub_field('background');
    ?>
    <div class='info__item' style="background-color: <?php echo $background ? $background : '#a1e3fb' ?>;">
        <div  class='container-full'>
            <div class='info__row'>
                <div class='image'>
                    <?php if($title): ?><h2 class='h3 title'><?php echo $title; ?></h2><?php endif; ?>
                    <?php if($left_image): ?><img src="<?php echo $left_image['url']; ?>" alt="<?php echo $left_image['alt']; ?>"><?php endif; ?>
                </div>
                <div class='doc'>
                    <?php if($center_image): ?><img src="<?php echo $center_image['url']; ?>" alt="<?php echo $center_image['alt']; ?>"><?php endif; ?>
                </div>
                <div class='info__text  text color-dark'>
                    <?php if($subtitle): ?><p><b><?php echo $subtitle; ?></b></p><?php endif; ?>
                    <?php echo $text ? $text : ''; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; endif; ?>
    <div class='spacer-lg-10 spacer-md-6'></div>
    <div class='spacer-lg-10 spacer-md-6'></div>
</section>

<?php get_footer(); ?>
