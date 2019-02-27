<script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
<script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
<script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>

        <?php if(is_single() && !is_singular('blog') && !is_page('fashion') && !is_tax('blog_tag') && !(is_tax( 'blog_category', 'celebrity-style' ) || is_tax( 'blog_category', 'fashion' ) || is_tax( 'blog_category', 'beauty' ) || is_tax( 'blog_category', 'bridal' ) || is_tax( 'blog_category', 'diy' ))){?>
		<script async custom-element="amp-video" src="https://cdn.ampproject.org/v0/amp-video-0.1.js"></script> 
        <?php } ?>
	<?php 
		global $wp_query;		
		$fonturl = site_url()."/wp-content/themes/nevantanew";
	?>
<style amp-custom>
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
@font-face {
    font-family: 'Avenir medium';
    src: url('<?php echo $fonturl; ?>/fonts/Avenir-Medium/avenir-medium-webfont.woff2') format('woff2'), url('<?php echo $fonturl; ?>/fonts/Avenir-Medium/avenir-medium-webfont.woff') format('woff');
    font-weight: normal;
    font-style: normal
}
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
@font-face {
    font-family: 'AvenirLTStd-Book';
    src: url('<?php echo $fonturl; ?>/fonts/AvenirLTStd-Book/avenirltstd-book-webfont.eot');
    src: url('<?php echo $fonturl; ?>/fonts/AvenirLTStd-Book/avenirltstd-book-webfont.eot?#iefix') format('embedded-opentype'), url('<?php echo $fonturl; ?>/fonts/AvenirLTStd-Book/avenirltstd-book-webfont.woff') format('woff'), url('<?php echo $fonturl; ?>/fonts/AvenirLTStd-Book/avenirltstd-book-webfont.ttf') format('truetype'), url('<?php echo $fonturl; ?>/fonts/AvenirLTStd-Book/avenirltstd-book-webfont.svg#helveticaneuebold') format('svg');
    font-weight: normal;
    font-style: normal
}
body {
    background: #000;
    font: 13px/1.4 Sans-serif;
    color: #777;
    line-height: 22px;
    font-family: Avenir-Roman, "Open Sans", Arial, sans-serif;
}
body.front-page.post-single-gallery-page.amp-mode-touch h1.amp-wp-title {
    text-align: center;
    margin: 10px;
    font-family: Avenir-Roman;
    font-weight: bold;
    color: #fff;
}
video::-internal-media-controls-download-button {
    display: none;
}
video::-webkit-media-controls-enclosure {
    overflow: hidden;
}
video::-webkit-media-controls-panel {
    width: calc(100% + 33px);
}

ul.single-gallery-nav-posts {
    margin-top: 18%;
    margin-left: -34px;
    color: #f3f3f3;
    width: 100%;
    display: inline-block;
}
li.single-gallery-prev-link {
    list-style: none;
    padding-bottom: 10px;
    float: right;
}
li.single-gallery-next-link {
    list-style: none;
    float: left;
}
li.single-gallery-prev-link a {
    color: #f3f3f3;
}
li.single-gallery-next-link a {
    color: #f3f3f3;
}
.amp-wp-content.the_content {  	
	font-family: 'Avenir-Roman';
	font-size: 15px;
	line-height: 1.6;
	text-align: left;
	color: #ffffff;
	padding:0px;
	display:inline-block;
}
.amp-carousel-slide {
    text-align: center;
}
.amp-carousel-button {
    top: 45px;
}
.container {
    display: inline-block;
    clear: both;
    width: 100%;
}
.col-3 {
    width: 30%;
}
.col-50 {
    width: 47%;
}
.videolist.image-gallery.sort-destination.lightbox.popup-gallery.bordernone {   
    width: 45%;
    min-height: 225px;
}
div#Gallery_search div.videolist:nth-child(2n+1) {
    clear: left;
}
span.page-numbers.current {
    color: #ffffff;
    font-family: 'Avenir medium';
}

.blog_slider .amp-carousel-button {
    /*top: 165px;*/
	top:142px;
}
.single-latest-blog-post .amp-carousel-button {
    top: 45px;
}

body.front-page.post-single-page.amp-mode-touch .amp-carousel-button {
   /* top: 140px;*/
}


.amp-wp-content.relatedpost.arrowsetting-single-page .amp-carousel-button {
    top: 35%;
}


body.front-page.post-single-page.amp-mode-mouse > main > article.amp-wp-article > .amp-wp-content.relatedpost > div.related_posts > ol.clearfix > 
amp-carousel > .amp-carousel-button {
    top: 140px;
}
body.front-page.blog-single-page.amp-mode-touch > main > div.container > div.col-md-12 > div.col-md-8 > div.row > div.single-blog-post-content >div.gallery-tile-view > div.blog-slider-page > amp-carousel > .amp-carousel-button {
    top: 50%;
}

.author-page .videosofauthor .amp-carousel-button {
    top: 100px;
}
.author-page .moredesinerprofile .amp-carousel-button {
    top: 140px;
}

.auname {
    color: #fff;
    text-align: center;
    margin-top: 10px;
    margin-bottom: 10px;
}

.related-stories-images-title {
    color: #fff;
    text-align: center;
    margin-top: 10px;
    margin-bottom: 10px;
}

.latest-stories-images-title {
    color: #fff;
    text-align: center;
    margin-top: 10px;
    margin-bottom: 10px;
}

