<div id="countdownExample">
    <div class="values"></div>
</div>

<script type="text/javascript" src="js/easytimer.js?fsd"></script>
<script type="text/javascript">
var timer = new Timer();
timer.start({countdown: true, startValues: {seconds: 30}});
$('#countdownExample .values').html(timer.getTimeValues().toString());
timer.addEventListener('secondsUpdated', function (e) {
    $('#countdownExample .values').html(timer.getTimeValues().toString());
});
timer.addEventListener('targetAchieved', function (e) {
    $('#countdownExample .values').html('KABOOM!!');
});
</script>