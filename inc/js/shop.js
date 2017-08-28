jQuery(document).ready(function( $ ) {

    	//uses pootle page builder
    	jQuery.each(jQuery('li.product'),function(index, value) { 
    		var current = jQuery(this);
    		//console.log(jQuery(current))
    		var productBrand = jQuery(current).find('a > span.custom-attributes > span.pa_brand > span.attribute-value');
    		var productTitle = jQuery(current).find('> a > h2');
    		//console.log(productTitle);
			jQuery(productBrand).insertBefore(productTitle);
			jQuery(jQuery(current).find('a > span.custom-attributes > span.pa_brand')).remove();
    });

    	//product type header with pootle page builder
	    jQuery.each(jQuery('.panel-grid.ppb-row'), function(index, value) {
  				
  				//get product list
  				var productList =jQuery(this).find('.products');
  				
  				//check if list has products	
  			if (productList.length === 0) { 
  				
  				jQuery(jQuery(this).find('.product-category-header')).hide(); 
  				}
  		});
  	});

