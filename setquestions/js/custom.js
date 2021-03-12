// alert(31212) ;
// $(document).ready(function(){
// 	alert(345634) ;
// }) ;

$("#addMore").click(function(){
	number = parseInt($("#listNo").val())+1 ;
	createDiv = '<div id="que'+number+'"><div class="col-md-12">&nbsp; <h4>Question '+number+'</h4> </div><div class="col-md-12"><textarea id="elm1" name="area"></textarea>'+
                '<div class="row"><div class="col-md-12">&nbsp;</div><div class="col-md-6"><label>Option A</label><textarea class="form-control" placeholder="Option A"></textarea>'+
                '</div><div class="col-md-6"><label>Option B</label><textarea class="form-control"></textarea></div><div class="col-md-6"><label>Option C</label>'+
                '<textarea class="form-control"></textarea></div><div class="col-md-6"><label>Option D</label><textarea class="form-control"></textarea></div>'+
                '<div class="col-md-6"><label>Option E</label><textarea class="form-control"></textarea></div><div class="col-md-6"><label>Answer</label>'+
                '<textarea class="form-control"></textarea></div><div class="col-md-12">&nbsp;</div><div class="col-md-6"><label>Add an Image</label>'+
                '<input type="file" class="form-control" name=""></div></div></div></div>' ;
	$(".questions").append(createDiv) ;
}) ;

$("#saveQue").click(function(event){
	event.preventDefault() ;
	$(this).html(' &nbsp;<i class="fa fa-spin fa-circle-o-notch"></i> &nbsp;') ;
	var myData , valu ;
	rawQue = $("#questions").val() ;
	allQueKey = "danielola" ;
	inQueKey = "oladan" ;
	course = $("select[name='course']").val() ;
	test = $("select[name='test']").val() ;
	url = $("#submitQue").attr("action") ;
	user = $("#user_id").val() ;
	if(rawQue != "" && course != 0 && test != 0)
	{
		allQueArr = rawQue.split(allQueKey) ;
		allQue =  allQueArr.length ;
		divisor = 100/allQue ;
		for (i = 1; i <= allQue; i++) {
			inputQue = allQueArr[i-1] ;
			var doJob = $.ajax({
				type: 'POST' ,
				url: url ,
				data: {
						question: inputQue ,
						user: user ,
						course: course ,
						test: test ,
						key: inQueKey ,
						command: "enterQuestions"
					} ,
				async: false /*,
				complete: function(data){} ,
				success: function(data){},
		    	error: function() {}*/
			}) ;

			doJob.done(function(data){
				myData = data ;
				// alert(data) ; 
				console.log(i+" - "+data) ;
				valu = i*divisor ;
				percent = valu+"%" ;
				$(".display_percent").html(percent+" Complete") ;
				$(".progress").show() ;
				$("#myProgressBar").css("width" , percent) ;
				$("#returnLeg").html(i+" question(s) saved successfully <i class='fa fa-check'></i>") ;
			}) ;
			if(valu == 100)
			{
				$(".progress").removeClass("active") ;
				if($("#returnLeg").hasClass("alert-danger") == true){$("#returnLeg").removeClass("alert-danger") ;}
				$("#returnLeg").addClass("alert alert-success") ;
			}
			if(myData == 3)
			{	
				valu = Math.floor(valu) ;
				alert("Something is not right! \nSomething seems off in the Answer inputed for the "+i+"th question.") ;
				percent = valu+"%" ;
				$(".display_percent").html(percent+" Complete") ;
				$(".progress").show() ;
				$("#myProgressBar").css("width" , percent) ;
				$("#returnLeg").html((i-1)+" question(s) saved successfully <i class='fa fa-check'></i><p><strong><i class='fa fa-warning'></i> Something is not right!</strong><br>Something seems off in the Answer inputed for the "+i+"th question.</p>") ;
				if($("#returnLeg").hasClass("alert-success") == true){$("#returnLeg").removeClass("alert-success") ;}
				$("#returnLeg").addClass("alert alert-danger") ;
				break ;// break loop if theres no ans or more than one ans
			}
		}
	}
	else
	{
		alert("Please supply all necessary details!") ;
	}
	$(this).html('Save') ;
}) ;


