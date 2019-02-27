
</div>

<footer id="footer" class="inner-page-footer">

    <div class="container">
        <div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="col-lg-6 col-sm-6 col-xs-12 col-md-6 inner-page-social-footer">
					<ul class="social-icons-footer">
						<li><a href="https://www.facebook.com/NevantaMedia?fref=ts" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/icon-fb.png" height="36" width="36" alt="Facebook"></a></li>
						<li><a href="https://twitter.com/NevantaMedia" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/icon-tw.png" height="36" width="36" alt="Twitter"></a></li>                    
						<li><a href="https://instagram.com/nevantamedia/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/icon-insta.png" height="36" width="36" alt="Instagram"></a></li>
						<li><a href="https://in.pinterest.com/nevantamedia/" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/icon-pinterest.png" height="36" width="36" alt="Pinterest"></a></li>
					</ul>
				</div>
				<div class="col-lg-6 col-sm-6 copyright col-xs-12 col-md-6">
					<div class="copy-inner col-md-8 col-xs-6"><p>©2016 Nevanta Ltd</p></div>
					<div class="col-md-4 terms-menu col-xs-6"><a href="<?php echo esc_url( get_permalink('32439') ); ?>">Terms</a> | <a href="<?php echo esc_url( get_permalink('32437') ); ?>">Privacy Policy</a></div>
					

				</div>
			</div>
            <div class="col-md-12 col-xs-12">
                <div class="col-md-6 col-md-offset-6 col-xs-12 copyright footer-menu">
					<ul>
						<?php navigationmenufooter("Homemenu"); ?>                	
					</ul>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<!-- Vendor -->
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery/jquery.min.js"></script>

<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.appear/jquery.appear.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery-cookie/jquery-cookie.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/common/common.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.validation/jquery.validation.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.stellar/jquery.stellar.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.gmap/jquery.gmap.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/jquery.lazyload/jquery.lazyload.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/isotope/jquery.isotope.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/vide/vide.min.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="<?php bloginfo('template_directory'); ?>/js/theme.min.js"></script>

<!-- Current Page Vendor and Views -->
<script src="<?php bloginfo('template_directory'); ?>/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/vendor/circle-flip-slideshow/js/jquery.flipshow.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/views/view.home.js"></script>

<!-- Theme Custom -->
<script src="<?php bloginfo('template_directory'); ?>/js/custom.js"></script>

