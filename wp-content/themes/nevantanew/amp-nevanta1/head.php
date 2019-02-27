	 	<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script><script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
	<?php 
		global $wp_query;
		if(is_home() || is_front_page()){ 
			$fonturl = "wp-content/themes/nevantanew";
		}
		elseif(is_singular('blog') || is_author() || is_tag())
		{
			$fonturl = "../../wp-content/themes/nevantanew";	
		}		
		else{
			$fonturl = "../wp-content/themes/nevantanew";			
		}
		//echo $fonturl;
	?>
	<style amp-custom>
	/**font start*/	
	@font-face {
	font-family: 'Avenir-Heavy';
	src: url('<?php echo $fonturl; ?>/fonts/Avenir-Heavy/Avenir-Heavy.otf') format('opentype'), url('<?php echo $fonturl; ?>/fonts/Avenir-Heavy/Avenir-Heavy.woff') format('woff'), url('<?php echo $fonturl; ?>/fonts/Avenir-Heavy/Avenir-Heavy.woff2') format('woff') format('svg');
	font-weight: normal;
	font-style: normal;
	}
	
	
	@font-face {
	font-family: 'Avenir-Roman';
	src: url('<?php echo $fonturl; ?>/fonts/Avenir-Roman/Avenir-Roman.eot?#iefix') format('embedded-opentype'), url('<?php echo $fonturl; ?>/fonts/Avenir-Roman/Avenir-Roman.otf') format('opentype'), url('<?php echo $fonturl; ?>/fonts/Avenir-Roman/Avenir-Roman.woff') format('woff'), url('<?php echo $fonturl; ?>/fonts/Avenir-Roman/Avenir-Roman.ttf') format('truetype'), url('<?php echo $fonturl; ?>/fonts/Avenir-Roman/Avenir-Roman.svg#Avenir-Roman') format('svg');
	font-weight: normal;
	font-style: normal;
	}
	
	@font-face {
	font-family: 'AvenirLTStd-Black';
	src: url('<?php echo $fonturl; ?>/fonts/AvenirLTStd-Black/AvenirLTStd-Black.eot?#iefix') format('embedded-opentype'), url('<?php echo $fonturl; ?>/fonts/AvenirLTStd-Black/AvenirLTStd-Black.otf') format('opentype'), url('<?php echo $fonturl; ?>/fonts/AvenirLTStd-Black/AvenirLTStd-Black.woff') format('woff'), url('<?php echo $fonturl; ?>/fonts/AvenirLTStd-Black/AvenirLTStd-Black.ttf') format('truetype'), url('<?php echo $fonturl; ?>/fonts/AvenirLTStd-Black/AvenirLTStd-Black.svg#Avenir-Roman') format('svg');
	font-weight: normal;
	font-style: normal;
	}
	
	@font-face{font-family:'Avenir medium';
	src:url('<?php echo $fonturl; ?>/fonts/Avenir-Medium/avenir-medium-webfont.woff2') format('woff2'), url('<?php echo $fonturl; ?>/fonts/Avenir-Medium/avenir-medium-webfont.woff') format('woff');font-weight:normal;font-style:normal}
	
	@font-face {
	font-family: Montserrat Regular;
	src: url('<?php echo $fonturl; ?>/fonts/Montserrat-Regular/Montserrat-Regular.eot?#iefix') format('embedded-opentype'), url('<?php echo $fonturl; ?>/fonts/Montserrat-Regular/Montserrat-Regular.otf') format('opentype'), url('Montserrat-Regular.woff') format('woff'), url('<?php echo $fonturl; ?>/fonts/Montserrat-Regular/Montserrat-Regular.ttf') format('truetype'), url('<?php echo $fonturl; ?>/fonts/Montserrat-Regular/Montserrat-Regular.svg#Montserrat-Regular') format('svg');
	font-weight: normal;
	font-style: normal
	}
	
	@font-face {
	font-family: Helvetica;
	src: url('<?php echo $fonturl; ?>/fonts/HelveticaNeue.otf') format('opentype');
	font-weight: normal;
	font-style: normal
	}
	
	@font-face {
	font-family: HelveticaNeue;
	src: url('<?php echo $fonturl; ?>/fonts/HelveticaNeue/HelveticaNeue.eot?#iefix') format('embedded-opentype'), url('<?php echo $fonturl; ?>/fonts/HelveticaNeue/HelveticaNeue.otf') format('opentype'), url('<?php echo $fonturl; ?>/fonts/HelveticaNeue/HelveticaNeue.woff') format('woff'), url('<?php echo $fonturl; ?>/fonts/HelveticaNeue/HelveticaNeue.ttf') format('truetype'), url('<?php echo $fonturl; ?>/fonts/HelveticaNeue/HelveticaNeue.svg#HelveticaNeue') format('svg');
	font-weight: normal;
	font-style: normal
	}
	
	@font-face {
	font-family: 'helveticaneuebold';
	src: url('<?php echo $fonturl; ?>/fonts/halventicaneue_bold/helveticaneue-bold-webfont.eot');
	src: url('<?php echo $fonturl; ?>/fonts/halventicaneue_bold/helveticaneue-bold-webfont.eot?#iefix') format('embedded-opentype'), url('<?php echo $fonturl; ?>/fonts/halventicaneue_bold/helveticaneue-bold-webfont.woff') format('woff'), url('<?php echo $fonturl; ?>/fonts/halventicaneue_bold/helveticaneue-bold-webfont.ttf') format('truetype'), url('<?php echo $fonturl; ?>/fonts/halventicaneue_bold/helveticaneue-bold-webfont.svg#helveticaneuebold') format('svg');
	font-weight: normal;
	font-style: normal
	}
	
	/*end font**/
	
		
