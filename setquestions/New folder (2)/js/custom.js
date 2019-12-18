$(document).ready(function(){
	$(".loadingbtn").hide() ;
	// alert("jquery") ;
}) ; 

function openretModal()
{
	alert("present") ;
		// Get the modal
	var modal = document.getElementById('retModal');

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

function addexaminer() {
	$("#addexaminerbtn").hide() ;
	$(".loadingbtn").show() ;
	$form = $("#addexaminer"),
	fname = $form.find("input[name='fullname']").val() ;// using comma is not compulsory its just normal var declaration semicolons can be used ;
	// subject = $form.find("input[name='subject']").val() ;
	contact = $form.find("input[name='contact']").val() ;
	// klass = $form.find("select[name='klass']").val() ;
	url = "../handler/actionmanager.php" ;
	count = 0 ;
	errormsg = "<p class='pull-left'>" ;
	if(fname == "")
	{
		count = count+1 ;
		errormsg += count+". The name field is empty <br />" ;
	}
	if(contact == "")
	{
		count = count+1 ;
		errormsg += count+". The contact field should not be left empty <br />" ;
	}
	/* if(subject == "")
	{
		count = count+1 ;
		errormsg += count+". Fill in the subject to set <br />" ;
	}
	if(klass == "")
	{
		count = count+1 ;
		errormsg += count+". Select a valid class" ;
	} */
	if(count == 1)
	{
		$("#reply").html("<div class='alert alert-danger alert-dismissable'>"+
						 "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
						 "<p><i class='fa fa-warning'></i> Warning! 1 error found</p>"+
											"<i class='zmdi zmdi-check pr-15 pull-left'></i>"+errormsg+ "</p>"+
											"<div class='clearfix'></div></div>") ;
		$(".loadingbtn").hide() ;
		$("#addexaminerbtn").show() ;
	}
	if(count > 1)
	{
		$("#reply").html("<div class='alert alert-danger alert-dismissable'>"+
						 "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>"+
						 "<p><i class='fa fa-warning'></i> Warning! "+count+" errors found</p>"+
											"<i class='zmdi zmdi-check pr-15 pull-left'></i>"+errormsg+ 
											"<div class='clearfix'></div></div>") ;
		$(".loadingbtn").hide() ;
		$("#addexaminerbtn").show() ;
	}
	if(count == 0)
	{
		var xamineradd = $.post(url , {
			fname: fname ,
			contact: contact ,
			command: "add_examiner"
		}) ;
		
		xamineradd.done(function(data){
			if(data == 1){
				$("#retModaltitle").html("<i class='fa fa-thumbs-o-up'></i> SUCCESS!") ;
				$("#retModaltitle").addClass("text-success") ;
				$("#retModaltext").html("Examiner "+fname+" has been registered successfuly <br />Your default password is 'password1234' make sure to change it on login") ;
				openretModal() ;
			}
			else{
				$("#retModaltitle").html("<i class='fa fa-warning'></i> ERROR!") ;
				$("#retModaltitle").addClass("text-warning") ;
				$("#retModaltext").html("Could not regiser examiner "+fname+" seems this email is already in use") ;
				openretModal() ;	
			}
		}) ;
		$(".loadingbtn").hide() ;
		$("#addexaminerbtn").show() ;
	}
}