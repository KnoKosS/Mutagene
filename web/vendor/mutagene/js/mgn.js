$(document).ready(function(){

	$(".dropdown").hover(
	function() { $('.dropdown-menu', this).fadeIn("fast");
	},
	function() { $('.dropdown-menu', this).fadeOut("fast");
	});

	$('.tips').tooltip();

	$('[data-toggle="tooltip"]').tooltip();

});