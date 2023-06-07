$(function () {
    if ($.support.pjax) {
		
        $(document).pjax('.pjaxCls', '#pjax-container')	
        $(document).on("ready pjax:end", function () {
			
				$.pjax.defaults.maxCacheLength = 0; // prevent back button
			
				$(".btn_maximize").click(function(){ //maximization
				$('body').toggleClass('maximized');
				$("i", this).toggleClass("fa-window-maximize fa-window-minimize");
				}); 
				
				$('.mysingle_date').daterangepicker({ //Date format
				locale: {format: jquerydateformat},
				singleDatePicker:true,
				showDropdowns:true            
				}); 
			
				$('.js-example-basic-multiple').select2(); // select 2
				
				$.pjax.defaults.timeout = false;
         
        });
    }
});