.blog-slider-page.tagpage .amp-carousel-button {
    top: 50%;
}
amp-sidebar#sidebar {
    background-color: black;
}
.front-page.fullwidth-page main .container.full-widht-content .row .col-md-12 .text-center h1 {
    color: #fff;
}
.front-page.fullwidth-page main .container.full-widht-content .row .col-md-12.content p {
    font-family: 'AvenirLTStd-Book';
    color: #fff;
    line-height: 24px;
    margin: 0 0 20px;
}
.contact-us-template h1 {
    font-family: 'AvenirLTStd-Black';
    font-size: 42px;
    color: #e50d91;
    margin-bottom: 5px;
    text-align: center;
    line-height: 44px;
}

.contact-us-template p {
    font-size: 18px;
    color: #fff;
    font-family: 'AvenirLTStd-Black';
    text-align: center;
}
.contact-us-template .wpcf7-form {
    padding-top: 18px;
}
.container.full-widht-content.contact-us-template input,
.container.full-widht-content.contact-us-template textarea {
    width: 100%;
    color: #9092a0;
    font-size: 18px;
    padding: 0px 2px;
    background: #e0e1e6;
    border: none;
    border-radius: 3px;
    font-family: 'AvenirLTStd-Book';
}
.front-page.fullwidth-page main .container.full-widht-content {
    padding: 43px 18px 0px 5px;
    margin-bottom: 4%;
}
.front-page.full-widht-content.contact-us-template main .container.full-widht-content {
    padding: 43px 18px 0px 5px;
    margin-bottom: 4%;
}
.frontpage-video-img .video-play-icon,
.pink .video-play-icon-small {
    position: absolute;
    top: 33%;
    left: 41%;
    background: url(wp-content/themes/nevantanew/img/play.svg) no-repeat;
    width: 167px;
    height: 167px;
    margin: -50px 0 0 -50px;
    background-size: 100%;
    z-index: 100;
}
a {
    color: #312C7E;
    text-decoration: none
}
.clearfix,.cb {
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
.search-people-tab:nth-child(2n+1),
.search-video-tab:nth-child(2n+1) {
    clear: left;
}
.designerlist {
    min-height: 150px;
    float: left;
    padding-right: 2.5%;
    padding-left: 2.5%;
}
#video_search .search-video-tab {
    padding-top: 10px;
    padding-bottom: 10px;
}
.designerby {
    padding-top: 7px;
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
	width:30px;
}
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
    line-height: 44px;
}
.tags-header {
    margin-top: 25%;
}
.amp-wp-content,
.amp-wp-title-bar div {
    max-width: 1000px;
    margin: 0 auto;
    font-size: 15px;
    line-height: 24px;
}

.nav_container {   
	padding: 0px;
	top:24px;
    color: #fff;
    text-align: center;
    position: absolute;
    right: 10px;
    width: 50px;
    height: 50px;
    z-index: 9999;
}
.amp-sidebar-image {
    line-height: 100px;
    vertical-align: middle;
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
.toggle-navigationv2 ul ul li a {
    padding-left: 35px;
    background: #fff;
    display: inline-block
}

.toggle-navigationv2 ul li a {
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
    color: #ffffff;
    font-size: 17px;
    text-align: center;
}

.latest-stories-imgs-single-blog {
    color: #ffffff;
    font-size: 17px;
    text-align: center;
}

.related-stories-imgs-single-blog {
    color: #ffffff;
    font-size: 17px;
    text-align: center;
}


.close-nav {
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
.close-nav:hover {
    background: rgba(0, 0, 0, 0.45);
}
.toggle-navigation ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: inline-block;
    width: 100%
}
.menu-all-pages-container:after {
    content: "";
    clear: both
}
.toggle-navigation ul li {
    font-size: 13px;
    border-bottom: 1px solid rgba(0, 0, 0, 0.11);
    padding: 11px 0px;
    width: 25%;
    float: left;
    text-align: center;
    margin-top: 6px
}
.toggle-navigation ul ul {
    display: none
}
.toggle-navigation ul li a {
    color: #eee;
    padding: 15px;
}
.toggle-navigation {
    display: none;
    background: #444;
}
.toggle-text {
    color: #fff;
    font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 3px;
    display: inherit;
    text-align: center;
}
.toggle-text:before {
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
.toggle-navigation:focus {
    display: inline-block;
    width: 100%;
}


.amp-wp-content.pagination-holder {
    background: none;
    padding: 0;
    box-shadow: none;
    height: auto;
    min-height: auto;
}
#pagination {
    width: 100%;
    margin-top: 15px;
}
#pagination .next {
    float: right;
    margin-bottom: 10px;
}
#pagination .prev {
    float: left
}
#pagination .next a,
#pagination .prev a {
    margin-bottom: 12px;
    background: #fefefe;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0 2px 3px rgba(0, 0, 0, .05);
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, .05);
    box-shadow: 0 2px 3px rgba(0, 0, 0, .05);
    padding: 11px 15px;
    font-size: 12px;
    color: #666;
}

.ampforwp-social-icons-wrapper {
    margin: 0.65em 0px 0.65em 0px;
    height: 28px;
}
.sticky_social {
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
.author-name {
    color: #d8d8d8;
    font-family: 'Avenir medium';
}

#header {
    text-align: center;
}
#header h1 {
    text-align: center;
    font-size: 20px;
    font-weight: bold;
    line-height: 1;
    padding: 15px;
    margin: 0;
}
.amp-logo {
    margin: 15px 0px 10px 0px;
}
main {        
    padding: 30px 15% 10px 15%;
}

