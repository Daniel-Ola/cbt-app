/*alert(32542353) ;
$(document).ready(function(){
	alert(4353) ;
}) ;*/

// $("#fourth").click(function(){
// 	$(this).remove() ;
// })
// document.getElementById("prevBtn").disabled = false  ;

user = $("#user_id").val() ;
var answered = 0 ;
var countTime ;
//timing function
if(user != undefined)
{
    /*var d = new Date();
    var getMin = parseInt(d.getMinutes()) ;
    var getHour = parseInt(d.getHours()) ;
    var endMin = getMin+40 ;
    var endHour = getHour ;
    if(endMin >= 60)
    {
    	endMin = endMin-60 ;
    	endHour = endHour+1 ;
    }
    document.getElementById("startTime").innerHTML = d.getHours() + ":" + d.getMinutes(); 
    document.getElementById("endTime").innerHTML = endHour + ":" + endMin; */         

    var writesec ;
    setTime = parseInt($("#set_time").val()) ;
	started = parseInt($("#started").html()) ;
	timeToUse = 60*setTime ; //40 minutes
	endTIme = started+timeToUse ;
	now = parseInt($("#used").html()) ;
	usedTIme = now - started ;
	// alert(now+"_"+endTIme) ;
	differ = endTIme - now ;
	min = Math.floor(differ/60) ;
	sec = differ%60 ;
	$("#min").html(min) ;
	$("#sec").html(sec) ;
	min = parseInt($("#min").html()) ;
	sec = parseInt($("#sec").html()) ;
	// alert(sec) ;
	if(now < endTIme)//(now < endTIme)//&& differ >= 0)
	{
		var countTime = setInterval(engine , 1000) ;
	}
	else
	{
		alert("Time is up \nEnd Test!") ;
		$("#min").html("0") ;
		$("#sec").html("00") ;
		finishjob() ;
	}

	function engine()
	{
		if(sec == 0 && min == 0)
		{
			alert("Time is up \nEnd Test!") ;
			$("#min").html("0") ;
			$("#sec").html("00") ;
			clearInterval(countTime) ;
			finishjob() ;
		}
		else
		{
			if(sec > 0)
			{
				sec-- ;
				if(sec<10)
				{
					writesec = "0"+sec ;
				}
				else
				{
					writesec = sec ;
				}
			}
			else
			{
				sec = 60 ;
				min-- ;
			}
			$("#min").html(min) ;
			$("#sec").html(writesec) ;
		}	
	}
}



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
	examCode = $("#examCode").val() ;
	url = "php/actionmanager.php" ;
	// alert(username+" "+matricNo+" "+course+" "+url) ;
	if(course != 0)
	{
		var submitThis = $.post(url , {
		username: username ,
		course: course ,
		matricNo: matricNo ,
		examCode: examCode ,
		command: "regUser" 
		}) ;

		submitThis.done(function(data){
			// console.log(data) ;
			if(data != 0)
			{
				if(data < 0)
				{
					$("#retDiv").html("Invalid Exam Code") ;
					$("#retDiv").show() ;
				}
				else
				{
					location.replace("http://ore-oluwadaniel/ubc/"+course+"/") ;
				}
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
	answered += parseInt($(que_id).attr("getThis")) ;
	$(que_id).attr("getThis" , "0") ;
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

function finishjob()
{
	/*alert("enter") ;
	alert("answered "+answered) ;*/
	// event.preventDefault() ;
	url = "../php/actionmanager.php" ;
	totalQue = $("#totalPage").val() ;
	course = $("#whichCourse").html() ;
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
		course: course ,
		user: user ,
		key: key ,
		command: "solved"
	}) ;

	submitThis.done(function(data){
		// alert(data) ;
		console.log(data) ;
		var dataArr = data.split("et") ;
		var score = dataArr[0] ;
		var percent = dataArr[1] ;
		$(".locateDiv").addClass("disabled") ;
		$("#score").html(score) ;
		$("#percent").html(percent) ;
		$("#wizard-validation-form").remove() ;
		$("#confirm").hide() ;
		$(".panel-footer").show() ;
		$("#aftConf").show() ;
		$("#testFinished").show() ;
	}) ;
}

$("#finishBtn").click(function(event){
	event.preventDefault() ;
	$(".locateDiv").addClass("disabled") ;
	$("#answered").html(answered) ;
	$("#wizard-validation-form").hide() ;
	$("#testFinished").show() ;
}) ;

$("#yes").click(function(event){
	event.preventDefault() ;
	finishjob() ;
	clearInterval(countTime) ;
	/*$("#wizard-validation-form").remove() ;
	$("#confirm").hide() ;
	$(".panel-footer").show() ;
	$("#aftConf").show() ;*/
}) ;

$("#no").click(function(event){
	event.preventDefault() ;
	$(".locateDiv").removeClass("disabled") ;
	$("#testFinished").hide() ;
	$("#wizard-validation-form").show() ;
}) ;

$(".showImg").click(function(){
	id = "#"+$(this).attr("goto") ;
	$(id).toggle() ;
}) ;