<!-- Theme Initialization Files -->
<script src="<?php bloginfo('template_directory'); ?>/js/theme.init.js"></script>
<!-- <script src="<?php //bloginfo('template_directory'); ?>/vendor/videoplayer/mediaelement-and-player.min.js"></script> -->	
<script>
    /*jQuery('audio,video').mediaelementplayer({
        success: function (player, node) {
            jQuery('#' + node.id + '-mode').html('mode: ' + player.pluginType);
        }
    });
	*/
	
	
	
	jQuery(document).ready(function(e) {
		
		jQuery("#owl-example").owlCarousel({
		
		singleItem: false,
		autoPlay: true,
		nav: true, 
		navText:false,
		dots: false,
		 margin: 10,
		 responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
				  360: {
                    items: 2,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: true
                  },
                  1000: {
                    items: 7,
                    nav: true,
                    loop: false,
                    margin: 20
                  }
                }
	});
			/* blog script*/
			jQuery('#blog_posts_slider').owlCarousel({
				"singleItem": false,
				"autoPlay": true,
				"nav": true,
				"navText":false,
				"dots": false,
				responsiveClass: true,
					responsive: {
					  0: {
						items: 1,
						nav: true
					  },
					  480: {
						items: 1,
						nav: true
					  },
					  600: {
						items: 3,
						nav: true
					  },
					  1000: {
						items: 4,
						nav: true,
						loop: false,
					  }
					}
			});
			
			jQuery('#related-blog-posts-slider').owlCarousel({
				"singleItem": false,
				"autoPlay": false,
				"nav": true,
				"navText":false,
				"dots": false,
				"margin": 30,
				responsiveClass: true,
				responsive: {
					  0: {
						items: 3,
						nav: true
					  },
					  480: {
						items: 3,
						nav: true
					  },
					  600: {
						items: 3,
						nav: true
					  },
					  1000: {
						items: 6,
						nav: true,
						loop: false,
					  }
				}
			});
			jQuery('#latest-blog-posts-slider').owlCarousel({
				"singleItem": false,
				"autoPlay": false,
				"nav": true,
				"navText":false,
				"dots": false,
				"margin": 30,
				responsiveClass: true,
					responsive: {
					  0: {
						items: 3,
						nav: true
					  },
					  480: {
						items: 3,
						nav: true
					  },
					  600: {
						items: 3,
						nav: true
					  },
					  1000: {
						items: 6,
						nav: true,
						loop: false,
					  }
					}
			});
			
			
			
			
			
			/*jQuery('#single-blog-post-gallery').owlCarousel({
				"singleItem": true,
				"autoPlay": false,
				"nav": true,
				"navText":false,
				"dots": false,
				responsiveClass: true,
					responsive: {
					  0: {
						items: 1,
						nav: true
					  },
					  480: {
						items: 1,
						nav: true
					  },
					  600: {
						items: 1,
						nav: true
					  },
					  1000: {
						items: 1,
						nav: true,
						loop: false,
					  }
					}
			});*/
		
			/* list view - grid view script*/
			jQuery('.single-image-info-div .grid-view-div').on('click',function(e) {
				jQuery('.gallery-grid-view').show();
				jQuery('.gallery-tile-view').hide();
			});
			jQuery('.single-image-info-div .tile-view-div').on('click',function(e) {
				jQuery('.gallery-tile-view').show();
				jQuery('.gallery-grid-view').hide();
			});
			/* end of list view - grid view script*/
			/* end of blog script*/
			
			
		/*jQuery("#owl-video-sec").owlCarousel({
			 items : 6,
			 itemsMobile : [479,2],
			})*/
        
		// ON CLICK PEOPLE TAB JQUERY
		jQuery("li.people_tab").click(function(e) {
            jQuery(".search-tab-nav li").removeClass('active-tab');
			jQuery(this).addClass('active-tab');
			jQuery("#people_search").show();
			jQuery("#people_search .tag-title").hide();
			jQuery("#people_search .error_div_people").show();
			jQuery("#video_search").hide();
			jQuery("#video_search .tag-title").hide();
			jQuery("#video_search .error_div_video").hide();
			jQuery("#Gallery_search").hide();
			jQuery("#Gallery_search .tag-title").hide();
			jQuery("#Gallery_search .error_div_gallery").hide();
        });
		
		// ON CLICK VIDEO TAB JQUERY
		jQuery("li.video_tab").click(function(e) {
            jQuery(".search-tab-nav li").removeClass('active-tab');
			jQuery(this).addClass('active-tab');
			jQuery("#people_search").hide();
			jQuery("#people_search .tag-title").hide();
			jQuery("#people_search .error_div_people").hide();
			jQuery("#video_search").show();
			jQuery("#video_search .tag-title").hide();
			jQuery("#video_search .error_div_video").show();
			jQuery("#Gallery_search").hide();
			jQuery("#Gallery_search .tag-title").hide();
			jQuery("#Gallery_search .error_div_gallery").hide();
        });
		
		// ON CLICK PEOPLE TAB JQUERY
		jQuery("li.gallery_tab").click(function(e) {
            jQuery(".search-tab-nav li").removeClass('active-tab');
			jQuery(this).addClass('active-tab');
			jQuery("#people_search").hide();
			jQuery("#people_search .tag-title").hide();
			jQuery("#people_search .error_div_people").hide();
			jQuery("#video_search").hide();
			jQuery("#video_search .tag-title").hide();
			jQuery("#video_search .error_div_video").hide();
			jQuery("#Gallery_search").show();
			jQuery("#Gallery_search .tag-title").hide();
			jQuery("#Gallery_search .error_div_gallery").show();
        });
		
		
		// ON CLICK latest TAB JQUERY
		jQuery("li.latest_tab").click(function(e) {
            jQuery(".search-tab-nav li").removeClass('active-tab');
			jQuery(this).addClass('active-tab');
			jQuery("#people_search").show();
			jQuery("#people_search .tag-title").show();
			jQuery("#people_search .error_div_people").hide();
			jQuery("#video_search").show();
			jQuery("#video_search .tag-title").show();
			jQuery("#video_search .error_div_video").hide();
			jQuery("#Gallery_search").show();
			jQuery("#Gallery_search .tag-title").show();
			jQuery("#Gallery_search .error_div_gallery").hide();
        });
    });
	// Sticky Header Inner Page
	// Create a clone of the menu, right next to original.
	jQuery('.inner-header').addClass('original').clone().insertAfter('.inner-header').addClass('cloned').wrapInner('<div class="cloned-header-wrapper"></div>').css('position','fixed').css('top','0').css('margin-top','0').css('z-index','500').removeClass('original').hide();

	scrollIntervalID = setInterval(stickIt, 0);


	function stickIt() {

	  var orgElementPos = jQuery('.original').offset();
	  orgElementTop = orgElementPos.top;               

	  if (jQuery(window).scrollTop() >= (orgElementTop)) {
		jQuery('.original').css('visibility','hidden');
		// scrolled past the original position; now only show the cloned, sticky element.

		// Cloned element should always have same left position and width as original element.     
		orgElement = jQuery('.original');
		coordsOrgElement = orgElement.offset();
		leftOrgElement = coordsOrgElement.left; 
		widthOrgElement = orgElement.css('width');
		/*jQuery('.cloned .fashionstories').hide();*/
		jQuery('.cloned .header-search').hide();
		jQuery('.cloned').css('left',leftOrgElement+'px').css('top',0).css('width',widthOrgElement).css('background','#000').css('border-bottom-color','#000').css('box-shadow','0 0 3px rgba(0, 0, 0, 0.1)').delay(1000).show();
		
	  } else {
		// not scrolled past the menu; only show the original menu.
		jQuery('.cloned').hide();
		jQuery('.original').css('visibility','visible');
	  }
	}
	// End of Sticky Header Inner Page
