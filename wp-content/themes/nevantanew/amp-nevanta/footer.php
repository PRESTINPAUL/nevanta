<div class="footer-border"></div>
<footer class="container">		
        <div class="social-footer">
          <ul class="social-icons-footer">          
             <li><a href="https://www.facebook.com/NevantaMedia?fref=ts" target="_blank"><amp-img src="<?php echo site_url(); ?>/wp-content/themes/nevantanew/img/icon-fb.png" height="36" width="36" alt="Facebook"></amp-img></a></li>
              <li><a href="https://twitter.com/NevantaMedia" target="_blank"><amp-img src="<?php echo site_url(); ?>/wp-content/themes/nevantanew/img/icon-tw.png" height="36" width="36" alt="Twitter"></amp-img></a></li>
              <li><a href="https://instagram.com/nevantamedia/" target="_blank"><amp-img src="<?php echo site_url(); ?>/wp-content/themes/nevantanew/img/icon-insta.png" height="36" width="36" alt="Instagram"></amp-img></a></li>
              <li><a href="https://in.pinterest.com/nevantamedia/" target="_blank"><amp-img src="<?php echo site_url(); ?>/wp-content/themes/nevantanew/img/icon-pinterest.png" height="36" width="36" alt="Pinterest"></amp-img></a></li>      
          </ul>
        </div>
        
    	<div class="partfirst">
    	<span class="copy">©2016 Nevanta Ltd</span>    
    	<span class="terms-menu"><a href="<?php echo site_url(); ?>/terms-and-conditions/">Terms</a> | <a href="<?php echo site_url(); ?>/privacy-policy/">Privacy Policy</a></span>
    </div> 
     
    	<div id="footer" class="footer-menu">      	
        <?php
            wp_nav_menu( array(
                'menu' => 'footer'
            ) ); 
        ?>         
      </div>
    </footer>
       	     	
    <!--Plugin Version :0.9.31 -->
    <amp-analytics type="googleanalytics" id="analytics1">
        <script type="application/json">
        {
          "vars": {
            "account": "UA-28889163-1"
          },
          "triggers": {
            "trackPageview": {
              "on": "visible",
              "request": "pageview"
            }
          }
        }
        </script>
    </amp-analytics>    
</body>
</html> 