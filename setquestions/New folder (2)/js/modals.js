



var control = true ;
document.getElementById("nextbtn").disabled = false ;
// alert($("#nextbtn").attr("disabled")) ;

function firstmodal(id)
{
	// alert(id) ;
		// Get the modal
	var modal = document.getElementById(id);

	// Get the button that opens the modal
	if(id == "firstModal")
	{
		classpos = 0 ;
	}
	if(id == "secondModal")
	{
		classpos = 1 ;
	}

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[classpos];

	// When the user clicks on the button, open the modal
		modal.style.display = "block";


	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
		// alert(classpos) ;
		modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
}

$("#startnew").on("click" , function(){
	$("#firstModal").hide() ;
	$goto = $(this).attr("goto") ;
	firstmodal($goto) ;
}) ;

$(".navbtn").click(function(){
	todo = $(this).attr("id") ;
	var steps = ["step1" , "step2" , "step3" , "step4" , "step5"] ;
	if(control == true)
	{
		a = 1 ;
		document.getElementById("prevbtn").disabled = true ;
	}
	if(todo == "nextbtn")
	{
		$hasclass = $("#prevbtn").hasClass("disabled") ;
		if($hasclass = true){
			$("#prevbtn").removeClass("disabled") ;
			document.getElementById("prevbtn").disabled = false ;
		}
		if(a<steps.length)
		{
			$("#"+steps[a]).show() ;
			$("#"+steps[a-1]).hide() ;
			if(a <= 3){a=a+1 ;}
		}
		if(a>=steps.length-1)
		{
			$("#nextbtn").addClass("disabled") ;
			document.getElementById("nextbtn").disabled = true ;
			$("#viewbtn").show(500) ;
			// $("#nextbtn").hide() ;
		}
		control = false ;
	}
	if(todo == "prevbtn")
	{
		$("#viewbtn").hide(300) ;
		$(".subbtn").hide(300) ;
		/*if(a == 4)
		{
			$("#nextbtn").show() ;
		}*/
		$hasclass = $("#nextbtn").hasClass("disabled") ;
		if($hasclass = true){
			// $("#nextbtn").show() ;
			$("#nextbtn").removeClass("disabled") ;
			document.getElementById("nextbtn").disabled = false ;
		} //;
		if(a>=2)
		{
			$("#"+steps[a-1]).hide() ;
			$("#"+steps[a-2]).show() ;
			a = a-1 ;
		}
		if(a >= steps.length-1) // a >= 4
		{
			$("#nextbtn").addClass("disabled") ;
			document.getElementById("nextbtn").disabled = true ;
			$("#viewbtn").show() ;
			$("#formBin").html("") ;
		}
		if(a<=1)
		{
			$("#prevbtn").addClass("disabled") ;
			document.getElementById("prevbtn").disabled = true ;
		}
		control = false ;
	}
	if(todo == "viewbtn")
	{
		a = a+1 ;
		// $("#nextbtn").hide(300) ;
		$("#subModalform").show(500) ;
		$form = $("#formModal") ;
		binContent1 = $form.find("select[name='subject']").val() ;
		binContent2 = $form.find("select[name='klass']").val() ;
		binContent3 = $form.find("select[name='type']").val() ;
		binContent4 = $form.find("input[name='pword']").val() ;
			var plen = binContent4.length ;
			var z = "*" ;
		for(i=1; i<plen; i++)
		{
			z = z+"*" ;
		}
			binContent4 = z+" (The very password you used)" ;
		var contents = [binContent1 , binContent2 , binContent3 , binContent4] ;
		//url = "../handler/actionmanager.php" ;
		for(i=0; i<4; i++)
		{
			binId = "#binId"+i ;
			// binList = "<li id='"+binId+"'>"+contents[i]+"</li>" ;
			$("#formBin").append("<p id='"+binId+"'>"+contents[i]+"</p>") ;
		}
		$("#step4").hide() ;
		// $("#nextbtn").hide() ;
		$("#viewbtn").hide() ;
		$("#step5").show(500) ;
	}
}) ;

$(".subbtn").click(function(event){
	// alert(12) ;
	event.preventDefault() ;
	$("#subModalform").hide() ;
	$(".loadingbtn").show() ;
	$form = $(this) ;
	subject = $form.find("select[name='subject']").val() ;
	klass = $form.find("select[name='klass']").val() ;
	type = $form.find("select[name='type']").val() ;
	pword = $form.find("input[name='pword']").val() ;
	url = $form.attr("action") ;
	count = 0 ;
	if(pword == "")
	{
		alert("Please set a password") ;
		count = count+1 ;
	}
	if(count == 0)
	{
		var savenew = $.post(url , {
			subject: subject ,
			klass: klass ,
			type: type ,
			pword: pword ,
			command: "cr8xam"
		}) ;

		savenew.done(function(data){
			$("#formBin").html(data) ;
			$("#step5").show() ;
			$(".loadingbtn").hide() ;
			$("#subModalform").show() ;
		}) ;
	}
}) ;

$("#togglepass").click(function(){
	$type = $("#quepass").attr("type") ;
	if($type == "password")
	{
		$("#quepass").attr("type" , "text") ;
		$(this).html("hide") ;
	}
	if($type == "text")
	{
		$("#quepass").attr("type" , "password") ;
		$(this).html("show") ;
	}
}) ;