main .amp-wp-content {
    margin-bottom: 12px;
    background: #fefefe;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0 2px 3px rgba(0, 0, 0, .05);
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, .05);
    box-shadow: 0 2px 3px rgba(0, 0, 0, .05);
    padding: 15px;
    color: #777;
    background-color: #000;
    font-family: Avenir-Roman;
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
h2.amp-wp-title a {
    font-weight: 300;
    color: #000;
    font-size: 20px;
}
h2.amp-wp-title,
.amp-wp-post-content p {
    margin: 0 0 0 5px;
}
.amp-wp-post-content p {
    font-size: 12px;
    color: #999;
    line-height: 20px;
    margin: 3px 0 0 5px;
}

#footer {
    background: #000;
    font-size: 13px;
    text-align: center;
    letter-spacing: 0.2px;
    padding: 20px 0;
}
#footer p:first-child {
    margin-bottom: 12px;
}
#footer p {
    margin: 0
}

.single-blog-post-info {
    display: inline-block;
}
.blog-slider-page {
    margin: 0 auto;
    width: 98%;
}
.blog-header .single-blog-post-title h1 {
    color: #fff;
    font-size: 32px;
    font-family: 'Avenir medium';
    margin-bottom: 0px;
    line-height: 35px;
}
.single-blog-post-author {
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
.single-related-blog-post > h3 {
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 0.4px;
    margin: 15px 0 10px 0;
    color: #FFF;
}
.single-latest-blog-post > h3 {
    font-size: 14px;
    font-weight: bold;
    letter-spacing: 0.4px;
    margin: 15px 0 10px 0;
    color: #FFF;
}
.blog-post-title-blog {
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
	display:none;
}
.comment-button-wrapper {
    margin-bottom: 40px;
    margin-top: 25px;
    text-align: center
}
.comment-button-wrapper a {
    color: #fff;
    background: #312c7e;
    font-size: 13px;
    padding: 10px 20px 10px 20px;
    box-shadow: 0 0px 3px rgba(0, 0, 0, .04);
    border-radius: 80px;
}

.top-margin{
	margin: 3.7em 0px 0.6em 0px;
}

h1.amp-wp-title {
    text-align: left; 
    font-family: Avenir-Roman;
	font-size: 20px;
	font-weight: 900;
	line-height: 1.5;
	text-align: left;
	color: #ffffff;
	margin-top: 10px;
    margin-bottom: 10px;
}
.amp-wp-content.post-title-meta,
.amp-wp-content.post-pagination-meta {
    background: none;
    padding: 0;
    box-shadow: none
}
.post-pagination-meta {
    min-height: 75px
}
.single-post .post-pagination-meta {
    min-height: auto
}
.single-post .ampforwp-social-icons {
    display: inline-block
}
.post-pagination-meta .amp-wp-tax-category,
.post-title-meta .amp-wp-tax-tag {
    display: none;
}
.amp-meta-wrapper {
    border-bottom: 1px solid #DADADA;
    padding-bottom: 10px;
    display: inline-block;
    width: 100%;
    margin-bottom: 0
}
.amp-wp-meta {
    padding-left: 0;
}
.amp-wp-tax-category {
    float: right
}
.amp-wp-tax-tag,
.amp-wp-meta li {
    list-style: none;
    display: inline-block;
}
li.amp-wp-tax-category {
    float: right
}
.amp-wp-byline,
.amp-wp-posted-on {
    float: left
}
.amp-wp-content amp-img {
    max-width: 100%;
}
figure {
    margin: 0;
}
figcaption {    
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
.amp-wp-author {
    margin-right: 1px;
}
.amp-wp-meta {
    font-size: 12px;
    color: #555;
}

.single-post main {
    padding: 12px 15% 10px 15%
}


.the_content p {
    margin-top: 5px;
    color: #333;
    font-size: 15px;
    line-height: 26px;
    margin-bottom: 15px;
}
.amp-wp-tax-tag {
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
.amp-wp-content.post-pagination-meta {
    max-width: 1030px;
}
.single-post .ampforwp-social-icons.ampforwp-social-icons-wrapper {
    display: block;

    margin: 2em auto 0.9em auto;
    max-width: 1030px;
}
.amp-wp-article-header.amp-wp-article-category.ampforwp-meta-taxonomy {
    margin: 10px auto;
    max-width: 1030px;
}
main .amp-wp-content.relatedpost {
    background: none;
    box-shadow: none;
    max-width: 1030px;
    padding: 0px 0 0 0;
}
.amp-carousel-slide > span.author-name {
    color: #d8d8d8;
    font-family: 'Avenir medium';
}
.amp-carousel-slide > a > p {
	text-align:center;
}
.amp-carousel-button.amp-carousel-button-prev {
    left: 0px;
}
.amp-carousel-button.amp-carousel-button-next {
    right: 0px;
}
.related_posts h3,
.comments_list h3 {    	
	font-family: 'Avenir-Roman';
	font-size: 18px;
	font-weight: 900;
	line-height: 1.67;
	text-align: left;
	color: #fefefe;
}
.related_posts ol {
    list-style-type: none;
    margin: 0;
    padding: 0
}


.related_posts ol li {
    display: inline-block;
    width: 100%;
    margin-bottom: 12px;
    background: #fefefe;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0 2px 3px rgba(0, 0, 0, .05);
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, .05);
    box-shadow: 0 2px 3px rgba(0, 0, 0, .05);
    padding: 0px;
}
.related_posts .related_link {
    margin-top: 18px;
    margin-bottom: 10px;
    margin-right: 10px
}

.related_posts .related_link a {
    font-weight: 300;
    color: #000;
    font-size: 18px;
}
.related_posts ol li amp-img {
    width: 100px;
    float: left;
    margin-right: 15px
}
.related_posts ol li p {
    font-size: 12px;
    color: #999;
    line-height: 1.2;
    margin: 12px 0 0 0;
}
.no_related_thumbnail {
    padding: 15px 18px;
}
.no_related_thumbnail .related_link {
    margin: 16px 18px 20px 19px;
}

.ampforwp-comment-wrapper {
    margin: 1.8em 0px 1.5em 0px
}
main .amp-wp-content.comments_list {
    background: none;
    box-shadow: none;
    max-width: 1030px;
    padding: 0
}
.comments_list div {
    display: inline-block;
}
.comments_list ul {
    margin: 0;
    padding: 0
}
.comments_list ul.children {
    padding-bottom: 10px;
}
.comments_list ul li p {
    margin: 0;
    font-size: 15px;
    clear: both;
    padding-top: 16px;
}
.comments_list ul li {
    font-size: 13px;
    list-style-type: none;
    margin-bottom: 12px;
    background: #fefefe;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0 2px 3px rgba(0, 0, 0, .05);
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, .05);
    box-shadow: 0 2px 3px rgba(0, 0, 0, .05);
    padding: 0px;
    max-width: 1000px;
}
.comments_list ul li .comment-body {
    padding: 25px;
    width: 91%;
}
.comments_list ul li .comment-body .comment-author {
    margin-right: 5px
}
.comment-author {
    float: left
}

.single-post footer.comment-meta {    
    padding-bottom: 0;
}
.comments_list li li {
    margin: 20px 20px 10px 20px;
    background: #f7f7f7;
    box-shadow: none;
    border: 1px solid #eee;
}
.comments_list li li li {
    margin: 20px 20px 10px 20px
}

.amp_home_body .amp_ad_1 {
    margin-top: 10px;
    margin-bottom: -20px;
}
.single-post .amp_ad_1 {
    margin-top: 10px;
    margin-bottom: -20px;
}
html .single-post .ampforwp-incontent-ad-1 {
    margin-bottom: 10px;
}

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

@media screen and (max-width: 800px) {
    .single-post main {
        padding: 12px 10px 10px 10px
    }
}
@media screen and (max-width: 630px) {
    .related_posts ol li p {
        display: none
    }
    .related_link {
        margin: 16px 18px 20px 19px;
    }
}

@media screen and (max-width: 510px) {
    .ampforwp-tax-category span {
        display: none
    }
    .related_posts ol li p {
        line-height: 1.6;
        margin: 7px 0 0 0;
    }
    .related_posts .related_link {
        margin: 17px 18px 17px 19px;
    }
    .comments_list ul li .comment-body {
        width: auto
    }
}
@media screen and (max-width: 425px) {
    .related_posts .related_link p {
        display: none
    }
    .related_posts .related_link {
        margin: 13px 18px 14px 19px;
    }
    .related_posts .related_link a {
        font-size: 18px;
        line-height: 1.7;
    }
    .amp-meta-wrapper {
        display: inline-block;
        margin-bottom: 0px;
        margin-top: 8px;
        width: 100%
    }
    .ampforwp-tax-category {
        padding-bottom: 0
    }
    .amp-wp-byline {
        padding: 0
    }
    .amp-meta-wrapper .amp-wp-meta-date {
        display: none
    }
    .related_posts .related_link a {
        font-size: 17px;
        line-height: 1.5;
    }
}
@media screen and (max-width: 375px) {
    #pagination .next a,
    #pagination .prev a {
        padding: 10px 6px;
        font-size: 11px;
        color: #666;
    }
    .related_posts h3,
    .comments_list h3 {
        margin-top: 15px;
    }
    #pagination .next {
        margin-bottom: 15px;
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
    .single-post main {
        padding: 10px 5px 10px 5px
    }    
}
@media screen and (max-width: 320px) {
    .related_posts .related_link a {
        font-size: 13px;
    }
    h1.amp-wp-title {
        font-size: 17px;
        padding: 0px 4px font-family: Avenir-Roman;
        font-weight: bold;
        color: #fff;
    }
}

