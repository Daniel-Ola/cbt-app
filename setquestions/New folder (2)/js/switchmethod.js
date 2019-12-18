



var control = true ;

function firstmodal(id)
{
		// Get the modal
	var modal = document.getElementById(id);

	// Get the button that opens the modal

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];

	// When the user clicks on the button, open the modal
		modal.style.display = "block";


	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
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
	goto = $(this).attr("goto") ;
	firstmodal(goto) ;
}) ;

$(".navbtn").click(function(){
	todo = $(this).attr("id") ;
	var steps = ["step1" , "step2" , "step3" , "step4" , "step5"] ;
	if(control == true)
	{
		a = 1 ;
	}
	if(todo == "nextbtn")
	{
		$hasclass = $("#prevbtn").hasClass("disabled") ;
		if($hasclass = true){ $("#prevbtn").removeClass("disabled") ; }
		if(a<steps.length)
		{
			$("#"+steps[a]).show() ;
			$("#"+steps[a-1]).hide() ;
			a = a+1 ;
		}
		if(a>=steps.length-1)
		{
			$("#nextbtn").addClass("disabled") ;
			$("#viewbtn").show(500) ;
		}
		control = false ;
	}
	if(todo == "prevbtn")
	{
		$("#viewbtn").hide(300) ;
		$("#nextbtn").show() ;
		$hasclass = $("#nextbtn").hasClass("disabled") ;
		if($hasclass = true){ $("#nextbtn").removeClass("disabled") ; } ;
		if(a<steps.length)
		{
			$("#"+steps[a]).hide() ;
			$("#"+steps[a-1]).show() ;
			a = a-1 ;
		}
		if(a==1)
		{
			$("#prevbtn").addClass("disabled") ;
		}
		control = false ;
	}
	if(todo == "viewbtn")
	{
		$("#nextbtn").hide(300) ;
		$("#subModalform").show(500) ;
		$form = $("#formModal") ;
		binContent1 = $form.find("select[name='subject']").val() ;
		binContent2 = $form.find("select[name='klass']").val() ;
		binContent3 = $form.find("select[name='type']").val() ;
		binContent4 = $form.find("input[name='pword']").val() ;
		var contents = [binContent1 , binContent2 , binContent3 , binContent4] ;
		//url = "../handler/actionmanager.php" ;
		for(i=0; i<4; i++)
		{
			/* if(i=1)
			{
				content = switchSubject(contents[1]) ;
			} */
			if(i=2)
			{
				content = switchClass(contents[2]) ;
			}
			/* if(i=3)
			{
				content = switchType(contents[3]) ;
			} */
			else
			{
				content = content[i] ;
			}
			binId = "#binId"+i ;
			// binList = "<li id='"+binId+"'>"+contents[i]+"</li>" ;
			$("#formBin").append("<p>"+content+"</p>") ;
		}
		$("#step4").hide() ;
		$("#nextbtn").hide() ;
		$("#viewbtn").hide() ;
		$("#step5").show(500) ;
	}
}) ;

function switchClass(val)
{
	var klass ;
	switch(val)
	{
		case 1: klass = "JSS1" ;
		break ;
		case 2: klass = "JSS2" ;
		break ;
		case 3: klass = "JSS3" ;
		break ;
		case 4: klass = "SSS1" ;
		break ;
		case 5: klass = "SSS2" ;
		break ;
		case 6: klass = "SSS3" ;
		break ;
	}
	return klass ;
}

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