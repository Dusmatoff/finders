<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package finders
 */

get_header();
?>
    <div class='wr-title color-primary'>
        <div class='container-full'>
            <div class='spacer-lg-6 spacer-md-4 spacer-sm-2'></div>
            <h1 class='h2 title-pg'><?php the_title(); ?></h1>
            <div class='spacer-lg-6 spacer-md-4 spacer-sm-2'></div>
        </div>
    </div>
    <section >
		<div class="container">
            <div class='spacer-lg-10 spacer-md-6'></div>
		<?php
		while ( have_posts() ) :
			the_post();
            the_content();

		endwhile; // End of the loop.
		?>

		</div>
        <div class='spacer-lg-10 spacer-md-6'></div>
        <div class='spacer-lg-10 spacer-md-6'></div>
    </section>

<?php get_footer();
