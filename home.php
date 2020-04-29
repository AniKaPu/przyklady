<?php get_header(); ?>
<?php
$postlist = get_posts([
    'numberposts' => 3,
    'post_type' => 'post',
    'cat'=> 3,
    'orderby'=> 'date',
    'order'=> 'DESC',
]);

$postlist2 = get_posts([
    'numberposts' => 4,
    'post_type' => 'post',
    'cat'=> 3,
    'orderby'=> 'date',
    'order'=> 'DESC',
    'offset'=>3,
]);

$postlist3 = get_posts([
    'post_type' => 'post',
    'cat'=> 5,
    'orderby'=> 'date',
    'order'=> 'ASC',
]);
?>


<section class="container-fluid aktualnosci p-xl-3">
    <div class="row pt-3 pb-3">
        <div class="col-12">
            <h1 class="sectionTitle">Aktualności</h1>
        </div>
    </div>
    <div class="row aktualnosci-content">
        <div class="col-12  col-lg-6 aktualnosci-content-carousel">
            <div class="swiper-container">
                <div class="swiper-wrapper">
               <?php foreach($postlist as $post) : ?>
                <?php setup_postdata($post); ?>
                    <div class="swiper-slide">
                    <img src="<?php the_post_thumbnail_url() ?>" alt="">
                    <div class="swiper-caption">
                    <div class="swiper-pagination"></div>
                    <div>
                        <a href="<?php echo get_the_permalink() ?>"><h2><?php the_title() ?></h2></a>
                    </div>
                    <p> <?php echo wp_trim_words(get_the_excerpt(), 20)?></p>
                    </div>
                    </div>    
                    <?php wp_reset_postdata()?> 
             <?php endforeach ;?>
                </div>
            </div> 
        </div>
        <div class="col-12 col-lg-6 aktualnosci-content-news">
            <div class="news inner-content">
                <?php foreach($postlist2 as $post) : ?>
                    <?php setup_postdata($post); ?>
                <div class="news-item">
                    <div class="news-item-text">
                    <a href="<?php echo get_the_permalink() ?>"><h2><?php the_title() ?></h2></a>
                    <p> <?php echo wp_trim_words(get_the_excerpt(), 20)?></p>
                    </div>
                    <div class="news-item-img">
                    <img src="<?php the_post_thumbnail_url() ?>" alt="">
                    </div>
                </div>
                <?php wp_reset_postdata()?>
               <?php endforeach; ?>
   
            </div>
        </div>
    </div>
</section>
<section class="container-fluid p-xl-3">
    <div class="row  pt-3 pb-3">
        <div class="col-12">
            <h1 class="sectionTitle">O Solidarności</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-8 inner-content">
            <div class="history-excerpt-area">
            <?php if (get_field('logo_ogolne', 'option')):?>
                                <div class="logoSmall">
                                    <img src="<?php the_field('logo_ogolne', 'option') ?>" alt="">
                                </div>
                            <?php endif;?>
                
                <?php
                        $post_id = 83;
                        $queried_post = get_post($post_id);
                        $title = $queried_post->post_title;
                    
                        ?>
                        <h2><?php echo $title;?></h2>
                        <p><?php echo $queried_post->post_content; ?></p>
           
            </div>
        </div>
        <div class="col-12 col-lg-4 history-content-wrapper">
            <div class="history-content inner-content">
                <?php foreach($postlist3 as $post) : ?>
                    <?php setup_postdata($post); ?>
                    <div class="history-content-element">
                    <a href="<?php the_permalink()?>">
                        <div class="dot">
                            <div class="inner-dot"></div>
                        </div>
                        <div class="history-content-element-title inner-content">
                            <h3><?php the_title() ?></h3>
                          
                        </div>
                    </a>
                    </div> 
                    <?php wp_reset_postdata()?>
                <?php endforeach; ?>    
            </div>
        </div>
    </div>
</section>
<section class="container-fluid p-xl-3 inner-content">
<div class="row">
    <div class="col-12 col-lg-8">
        <section class="container-fluid p-0 wydarzenia">
            <div class="row  pt-3 pb-3">
                <div class="col-12">
                    <h1 class="sectionTitle sectionTitle__scaled">Wydarzenia</h1>
                </div>
                <div class="row  p-3">
                    <div class="col-12">
                    
                    <?php while( have_posts() ) : the_post() ?>
                    <?php if ( in_category( '4' ) ) : ?>
                            <p class="postDate"><?php echo get_the_date()?></p>
                            <h2><?php the_title() ?></h2>
                            <p><?php echo get_the_content()?></p>
                            <hr>
                    <?php endif; ?>  
                  
                    <?php endwhile; ?>
                    <?php echo do_shortcode('[ajax_load_more container_type="div" post_type="post" posts_per_page="3" category="wydarzenia" category__not_in="3,1,5" offset="3" pause="true" scroll="false" button_label="Czytaj więcej"]');?>
                    
                    </div>
                </div>
            </div>
        </section>
    </div>



    <div class="col-12 col-lg-4">
        <?php get_sidebar();?>
    </div>
</div>    
</section>
<?php get_footer();?>