</script>
<script>
$(document).ready(function(){
    $("#responsive-menu-button").click(function(){
        $("#responsive-menu-container").toggleClass("responsive-menu-container-right ");
    });
});
</script>
<script>
    jQuery(document).ready(function($) {
        var ResponsiveMenu = {
            trigger: '#responsive-menu-button',
            animationSpeed: 500,
            breakpoint: 991,
            pushButton: 'off',
            animationType: 'slide',
            animationSide: 'right',
            pageWrapper: '',
            isOpen: false,
            triggerTypes: 'click',
            activeClass: 'is-active',
            container: '#responsive-menu-container',
            openClass: 'responsive-menu-open',
            accordion: 'off',
            activeArrow: '▲',
            inactiveArrow: '▼',
            wrapper: '#responsive-menu-wrapper',
            closeOnBodyClick: 'off',
            closeOnLinkClick: 'off',
            itemTriggerSubMenu: 'on',
            linkElement: '.responsive-menu-item-link',
            openMenu: function() {
                $(this.trigger).addClass(this.activeClass);
                $('html').addClass(this.openClass);
                $('.responsive-menu-button-icon-active').hide();
                $('.responsive-menu-button-icon-inactive').show();
                this.setWrapperTranslate();
                this.isOpen = true
            },
            closeMenu: function() {
                $(this.trigger).removeClass(this.activeClass);
                $('html').removeClass(this.openClass);
                $('.responsive-menu-button-icon-inactive').hide();
                $('.responsive-menu-button-icon-active').show();
                this.clearWrapperTranslate();
                this.isOpen = false
            },
            triggerMenu: function() {
                this.isOpen ? this.closeMenu() : this.openMenu()
            },
            triggerSubArrow: function(subarrow) {
                var sub_menu = $(subarrow).parent().next('.responsive-menu-submenu');
                var self = this;
                if (this.accordion == 'on') {
                    var top_siblings = sub_menu.parents('.responsive-menu-item-has-children').last().siblings('.responsive-menu-item-has-children');
                    var first_siblings = sub_menu.parents('.responsive-menu-item-has-children').first().siblings('.responsive-menu-item-has-children');
                    top_siblings.children('.responsive-menu-submenu').slideUp(200, 'linear').removeClass('responsive-menu-submenu-open');
                    top_siblings.each(function() {
                        $(this).find('.responsive-menu-subarrow').first().html(self.inactiveArrow)
                    });
                    first_siblings.children('.responsive-menu-submenu').slideUp(200, 'linear').removeClass('responsive-menu-submenu-open');
                    first_siblings.each(function() {
                        $(this).find('.responsive-menu-subarrow').first().html(self.inactiveArrow)
                    })
                }
                if (sub_menu.hasClass('responsive-menu-submenu-open')) {
                    sub_menu.slideUp(200, 'linear').removeClass('responsive-menu-submenu-open');
                    $(subarrow).html(this.inactiveArrow)
                } else {
                    sub_menu.slideDown(200, 'linear').addClass('responsive-menu-submenu-open');
                    $(subarrow).html(this.activeArrow)
                }
            },
            menuHeight: function() {
                return $(this.container).height()
            },
            menuWidth: function() {
                return $(this.container).width()
            },
            wrapperHeight: function() {
                return $(this.wrapper).height()
            },
            setWrapperTranslate: function() {
                switch (this.animationSide) {
                    case 'left':
                        translate = 'translateX(' + this.menuWidth() + 'px)';
                        break;
                    case 'right':
                        translate = 'translateX(-' + this.menuWidth() + 'px)';
                        break;
                    case 'top':
                        translate = 'translateY(' + this.wrapperHeight() + 'px)';
                        break;
                    case 'bottom':
                        translate = 'translateY(-' + this.menuHeight() + 'px)';
                        break
                }
                if (this.animationType == 'push') {
                    $(this.pageWrapper).css({
                        'transform': translate
                    });
                    $('html, body').css('overflow-x', 'hidden')
                }
                if (this.pushButton == 'on') {
                    $('#responsive-menu-button').css({
                        'transform': translate
                    })
                }
            },
            clearWrapperTranslate: function() {
                self = this;
                if (this.animationType == 'push') {
                    $(this.pageWrapper).css({
                        'transform': ''
                    });
                    setTimeout(function() {
                        $('html, body').css('overflow-x', '')
                    }, self.animationSpeed)
                }
                if (this.pushButton == 'on') {
                    $('#responsive-menu-button').css({
                        'transform': ''
                    })
                }
            },
            init: function() {
                var self = this;
                $(this.trigger).on(this.triggerTypes, function(e) {
                    e.stopPropagation();
                    self.triggerMenu()
                });
                $('.responsive-menu-subarrow').on('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    self.triggerSubArrow(this)
                });
                $(window).resize(function() {
                    if ($(window).width() > self.breakpoint) {
                        if (self.isOpen) {
                            self.closeMenu()
                        }
                    } else {
                        if ($('.responsive-menu-open').length > 0) {
                            self.setWrapperTranslate()
                        }
                    }
                });
                if (this.closeOnLinkClick == 'on') {
                    $(this.linkElement).on('click', function(e) {
                        e.preventDefault();
                        old_href = $(this).attr('href');
                        if (self.isOpen) {
                            if ($(e.target).closest('.responsive-menu-subarrow').length) {
                                return
                            }
                            self.closeMenu();
                            setTimeout(function() {
                                window.location = old_href
                            }, self.animationSpeed)
                        }
                    })
                }
                if (this.closeOnBodyClick == 'on') {
                    $(document).on('click', 'body', function(e) {
                        if (self.isOpen) {
                            if ($(e.target).closest('#responsive-menu-container').length || $(e.target).closest('#responsive-menu-button').length) {
                                return
                            }
                        }
                        self.closeMenu()
                    })
                }
                if (this.itemTriggerSubMenu == 'on') {
                    $('.responsive-menu-item-has-children > ' + this.linkElement).on('click', function(e) {
                        e.preventDefault();
                        self.triggerSubArrow($(this).children('.responsive-menu-subarrow').first())
                    })
                }
            }
        };
        ResponsiveMenu.init()
    });
</script>
<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
<script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-12345678-1', 'auto');
        ga('send', 'pageview');
</script>
-->

<script>

jQuery(document).ready(function() {
	jQuery('.popup-gallery').magnificPopup({		
		delegate: 'a.lightbox-portfolio',		
		type: 'image',
		tLoading: 'Loading...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},		
	});
});
</script>

<?php wp_footer(); ?>
</body>
</html>
