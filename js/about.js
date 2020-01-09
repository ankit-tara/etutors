jQuery(document).ready(function(){

		"use strict";

		var ctrl = new ScrollMagic.Controller();

		initAccordions();
		initVideo();
		initMilestones();
		initPartnersSlider();


	/* 

	Init Accordions

	*/

	function initAccordions()
	{
		if(jQuery('.accordion').length)
		{
			var accs = jQuery('.accordion');

			accs.each(function()
			{
				var acc = jQuery(this);

				if(acc.hasClass('active'))
				{
					var panel = jQuery(acc.next());
					var panelH = panel.prop('scrollHeight') + "px";
					
					if(panel.css('max-height') == "0px")
					{
						panel.css('max-height', panel.prop('scrollHeight') + "px");
					}
					else
					{
						panel.css('max-height', "0px");
					}
					jQuery(window).trigger('resize.px.parallax');
				}

				acc.on('click', function()
				{
					if(acc.hasClass('active'))
					{
						acc.removeClass('active');
						var panel = jQuery(acc.next());
						var panelH = panel.prop('scrollHeight') + "px";
						
						if(panel.css('max-height') == "0px")
						{
							panel.css('max-height', panel.prop('scrollHeight') + "px");
						}
						else
						{
							panel.css('max-height', "0px");
						}
						jQuery(window).trigger('resize.px.parallax');
					}
					else
					{
						acc.addClass('active');
						var panel = jQuery(acc.next());
						var panelH = panel.prop('scrollHeight') + "px";
						
						if(panel.css('max-height') == "0px")
						{
							panel.css('max-height', panel.prop('scrollHeight') + "px");
						}
						else
						{
							panel.css('max-height', "0px");
						}
						jQuery(window).trigger('resize.px.parallax');
					}
				});
			});
		}
	}

	/* 

	Init Video

	*/

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

	/* 

	Init Partners Slider

	*/


	function initPartnersSlider()
	{
		if(jQuery('.partners_slider').length)
		{
			var partnersSlider = jQuery('.partners_slider');
			partnersSlider.owlCarousel(
			{
				loop:true,
				autoplay:true,
				smartSpeed:1200,
				nav:false,
				dots:false,
				responsive:
				{
					0:
					{
						items:1
					},
					480:
					{
						items:2
					},
					720:
					{
						items:3
					},
					991:
					{
						items:4
					},
					1199:
					{
						items:6
					}
				}
			});
		}
	}

});