@media screen and (max-width: 767px) {
    .amp-wp-post-content p {
        display: block
    }
    .amp-wp-post-content p {
        display: none
    }
    main {
        padding: 25px 18px 2px 18px;
        margin-bottom: 4%;
    }
	
	 #main-blog-page {
        padding: 25px 0px 2px 0px;
        margin-bottom: 4%;
    }
    .toggle-navigation ul li {
        width: 50%;
    }
}
@media screen and (max-width: 495px) {
    h2.amp-wp-title a {
        font-size: 17px;
        line-height: 26px;
    }
}
.author-name-profile {
    text-align: left;
}
.amp-wp-tax-tag a,a,.amp-wp-author {
    color: #ffffff;
    font-family: 'Avenir medium';
    text-align: left;
}
.amp-wp-content blockquote {
    border-color: #0a89c0;
}
.nav_container,
.comment-button-wrapper a {
    background: none;
}
.nav_container a {
    color: #fff
}
amp-user-notification {
    border-color: #0a89c0;
}
amp-user-notification button {
    background-color: #0a89c0;
}
footer {
    padding-bottom: 60px;
    background-color: #fff;
}

.alignleft {
    margin-right: 12px;
    margin-bottom: 5px;
    float: left;
}

.read-more-trigger {
    cursor: pointer;
    display: block;
    padding: 0 .5em;
    font-size: .9em;
    line-height: 2;
    text-align: center;
    max-height: 120px;
    position: relative;
    color: #ffffff;
    font-family: 'Avenir medium';
	z-index:300;
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
	display:none;
}