$("#ans").change(function(){
	getId = $(this).val() ;
	id = "#"+getId ;
	$("#answer").html($(id).val()) ;
	if(getId == "")
	{
		$("#answer").html("") ;
	}
}) ;
//1235789
$("#saveBtn").click(function(event){
	event.preventDefault() ;
	$(this).html(' &nbsp; &nbsp; <i class="fa fa-spin fa-spinner"></i> &nbsp; &nbsp; ') ;
	url = "../php/actionmanager.php" ;
	user = $("#user_id").val() ;
	course = $("#course").val() ;
	test = $("select[name='test']").val() ;
	// question = $("textarea[name='area']").html() ; //$("#elm1").val() ;
	opta = $("#opta").val() ;
	optb = $("#optb").val() ;
	optc = $("#optc").val() ;
	optd = $("#optd").val() ;
	// opte = $("#opte").val() ;
	answer = $("#answer").val() ;
	image = $("#imgName").val() ;
	// console.log($("#questionForm").serialize()) ;
	var question =  tinyMCE.activeEditor.getContent();
	// if(question != ""){ alert("not null") ; }else{alert("null") ;}
	if(course != "0" || test != "0" || answer != "" || question != "" || opta != "" || optb != "" || optc != "" || optd != "")
	{
		alert(question,answer) ;
		var doJob = $.post(url , {
			user: user ,
			course: course ,
			test: test ,
			question: question ,
			opta: opta ,
			optb: optb ,
			optc: optc ,
			optd: optd ,
			// opte: opte ,
			answer: answer ,
			image: image ,
			command: "setQues"
		}) ;

		doJob.done(function(data){
			console.log(data) ;
			$(".ret").show() ;
		}) ;
	} 
	else
	{
		alert("Please supply all necessary details!") ;
	}
			$("#saveBtn").html("Save Question") ;
			
}) ;

//login
$("#loginForm").submit(function(event){
	event.preventDefault() ;
	$("#logBtn").html('<i class="fa fa-spin  fa-circle-o-notch"></i>') ;
	url = "../php/actionmanager.php" ;
	uname = $("#uname").val() ;
	pword = $("#pword").val() ;
	$.post(url , {
		uname: uname ,
		pword: pword ,
		command: "Login"
	}).done(function(data){
		if(data == 1)
		{
			window.location.assign("dashboard.php") ;
		}
		if(data == 2)
		{
			meassage = "<div class='alert alert-warning alert-dismissable'>" + 
	                   "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><i class='fa fa-warning'></i> ** "+
	                   "Incorrect password entry</div>" ;
	        $("#retDiv").html(meassage) ;
		}
		if(data == 3)
		{
			meassage = "<div class='alert alert-warning alert-dismissable'>" + 
	                   "<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button><i class='fa fa-warning'></i> ** "+
	                   "Username not found</div>" ;
	        $("#retDiv").html(meassage) ;
		}
		$("#logBtn").html('Log In') ;
	}) ;
}) ;

$("#getScores").click(function(event){
	event.preventDefault() ;
	course = $("#getCourse").val() ;
	lim = $("#lim").val() ;
	window.location.assign("?sub="+course+"&lim="+lim) ;
}) ;

$("#xamCode").blur(function(event){
	val = $(this).val() ;
	url = "../php/actionmanager.php" ;
	checkAvailable(val , url) ;
}) ;

function checkAvailable(val , url)
{
	if(val == "")
	{
		$("#available").hide() ;
		$("#codeInUse").hide() ;
		$("#required").show() ;
		return $("#available").css("display") ;
	}
	else
	{
		$.post(url , {
			val: val ,
			command: "checkAvailable"
		}).done(function(data){
			if(data == 1)
			{
				$("#required").hide() ;
				$("#available").hide() ;
				$("#codeInUse").show() ;
			}
			if(data == 2)
			{
				$("#required").hide() ;
				$("#codeInUse").hide() ;
				$("#available").show() ;
			}
		}) ;
		return $("#available").css("display") ;
	}
}

$("#saveCode").click(function(event){
	code = $("#xamCode").val() ;
	url = "../php/actionmanager.php" ;
	console.log(url);
	ret = checkAvailable(code , url) ;
	if(ret != "none")
	{// continue code
		xamTime = $("#xamTime").val() ;
		xamQues = $("#xamQues").val() ;
		test = $("#test").val() ;
		if(xamTime != "" || xamQues != "" || test != "0")
		{
			$.post(url , {
				code: code ,
				xamTime: xamTime ,
				xamQues: xamQues ,
				test: test ,
				command: "saveCode"
			}).done(function(data){
				if(data == 1)
				{
					$("#retSave").html("Done <i class='fa fa-check'></i>") ;
				}
				if(data == 0)
				{
					$("#retSave").html("Failed <i class='fa fa-times'></i>") ;
				}
				console.log(data) ;
			}) ;
		}
		else
		{
			alert("Some fields are left empty") ;
		}
	}
}) ;