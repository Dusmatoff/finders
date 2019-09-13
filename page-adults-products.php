<?php
/**
 * Template Name: Adults products
 */
get_header();
?>
<?php
$args = array(
    'post_type' => 'game',
    'post_status' => 'publish',
    'posts_per_page' => -1,
    'tax_query' => array(
        array (
            'taxonomy' => 'game_category',
            'field' => 'slug',
            'terms' => 'adults',
        )
    ),
);

$the_query = new WP_Query($args);
?>
<?php if ($the_query->have_posts()) : ?>
<section  class='product-pg'>
    <div class='spacer-lg-6 spacer-md-4 spacer-sm-2'> </div>
    <div class='container-full'>
        <div class='row'>
            <?php while ($the_query->have_posts()) : $the_query->the_post();
                $background_color = get_field('background_color');
            ?>
            <div class='col-md-6 col-xl-4'>
                <a href="<?php the_permalink(); ?>" class='product-item'>
                    <div style='border-color: <?php echo $background_color ? $background_color : '#e0263b'; ?>; background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)'  class='image'></div>
                    <h3 style='background-color: <?php echo $background_color ? $background_color : '#e0263b'; ?>;' class='h3 title'><?php the_title(); ?></h3>
                </a>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
    <div class='spacer-lg-10 spacer-md-6'></div>
    <div class='spacer-lg-10 spacer-md-6'></div>
</section>
<?php endif; ?>
<?php get_footer(); ?>
