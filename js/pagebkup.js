/*alert(32542353) ;
$(document).ready(function(){
	alert(4353) ;
}) ;*/


// $("#fourth").click(function(){
// 	$(this).remove() ;
// })
// document.getElementById("prevBtn").disabled = false  ;
user = $("#user_id").val() ;
// alert(user) ;
$("#nextBtn").click(function(){
	page = parseInt($("#page").val()) ;
	next = page+1 ;
	hidediv = "#que_"+page ;
	gotoid = "#que_"+next ;
	$(hidediv).hide() ;
	$(gotoid).show() ;
	$("#page").val(next) ;
	// alert(parseInt(page)) ;
	disable(page , next) ;
}) ;

$("#prevBtn").click(function(){
	page = $("#page").val() ;
	prev = parseInt(page)-1 ;
	hidediv = "#que_"+page ;
	gotoid = "#que_"+prev ;
	$(hidediv).hide() ;
	$(gotoid).show() ;
	page = $("#page").val(prev) ;
	disable(page , prev) ;
}) ;

$(".locateDiv").click(function(){
	which = $(this).attr("whichOne") ;
	page = $("#page").val() ;
	hidediv = "#que_"+page ;
	gotoid = "#que_"+which ;
	$(hidediv).hide() ;
	$(gotoid).show() ;
	page = $("#page").val(which) ;
	disable(page , which) ;
}) ;

function disable(page , hey)
{
	lastPage = $("#totalPage").val() ;
	//alert(hey) ;
	//alert(lastPage) ;
	stop = lastPage-1 ;
	if(page == 1)
	{
		// $("#prevBtn").attr("disable" , "disable") ;
		document.getElementById("prevBtn").disabled = true  ;
		document.getElementById("nextBtn").disabled = false  ;
	}
	else if(page == stop)
	{
		document.getElementById("nextBtn").disabled = true  ;
		document.getElementById("prevBtn").disabled = false  ;
	}
	if(hey != 1 && hey != lastPage)
	{
		//alert("enter") ;
		document.getElementById("nextBtn").disabled = false  ;
		document.getElementById("prevBtn").disabled = false  ;
	}
	else
	{
		if(hey == 1)
		{
			// $("#prevBtn").attr("disable" , "disable") ;
			document.getElementById("prevBtn").disabled = true  ;
			document.getElementById("nextBtn").disabled = false  ;
		}
		else if(hey == lastPage)
		{
			document.getElementById("nextBtn").disabled = true  ;
			document.getElementById("prevBtn").disabled = false  ;
		}
	}
}

$("#wizard-validation-form-index").submit(function(event){
	event.preventDefault() ;
	var form = $(this) ;
	username = $("#username").val() ;
	matricNo = $("#matricNo").val() ;
	course = $("#course").val() ;
	url = "php/actionmanager.php" ;
	// alert(username+" "+matricNo+" "+course+" "+url) ;
	if(course != 0)
	{
		var submitThis = $.post(url , {
		username: username ,
		course: course ,
		matricNo: matricNo ,
		command: "regUser" 
		}) ;

		submitThis.done(function(data){
			// console.log(data) ;
			if(data != 0)
			{
				location.replace("http://localhost/werks/ubc/"+course+"/") ;
			}
			else
			{
				alert("please try again") ;
			}
		}) ;
	}
	else
	{
		alert("Please select a valid course") ;
	}
	
}) 


$(".radios").change(function(){
	// alert($(this).attr("id")) ;
	labelId = "#label"+$(this).attr("id") ;
	label = $(labelId).html() ;
	rawid = $(this).attr("id") ;
	notid = rawid.split("_") ;
	que_no = notid[0].slice(5) ;
	que_id = "#todiv"+que_no ;
	realid = notid[0]+"_not" ;
	which = document.getElementById(realid).checked = false ;
	//change question link color
	hasClass = $(que_id).hasClass("badge-warning") ;
	if(hasClass == true)
	{
		$(que_id).removeClass("badge-warning") ;
		$(que_id).removeClass("badge-info") ;
	}
}) ;

$("#finishBtn").click(function(event){
	event.preventDefault() ;
	url = "../php/actionmanager.php" ;
	totalQue = $("#totalPage").val() ;
	var correctAnswers = "";
	var answers = "";
	var key = "+=+,_" ;
	conts = $(".radios") ; //document.getElementsByClassName("radios")  ; //$("#radio1_a").val() ;//.attr("checked") ; //$(":checked").val() ; //$(this).serialize() ;
	for (var i = 0; i < totalQue*6 ; i++)
	{
		control = true ;
		var thisOne = conts[i] ;
		theId = "#"+thisOne.id ;
		id = thisOne.id ;
		splited = id.split("_") ;
		valu = $(theId).attr("valu") ;
		name = $(theId).attr("name") ;
		var check = conts[i].checked ;
		if(check == true)
		{
			answers += key+valu ;
		}
		if(i%6 == 0)
		{
			Init = parseInt(i)+5 ;
			thisOnes = conts[Init] ;
			theIds = "#"+thisOnes.id ;
			ids = thisOnes.id ;
			spliteds = ids.split("_") ;
			valus = $(theIds).attr("valu") ;
			correctAnswers += key+valus ;
		}
	}
	var submitThis = $.post(url , {
		answers: answers ,
		correctAnswers: correctAnswers ,
		user: user ,
		key: key ,
		command: "solved"
	}) ;

	submitThis.done(function(data){
		alert(data) ;
	}) ;

	
}) ;
