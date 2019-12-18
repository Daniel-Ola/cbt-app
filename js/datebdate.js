//alert("connected") ;
$(document).ready(function(){
	//alert("also connectedd") ;
	var d = new Date() ;
    			yr = d.getFullYear() ;
    			mth = d.getMonth() ;
                mont = mth + 1 ;
    			dat = d.getDate() ;
    			datenow = yr + "-" + mont + "-" + dat ;
    			var systemdate = $("#systemdate").val(datenow) ;

    			var re = /-/gi;
    			var newsystemdate = datenow.replace(re , ",") ;
    			newsystemdate = new Date(newsystemdate) ;
    			sytemtime = newsystemdate.getFullYear() ;// returns time in  milliseconds


    			//alert(sytemtime) ;


	$("#datepicker-autoclose").keyup(function(){
		//alert("yeah!") ;
		//$("#receiveage").val("age recieved") ;
    			var dob = $("#datepicker-autoclose").val() ;
    			dob = dob.replace("/" , ",") ;
    			dob = dob.replace("/" , ",") ;
    			dob = new Date(dob) ;
    			dob = dob.getFullYear() ;// returns time in  milliseconds
    			dobtime = sytemtime - dob ;
    			//alert(dobtime) ;
    			$("#receiveage").val(dobtime) ;
	}) ;

				// replacer = sytemtime ;
				// yearof = replacer.Tostring(replacer) ;
				
				// var yearof = replacer.replace("2" , "1") ;
    // 				//mont = 10 ;
    // 				alert(yearof) ;
    			if(mont < 9)
    			{
    				prevyr = sytemtime - 1 ;
    				session = prevyr + "/" + sytemtime ;
    				$("#adyr").val(session) ;
    				//alert(session) ;
    			}
    			else
    			{
    				nxtyr = sytemtime + 1 ;
    				session = sytemtime + "/" + nxtyr ;
    				$("#adyr").val(session) ;
    			}
}) ;