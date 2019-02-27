<?php
/*
  Template Name: Image Upload Script
 */
get_header();

?>

<div role="main" class="main">
<div class="container full-widht-content contact-us-template">
    <div class="row">
		<div class="col-md-12">	
        <div class="col-md-12 text-center">	
        
        <div class="col-md-3 col-sm-2">
        </div>
        <div class="col-md-6 col-sm-8">
        	<div class="text-center"><h1><?php the_title(); ?></h1></div>
        	<?php the_content(); ?>
        </div>    
        <div class="col-md-3 col-sm-2">    
        </div>
        	
        </div>
       
        <form method="post" action="">
        	<div class="col-md-12 img-uplaod-form">
        	<div class="col-md-3 formfield-title">
           		 <h2> Month:</h2>
        	</div>
            <div class="col-md-9 month-select">
            			<select name="month" id="month">
 								 <option value="">Select...</option>
  								 <option value="1">January - 01</option>
 								 <option value="2">February - 02</option>
                                 <option value="3">March - 03</option>
                                 <option value="4">April - 04</option>
                                 <option value="5">May - 05</option>
                                 <option value="6">June - 06</option>
                                 <option value="7">July - 07</option>
                                 <option value="8">August - 08</option>
                                 <option value="9">September - 09</option>
                                 <option value="10">October - 10</option>
                                 <option value="11">November - 11</option>
                                 <option value="12">December - 12</option>
						</select>
            </div>
            <div class="col-md-3 formfield-title">
           		 <h2> Year:</h2>
        	</div>
            <div class="col-md-9">
            			<input type="text" id="newyear" name="newyear" value="" />
            </div>
            
            <div class="col-md-3 formfield-title">
           		 <h2> Folder Path:</h2>
        	</div>
            <div class="col-md-9 month-select">
            			<input type="text" id="floderpath" name="floderpath" value="" />
            </div>
            
            
            <div class="col-md-3 formfield-title">
           		 
        	</div>
            <div class="col-md-9">
            			<input type="submit" name="submit" value="Submit" />
             </div>
             </div>
         </form>
  		</div>
	</div>
</div>    
</div><!-- .content-area -->

<?php get_footer(); ?>