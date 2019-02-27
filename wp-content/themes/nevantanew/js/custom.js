jQuery(document).ready(function(){ 
	jQuery(".mejs-overlay.mejs-overlay-play").on("click", function(){
			jQuery('.slider-text').toggle();
	}); 
	/*jQuery(".mejs-mediaelement video").mouseenter(function(){
		jQuery('.slider-text').css({"display":"block"});
	});
	jQuery(".mejs-mediaelement video").mouseleave(function(){
		jQuery('.slider-text').css({"display":"none"});
	});*/
	
	jQuery(".mejs-button.mejs-playpause-button").on("click", function(){
			jQuery('.slider-text').toggle();
	});	
	
	 /*function ClearForm() {
			document.searchform.submit.value= "";
		  } */ 
		
		/*  jQuery(".close").on("click", function(){			  
			  jQuery('.searchbox1').val('');
			  jQuery('.searchbox1').hide();
			  jQuery('.close').hide();
			  jQuery('.submitBtn').show();			  			  
			  return false;
		  });
			
		  jQuery(".submitBtn").on("click", function(){
			    //jQuery('.searchbox1').val('');			 					
				jQuery('.searchbox1').show();
				jQuery('.close').show();
				jQuery('.submitBtn').hide();
		  });	*/
	 
	jQuery(".submitBtn").on("click", function(){
			jQuery('.searchbox1').show();
			jQuery('.searchbox1').focus();
			jQuery('.close').show();
			jQuery('.submitBtn').hide();
			if(jQuery('.searchbox1').val()=='' || jQuery('.searchbox1').val()==null)
			return false;
	}); 
	jQuery(".close").on("click", function(){
			jQuery('.searchbox1').hide();
			jQuery('.searchbox1').val('');
			jQuery('.close').hide();
			jQuery('.submitBtn').show();
	}); 
	
	var url_current = window.location.href;
	jQuery('.dropdown-menu li a span').each(function(){
    var $this = jQuery(this);
    var lihrefs = $this.closest("a").attr("href");
    if($this.hasClass('white')){
    	if(url_current == lihrefs){
        $this.closest('li.dropdown').addClass('active');
        }
    }        
});

    // Configure/customize these variables.
    var showCharDesigner = 130;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "read more...";
    var lesstext = "read less";
    

    jQuery('.more-designer').each(function() {
        var content = jQuery(this).html();
 
        if(content.length > showCharDesigner) {
 
            var c = content.substr(0, showCharDesigner);
            var h = content.substr(showCharDesigner, content.length - showCharDesigner);
 
            var html = c + '<span class="moreellipses"> &nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            jQuery(this).html(html);
        }
 
    });
	
	var showCharSingle = 200;
	jQuery('.more-single').each(function() {
        var content = jQuery(this).html();
 
        if(content.length > showCharSingle) {
 
            var c = content.substr(0, showCharSingle);
            var h = content.substr(showCharSingle, content.length - showCharSingle);
 
            var html = c + '<span class="moreellipses"> &nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            jQuery(this).html(html);
        }
 
    });
	
    jQuery(".morelink").click(function(){
        if(jQuery(this).hasClass("less")) {
            jQuery(this).removeClass("less");
            jQuery(this).html(moretext);
        } else {
            jQuery(this).addClass("less");
            jQuery(this).html(lesstext);
        }
        jQuery(this).parent().prev().toggle();
        jQuery(this).prev().toggle();
        return false;
    });
	
});

function main_cat_order_change(){
	jQuery('#designer_user').val("");
	document.latest.submit();
}
function designer_user_change(){
	jQuery('#main_cat_order').val("");
	document.latest.submit();
}