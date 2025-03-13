<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php wp_title('|', true, 'right'); ?></title>
    
    <!-- favicon -->
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/img/favicon.png" sizes="20x20" type="image/png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/vendor.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/responsive.css">
<?php wp_head();?>
</head>
<body <?php body_class(); ?>>

    <!-- preloader area start -->
    <div class="preloader" id="preloader">
        <div class="preloader-inner">
            <div class="spinner">
                <div class="dot1"></div>
                <div class="dot2"></div>
            </div>
        </div>
    </div>

    <!-- search popup start-->
    <div class="td-search-popup" id="td-search-popup">
        <form action="index.html" class="search-form">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search.....">
            </div>
            <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
        </form>
    </div>
    <!-- search popup end-->
    <div class="body-overlay" id="body-overlay"></div>

    <!-- header start -->
    <div class="navbar-area">
        <!-- topbar end-->
        <div class="topbar-area">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-7 align-self-center">
                        <div class="topbar-menu text-md-left text-center">
                            <!-- <ul class="align-self-center">
                                <li><a href="#">Author</a></li>
                                <li><a href="#">Advertisment</a></li>
                                <li><a href="#">Member</a></li>
                                <li><a href="#">Sitemap</a></li>
                            </ul> -->
                            <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'secondary-menu',
                                    'menu_class'     => 'navbar-nav menu-open',
                                    'container'      => false,
                                ));
                            ?>
                        </div>
                    </div>
                    

                    <div class="col-lg-6 col-md-5 mt-2 mt-md-0 text-md-right text-center">
                        <div class="topbar-social">
                            <div class="topbar-date d-none d-lg-inline-block"><i class="fa fa-calendar"></i> Saturday, October 7</div>
                            <ul class="social-area social-area-2">
                                <li><a class="facebook-icon" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="twitter-icon" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="youtube-icon" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a class="instagram-icon" href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a class="google-icon" href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- topbar end-->

        <!-- adbar end-->
        <div class="adbar-area bg-black d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-5 align-self-center">
                        <div class="logo text-md-left text-center">
                            <a class="main-logo" href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="img"></a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7 text-md-right text-center">
                        <a href="#" class="adbar-right">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/add/1.png" alt="img">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- adbar end-->

        <!-- navbar start -->
        <nav class="navbar navbar-expand-lg">
            <div class="container nav-container">
                <div class="responsive-mobile-menu">
                    <div class="logo d-lg-none d-block">
                        <a class="main-logo" href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png" alt="img"></a>
                    </div>
                    <button class="menu toggle-btn d-block d-lg-none" data-target="#nextpage_main_menu" 
                    aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-left"></span>
                        <span class="icon-right"></span>
                    </button>
                </div>
                <div class="nav-right-part nav-right-part-mobile">
                    <a class="search header-search" href="#"><i class="fa fa-search"></i></a>
                </div>
                 <!-- <div class="collapse navbar-collapse" id="nextpage_main_menu">
                    <ul class="navbar-nav menu-open">
                        <li class="current-menu-item">
                            <a href="#banner">Home</a>
                        </li>                        
                        <li class="current-menu-item">
                            <a href="#trending">Trending News</a>
                        </li>                        
                        <li class="current-menu-item">
                            <a href="#latest">Latest News</a>
                        </li>                        
                        <li class="current-menu-item">
                            <a href="#grid">News Grid</a>
                        </li>                        
                         <li class="current-menu-item">
                            <a target="_blank" href="https://1.envato.market/5OQX2">Pro Version</a>
                        </li> 
                    </ul>
                </div>  -->
                <!-- Primary Menu -->
                 <div class="collapse navbar-collapse" id="nextpage_main_menu">
                    <?php
                        wp_nav_menu(array(
                            'theme_location' => 'primary-menu',
                            'menu_class'     => 'navbar-nav menu-open',
                            'container'      => false,
                        ));
                    ?>
                </div> 




                <div class="nav-right-part nav-right-part-desktop">
                    <!-- <div class="menu-search-inner">
                        <input type="text" placeholder="Search For">
                        <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
                    </div> -->
                    <?php echo do_shortcode('[wpdreams_ajaxsearchlite]');?>
                </div>
            </div>
        </nav>
    </div>
    <!-- navbar end -->