/* Global Styling */
body{
	background: #000;
    font: 13px/1.4 Sans-serif;
	color:#777;	
    line-height: 22px;
	font-family: Avenir-Roman,"Open Sans", Arial, sans-serif;	
}



video::-internal-media-controls-download-button {
    display:none;
}

video::-webkit-media-controls-enclosure {
    overflow:hidden;
}

video::-webkit-media-controls-panel {
    width: calc(100% + 33px);
}

body.front-page.post-single-gallery-page.amp-mode-touch h1.amp-wp-title{text-align: center;margin:10px;font-family: Avenir-Roman;font-weight: bold;color: #fff;}
ul.single-gallery-nav-posts {margin-top: 18%;margin-left: -34px; color: #f3f3f3;width: 100%;display: inline-block;}
li.single-gallery-prev-link {list-style: none;padding-bottom: 10px;float:right;}
li.single-gallery-next-link {list-style: none;float: left;}
li.single-gallery-prev-link a {color: #f3f3f3;}
li.single-gallery-next-link a {color: #f3f3f3;}

.container {
    display: inline-block;
    clear: both;
    width: 100%;
}

.col-3{
	width: 30%;	
}
.col-50 {
    width: 45%;
}

.videolist.image-gallery.sort-destination.lightbox.popup-gallery.bordernone{
	width: 28.333333%;
}

.fashion amp-img.i-amphtml-element.i-amphtml-layout-responsive.i-amphtml-layout-size-defined.i-amphtml-layout{	
	height:150px;	
}

.rightalign.searchbox.content-cat {
    margin-top: 25%;
}

.amp-wp-content.the_content{
	color:#ffffff;
	font-family:'Avenir medium';
}

span.page-numbers.current {
    color: #ffffff;
    font-family: 'Avenir medium';    
}

.amp-carousel-slide {
    text-align: center;
}

.amp-carousel-button{
	top: 45px;	
}

.blog_slider .amp-carousel-button{
	top: 165px;	
}
.single-latest-blog-post .amp-carousel-button{
	top: 45px;	
}

body.front-page.post-single-page.amp-mode-touch .amp-carousel-button{
	top: 140px;		
}

body.front-page.post-single-page.amp-mode-mouse > main > article.amp-wp-article > .amp-wp-content.relatedpost > div.related_posts > ol.clearfix > amp-carousel > .amp-carousel-button {
		top: 140px;
}

body.front-page.blog-single-page.amp-mode-touch > main >  div.container > div.col-md-12 > div.col-md-8 > div.row > div.single-blog-post-content >div.gallery-tile-view > div.blog-slider-page > amp-carousel > .amp-carousel-button{
	top: 205px;	
}

.author-page .videosofauthor .amp-carousel-button{top: 100px;}
.author-page .moredesinerprofile .amp-carousel-button{top: 138px;}

.blog-slider-page.tagpage .amp-carousel-button{top: 50%;}

amp-sidebar#sidebar { background-color: black;}

.frontpage-video-img .video-play-icon, .pink .video-play-icon-small {
    position: absolute;
    top: 60%;
    left: 55%;
    background: url(wp-content/themes/nevantanew/img/newbigplay.png) no-repeat;
    width: 60px;
    height: 60px;
    margin: -50px 0 0 -50px;
    background-size: 100%;
	z-index:100;
}
a {
	color: #312C7E;
	text-decoration: none
}
.clearfix, .cb{
    clear: both
}

.single-blog-post-content .single-blog-post-desc figure {
    margin: 0 auto;
    text-align: center;
    max-width: 100%;
    margin-bottom: 20px;
}
.single-blog-post-desc figure img {
    max-width: 100%;
    height: auto;
}


/*search page css start*/
.site-main.search-page {
    padding-top: 25%;
}
.tag-title {
    color: #939393;
    font-size: 18px;
    border-bottom: 1px solid #2b2b2b;
    margin-bottom: 10px;
	clear: both;
    padding-bottom: 5px;
}
#people_search .search-people-tab {
    padding-top: 10px;
    padding-bottom: 10px;
    text-align: center;
}
.search-people-tab:nth-child(2n+1), .search-video-tab:nth-child(2n+1) {
    clear: left;
}
.designerlist{
	min-height: 150px;  
    float: left;
    padding-right: 2.5%;
    padding-left: 2.5%;	
}
#video_search .search-video-tab {
    padding-top: 10px;
    padding-bottom: 10px;
}
.designerby{
	padding-top:7px;
}
div#responsive-menu-search-box {
    padding: 6px 5%;
}

.responsive-menu-search-box {
    background: #000;
    border: 2px solid #000;
    color: #fff;
	width: 100%;   
    border-radius: 2px;
    height: 50px;
    -webkit-appearance: none;
	padding-left: 13.8%;
}
#responsiveSearch .btn.btn-default {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    border: medium none;
    position: absolute;
    top: 78px;
}



/*search page css end*/

