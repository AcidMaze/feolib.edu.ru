//Управление фильтрацией
jQuery(document).ready(function($)
{
	"use strict";
	var reviewMenu = $('.filter-block');
	var check_send = $('.check-send');
    var reviewMenuActive = false;
	initReviewMenu();
	function initReviewMenu()
	{
        if(check_send.length)
		{
			check_send.on('click', function()
			{
				if(!reviewMenuActive)
				{
					openReviewMenu();
				}
				else{
					closeReviewMenu();
				}
        	});
		}
    }
	function openReviewMenu()
	{
        reviewMenuActive = true;
		reviewMenu.addClass('active');
		document.getElementById('showfilter').innerText = "Скрыть фильтры";
	}
	function closeReviewMenu()
	{
        reviewMenuActive = false;
		reviewMenu.removeClass('active');
		document.getElementById('showfilter').innerText = "Показать фильтры";
	}

	var form_inut = $('.form-date');
	form_inut.dateDropper({
	
	}); 
})