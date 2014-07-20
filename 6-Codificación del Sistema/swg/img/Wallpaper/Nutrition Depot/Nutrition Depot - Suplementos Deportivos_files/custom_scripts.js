jQuery(document).ready(function() { 

jQuery("#topnav ul").css({display: "none"}); // Opera Fix 

jQuery("#topnav li").hover(function(){ 

jQuery(this).find('ul:first').css({visibility: "visible",display: "none"}).show(268); 

},function(){ 

jQuery(this).find('ul:first').css({visibility: "hidden"}); 

}); 

});
 
$(document).ready(function(){

	$("#content a img").hover(function() {
		$(this).stop()
		.animate({opacity: 0.7}, "medium")

	}, function() {
		$(this).stop()
		.animate({opacity: 1}, "medium")
	});



$('ul.display .cart a, ul.display .wishlist a, ul.display .compare a, a.prod_compare, a.prod_wish').tipsy({gravity: 's', fade: true, title: function() { return this.getAttribute('original-title').toUpperCase(); }});

});