/*tag page css start**/
.tag-header .page-title {
    float: left;
    color: #ffffff;
    font-size: 15px;
}
.tag-name {
    background-color: #232323;
    border-radius: 2px;
    color: #d8d8d8;
    float: left;
    font-size: 13px;
    font-weight: bold;
    margin-left: 10px;
    padding: 0px 30px;
	line-height:44px;				
}
.tags-header{
	margin-top:25%;	
}
/*tag page css end*/

/* Template Styles */
.amp-wp-content, .amp-wp-title-bar div {
	max-width: 1000px;
	margin: 0 auto;
	font-size: 15px;
	line-height: 24px;
}

/* Slide Navigation code */
.nav_container{
    padding: 18px 15px;
    background: none;
    color: #fff;
    text-align: center;
	position:absolute;
	top:20px;
	right:20px;
}
.amp-sidebar-image {
  line-height: 100px;
  vertical-align:middle;
}
.amp-close-image {
   top: 15px;
   left: 225px;
   cursor: pointer;
}

.toggle-navigationv2 ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}
.toggle-navigationv2 ul ul li a  {
    padding-left: 35px;
    background: #fff;
    display: inline-block
}
.toggle-navigationv2 ul li a{
    width: 100%;
    padding-left: 25px;
    display: inline-block;
    background: #fafafa;
    font-size: 14px;
    /*border-bottom: 1px solid #efefef;*/	
	border-top: 1px solid #2b2b2b;
    color: #fff;
    font-family: "HelveticaNeue";
    background: #000;
    line-height: 48px;   	
}
.menu-homemenu-container > ul > div div:last-child {
    background: #000;
}
.auth_name {
    color: #939393;
    font-size: 17px;
    text-align: center;
}
.close-nav{
    font-size: 12px;
    background: rgba(0, 0, 0, 0.25);
    letter-spacing: 1px;
    display: inline-block;
    padding: 10px;
    border-radius: 100px;
    line-height: 8px;
    margin: 14px;
    left: 191px;
    color: #fff;
}
.close-nav:hover{
    background: rgba(0, 0, 0, 0.45);
}
.toggle-navigation ul{
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: inline-block;
    width: 100%
}
.menu-all-pages-container:after{
    content: "";
    clear: both
}
.toggle-navigation ul li{
    font-size: 13px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.11);
    padding: 11px 0px;
    width: 25%;
    float: left;
    text-align: center;
    margin-top: 6px
}
.toggle-navigation ul ul{
    display: none
}
.toggle-navigation ul li a{
    color: #eee;
    padding: 15px;
}
.toggle-navigation{
    display: none;
    background: #444;
}
.toggle-text{
    color: #fff;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 3px;
    display: inherit;
    text-align: center;
}
.toggle-text:before{
    content: "...";
    font-size: 32px;
    position: ;
    font-family: georgia;
    line-height: 0px;
    margin-left: 0px;
    letter-spacing: 1px;
    top: -3px;
    position: relative;
    padding-right: 10px;
}
.nav_container:hover + .toggle-navigation,
.toggle-navigation:hover,
.toggle-navigation:active,
.toggle-navigation:focus{
    display: inline-block;
    width: 100%;
}


/* Pagination */
.amp-wp-content.pagination-holder {
    background: none;
    padding: 0;
    box-shadow: none;
    height: auto;
    min-height: auto;
}
#pagination{
    width: 100%;
    margin-top: 15px;
}
#pagination .next{
    float: right;
    margin-bottom: 10px;
}
#pagination .prev{
    float: left
}
#pagination .next a, #pagination .prev a{
    margin-bottom: 12px;
    background: #fefefe;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0 2px 3px rgba(0,0,0,.05);
    -webkit-box-shadow: 0 2px 3px rgba(0,0,0,.05);
    box-shadow: 0 2px 3px rgba(0,0,0,.05);
    padding: 11px 15px;
    font-size: 12px;
    color: #666;
}

/* Sticky Social bar in Single */
.ampforwp-social-icons-wrapper{
    margin: 0.65em 0px 0.65em 0px;
    height: 28px;
}
.sticky_social{
    width: 100%;
    bottom: 0;
    display: block;
    left: 0;
    box-shadow: 0px 4px 7px #000;
    background: #fff;
    padding: 7px 0px 0px 0px;
    position: fixed;
    margin: 0;
    z-index: 999;
    text-align: center;
}
.whatsapp-share-icon {
    width: 50px;
    height: 20px;
    display: inline-block;
    background: #5cbe4a;
    padding: 4px 0px;
    position: relative;
    top: -4px;
}
.author-name{
	color:#d8d8d8;
	font-family:'Avenir medium';
}
/* Header */
#header{
    text-align: center;
}
#header h1{
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    line-height: 1;
    padding: 15px;
    margin: 0;
}
.amp-logo{
    margin: 15px 0px 10px 0px;
}
main  {
  /* padding: 30px 15% 10px 15%;*/
   padding: 30px 15% 10px 15%;
}
main .amp-wp-content{
    margin-bottom: 12px;
    background: #fefefe;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0 2px 3px rgba(0,0,0,.05);
    -webkit-box-shadow: 0 2px 3px rgba(0,0,0,.05);
    box-shadow: 0 2px 3px rgba(0,0,0,.05);
    padding: 15px;
	color:#777;
	background-color:#000;
	font-family:Avenir-Roman;
}
.home-post_image {
    float: right;
    margin-left: 15px;
    margin-bottom: -6px;
}
.amp-wp-title {
    margin-top: 0px;
}
h2.amp-wp-title {
    line-height: 30px;
}
h2.amp-wp-title a{
    font-weight: 300;
    color: #000;
    font-size: 20px;
}
h2.amp-wp-title , .amp-wp-post-content p{
    margin: 0 0 0 5px;
}
.amp-wp-post-content p{
    font-size: 12px;
    color: #999;
    line-height: 20px;
    margin: 3px 0 0 5px;
}

