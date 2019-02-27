<div on='tap:sidebar.toggle' role="button" tabindex="0" class="nav_container"> 
  <span class="responsive-menu-box"><span class="responsive-menu-inner"></span></span> </div>
<amp-sidebar id='sidebar' layout="nodisplay" side="right">
  <div class="toggle-navigationv2">
    <div role="button" tabindex="0" on='tap:sidebar.close' class="close-nav">X</div>
    
    <div class="menu-search">
    	<div id="responsive-menu-search-box"> 
        <?php $site_url = site_url(); 
			$url_site = str_replace('http://','https://',$site_url);?>                     
          <form action="<?php echo $url_site; ?>" target="_top" method="GET" class="responsive-menu-search-form" id="responsiveSearch" role="search">
          <span>
            <button class="btn btn-default" type="submit">
            <amp-img layout="responsive" width="20" height="20" src="<?php echo site_url(); ?>/wp-content/themes/nevantanew/img/search-icon.png" class="img-res"></amp-img>            
            </button>
            </span>
            <input type="search" name="s" placeholder="SEARCH NEVANTA" class="responsive-menu-search-box" required>            
          </form>
        </div>
    </div>
    
	<?php 
		wp_nav_menu( array(
			'menu' => 'Homemenu',
			'items_wrap'      => '<ul>%3$s</ul>',
			'walker' => new Nav_Menu_Walker_Simple
		) ); 
	?>        
  </div>
</amp-sidebar>