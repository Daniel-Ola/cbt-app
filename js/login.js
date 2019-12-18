//handle the create an account function
$('#registerform').submit(function(event){
	$('#registermebutton').html("<img src='images/gifs/loading.gif' height='25px' width='25px' alt='img' /> creating... ");
	event.preventDefault();

	var $form = $(this),
        admission_no = $form.find('input[name="admission_no"]').val(),
        password = $form.find('input[name="username"]').val(),
        url = $form.attr('action'); 

      //handle validations
      error = '';
      if (admission_no == '')
      {
      	error += "Please enter your username";
      } 
      if (password == '')
      {
      	error += ", password";
      }   

      if (error != '')
      {
      	$('#result').html("<div style='color: #FF0000'><em><p>Please correct the following detals </p>" + error + ".</em></div>");
      	$('#registermebutton').html("register me");
      	return;
      }
    

});