/* Footer */
#footer{
    background: #000;
    font-size: 13px;
    text-align: center;
    letter-spacing: 0.2px;
    padding: 20px 0;
}
#footer p:first-child{
    margin-bottom: 12px;
}
#footer p{
    margin: 0
}


/*content-single.php for blog detaile page start css**/
.single-blog-post-info {
    display:inline-block;
}
.blog-slider-page{
	margin:0 auto;
	width:98%;	
}
.blog-header .single-blog-post-title h1 {
    color: #fff;
    font-size: 32px;
    font-family: 'Avenir medium';
    margin-bottom: 0px;
	line-height:35px;
}
.single-blog-post-author{	
	color: #fff;
    font-size: 14px;
    line-height: 24px;
    font-family: 'Avenir medium';
}


.blog-header {
    margin: 5.7em 0px 0.6em 0px;
}
.single-blog-post-content .single-blog-post-desc p {
    padding: 10px 0;
    color: #fff;
    margin: 0;
    font-size: 18px;
    line-height: 18px;
    font-family: 'Avenir medium';
    letter-spacing: 1px;
    line-height: 33px;
}
.single-related-blog-post > h3{
	font-size: 14px;
    font-weight: bold;
    letter-spacing: 0.4px;
    margin: 15px 0 10px 0;
    color: #FFF;	
}
.single-latest-blog-post > h3{
	font-size: 14px;
    font-weight: bold;
    letter-spacing: 0.4px;
    margin: 15px 0 10px 0;
    color: #FFF;	
}
.blog-post-title-blog{
	position: absolute;
    bottom: 0;
    left: 0;
    background: #ed018c;
    padding: 10px;  
    color: #fff;
    text-align: center;
    font-size: 22px;
    font-family: 'Avenir-Roman';
    display: block;
    line-height: 30px;	
}
/*content-single.php for blog detaile page end css**/


/* Single */
.comment-button-wrapper{
    margin-bottom: 40px;
    margin-top: 25px;
    text-align:center
}
.comment-button-wrapper a{
    color: #fff;
    background: #312c7e;
    font-size: 13px;
    padding: 10px 20px 10px 20px;
    box-shadow: 0 0px 3px rgba(0,0,0,.04);
    border-radius: 80px;
}
h1.amp-wp-title {
    text-align: center;
    margin: 3.7em 0px 0.6em 0px; 
	font-family: Avenir-Roman;
	font-weight: bold;
	color: #fff;		
}
.amp-wp-content.post-title-meta,
.amp-wp-content.post-pagination-meta {
    background: none;
    padding:  0;
    box-shadow:none
}
.post-pagination-meta{
    min-height:75px
}
.single-post .post-pagination-meta{
    min-height:auto
}
.single-post .ampforwp-social-icons{
    display:inline-block
}
.post-pagination-meta .amp-wp-tax-category,
.post-title-meta .amp-wp-tax-tag {
    display : none;
}
.amp-meta-wrapper{
	border-bottom: 1px solid #DADADA;
    padding-bottom:10px;
    display:inline-block;
    width:100%;
    margin-bottom:0
}
.amp-wp-meta  {
    padding-left: 0;
}
.amp-wp-tax-category {
    float:right
}
.amp-wp-tax-tag,
.amp-wp-meta li {
    list-style: none;
    display: inline-block;
}
li.amp-wp-tax-category {
    float: right
}
.amp-wp-byline, .amp-wp-posted-on {
    float: left
}

.amp-wp-content amp-img {
    max-width: 100%;
}
figure{
    margin: 0;
}
figcaption{
    /*font-size: 11px;
    margin-bottom: 11px;
    background: #eee;
    padding: 6px 8px;*/
	text-align: left;
    padding-top: 10px;	
    font-size: 13px;
	color: #777;
	line-height: 22px;	
    margin-bottom: 11px;  
}

.amp-wp-byline amp-img {
    display: none;
}
.amp-wp-author:before {
    content: "By ";
    color: #555;
}
.amp-wp-author{
    margin-right: 1px;
}
.amp-wp-meta {
    font-size: 12px;
    color: #555;
}
.amp-ad-wrapper {
    text-align: center
}
.single-post main{
    padding:12px 15% 10px 15%
}
.the_content p{
    margin-top: 5px;
    color: #333;
    font-size: 15px;
    line-height: 26px;
    margin-bottom: 15px;
}
.amp-wp-tax-tag{
    font-size: 13px;
    border: 0;
    display: inline-block;
    margin: 0.5em 0px 0.7em 0px;
    width: 100%;
}
main .amp-wp-content.featured-image-content {
	padding: 0px;
	border: 0;
	margin-bottom: 0;
	box-shadow: none
}
.amp-wp-content.post-pagination-meta{
    max-width: 1030px;    
}
.single-post .ampforwp-social-icons.ampforwp-social-icons-wrapper {
    display: block;
    margin: 2em auto 0.9em auto ;
    max-width: 1030px;
}
.amp-wp-article-header.amp-wp-article-category.ampforwp-meta-taxonomy {
    margin: 10px auto;
    max-width: 1030px;
}