label.read-more-trigger::after {
    position: absolute;
    left: 0;
    right: 0;
    content: '';
    height: 73px;
    z-index: -1;
    background: linear-gradient( to top, rgb(0, 0, 0), rgba(239, 239, 241, 0));
	/*background: -webkit-gradient(linear,left top,left bottom,color-stop(0%,rgba(249,249,249,0)),color-stop(100%,#f9f9f9));*/
    background: -webkit-linear-gradient(bottom,rgb(0, 0, 0),rgba(239, 239, 241, 0));
    background: -o-linear-gradient(bottom,rgb(0, 0, 0),rgba(239, 239, 241, 0));
    background: -ms-linear-gradient(bottom,rgb(0, 0, 0),rgba(239, 239, 241, 0));
    bottom: 0;
}

.read-more-state:checked ~ .read-more-trigger:after {
	background: none;
	height: 0px;
}

/*start read more single page*/
.read-more-trigger-single {
    cursor: pointer;
    display: block;
    padding: 0 .5em;
    font-size: .9em;
    line-height: 2;
    text-align: center;
    max-height: 120px;
    position: relative;
    color: #ffffff;
    font-family: 'Avenir medium';
}
.read-more-state-single {
    display: none;
}
.read-more-target-single {
    opacity: 0;
    max-height: 0;
    font-size: 0;
    transition: .25s ease;
}
.read-more-state-single:checked ~ .read-more-wrap-single .read-more-target-single {
    opacity: 1;
    font-size: inherit;
    max-height: 999em;
}
.read-more-state-single ~ .read-more-trigger-single:before {
    content: 'read more...';
	font-size: 20px;
    text-align: left;
    color: #939393;
	font-family: 'Avenir-Roman';
}
.read-more-state-single:checked ~ .read-more-trigger-single:before {
    content: 'read less';
	font-size: 20px;
    text-align: left;
    color: #939393;
	font-family: 'Avenir-Roman';
}
/*end read more single page*/

.sub-menu > div > li > a > .responsive-menu-subarrow {
    display: none;
}
.sub-menu > div > li > a {
    border-top: none;
}
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
    display: none;
}
.read-more-state-menu:checked ~ .read-more-wrap-menu ul.sub-menu {
    opacity: 1;
    font-size: inherit;
    max-height: 999em;
    display: block;
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

.alignright {
    float: right;
    margin-left: 12px;
    margin-bottom: 5px;
}
.aligncenter {
    text-align: center;
    margin: 0 auto
}
.amp-wp-author:before {
    content: " By  ";
}
.ampforwp-tax-category span:first-child:after {
    content: ' ';
}
.ampforwp-tax-category span:after,.ampforwp-tax-tag span:after {
    content: ', ';
}
.ampforwp-tax-category span:last-child:after,
.ampforwp-tax-tag span:last-child:after {
    content: ' ';
}
.amp-wp-article-content img {
    max-width: 100%;
}
.toggle-navigationv2 ul ul li a {
    background: #000;
}
.menu-homemenu-container {
    border-top: 1px #efefef solid;
}
.toggle-navigationv2 {
    background-color: #000;
}
.close-nav {
    background: #FFF;
    color: #000;
}
amp-sidebar {
    width: 100%;
    max-width: 100%;
}
amp-sidebar div:last-child {
    background: #000;
}
.social-icons-footer {
    padding: 2% 0px;
    display: inline-block;
}
.partfirst {
    font-size: 12px;
    padding-left: 5%;
    padding-right: 5%;
}
.copy {
    color: #797979;
    float: left;
}
.terms-menu {
    color: #797979;
    float: right;
}
.terms-menu > a {
    width: 100%;
    color: #797979;
}
ul#menu-footer {
    padding: 0px;
}
#footer {
    padding: 0px 0;
    background: #000;
}
footer {
    background: #000;
    padding-bottom: 0px;
}
.footer-menu ul li {
    padding: 2px;
}
.footer-menu ul li:last-child::after {
    display: none;
}
.icon-fb {
    background-position: 0px 2px;
    height: 36px;
    width: 36px;
    background-size: 100%;
    background: url('<?php echo site_url(); ?>/wp-content/themes/nevantanew/img/spritesheet.png') no-repeat;
}
.social-footer {
    text-align: center;
    display: inline-block;
    width: 100%;
}
ul.social-icons-footer > li {
    float: left;
    margin-right: 15px;
    list-style: none;
}
ul.social-icons-footer > li:last-child {
    margin-right: 0px;
}
.banner-area amp-img.bannerimg:after {
    width: 100%;
    height: 100%;
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    pointer-events: none;
    background-color: rgba(0, 0, 0, 0.3);
}
.video-container h2 {
	font-family: 'Avenir-Roman';
	font-size: 18px;
	line-height: 1.67;
	text-align: left;
	color: #ffffff;
	margin-bottom:49px;
}

