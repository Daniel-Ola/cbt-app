<script type="text/javascript" src="tinymce.min.js"></script>
<script src="jquery.js"></script>

<div id="ta">
  <p>This is the content that I have</p>
</div>
<button id="btn1">Get content with tinymce</button><br /><br />
<button id="btn2">Get content with the help of jQuery (still using tinymce)</button><br /><br />
<button id="btn3">Get content Only with jQuery <span style="background: red; color: white;">(Dont really use this!)</span></button>

<?php echo count(explode(" ", "50% 15% 0% 0% 40% 40% 25% 65% 25% 35% 0% 0% 0% 0% 0% 50% 40% 40% 80% 0% 45% 0% 25% 70% 40% 45% 20% 0% 70% 60% 50% 50% 35% 0% 45% 0% 40% 60% 0% 65% 45% 0% 0%")) ; ?>









<?php
require_once("../php/dbconnect.php") ;
$connect = dbconnect() ;
$array = array() ;
$query = mysqli_query($connect , "SELECT matric FROM users WHERE course = 'mth101' AND checkif = '1' ") ;
while($fetch = mysqli_fetch_assoc($query)){
    // print_r($fetch) ;
    array_push($array, $fetch) ;
}
print_r($array) ;
foreach ($array as $key) {
    echo $key['matric']."<br><br>" ;
}
/*$num = count($array) ;
for ($i=0; $i < $num ; $i++) { 
    echo $array[$i]['matric']."<br><br>";
    $matric = $array[$i]['matric'] ;
    $query2 = mysqli_query($connect , "SELECT * FROM users WHERE matric = '$matric' ") ;
    while($fetch2 = mysqli_fetch_assoc($query2))
    {
        echo $fetch2['percent']."<br><br>";
    }
}*/

?>





















<!-- https://dove.whogohost.com:2083/cpsess2034569183/frontend/paper_lantern/filemanager/index.html# -->

<script>

$(function() {
    tinymce.init({
        selector: "#ta",
        contextmenu: false,
        plugins: "textcolor link",
        font_formats: "Sans Serif = arial, helvetica, sans-serif;Serif = times new roman, serif;Fixed Width = monospace;Wide = arial black, sans-serif;Narrow = arial narrow, sans-serif;Comic Sans MS = comic sans ms, sans-serif;Garamond = garamond, serif;Georgia = georgia, serif;Tahoma = tahoma, sans-serif;Trebuchet MS = trebuchet ms, sans-serif;Verdana = verdana, sans-serif",
        toolbar: "fontselect | fontsizeselect | bold italic underline | forecolor | numlist bullist | alignleft aligncenter alignright alignjustify | outdent indent | link unlink | undo redo"
    });

    $('#btn1').click(function() {
        console.log(tinyMCE.activeEditor.getContent());
    });
    
    $('#btn2').click(function() {
        console.log(tinyMCE.editors[$('#ta').attr('id')].getContent());
    });
    
    $('#btn3').click(function() {
        alert('You should really NOT use this option');
        console.log($('#ta_ifr')[0].contentDocument.body.innerHTML);
    });
});
</script>
