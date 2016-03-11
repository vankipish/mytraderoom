jQuery(document).ready(function () {

    jQuery('#quote-carousel').carousel({
        interval: 5000,
		pause: 'hover'
    });
	
	jQuery('.navbar-toggler').on('click', function(event) {
		event.preventDefault();
		jQuery(this).closest('.navbar-minimal').toggleClass('open');
	})
	
	jQuery(function(){
        jQuery('a[title]').tooltip();
    })

});