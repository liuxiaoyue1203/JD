/*--------------------------------------------------------------------
 * Copyright (c) 2009 Vision Master Designs
 * Licensed under GPL (http://www.opensource.org/licenses/gpl-license.php)

 * JQuery Plugin : "Switch Stylesheet"
 * Author : Michael (http://www.visionmasterdesigns.com)
 * Version : 1.0
 * Description : Based on the superb stylesheet switcher plugin by By Kelvin Luck ( http://www.kelvinluck.com/ ).
					Can create multiple groups of alternate stylesheets to change
				 
Ex :
Alternate Stylesheets :
<!-- alternate css for colors -->
<link href="green.css" type="text/css" rel="alternate stylesheet" title="green-color" />
<link href="blue.css" type="text/css" rel="alternate stylesheet" title="blue-color" />

JS Code :
<script type="text/javascript">
$(document).ready(function(){ 
	$(".changecolor").switchstylesheet( { seperator:"color"} );
});
</script>

Usage :
<a href="#" class="changecolor" title="red-color">Red</a> |
<a href="#" class="changecolor" title="green-color">Green</a> |
<a href="#" class="changecolor" title="blue-color">Blue</a>

------------------------------------------------------------------------*/

$.fn.switchstylesheet = function(options) {

	//default vals
	defaults = {
		seperator : 'alt'
	};
	
	var options = $.extend(defaults, options);
	
	//read the style
	var c = cookie.readCookie(options.seperator);
	if (c) switchss(c);
	
	//goes thru the links to find out the ones having the selector
	$(this).click(function() {
		var title = $(this).attr('title'); //gets the title=?
		switchss(title);
		return false;
	});
	
	function switchss(title) {
		//goes thru all the styles having seperator - alt
		$('link[rel*=style][title*='+options.seperator+']').each(function(i) {
			this.disabled = true;	
			if ($(this).attr('title') == title) {
				this.disabled = false;
			}
		});
		//create a cookie to store the style
		cookie.createCookie(options.seperator, title, 365);
	}
};

//cookie functions
var cookie;
(function($) {
	cookie = {
		createCookie: function(name,value,days) {
			if (days)
			{
				var date = new Date();
				date.setTime(date.getTime()+(days*24*60*60*1000));
				var expires = "; expires="+date.toGMTString();
			}
			else var expires = "";
			document.cookie = name+"="+value+expires+"; path=/";
		},
		
		readCookie: function(name) {
			var nameEQ = name + "=";
			var ca = document.cookie.split(';');
			for(var i=0;i < ca.length;i++)
			{
				var c = ca[i];
				while (c.charAt(0)==' ') c = c.substring(1,c.length);
				if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
			}
			return null;
		}
	};
})(jQuery);