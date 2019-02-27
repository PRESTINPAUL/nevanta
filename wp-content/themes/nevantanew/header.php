<!DOCTYPE html>
<html class="inner-html">
    <head>

        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">	
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.png" type="image/x-icon" />
        <link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/img/apple-touch-icon.png">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Web Fonts  -->
        <!--link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css"-->
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/simple-line-icons/css/simple-line-icons.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/owl.carousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/owl.carousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/magnific-popup/magnific-popup.min.css">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/theme.min.css?ver=1.01">
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/theme-elements.min.css">
        <!-- <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/theme-blog.css"> -->
        <!-- <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/theme-shop.css"> -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/theme-animate.min.css">
        <!-- <link rel="stylesheet" href="<?php //bloginfo('template_directory'); ?>/css/mediaelementplayer.min.css" /> -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/selectric.css" />

        <!-- Current Page CSS -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/rs-plugin/css/settings.min.css" media="screen">
        <!-- <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/rs-plugin/css/layers.css" media="screen"> -->
        <!-- <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/rs-plugin/css/navigation.css" media="screen"> -->
        <!-- <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/vendor/circle-flip-slideshow/css/component.css" media="screen"> -->

        <!-- Skin CSS -->
        <!-- <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/skins/default.css"> -->

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/custominner.css">
		
		<!-- VIDEO PLAYER CSS -->
        <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/media-player.css">

        <!-- Head Libs -->
        
        <script src="<?php bloginfo('template_directory'); ?>/vendor/modernizr/modernizr.min.js"></script>
<?php 
global $post;
//print_r($post);
$postArr = (array) $post;
$pagename = get_the_title();
$single_video = get_cfc_meta( 'video_url' );
if($pagename == 'Careers' || $pagename == 'About Nevanta'){
?>
<meta name="robots" content="noindex">

<?php
} 
$flag = 0;
if(!empty($single_video)){
if(!empty($single_video[0])){
$flag = 1;
$description = strlen($postArr['post_content']) > 100 ? substr($postArr['post_content'],0,100)."..." : $postArr['post_content'];
$title = $postArr['post_title'];
$video_url = preg_replace('@http://@','https://',$single_video[0]['desktop-video']);
}
}
?> 

		<?php wp_head(); ?>
		
<?php if($flag == 1) {?>
	<meta property="fb:app_id" content="1742512762665633"/>
        <meta property="og:video:width" content="480" />
        <meta property="og:video:height" content="270" />
        <meta property="og:video" content="<?php echo $video_url;?>" />
        <meta property="og:video:secure_url" content="<?php echo $video_url;?>" />
        <meta property="og:video:type" content="video/mp4" />	

<?php } ?>
		<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-28889163-1', 'auto');
		  ga('send', 'pageview');

		</script>
<meta name="msvalidate.01" content="8770903BF8489A60B339BA34D13C863B" />
<script type="text/javascript">
    window.smartlook||(function(d) {
    var o=smartlook=function(){ o.api.push(arguments)},h=d.getElementsByTagName('head')[0];
    var c=d.createElement('script');o.api=new Array();c.async=true;c.type='text/javascript';
    c.charset='utf-8';c.src='//rec.getsmartlook.com/recorder.js';h.appendChild(c);
    })(document);
    smartlook('init', '5175bff35c3eb936f90803565599524b6474f0d6');
</script>  
 <style>
 .responsive-menu-button {
    height: 55px;
    position: fixed;
    right: 5%;
    top: -7px !important;
    width: 55px;
}
 </style>

</head>
    <?php include 'vt_resize.php';?>

    <body class="inner-body">
        <div class="body inner-body-div">
            <header id="header" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": true}'>
                <div class="header-body <?php if(is_page( 80324 ) || taxonomy_exists( 'blog_category' )){ ?>blog<?php } ?>" style="margin-bottom:0px;">
                    <div class="header-container container">
                        <div class="header-row inner-header margin-top">
                            <div class="col-md-1 nopad-left">
                                <div class="header-column">
                                    <div class="header-logo">
                                        <a href="<?php echo site_url(); ?>">                                           
											<img alt="nevanta" width="44" height="56" data-sticky-width="44" data-sticky-height="56" data-sticky-top="40" src="<?php bloginfo('template_directory'); ?>/img/Nevanta-Logo_final-01-100x128.png">
                                        </a>
                                    </div>                                    
                                </div>
                            </div>
                            <div class="col-md-11 nopad-right">
							<?php 
							$post_id = get_the_ID();
							$custom_page_title = get_cfc_field( 'page_title', 'page-title', $post_id ); 
							if($custom_page_title != ''){
							?>                               
							<?php } ?>
                            	<div class="col-md-1"></div>
								<div class="col-md-8 menu-tab">
                                    <div class="header-column">
                                        <div class="header-row">
                                            <div class="header-nav">
                                                <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse" id="bs-example-navbar-collapse-1">
                                                    <nav>
                                                        <ul class="nav navbar-nav">
                                                            <?php echo getsubmenu("Homemenu"); ?>
                                                        </ul>
                                                    </nav>  
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                                <div class="col-md-3 col-sm-6 header-search-div nopad-right">
                                    <div class="header-search">

                                        <form id="searchform" action="<?php echo get_home_url('','','https'); ?>" method="get">
                                            <div class="input-group">
                                                <input value="<?php echo stripslashes($_GET['s']); ?>" name="s" id="searchInput" type="text" class="form-control blacksearch" placeholder="Search more stories" required>

                                                <span class="">
                                                    <button class="btn btn-default" type="submit"><img src="<?php echo get_template_directory_uri(); ?>/img/search-icon.png" class="img-res"/></button>
                                                </span>
                                            </div>
                                        </form> 
                                    </div>
                                </div>                               
                            </div>
                        </div>
                        
                        <div class="col-md-12 col-sm-12 header-bot-line nopad-left-right">
                        <hr/>
                        </div>
                    </div>
                </div>

            </header>
			<div class="container-main <?php if(get_post_type() == 'blog'){ ?>blog<?php } ?>">
