(function($){
    "use strict";
    var tbDummyData = function(current_data,p,theme){
    	$.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                'action': 'tbdummy',
                'current_data':  current_data,
                'theme' : theme
            },
            success: function(data, textStatus, XMLHttpRequest){
                $('.tb-dummy-process-bar').css({
                    'width':p+'%',
                    '-webkit-transition':'width 1s',
                    'transition':'width 1s'
                });
                $('#tb-msg .tb-status').text(' Loading '+p+'%');
                if(isNaN(current_data)){
                    $('#tb-msg').parent().css('width','100%');
                    $('#tb-msg').append(data);
                }
                if(current_data=='grid'){
                    p+=5;
                    tbDummyData(15,p,theme);
                }
                if(current_data>1 && current_data<16){
                    tbDummyData(current_data-1,p+5,theme);
                }
                if(current_data==1){
                    tbDummyData(16,100,theme);
                }
                if(current_data==16){
                    $('#tb-msg').parent().css('width','100%');
                    $('#tb-msg .tb-status').text(' Loading 100%');
                    $('#tb-msg').append(data);
                }
            }
        });
    }
    $(document).ready(function(){
    	$("#dummy-data").on("click",function(){
    		var r = confirm("Are you want import the demo data?");
        	if(r == true){
        		$('.tb-dummy-process').show();
	            var theme = $('#smof_data-theme .redux-image-select-selected').find('input').val();
	            $(this).attr('disabled','true');
	            $('#tb-msg .tb-status').text(' Loading ');
	            var p = 0;
	            var arr = ["options","widget","slider","grid"];
	            arr.forEach(function(entry){
	                p+=5;
	                tbDummyData(entry,p,theme);
	            });
        	}
    	});
    });
})(jQuery)