/* Related Posts */
main .amp-wp-content.relatedpost {
	background: none;
	box-shadow: none;
	max-width: 1030px;
    padding:0px 0 0 0;  
}
.amp-carousel-slide > span.author-name{color:#d8d8d8;font-family:'Avenir medium'; }

.amp-carousel-slide > a > p { margin-top: 0px;}
.amp-carousel-button.amp-carousel-button-prev {left: 0px;}
.amp-carousel-button.amp-carousel-button-next {right: 0px;}

.related_posts h3, .comments_list h3{
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 0.4px;
    margin: 15px 0 10px 0;    
	color: #FFF;	
}
.related_posts ol{
    list-style-type:none;
    margin:0;
    padding:0
}
.related_posts ol li{
    display:inline-block;
    width:100%;
    margin-bottom: 12px;
    background: #fefefe;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0 2px 3px rgba(0,0,0,.05);
    -webkit-box-shadow: 0 2px 3px rgba(0,0,0,.05);
    box-shadow: 0 2px 3px rgba(0,0,0,.05);
    padding: 0px;
}
.related_posts .related_link{
    margin-top:18px;
    margin-bottom:10px;
    margin-right:10px
}
.related_posts .related_link a{
    font-weight: 300;
    color: #000;
    font-size: 18px;
}
.related_posts ol li amp-img{
    width:100px;
    float:left;
    margin-right:15px
}
.related_posts ol li p{
    font-size: 12px;
    color: #999;
    line-height: 1.2;
    margin: 12px 0 0 0;
}
.no_related_thumbnail{
    padding: 15px 18px;
}
.no_related_thumbnail .related_link{
    margin: 16px 18px 20px 19px;
}

/* Comments */
.ampforwp-comment-wrapper{
    margin:1.8em 0px 1.5em 0px
}
main .amp-wp-content.comments_list {
	background: none;
	box-shadow: none;
	max-width: 1030px;
	padding:0
}
.comments_list div{
    display:inline-block;
}
.comments_list ul{
    margin:0;
    padding:0
}
.comments_list ul.children{
    padding-bottom:10px;
}
.comments_list ul li p{
    margin:0;
    font-size:15px;
    clear:both;
    padding-top:16px;
}
.comments_list ul li{
    font-size:13px;
    list-style-type:none;
    margin-bottom: 12px;
    background: #fefefe;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0 2px 3px rgba(0,0,0,.05);
    -webkit-box-shadow: 0 2px 3px rgba(0,0,0,.05);
    box-shadow: 0 2px 3px rgba(0,0,0,.05);
    padding: 0px;
    max-width: 1000px;
}
.comments_list ul li .comment-body{
    padding: 25px;
    width: 91%;
}
.comments_list ul li .comment-body .comment-author{
    margin-right:5px
}
.comment-author{ float:left }
.single-post footer.comment-meta{
    /* float:right */
	padding-bottom: 0;
}
.comments_list li li{
    margin: 20px 20px 10px 20px;
    background: #f7f7f7;
    box-shadow: none;
    border: 1px solid #eee;
}
.comments_list li li li{
    margin:20px 20px 10px 20px
}

/* ADS */
.amp_home_body .amp_ad_1{
    margin-top: 10px;
    margin-bottom: -20px;
}
.single-post .amp_ad_1{
    margin-top: 10px;
    margin-bottom: -20px;
}
html .single-post .ampforwp-incontent-ad-1 {
    margin-bottom: 10px;
}
.amp-ad-4{
    margin-top:10px;
}

/* Notifications */
#amp-user-notification1 p {
    display: inline-block;
}
amp-user-notification {
    padding: 5px;
    text-align: center;
    background: #fff;
    border-top: 1px solid;
}
amp-user-notification button {
    padding: 8px 10px;
    background: #000;
    color: #fff;
    margin-left: 5px;
		border: 0;
}
amp-user-notification button:hover {
	cursor: pointer
}
.amp-wp-content blockquote {
    background-color: #fff;
    border-left: 3px solid;
    margin: 0;
    padding: 15px 20px 8px 24px;
    background: #f3f3f3;
}

pre {
	    white-space: pre-wrap;
}
/* Responsive */
@media screen and (max-width: 800px) {
	.single-post main{
		padding: 12px 10px 10px 10px
	}
}

