<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <script language ="javascript" >
        var tim;
       
        var min = 0;
        var sec = 6;
        var f = new Date();
        function f1() {
            // alert(f.getHours()) ;
            f2();
            document.getElementById("starttime").innerHTML = "Your started your Exam at " + f.getHours() + ":" + f.getMinutes();          
        }
        function f2() {
            if (parseInt(sec) > 0) {
                sec = parseInt(sec) - 1;
                document.getElementById("showtime").innerHTML = "Your Left Time  is :"+min+" Minutes ," + sec+" Seconds";
                tim = setTimeout("f2()", 1000);
            }
            else {
                if (parseInt(sec) == 0) {
                    min = parseInt(min) - 1;
                    if (parseInt(min) == 0) {
                        clearTimeout(tim);
                        location.href = "default5.aspx";
                    }
                    else {
                        sec = 60;
                        document.getElementById("showtime").innerHTML = "Your Left Time  is :" + min + " Minutes ," + sec + " Seconds";
                        tim = setTimeout("f2()", 1000);
                    }
                } 
            }
        }
    </script>
</head>
<body onload="f1()" >
    <form id="form1" runat="server">
    <div>
      <table width="100%" align="center">
        <tr>
          <td colspan="2">
            <h2>This is head part for showing timer and all other details</h2>
          </td>
        </tr>
        <tr>
          <td>
            <div id="starttime"></div><br />
            <div id="endtime"></div><br />
            <div id="showtime"></div>
          </td>
        </tr>
        <tr>
          <td>
             
              <br />
            
              
          </td>
         
        </tr>
      </table>
      <br />
   

    </div>
    </form>
    <?php
$a=array("red","green","blue","yellow","brown");
$random_keys=array_rand($a,3);
print_r($random_keys);
echo $a[$random_keys[0]]."<br>";
echo $a[$random_keys[1]]."<br>";
echo $a[$random_keys[2]];
echo "<br><br>";

$a1=array("red","green","grey","yellow");
$a2=array("red","green","blue","yellow");

$result=array_diff_key($a1,$a2);
print_r($result);

echo hash("sha256", md5("dasdsfkfskafjasfkaskfbjk"))."<br>" ;
echo md5("str");





                                                /*$result=array_diff_key($row,$comp);
                                                // print_r($result);
                                                $rand_opt = array_rand($result , 4) ;
                                                $rand = array_rand($rand_opt , 4) ;
                                                print_r($rand_opt) ;
                                                echo "<br>";
                                                print_r($rand) ;*/
                                                /*echo $result[$rand_opt[0]];
                                                echo $result[$rand_opt[1]];
                                                echo $result[$rand_opt[2]];
                                                echo $result[$rand_opt[3]];*/
                                                /*$optgrp = $row['a'].",".$row['b'].",".$row['c'].",".$row['d'] ;
                                                $optgrp_arr = explode(",", $optgrp) ;
                                                $rand_opt = array_rand($optgrp_arr , 3) ;
                                                echo $optgrp_arr[$rand_opt[0]]."<br>";
                                                echo $optgrp_arr[$rand_opt[1]]."<br>";
                                                echo $optgrp_arr[$rand_opt[2]]."<br>";
                                                // echo $optgrp_arr[$rand_opt[3]];
                                                // print_r($rand_opt) ;
                                                switch ($rand_opt) {
                                                    case !in_array(0, $rand_opt):
                                                            echo $optgrp_arr[0];
                                                        break;
                                                    case !in_array(1, $rand_opt):
                                                            echo $optgrp_arr[1];
                                                        break;
                                                    case !in_array(2, $rand_opt):
                                                            echo $optgrp_arr[2];
                                                        break;
                                                    case !in_array(3, $rand_opt):
                                                            echo $optgrp_arr[3];
                                                        break;
                                                    
                                                    default:
                                                        # code...
                                                        break;
                                                }*/


                                                
                                                // $comp = array('que_id' => '' , 'sub_name' => '' , 'question' => '' , 'answer' => '' , 'e' => '' , 'xaminer_id' => '' , 'password' => '' , 'status' => '');
?>
</body>
<script type="text/javascript">
    // alert((Math.floor(18/6)+1)*6) ;
</script>
</html>