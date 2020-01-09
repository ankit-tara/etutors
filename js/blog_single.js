/* JS Document */

/******************************

[Table of Contents]

1. Vars and Inits
2. Set Header
3. Init Menu
4. Init Header Search
5. Init Colorbox


******************************/

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