@media screen and (max-width: 630px) {
	.related_posts ol li p{
		display:none
	}
    .related_link {
        margin: 16px 18px 20px 19px;
    }
}
@media screen and (max-width: 510px) {
	.ampforwp-tax-category span{
		display:none
	}
	.related_posts ol li p{
		line-height: 1.6;
		margin: 7px 0 0 0;
	}
    .related_posts .related_link {
        margin: 17px 18px 17px 19px;
    }
    .comments_list ul li .comment-body{
        width:auto
    }
}
@media screen and (max-width: 425px) {
    .related_posts .related_link p{
        display:none
    }
    .related_posts .related_link {
        margin: 13px 18px 14px 19px;
    }
    .related_posts .related_link a{
		font-size: 18px;
		line-height: 1.7;
    }
	.amp-meta-wrapper{
		display: inline-block;
		margin-bottom: 0px;
		margin-top: 8px;
		width:100%
	}
	.ampforwp-tax-category{
		padding-bottom:0
	}		
	.amp-wp-byline{
		padding:0
	}
	.amp-meta-wrapper .amp-wp-meta-date{
		display:none
	}
	.related_posts .related_link a {
		font-size: 17px;
		line-height: 1.5;
	}
}
@media screen and (max-width: 375px) {
	#pagination .next a, #pagination .prev a{
		padding: 10px 6px;
		font-size: 11px;
		color: #666;
	}
	.related_posts h3, .comments_list h3{
		margin-top:15px;
	}
	#pagination .next{
		margin-bottom:15px;
	}
	.related_posts .related_link a {
		font-size: 15px;
    	line-height: 1.6;
	}
}
@media screen and (max-width: 340px) {
	.related_posts .related_link a {
		font-size: 15px;
	}
	.single-post main{
		padding: 10px 5px 10px 5px
	}
	.the_content .amp-ad-wrapper{
		text-align: center;
		margin-left: -13px;
	}
}
@media screen and (max-width: 320px) {
	.related_posts .related_link a {
		font-size: 13px;
	}
	h1.amp-wp-title{
		font-size:17px;
		padding:0px 4px
		font-family: Avenir-Roman;
		font-weight: bold;
		color: #fff;
	}
}

@media screen and (max-width: 767px) {
	.amp-wp-post-content p{
		 display: block
	}
	.amp-wp-post-content p{
	   display: none
	}
	
	main{
		/*padding: 25px 18px 40px 18px;*/
		padding: 25px 18px 0px 18px;
		margin-bottom: 4%;
	}
	.toggle-navigation ul li{ width: 50%;}
}

@media screen and (min-width: 500px) {
	.fashion amp-img.i-amphtml-element.i-amphtml-layout-responsive.i-amphtml-layout-size-defined.i-amphtml-layout{ height:200px;}		
}

@media screen and (max-width: 495px) {
	h2.amp-wp-title a{
		font-size: 17px;
		line-height: 26px;
	}
}