.footer-menu ul {
    display: inline-block;
    float: none;
}
.footer-menu ul li {
    float: left;
    margin-right: 0px;
    color: #000;
    list-style: none;
}
.footer-menu ul li:after {
    content: '|';
    padding-left: 5px;
    color: #797979;
}
.footer-menu ul li a {
    color: #797979;
}
.view-allvideos {
    margin-top: 10px;
	margin-bottom:10px;
}
.view-allvideos a {
    font-size: 15px;
    color: #ffffff;
    font-family: 'AvenirLTStd-Black';
}
.video-container .author-name {
    font-size: 15px;
    display: block;
    color: #d8d8d8;
    font-family: 'Avenir-Roman';
}
.banner_title {
    position: absolute;
    top: 4%;
    left: 50%;
    margin-left: -85px;
    font-family: Avenir-Roman;
    font-size: 26px;
    font-weight: 500;
    text-align: center;
    color: #ffffff;
}
.button_link { 
    position: absolute;
    top: 5.6%;
    left: 49%;
    margin-left: -78px;   
    padding: 8px 25px;
    float: left;
    border-radius: 3.5px;
    border: solid 0.7px #d7d7d7;
}
.button_link > a {
	color: #ffffff;
	font-family: 'AvenirLTStd-Book';
	font-size: 18px;     
}
#headerwrap {
    position: absolute;
    left: 20px;
    top: 20px;
    z-index: 99999;
}
.responsive-menu-inner,
.responsive-menu-inner::before,
.responsive-menu-inner::after {
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
	display: inline-block;
    position: relative;
    z-index: 99999;
    right: 12px;
    top: 10px;
}
.responsive-menu-inner::before {
    top: -11px;
}
.responsive-menu-inner::after {
    bottom: -11px;
}
.responsive-menu-inner::before,
.responsive-menu-inner::after {
    content: "";
    display: block;
}
.author-tag {
    margin-top: 12px;
    border-top: 1px solid #2b2b2b;
    border-bottom: 1px solid #2b2b2b;
    font-size: 14px;
    font-weight: 900;
    line-height: 1.43;
    letter-spacing: 0.6px;
    text-align: left;
    color: #ffffff;
    font-family: Avenir-Roman;
	padding: 10px 0px;
}
.author-tag >a {
    border-radius: 3px;
	white-space: nowrap;
    padding: 9px 12px;
    background-color: #232323;
    font-family: 'Avenir-Roman';
    font-size: 14px;
    font-weight: 900;
    line-height: 3.43;
    letter-spacing: 0.6px;
    text-align: left;
    color: #545454;
}
.con_right {
    float: right;
    clear: both;
    padding: 20px 0px;
}
.designer {
    min-height: 155px;
    float: left;
    width: 30%;
    padding-left: 1.5%;
    padding-right: 1.5%;
}
.designer:nth-child(3n+1) {
    clear: left;
}
.row.designer_sec {
    display: inline-block;
    float: left;
    padding-top: 10%;
    width: 100%;
}
.search_desi {
    /*padding: 10px;*/
	padding:7px;
	display:inline-block;
}
.searchuser-by-alphabet {
    text-align: center;
  /*  overflow-x: auto;
    overflow-y: hidden;
    margin-bottom: 2%;*/
    margin-top: 25%;
}
.designer-name {
    color: #ffffff;
    font-family: 'Avenir medium';
    width: 100%;
    padding: 20px 0;
    display: block;
	font-size: 16px;
    text-align: center;
}
.magnific_slide {
    position: relative;
}
.authordesign.single-author {
    margin-top: 25%;
}
.author.pro-author-name {
    font-family: 'Avenir medium';
    line-height: 36px;
    font-size: 18px;
    font-weight: 500;
    text-align: left;
    color: #ffffff;
	margin: 10px 0;
}

.single-author-desc {
    width: 100%;
}

.author1 {
    line-height: 27px;
    margin: 10px 0 20px 0;
    padding-top: 25px;
    font-size: 18px;
    font-weight: 500;
    text-align: left;
    color: #ffffff;
}

.authordesc {  
    font-family: 'Avenir-Roman';
    font-size: 16px;
    line-height: 1.5;
    text-align: justify;
    color: #ffffff;
}

.authordesc-single {
	font-family: 'Avenir-Roman';
	font-size: 15px;
	line-height: 1.6;
	text-align: justify;	
    color: #ffffff;    
}

.author-profile-pic {
    width: 100%;
    text-align: center;
	background-color: #757575;
}

.author-page-banr{
	margin:0 auto;
    height: 223px;
    width: 223px;
}

.gallery-feat-img {
    position: relative;
}
ul.image-gallery {
    list-style: none;
    margin: 0;
    padding: 0;
}

.gallery-space{
    padding: 0px 8px;
}

.gallery {
    min-height: 0;
    border-bottom: none;
    float: left;
    /*padding-left: 5px;
    padding-right: 5px;*/
    width: 31.333333%;
    padding-bottom: 10px;
}

.container.gallerypage {
    padding-top: 20px;
}

