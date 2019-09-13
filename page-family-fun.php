<?php
    /**
     * Template Name: Family fun & Tips-Ideas
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
<?php if (have_rows('slides')): ?>
<div class="swiper-thumbs1">
<section class='products'>
    <div class='spacer-sm-2'></div>
    <div class='container-full'>
        
        <div class="swiper-entry default-sw">
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-container swiper-thumbs-bottom1" 
                data-options='{"loop": true, "watchSlidesVisibility": true, "watchSlidesProgress": true, "slidesPerView":6, "spaceBetween": 40, "breakpoints": {"1370": {"slidesPerView": 5},"991": {"slidesPerView": 4, "spaceBetween": 20},"767": {"slidesPerView": 3, "spaceBetween": 20},"575": {"slidesPerView": 2, "spaceBetween": 10}}}'
                >
                <div class="swiper-wrapper">
                    <?php while (have_rows('slides')): the_row();
                        $slide_image = get_sub_field('slide_image');
                    ?>
                    <div class="swiper-slide products__slide">
                        <?php if($slide_image): ?><img data-src="<?php echo $slide_image['url']; ?>" alt="<?php echo $slide_image['alt']; ?>"><?php endif; ?>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        
    </div>
</section>
<section class='image-tips'>
    <div class='spacer-lg-4 spacer-sm-2'></div>
    <div class='container-full'>
        <div class='violet-bg__wrapper'>
            <div class="swiper-entry default-sw">
                <div class="swiper-container frame-container swiper-thumbs-top1" 
                    data-options='{"slidesPerView": 1, "slidesPerGroup": 1 "simulateTouch": false, "effect": "fade"}'
                    >
                    <div class="swiper-wrapper">
                        <?php while (have_rows('slides')): the_row();
                            $content_type = get_sub_field('content_type');
                            $youtube_id = get_sub_field('youtube_id');
                            $image = get_sub_field('image');
                            $video = get_sub_field('video');
                        ?>
                        <div class="swiper-slide">
                        <?php if($content_type == 'YoutubeVideo'): ?>
                            <iframe id="ytPlayer" src="https://www.youtube.com/embed/<?php echo $youtube_id; ?>?enablejsapi=1&version=3&playerapiid=ytplayer" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen allowscriptaccess="always"></iframe>
                        <?php elseif($content_type == 'CustomVideo'): ?>
                            <video controls="controls" poster="<?php echo get_template_directory_uri(); ?>/img/Image-bg-video.jpg">
                                <source src="<?php echo $video; ?>">
                            </video>
                        <?php elseif($content_type == 'Image'): ?>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="slider-img">
						<?php else: ?>
    						<embed src="<?php echo $pdf; ?>" type="application/pdf" />
                        <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class='spacer-lg-10 spacer-md-6'></div>
    <div class='spacer-lg-10 spacer-md-6'></div>
</section>
</div>
<?php endif; ?>
<?php get_footer(); ?>