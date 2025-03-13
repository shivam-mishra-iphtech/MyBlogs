<?php 
/**
* Template Name: Home page
*
* @package WordPress
* @subpackage my-blogs
* @since My Blogs 1.0
*/

echo get_header();?>




    <!-- banner area start -->
    <div class="banner-area banner-inner-1 bg-black" id="banner">
        <!-- banner area start -->
        <div class="banner-inner pt-5">
            <div class="container">
                <?php  
                    $args = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 1,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'category_name'  => 'banner-post'
                        );
                    $posts = get_posts($args);
                    foreach ($posts as $post) {
                    // print_r($post);
                ?>

                 <div class="row">
                    <div class="col-lg-6">
                        <div class="thumb after-left-top">
                            <?php 
                            $post_id = $post->ID; // Replace with your post ID
                            $image_url = get_the_post_thumbnail_url($post_id, 'full');
                            if ($image_url) {
                                echo '<img src="' . esc_url($image_url) . '" alt="Featured Image">';
                            }
                            ?> 
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="banner-details mt-4 mt-lg-0">
                            <div class="post-meta-single">
                                <ul>
                                    <li><a class="tag-base tag-blue" href="#">Tech</a></li>
                                    <li class="date"><i class="fa fa-clock-o"></i>08.22.2020</li>
                                </ul>
                            </div>
                            <h2><?php echo esc_html($post->post_title) ?></h2>
                            <?php 
                            $short_description = get_post_meta($post->ID, '_short_description', true);
                            if (!empty($short_description)) {
                                echo '<p class="short-description">' . esc_html($short_description) . '</p>';
                                
                                
                            } ?>
                           
                            <a class="btn btn-blue" href="#">Read More</a>
                        </div>
                    </div>
                </div> 
                <?php  } ?>
            </div>
        </div>
        <!-- banner area end -->
        
        <?php
        $args_category_wise = array(
            'post_type'      => 'post',
            'posts_per_page' => 4,
            'orderby'        => 'date',
            'order'          => 'DESC',
            'category_name'  => 'tech,food' // Use category slugs
        );
        $get_posts_by_cat = get_posts($args_category_wise);
        wp_reset_postdata();
        ?>
        <div class="container">
            <div class="row">
                <?php
                foreach ($get_posts_by_cat as $get_posts_cat) :
                    global $post;  // Set the global post variable
                    $post = $get_posts_cat;
                    setup_postdata($post); 
                ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="single-post-wrap style-white">
                            <div class="thumb">
                                <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>" alt="<?php the_title(); ?>">
                                
                                <?php 
                                // Get the first category of the post
                                $categories = get_the_category();
                                if (!empty($categories)) : ?>
                                    <a class="tag-base tag-blue" href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>">
                                        <?php echo esc_html($categories[0]->name); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <div class="details">
                                <h6 class="title">
                                    <a href="<?php echo get_permalink($get_posts_cat->ID); ?>">
                                        <?php 
                                        $title = get_the_title($get_posts_cat->ID);
                                        echo (strlen($title) > 40) ? substr($title, 0, 50) . '...' : $title; 
                                        ?>
                                    </a>
                                </h6>
                                <div class="post-meta-single mt-3">
                                    <ul>
                                        <li>
                                            <i class="fa fa-clock-o"></i><?php echo date('d-m-Y', strtotime($get_posts_cat->post_date)); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endforeach;
                wp_reset_postdata(); // Reset post data
                ?>
            </div>
        </div>  
    </div>
    <!-- banner area end -->

    <!-- Trending News -->
    <div class="post-area pd-top-75 pd-bottom-50" id="trending">
        <div class="container">
            <div class="row">
            <?php
                    $args_trending_news = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 3,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'category_name'  => 'trending-news' 
                    );

                    $get_posts_by_cat = get_posts($args_trending_news);
                ?>

                <div class="col-lg-3 col-md-6">
                    <?php  
                        if (!empty($get_posts_by_cat)) : 
                            $first_post = $get_posts_by_cat[0];
                            $categories = get_the_category($first_post->ID);
                            
                            if (!empty($categories)) :
                                $category_name = esc_html($categories[0]->name);
                    ?>
                                <div class="section-title">
                                    <h6 class="title"><?php echo $category_name; ?></h6>
                                </div>
                    <?php 
                            endif; 
                        endif;
                    ?>

                    <div class="post-slider owl-carousel">
                        <div class="item">
                            <div class="trending-post">
                                <?php
                                    foreach ($get_posts_by_cat as $get_posts_trending) :
                                        setup_postdata($get_posts_trending); 
                                ?>
                                <div class="single-post-wrap style-overlay">
                                    <div class="thumb">
                                        <?php if (has_post_thumbnail($get_posts_trending->ID)) : ?>
                                            <img src="<?php echo get_the_post_thumbnail_url($get_posts_trending->ID, 'medium'); ?>" alt="<?php echo esc_attr(get_the_title($get_posts_trending->ID)); ?>">
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/default-image.png" alt="Default Image">
                                        <?php endif; ?>
                                    </div>
                                    <div class="details">
                                        <div class="post-meta-single">
                                            <p><i class="fa fa-clock-o"></i> <?php echo get_the_date('F j, Y', $get_posts_trending->ID); ?></p>
                                        </div>
                                        <h6 class="title">
                                            <a href="<?php echo get_permalink($get_posts_trending->ID); ?>">
                                            <?php
                                            $tending_news_title=esc_html(get_the_title($get_posts_trending->ID));
                                             echo (strlen($tending_news_title)>40)?substr($tending_news_title,0,26).'...':$tending_news_title ?>
                                        </a></h6>
                                    </div>
                                </div>
                                <?php endforeach; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <?php
                        $args_latest_news = array(
                            'post_type'      => 'post',
                            'posts_per_page' => 5,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                            'category_name'  => 'latest-news' 
                        );

                        $get_posts_by_latest_news = get_posts($args_latest_news);

                        if (!empty($get_posts_by_latest_news)) :
                            $first_post = $get_posts_by_latest_news[0];
                            $categories = get_the_category($first_post->ID);

                            if (!empty($categories)) :
                                $category_name = esc_html($categories[0]->name);
                    ?>
                                <div class="section-title">
                                    <h6 class="title"><?php echo $category_name; ?></h6>
                                </div>
                    <?php 
                            endif; 
                        endif;
                    ?>
                    <!-- Latest news -->
                    <div class="latest-news-list">
                        <?php foreach ($get_posts_by_latest_news as $post) : setup_postdata($post); ?>
                            <div class="single-post-list-wrap">
                                <div class="media">
                                    <div class="media-left">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'thumbnail'); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                        <?php else : ?>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/post/list/default.png" alt="default-img">
                                        <?php endif; ?>
                                    </div>
                                    <div class="media-body">
                                        <div class="details">
                                            <div class="post-meta-single">
                                                <ul>
                                                    <li><i class="fa fa-clock-o"></i> <?php echo get_the_date('m.d.Y'); ?></li>
                                                </ul>
                                            </div>
                                            <h6 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                    </div>
                </div>

                 <!-- ------------- Whats New------------ -->

                 <div class="col-lg-3 col-md-6">
                    <?php
                    $args_What_news = array(
                        'post_type'      => 'post',
                        'posts_per_page' => -1, 
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'category_name'  => 'whats-new'
                    );

                    $get_post_whats_new = get_posts($args_What_news);

                    if (!empty($get_post_whats_new)) :
                        $first_post = $get_post_whats_new[0];
                        $categories = get_the_category($first_post->ID);

                        if (!empty($categories)) :
                            $category_name = esc_html($categories[0]->name);
                    ?>
                            <div class="section-title">
                                <h6 class="title"><?php echo $category_name; ?></h6>
                            </div>
                    <?php 
                        endif;
                    ?>

                        <div class="post-slider owl-carousel">
                            <?php foreach ($get_post_whats_new as $post) : setup_postdata($post); ?>
                                <div class="item">
                                    <div class="single-post-wrap">
                                        <div class="thumb">
                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium'); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                                        </div>
                                        <div class="details">
                                            <div class="post-meta-single mb-4 pt-1">
                                                <ul>
                                                    <li>
                                                        <?php 
                                                        $post_categories = get_the_category($post->ID);
                                                        if (!empty($post_categories)) :
                                                            $first_category = $post_categories[0]; 
                                                        ?>
                                                            <a class="tag-base tag-blue" href="<?php echo get_category_link($first_category->term_id); ?>">
                                                                <?php echo esc_html($first_category->name); ?>
                                                            </a>
                                                        <?php endif; ?>
                                                    </li>
                                                    <li><i class="fa fa-clock-o"></i> <?php echo get_the_date('m.d.Y', $post->ID); ?></li>
                                                </ul>
                                            </div>
                                            <h6 class="title">
                                                <a href="<?php echo get_permalink($post->ID); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a>
                                            </h6>
                                            <p><?php echo wp_trim_words(get_the_excerpt($post->ID), 30, '...'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; wp_reset_postdata(); ?>
                        </div>
                    <?php endif; ?>
                </div>

                
               

                <div class="col-lg-3 col-md-6">
                    <div class="section-title">
                        <h6 class="title">Join With Us</h6>
                    </div>
                    <div class="social-area-list mb-4">
                        <ul>
                            <li><a class="facebook" href="#"><i class="fa fa-facebook social-icon"></i><span>12,300</span><span>Like</span> <i class="fa fa-plus"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter social-icon"></i><span>12,600</span><span>Followers</span> <i class="fa fa-plus"></i></a></li>
                            <li><a class="youtube" href="#"><i class="fa fa-youtube-play social-icon"></i><span>1,300</span><span>Subscribers</span> <i class="fa fa-plus"></i></a></li>
                            <li><a class="instagram" href="#"><i class="fa fa-instagram social-icon"></i><span>52,400</span><span>Followers</span> <i class="fa fa-plus"></i></a></li>
                            <li><a class="google-plus" href="#"><i class="fa fa-google social-icon"></i><span>19,101</span><span>Subscribers</span> <i class="fa fa-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="add-area">
                        <a href="#"><img class="w-100" src="<?php echo get_the_post_thumbnail_url($post->ID, 'medium'); ?>" alt="img"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-sky pd-top-80 pd-bottom-50" id="latest">
        <div class="container">
            <div class="row">
                <?php
                    $args_fashion_post = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 1, 
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'category_name'  => 'fashion'
                    );
                    $get_post_fashions= get_posts($args_fashion_post);
                ?>
                <?php foreach($get_post_fashions  as $post) : setup_postdata($post); ?>
                <div class="col-lg-3 col-sm-6">
                   
                    <div class="single-post-wrap style-overlay-bg">
                        <div class="thumb">
                            <img src="<?php echo get_the_post_thumbnail_url($post->ID, 'large'); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                        </div>
                        <div class="details">
                            <div class="post-meta-single mb-3">
                                <ul>
                                <li>
                                     <?php 
                                     $post_categories = get_the_category($post->ID);
                                     if (!empty($post_categories)) :
                                         $first_category = $post_categories[0]; 
                                     ?>
                                         <a class="tag-base tag-blue" href="<?php echo get_category_link($first_category->term_id); ?>">
                                             <?php echo esc_html($first_category->name); ?>
                                         </a>
                                     <?php endif; ?>
                                     </li>
                                    <li><p><i class="fa fa-clock-o"></i><?php echo get_the_date('d.m.Y', $post->ID); ?></p></li>
                                </ul>
                            </div>
                            <h6 class="title">
                                <a href="<?php echo get_permalink($post->ID); ?>">
                                    <?php 
                                    $title = get_the_title($post->ID);
                                    echo (strlen($title) > 40) ? substr($title, 0, 55) . '...' : $title; 
                                    ?>
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
                <?php endforeach;?>


                <!-- banner-second -->
                <?php
                    $args_banner_second_post = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 2,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'category_name'  => 'banner-second'
                    );

                    $get_post_fashions = get_posts($args_banner_second_post);

                 ?>
                <div class="col-lg-3 col-sm-6">
                    <?php
                foreach ($get_post_fashions as $post) :
                    setup_postdata($post);
            ?>
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url($post->ID, 'medium')); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                            <p class="btn-date"><i class="fa fa-clock-o"></i><?php echo get_the_date('m.d.Y', $post->ID); ?></p>
                        </div>
                        <div class="details">
                            <h6 class="title">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php 
                                    $title = get_the_title($post->ID);
                                    echo (strlen($title) > 55) ? substr($title, 0, 55) . '...' : $title; 
                                    ?>
                                </a>
                            </h6>
                        </div>
                    </div>
                    <?php endforeach; 
                    wp_reset_postdata(); 
                ?> 
                </div>
                <div class="col-lg-3 col-sm-6">
                    <?php
                foreach ($get_post_fashions as $post) :
                    setup_postdata($post);
            ?>
                    <div class="single-post-wrap">
                        <div class="thumb">
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url($post->ID, 'medium')); ?>" alt="<?php echo esc_attr(get_the_title($post->ID)); ?>">
                            <p class="btn-date"><i class="fa fa-clock-o"></i><?php echo get_the_date('m.d.Y', $post->ID); ?></p>
                        </div>
                        <div class="details">
                            <h6 class="title">
                                <a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php 
                                    $title = get_the_title($post->ID);
                                    echo (strlen($title) > 55) ? substr($title, 0, 55) . '...' : $title; 
                                    ?>
                                </a>
                            </h6>
                        </div>
                    </div>
                    <?php endforeach; 
                    wp_reset_postdata(); 
                ?> 
                </div>
                
                

          <!-- -----------    Trendings news-------------------  -->
                <?php
                    $args_trendings_secondry_post = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 5,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'category_name'  => 'trending-news-second' 
                    );

                    $get_posts_by_seconds = get_posts($args_trendings_secondry_post);
                ?>
                
                                

                <div class="col-lg-3 col-sm-6">
                    <div class="trending-post style-box">
                        <?php  
                            if (!empty($get_posts_by_cat)) : 
                                $first_post = $get_posts_by_cat[0];
                                $categories = get_the_category($first_post->ID);
                                    
                            if (!empty($categories)) :
                                $category_name = esc_html($categories[0]->name);
                        ?>
                        <div class="section-title">
                            <h6 class="title"><?php echo $category_name; ?></h6>
                        </div>
                        <?php 
                            endif; 
                        endif;
                        ?>
                        <div class="post-slider owl-carousel">
                            <div class="item">
                               <?php
                                    foreach ($get_posts_by_seconds as $get_posts_by_second) :
                                        setup_postdata($get_posts_by_second); 
                                ?>
                                <div class="single-post-list-wrap">
                                    <div class="media">
                                        <div class="media-left">
                                            <img src="<?php echo get_the_post_thumbnail_url($get_posts_by_second->ID, 'medium'); ?>" alt="<?php echo esc_attr(get_the_title($get_posts_by_second->ID)); ?>">
                                        </div>
                                        <div class="media-body">
                                            <div class="details">
                                            <div class="post-meta-single">
                                               <p><i class="fa fa-clock-o"></i> <?php echo get_the_date('d, m, y', $get_posts_by_second->ID); ?></p>
                                            </div>
                                            <h6 class="title">
                                            <a href="<?php echo get_permalink($get_posts_by_second->ID); ?>">
                                            <?php
                                            $tendings_news_title=esc_html(get_the_title($get_posts_by_second->ID));
                                             echo (strlen($tendings_news_title)>40)?substr($tendings_news_title,0,26).'...':$tendings_news_title ?>
                                           </a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach;?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pd-top-80 pd-bottom-50" id="grid">
        <div class="container">
            <div class="row">
                <?php
                    $args_last_category= array(
                        'post_type'      => 'post',
                        'posts_per_page' =>  8,
                        'orderby'        => 'date',
                        'order'          => 'DESC',
                        'category_name'  => 'last-catagory' 
                    );

                    $get_last_category_posts_ = get_posts($args_last_category);
                    foreach ($get_last_category_posts_ as $get_last_category_post) :
                        setup_postdata($get_last_category_post);
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-post-wrap style-overlay">
                        <div class="thumb">
                            <img src="<?php echo get_the_post_thumbnail_url($get_last_category_post->ID, 'medium'); ?>" alt="<?php echo esc_attr(get_the_title($get_last_category_post->ID)); ?>">
                            <!-- <a class="tag-base tag-purple" href="#">Tech</a> -->
                        </div>
                        <div class="details">
                            <div class="post-meta-single">
                                <p><i class="fa fa-clock-o"></i>08.22.2020</p>
                            </div>
                            <h6 class="title">
                                <a href="<?php echo get_permalink($get_last_category_post->ID); ?>">
                                    <?php
                                        $get_last_category_post_title=esc_html(get_the_title($get_last_category_post->ID));
                                        echo (strlen($get_last_category_post_title)>40)?substr($get_last_category_post_title,0,26).'...':$get_last_category_post_title ;
                                    ?>
                                </a>
                            </h6>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>   
            </div>
        </div>  
    </div>

    <?php echo get_footer();



 
?>