body.front-page.mainblog-page.amp-mode-touch .blog-content .blog-title {
    font-family: 'Avenir-Roman';
    opacity: 0.9;
    font-size: 18px;
    font-weight: 500;
    line-height: 1.33;
    color: rgba(255, 255, 255, 0.9);
}
.blog-content .blog-title {
    font-family: 'Avenir-Roman';
    color: #e6e6e6;
    margin-bottom: 16px;
    font-size: 20px;
    line-height: 28px;
}
.blog-content .blog-excerpt {
    font-family: 'Avenir-Roman';
    margin-bottom: 12px;
    word-wrap: break-word;
	font-size: 16px;
    line-height: 1.63;
    text-align: left;
    color: #ffffff;
}
.blog-content .blog-author {
    font-family: 'Avenir-Roman';
    font-size: 14px;
    text-align: left;
    line-height: 1.57;
    color: rgba(255, 255, 255, 0.7);
    opacity: 0.7;
}
.blog-post-pagination {
    text-align: center;
    clear: both;
    margin-top: 5%;
}
.blog-post-pagination .blog-post-older {
    margin: 0 auto;
    float: none;
    text-align: center;
}
.blog-post-newer {
    text-align: center;
}
.blog-post-newer > h4 {
    font-size: 13px;
    border: 1px solid #acacac;
    padding: 4%;
}
.blog-post-older >h4 {
    font-size: 13px;
    border: 1px solid #acacac;
    padding: 4%;
}
.blog-post-title {
    position: absolute;
    bottom: 0;
    background: #ed018c;
    padding-bottom: 15px;
    padding-top: 15px;
    width: 100%;
    text-align: center;
    font-family: 'Avenir-Roman';
    display: block;
    opacity: 0.8;
    font-size: 18px;
    font-weight: 500;
    color: #ffffff;
}


.blog_slider {
    margin-left: -18px;
    margin-top: -48px;
    margin-right: -18px;
}
.first-row {
    display: inline-block;
    width: 100%;
}
.blogs-lists {
    display: inline-block;
}
.single-blog-list {
    width: 50%;
    float: left;
    min-height: 340px;
    margin: 10px 0px;
	padding-bottom:20px;
}
.single-blog-list:nth-child(2n+1) {
    clear: left;
}
.one-posts-page .single-blog-list {
    width: 100%;
}
.blog-image {
    padding-right: 15px;
}
.blog-content {
    padding-right: 15px;
}
.videolist.col-50:nth-child(2n+1) {
    clear: left;
}
.videolist.col-50 > div.author-name {
    color: #d8d8d8;
    font-family: 'Avenir medium';
}

.videolist.col-50.mobi-ply:nth-child(even) {
    padding-right: 0px;
}

.videolist.col-50.mobi-ply:nth-child(odd) {
    padding-left: 0px;
}

.videolist {
    /*min-height: 245px;*/
    /*border-bottom: 1px solid #202020;*/
    float: left;
    padding-top: 20px;
    padding-right: 2.5%;
    padding-left: 2.5%;
	padding-bottom:20px;
}
.con_left {
    float: left;
    clear: both;
    padding: 20px 0px;
}
.search_sort_by {
    width: 30%;
    float: left;
}
.search_sort_middle {
    margin: 2% 0px 2% 0px;
}
.search_sort_by_order {
    width: 70%;
    float: left;
}
.blackbox {
    color: #000;
    border: 1px solid #999;
    border-radius: 0px;
    padding: 5px;
    width: 100%;
	height:51px;
	margin-bottom: 10px;
	font-family: 'Avenir-Roman';
	font-size: 14px;
  	font-weight: 500;
}
option {
    font-weight: normal;
    display: block;
    white-space: pre;
    min-height: 1.2em;
    padding: 0px 2px 1px;
    font-size: 11px;
}
.rightalign.searchbox.content-cat {
    margin-top: 15%;
}

.recent-video-mo{
	font-family: Avenir-Roman;
	font-size: 17px;
	font-weight: 900;
	line-height: 2.35;
	text-align: left;
	color: #ffffff;
	float: left;
}

.viewall-mo{	
	text-align: right;
}

.viewall-mo > a{
	font-family: Avenir-Roman;
	font-size: 16px;
	line-height: 2.5;	
	color: #ffffff;
}

.amp-wp-content.relatedpost.arrowsetting-single-page .amp-carousel-slide {
    width: 189px;
}

.fashion-designer-single-page {
    border-top: 1px solid #2b2b2b;
    padding: 10px 0px;    
}

.designer-title-single-page {
    font-family: Avenir-Roman;
    font-size: 18px;
    font-weight: 900;
    line-height: 1.67;
    text-align: left;
    color: #ffffff;
	margin-bottom:20px;
}

span.author-title-single {    
	white-space:normal;   
	float:left;	
	font-family: Avenir-Roman;
	font-size: 14px;
	font-weight: 500;
	text-align: left;
	color: #ffffff;
}

.authr-img-single-page {
    float: left;
    margin-right: 10px;
}

.author-title-single-page > a {
    font-size: 16px;
    font-weight: 500;
    line-height: 1.06;
    text-align: left;
    color: #fefefe;
    font-family: Avenir-Roman;
}

.author-role-single-page {
    opacity: 0.75;
    font-family: Avenir-Roman;
    font-size: 14px;
    line-height: 2.35;
    text-align: left;
    color: rgba(254, 254, 254, 0.75);
}

.post-single-page-date {
    opacity: 0.75;
    font-family: Avenir-Roman;
    font-size: 12px;
    font-weight: 500;
    line-height: 1.32;
    text-align: left;
    color: rgba(255, 255, 255, 0.75);
    float: left;
	margin-top: 7px;
}

.post-single-page-social-share {
    float: right;   
}

span.single-share {
    float: left;
    font-weight: 500;
    line-height: 2.06;
    text-align: left;
    color: rgba(254, 254, 254, 0.5);
}

.post-single-page-social-share > a > img {
    margin: 0px 5px 0px 0px;
}

.inner-page-fb {
    width: 21px;
    height: 21px;
    object-fit: contain;
}

.inner-page-tw {
    width: 21px;
    height: 21px;
    object-fit: contain;
}

.inner-page-pinterest {
    width:21px;
    height: 21px;
    object-fit: contain;
}

