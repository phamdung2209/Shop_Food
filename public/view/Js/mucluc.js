$(document).ready(function(){
    $( "#mucluc a" ).click(function() {
    	var _class = $('#content').attr('class');
    	if(_class=="dn")
    	{
    		$('#mucluc a').text("[Ẩn]"); 
    		$('#content').removeClass('dn');
    		$('#content').addClass('db');
    	}
    	else
    	{
    		$('#mucluc a').text("[Hiện]"); 
    		$('#content').removeClass('db');
    		$('#content').addClass('dn');
    	}
    });
});
