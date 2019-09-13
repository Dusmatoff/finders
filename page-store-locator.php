<?php
/**
 * Template Name: Store Locator
 */
get_header();  ?>
<div class='wr-title color-primary'>
    <div class='container-full'>
        <div class='spacer-lg-6 spacer-md-4 spacer-sm-2'></div>
        <h1 class='h2 title-pg'><?php the_title(); ?></h1>
        <div class='spacer-lg-4 spacer-sm-2'></div>
    </div>
</div>


<section class='store-loc'>
    <div class='container-full'>
        <div class="spacer-lg-2"></div>
		<?php 
		while ( have_posts() ) :
			the_post();
            the_content();

		endwhile;
		 ?>
        <!--<form  class='store-loc__se' action="#">
            <input type="text" placeholder="<?php //esc_html_e('Enter a city or postal code...', 'finders') ?>">
        </form>-->
    </div>

    <div class='spacer-lg-10 spacer-md-6'></div>
    <div class='spacer-lg-10 spacer-md-6'></div>
    <div class='spacer-lg-10 spacer-md-6'></div>

</section>
<?php get_footer(); ?>