.surf-video-txt > h2 {
    font-family: Avenir-Roman;
    font-size: 14px;
    font-weight: 900;
    text-align: center;
    color: #ffffff;
	padding: 0px 30px;
	margin-bottom:5%;
}

.title_post_mobile > a{
	font-family: Avenir-Roman;
	font-size: 16px;
	font-weight: 500;
	line-height: 1.62;
	text-align: left;
	color: #ffffff;
}

span.page-numbers.current {
    background-color: #ee2e7c;
    padding: 3px 8px;
    border-radius: 10px;
    color: #fff;
}

a.page-numbers {
    font-family: Avenir-Roman;
    font-size: 15px;
    text-align: left;
    color: #ffffff;
    margin: 0px 5px;
}

span.page-numbers.dots {
    font-family: Avenir-Roman;
    font-size: 15px;
    text-align: left;
    color: #ffffff;
}
.right {
    width: 13px;
    height: 11px;
    object-fit: contain;  
    background-color: #000;
}

a.prev.page-numbers {
    font-family: Avenir-Roman;
    font-size: 15px;
    color: #ffffff;
}

.left {
    width: 13px;
    height: 11px;
    object-fit: contain; 
    background-color: #000;
}

a.next.page-numbers {
    font-family: Avenir-Roman;
    font-size: 15px;
    color: #ffffff;
}

.mobi-ply{
	position:relative;	
}

.video-play-btn-inner-page-mobile {
    position: absolute;
    top: -5%;  
    width: 91%;
}


.author-video-excert > a > p {
    font-size: 14px;
    line-height: 1.57;
    text-align: left;
    color: #ffffff;
    font-family: 'Avenir-Roman';
    bottom: -52px;
    width: 188px;
    white-space: normal;
}

.latest-stories-images-title > a > p {
    font-size: 14px;
    line-height: 1.57;
    text-align: left;
    color: #ffffff;
    font-family: 'Avenir-Roman';
    bottom: -52px;
    width: 188px;
    white-space: normal;
}

.related-stories-images-title > a > p {
    font-size: 14px;
    line-height: 1.57;
    text-align: left;
    color: #ffffff;
    font-family: 'Avenir-Roman';
    bottom: -52px;
    width: 188px;
    white-space: normal;
}

.row.author-page-mobile-videos > amp-carousel > .amp-carousel-button{
	top:56px;	
}	

.row.author-page-mobile-profile > amp-carousel > .amp-carousel-button{
	top:70px;	
}


.single-blog-post-related-stories > amp-carousel > .amp-carousel-button{
	top:70px;	
}

.single-blog-post-latest-stories > amp-carousel > .amp-carousel-button{
	top:70px;	
}

.img-videos-author-page {
    color: #ffffff;
    font-size: 17px;
    text-align:center;
    width: 188px;
    height: 106px;
}

.latest-stories-imgs-single-blog {
    color: #ffffff;
    font-size: 17px;
    text-align:center;
    width: 188px;
    height: 106px;
}
.related-stories-imgs-single-blog {
    color: #ffffff;
    font-size: 17px;
    text-align:center;
    width: 188px;
    height: 106px;
}
.item-author-videos.amp-carousel-slide.amp-scrollable-carousel-slide {
    width: 188px;    
}

.item-single-blog-post-latest-stories.amp-carousel-slide.amp-scrollable-carousel-slide {
    width: 188px;    
}
.item-single-blog-post-related-stories-videos.amp-carousel-slide.amp-scrollable-carousel-slide {
    width: 188px;    
}
.item-single-blog-post-related-stories-videos.amp-carousel-slide.amp-scrollable-carousel-slide{
	vertical-align:top;	
}
.item-author-videos.amp-carousel-slide.amp-scrollable-carousel-slide{
	vertical-align:top;	
}
.item-single-blog-post-latest-stories.amp-carousel-slide.amp-scrollable-carousel-slide{
	vertical-align:top;	
}
.title_post_mobile {
    margin-top: 16px;
}
.date-share {
    margin-bottom: 20px;
    padding-bottom: 20px;
}

.footer-border{ display:inline-block; width: 100%;height: 1px;opacity: 0.5;background-color: #ffffff;}
img{max-width:100%;height:auto;}

.blog-slider-page.single-blog-post-slider > amp-carousel > .i-amphtml-slides-container > .i-amphtml-slide-item.i-amphtml-slide-item-show > .amp-carousel-slide > amp-img {
    width: 99%;
}
.tag-name, .tag-name:hover {
    color: #E50D93 !important;
}
.tag_video_new {
  width: 88px;
  height: 17px;
  font-family: AvenirLTStd-Black !important;
  font-size: 24px;
  font-weight: 900;
  text-align: left;
  color: #ffffff;
  float:left;
}
.View-More {
  width: 88px;
  height: 17px;
  font-family: Avenir-Roman;
  font-size: 16px;
  text-align: right;
  color: #ffffff;
  float:right;
  cursor: pointer;
}
.highlight_tag span{color:#E50D93 !important;}
.mob_tag_top { margin-top: 50px !important; }
/*.mob_tag_bottom { margin-bottom: 50px !important; }*/
.tag-name {padding: 0 15px !important; letter-spacing:.3px !important;}
.tag-header {margin-top: 50px !important;}
.divider-copy-2 {
  display:inline-block;
  width: 100%;
  height: 1px;
  opacity: .5;
  background-color: #ffffff;
}
.tag-header .page-title{padding-top: 10px;}
</style>