/* Style Modifer */
.author-name-profile { text-align: left;}
.amp-wp-tax-tag a, a, .amp-wp-author {color: #ffffff;font-family: 'Avenir medium'; text-align:left;}
.amp-wp-content blockquote{ border-color:#0a89c0;}
.nav_container, .comment-button-wrapper a { background:  none;}
.nav_container a{ color:#fff}
amp-user-notification  {border-color:  #0a89c0;}
amp-user-notification button {background-color:  #0a89c0;}
footer {padding-bottom: 60px;background-color:#fff;}
.amp-ad-2{ margin-bottom: 50px; }
/**/
.alignleft{
	margin-right: 12px;
	margin-bottom:5px;
	float: left;
}


/*read more and read less css start*/
.read-more-trigger {
  cursor: pointer;
  display:block;
  padding: 0 .5em; 
  font-size: .9em;
  line-height: 2;  
  text-align: center;
  max-height: 120px;
  position: relative;
  color: #ffffff;
  font-family: 'Avenir medium';
}
.read-more-state {
  display: none;
}
.read-more-target {
  opacity: 0;
  max-height: 0;
  font-size: 0;
  transition: .25s ease;
}
.read-more-state:checked ~ .read-more-wrap .read-more-target {
  opacity: 1;
  font-size: inherit;
  max-height: 999em;
}
.read-more-state ~ .read-more-trigger:before {
  content: 'read more...';
}
.read-more-state:checked ~ .read-more-trigger:before {
  content: 'read less';
}

/*for menu**/
.sub-menu >  div > li > a > .responsive-menu-subarrow{display:none;}
.sub-menu >  div > li > a{border-top:none;}

.read-more-trigger-menu {    
	cursor: pointer;
    display: inline-block;
    font-size: .9em;
    text-align: center;
    width: 66px;
    right: 0%;
    position: absolute;
    color: #fff;
   /* border-left: 1px solid #2b2b2b;*/
    background-color: #000;
}
.toggle-navigationv2 > div.menu-homemenu-container > ul > div.menu-amp:last-child {
    border-bottom: 1px solid #2b2b2b;
}
.read-more-state-menu {
  display: none;
}
ul.sub-menu {
  opacity: 0;
  max-height: 0;
  font-size: 0;
  transition: .25s ease;
  display:none;
}

.read-more-state-menu:checked ~ .read-more-wrap-menu ul.sub-menu {
  opacity: 1;
  font-size: inherit;
  max-height: 999em;
  display:block;
}

.read-more-state-menu ~ .read-more-wrap-menu .read-more-trigger-menu:before {
  content: '▼';   
}
.read-more-state-menu:checked ~ .read-more-wrap-menu .read-more-trigger-menu:before {
    content: '▲';
    background-color: #3f3f3f;
    padding-left: 26px;
    padding-right: 28px;
    padding-bottom: 17px;
    padding-top: 17px;
}

/*read more and read less css end*/

.alignright{
	float:right;
	margin-left: 12px;
	margin-bottom:5px;
}
.aligncenter{
	text-align:center;
	margin: 0 auto
}

.amp-wp-author:before{
	content: " By  ";
}

.ampforwp-tax-category span:first-child:after {
    content: ' ';
}

.ampforwp-tax-category span:after,
.ampforwp-tax-tag span:after {
	content: ', ';
}
.ampforwp-tax-category span:last-child:after,
.ampforwp-tax-tag span:last-child:after  {
	content: ' ';
}

	/* New V0.8.7(drag and drop) style */
	.amp-wp-article-content img {
	    max-width: 100%;
	}
	
	/* Custom Style Code */	
/*header menu start*/

.toggle-navigationv2 ul ul li a {
    background: #000;   
}
.menu-homemenu-container {
    border-top: 1px #efefef solid;
}
.toggle-navigationv2{
	background-color:#000;	
}
.close-nav {
    background: #FFF;
    color: #000;
}
amp-sidebar {
	width: 100%;
	max-width:100%;
}
amp-sidebar div:last-child{
	background:#000;
}
/*header menu end*/

/*footer start*/
.social-icons-footer {
    padding: 2% 0px;
    display: inline-block;
}
.partfirst{
	font-size: 12px;
    padding-left: 5%;
    padding-right: 5%;	
}
.copy{
    color: #797979;
	float:left;    
}
.terms-menu{
	color:#797979;
	float:right;		
}
.terms-menu > a{
	width: 100%;
    color: #797979;	
}
ul#menu-footer{
	padding:0px;	
}

#footer{
	padding:0px 0;
	background: #000;
}
footer{
	background: #000;
    padding-bottom: 0px;
    border-top: 1px solid #d8d8d8;
}
.footer-menu ul li{
	padding:2px;
}

.footer-menu ul li:last-child::after { display: none;}
.icon-fb{
	background-position: 0px 2px;
    height: 36px;
    width: 36px;
    background-size: 100%;	
	background:url('https://www.nevanta.com/wp-content/themes/nevantanew/img/spritesheet.png') no-repeat;	
}
.social-footer{
	text-align:center;	
	display: inline-block;
    width: 100%;
}
ul.social-icons-footer > li {
    float: left;
    margin-right: 15px;
    list-style: none;
}
ul.social-icons-footer > li:last-child{
	margin-right: 0px;	
}

/*end footer*/
/*.banner-area amp-img:after {
    width: 100%;
    height: 100%;
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    pointer-events: none;
    background-color: rgba(0, 0, 0, 0.3);
}*/
.banner-area amp-img.bannerimg:after{    
    width: 100%;
    height: 100%;
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    pointer-events: none;
    background-color: rgba(0, 0, 0, 0.1);
}
/*.banner-area amp-img > img.i-amphtml-fill-content.-amp-fill-content.i-amphtml-replaced-content.-amp-replaced-content{
    width: 100%;
    height: 100%;
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    pointer-events: none;
    background-color: rgba(0, 0, 0, 0.3);
}*/

.video-container h2 {
    font-family: 'Avenir medium';
    font-size: 17px;
    font-weight: 300;
	color:#ffffff;
}
		
.pink {
    border-bottom: 5px solid #e50d91;
    position: relative;
}
.footer-menu ul{display:inline-block;float:none;}
.footer-menu ul li {
    float: left;
    margin-right: 0px;
	color:#000;
	list-style:none;
}
.footer-menu ul li:after {
    content: '|';
    padding-left: 5px;
    color: #797979;
}
.footer-menu ul li a{color:#797979;}
.view-allvideos{margin-top:10px;}
.view-allvideos a{font-size:15px; color:#ffffff;font-family: 'AvenirLTStd-Black';}
.video-container .author-name {font-size: 15px;display: block;color: #d8d8d8;font-family:'Avenir medium';}
.banner_title{color:#fff;font-size:24px;font-family: 'AvenirLTStd-Black';position: absolute;top: 4%;left: 50%;margin-left: -85px;}
.button_link{font-family: 'Avenir-Roman';position: absolute;top: 6%;left: 50%;margin-left: -78px;    font-size: 14px;
    border-radius: 0px;
    border: 1px solid #fff;
    font-weight: bold;
    padding: 8px 25px;
    float: left;}
	
.button_link > a {
    color: #fff;
}


#headerwrap{position:absolute;left:20px;top:20px; z-index:99999;}
.responsive-menu-inner, .responsive-menu-inner::before, .responsive-menu-inner::after {
    width: 27px;
    height: 2px;
    background-color: #fff;
    border-radius: 4px;
    position: absolute;
    transition-property: transform;
    transition-duration: 0.15s;
    transition-timing-function: ease;
}
.responsive-menu-box {
    width: 27px;
    height: 24px;
    display: inline-block;
    position: relative;
	z-index:99999;
}
.responsive-menu-inner::before {
    top: -11px;
}
.responsive-menu-inner::after {
    bottom: -11px;
}
.responsive-menu-inner::before, .responsive-menu-inner::after {
    content: "";
    display: block;
}
/*single page start*/
.author-tag{
	margin-top: 12px;
    border-top: 1px solid #222222;
    padding: 12px 20px;
    color: #ffffff;
    border-bottom: 1px solid #222222;			
}
.author-tag >a{
	background-color: #232323;   
    border-radius: 2px;
    color: #d8d8d8;
    font-weight: bold;
    margin-left: 5px;
    font-size: 13px;
    line-height: 53px;
    white-space: nowrap;
	padding: 2px 8px;
}
/*end single page*/

/**content.php css start*/
.con_right{
	float:right;
	clear:both;
	padding:20px 0px;
}
/**content.php css end*/


/*designer.php page start*/
.designer{
	min-height:155px;
	float:left;
	width:30%;	
	padding-left: 1.5%;
    padding-right: 1.5%;
}

.designer:nth-child(3n+1){
	clear: left;	
}
.row.designer_sec{
	display: inline-block;
    float: left;
    padding-top: 10%;	
	width:100%;
}
.search_desi{
	padding:10px;	
}
.searchuser-by-alphabet {
    text-align: center;
    overflow-x: auto;
    overflow-y: hidden;
	margin-bottom:2%;
	margin-top:25%;
}
.designer-name {
	color: #ffffff;
    font-family: 'Avenir medium';
    width: 100%;
    padding: 10px 0;
    display: block;
	text-align:center;
}
.magnific_slide{
	position: relative;	
}
/*designer.php page end*/

/*author.php start*/
.authordesign.single-author {
    margin-top: 25%;
}
.author.pro-author-name {
    text-align: center;
	color: #ffffff;
    font-family: 'Avenir medium';
    line-height: 36px;
    font-size: 26px;
}
.single-author-desc {
    width: 100%;
}
.author1 {
    font-size: 19px;
    font-weight: 400;
    line-height: 27px;
    margin: 10px 0 20px 0;
    color: white;
    border-top: 1px solid #2b2b2b;
    padding-top: 25px;
}
.authordesc {   
    font-size: 15px;
    padding-top: 10px;
    line-height: 28px;
    text-align: justify;
	color: #ffffff;
    font-family: 'Avenir medium';
}
.author-profile-pic {
    width: 100%;
    text-align: center;
}

/*author.php end*/

/*gallery.php page start*/
.gallery-feat-img {
    position: relative;	
}
ul.image-gallery {
    list-style: none;
    margin: 0;
    padding: 0;
}
.gallery-section .gallery{
	min-height: 0;
    border-bottom: none; 
	float:left;
	padding-left: 5px;
    padding-right: 5px;
    width: 29.333333%;
	padding-bottom:10px;
}
.container.gallerypage{
	padding-top: 20px;
    float: left;	
}
/*gallery.php page end*/


/**main blog page start css*/

body.front-page.mainblog-page.amp-mode-touch .blog-content .blog-title{
	font-family: 'Avenir-Heavy';
}

.blog-content .blog-title{
	font-family: 'Avenir-Roman';
	color: #e6e6e6;
	margin-bottom: 16px;
    font-size: 20px;
    line-height: 28px;	
}
.blog-content .blog-excerpt{
	font-size: 15px;
    line-height: 26px;
	font-family: 'Avenir-Roman';
	color: #fff;
	margin-bottom: 12px;
	word-wrap: break-word;	
}
.blog-content .blog-author{
	font-family: 'Avenir-Roman';
    font-size: 13px;
    line-height: 12px;
    color: #fff;
    opacity: 0.7;	
}
.blog-post-pagination {
    text-align: center;
    clear: both;
	margin-top: 5%;
}
.blog-post-pagination .blog-post-older{	
	margin: 0 auto;
    float: none;
}
.blog-post-newer > h4{
	font-size:13px;	
	border: 1px solid #acacac;
    padding: 4%;	
}
.blog-post-older >h4{
	font-size:13px;	
	border: 1px solid #acacac;
    padding: 4%;
}
.blog-post-title{
	position: absolute;
    bottom: 0;
    background: #ed018c;
	padding-bottom:15px;
	padding-top:15px;    
    width: 100%;
    color: #fff;
    text-align: center;
    font-size: 22px;
    font-family: 'Avenir-Roman';
    display: block;	
}
.blog_slider {
    margin-left: -18px;
    margin-top: -25px;
    margin-right: -18px;
}
.first-row {
    display: inline-block;
    width: 100%;
}
.single-blog-list {
    width: 50%;	
    float: left;  
	min-height: 480px;
}
.blog-image {
    padding-right: 15px;
}
.blog-content {
    padding-right: 15px;
}
/**blog page end css*/

/*single-blog.php start css*/

/*end single-blog.php css*/


/**content-page.php css start*/

.videolist.col-50:nth-child(2n+1) {
    clear:left;
}
.videolist.col-50 > div.author-name{
	color: #d8d8d8;
    font-family: 'Avenir medium';
}
.videolist{
	min-height: 260px;
    border-bottom: 1px solid #202020;
    float: left;
    padding-top: 15%;
	padding-right: 2.5%;
    padding-left: 2.5%;
}
.con_left{
	float:left;	
	clear:both;
	padding:20px 0px;
}
/*start form css*/
.search_sort_by{
	width:30%;
	float:left;
}
.search_sort_middle{
	margin:2% 0px 2% 0px;
}
.search_sort_by_order{
	width:70%;
	float:left; 		
}
.blackbox {
    /*color: #999;
    background: #000;*/
	color: #000;
    border: 1px solid #999;
    border-radius: 0px;
    padding: 5px;
	width:100%; 
}


option {
    font-weight: normal;
    display: block;
    white-space: pre;
    min-height: 1.2em;
    padding: 0px 2px 1px;
	font-size:11px;
}
.relatedpost{display:none;}
/*end form css*/
/**content page css end*/

	/******* Paste your Custom CSS in this Editor *******/	</style>
