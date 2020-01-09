jQuery(document).ready(function()
{
	"use strict";

	initTabs();
	initAccordions();
	initDropdowns();

	/* 

	Init Tabs

	*/

	function initTabs()
	{
		if(jQuery('.tab').length)
		{
			jQuery('.tab').on('click', function()
			{
				jQuery('.tab').removeClass('active');
				jQuery(this).addClass('active');
				var clickedIndex = jQuery('.tab').index(this);

				var panels = jQuery('.tab_panel');
				panels.removeClass('active');
				jQuery(panels[clickedIndex]).addClass('active');
			});
		}
	}

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
					}
				});
			});
		}
	}

	/* 

 	Init Dropdowns

	*/

	function initDropdowns()
	{
		if(jQuery('.dropdowns li').length)
		{
			var dropdowns = jQuery('.dropdowns li');

			dropdowns.each(function()
			{
				var dropdown = jQuery(this);
				if(dropdown.hasClass('has_children'))
				{
					if(dropdown.hasClass('active'))
					{
						var panel = jQuery(dropdown.find('> ul'));
						var panelH = panel.prop('scrollHeight') + "px";

						if(panel.css('max-height') == "0px")
						{
							panel.css('max-height', panel.prop('scrollHeight') + "px");
						}
						else
						{
							panel.css('max-height', "0px");
						}
					}

					dropdown.find(' > .dropdown_item').on('click', function()
					{
						var panel = jQuery(dropdown.find('> ul'));
						var panelH = panel.prop('scrollHeight') + "px";
						dropdown.toggleClass('active');

						if(panel.css('max-height') == "0px")
						{
							panel.css('max-height', panel.prop('scrollHeight') + "px");
						}
						else
						{
							panel.css('max-height', "0px");
						}
					});
				}
			});
		}
	}

});