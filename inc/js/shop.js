jQuery(document).ready(function( $ ) {
	
    	jQuery.each(jQuery('li.product'),function(index, value) { 
    		var current = jQuery(this);
    		console.log(jQuery(current))
    		var productBrand = jQuery(current).find('a > span.custom-attributes > span.pa_brand > span.attribute-value');
    		var productTitle = jQuery(current).find('> a > h2');
    		console.log(productTitle);
			jQuery(productBrand).prependTo(productTitle);
			jQuery(jQuery(current).find('a > span.custom-attributes > span.pa_brand')).hide();
    });
});

