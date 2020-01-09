
jQuery(document).ready(function()
{
	"use strict";

	initColorbox();

	/*

	Init Colorbox

	*/

	function initColorbox()
	{
		if(jQuery('.gallery_item').length)
		{
			jQuery('.colorbox').colorbox(
			{
				rel:'colorbox',
				photo: true,
				maxWidth: '90%'
			});
		}
	}

});

