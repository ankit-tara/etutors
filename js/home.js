jQuery(document).ready(function()
{
	"use strict";

	/* 

	Init Home Slider

	*/

	initHomeSlider();
	initMilestones();
	initVideo();
    var ctrl = new ScrollMagic.Controller();

	function initHomeSlider()
	{
		if(jQuery('.home_slider').length)
		{
			var homeSlider = jQuery('.home_slider');
			homeSlider.owlCarousel(
			{
				items:1,
				loop:true,
				autoplay:true,
				nav:false,
				dots:false,
				smartSpeed:1200
			});

			if(jQuery('.home_slider_prev').length)
			{
				var prev = jQuery('.home_slider_prev');
				prev.on('click', function()
				{
					homeSlider.trigger('prev.owl.carousel');
				});
			}

			if(jQuery('.home_slider_next').length)
			{
				var next = jQuery('.home_slider_next');
				next.on('click', function()
				{
					homeSlider.trigger('next.owl.carousel');
				});
			}
		}
	}


		function initVideo()
			{
				jQuery(".vimeo").colorbox(
				{
					iframe:true,
					innerWidth:640,
					innerHeight:409,
					maxWidth: '90%'
				});
			}



	/* 

	Initialize Milestones

	*/

	function initMilestones()
	{
		if(jQuery('.milestone_counter').length)
		{
			var milestoneItems = jQuery('.milestone_counter');

	    	milestoneItems.each(function(i)
	    	{
	    		var ele = jQuery(this);
	    		var endValue = ele.data('end-value');
	    		var eleValue = ele.text();

	    		/* Use data-sign-before and data-sign-after to add signs
	    		infront or behind the counter number */
	    		var signBefore = "";
	    		var signAfter = "";

	    		if(ele.attr('data-sign-before'))
	    		{
	    			signBefore = ele.attr('data-sign-before');
	    		}

	    		if(ele.attr('data-sign-after'))
	    		{
	    			signAfter = ele.attr('data-sign-after');
	    		}

	    		var milestoneScene = new ScrollMagic.Scene({
		    		triggerElement: this,
		    		triggerHook: 'onEnter',
		    		reverse:false
		    	})
		    	.on('start', function()
		    	{
		    		var counter = {value:eleValue};
		    		var counterTween = TweenMax.to(counter, 4,
		    		{
		    			value: endValue,
		    			roundProps:"value", 
						ease: Circ.easeOut, 
						onUpdate:function()
						{
							document.getElementsByClassName('milestone_counter')[i].innerHTML = signBefore + counter.value + signAfter;
						}
		    		});
		    	})
			    .addTo(ctrl);
	    	});
		}
	}

});