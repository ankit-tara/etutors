jQuery(document).ready(function()
{
	"use strict";


	initMasonry();

	/* 

	Init Masonry

	*/

	function initMasonry()
	{
		if(jQuery('.blog_post_container').length)
		{
			jQuery('.blog_post_container').masonry(
			{
				itemSelector:'.blog_post',
				columnWidth:'.blog_post',
				gutter:30
			});
		}
	}

});