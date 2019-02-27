<div on='tap:sidebar.toggle' role="button" tabindex="0" class="nav_container"> 
  <span class="responsive-menu-box"><span class="responsive-menu-inner"></span></span> </div>
<amp-sidebar id='sidebar' layout="nodisplay" side="right">
  <div class="toggle-navigationv2">
    <div role="button" tabindex="0" on='tap:sidebar.close' class="close-nav">X</div>
    
    <div class="menu-search">
    	<div id="responsive-menu-search-box">                      
          <form action="<?php echo site_url(); ?>" class="responsive-menu-search-form" id="responsiveSearch" role="search">
          <span>
            <button class="btn btn-default" type="submit"><img src="https://www.nevanta.com/wp-content/themes/nevantanew/img/search-icon.png" class="img-res"></button>
            </span>
            <input type="search" name="s" placeholder="SEARCH NEVANTA" class="responsive-menu-search-box">
            
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
