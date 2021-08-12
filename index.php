<?php
require_once("./AJS/includes/db.php");
date_default_timezone_set("Asia/Kolkata");
$today_date = date('Y-m-d');
if (!empty($_GET['report_date'])) {
   $today_date = $_GET['report_date'];
}

?>
<?php
$current_time = date('H:i:s');
$s_time = mysqli_query($con, "SELECT `g_time` FROM `game_time` ORDER BY `game_time_id` ASC LIMIT 1");
$s_time_row = mysqli_fetch_array($s_time);
$st = strtotime('-30 minutes', strtotime($s_time_row['g_time']));
$start_t = date('h:i:s', $st);

$end_time = mysqli_query($con, "SELECT `g_time` FROM `game_time` ORDER BY `game_time_id` DESC LIMIT 1");
$end_time_row = mysqli_fetch_array($end_time);

$current_game = $row['game_time'];

if ($current_time > $start_t and $current_time < $end_time_row['g_time']) {
   $gt = mysqli_query($con, "SELECT `game_time` From `game_time` where `g_time`> '$current_time' limit 1");
   $row = mysqli_fetch_array($gt);
   $current_game = $row['game_time'];
   $start_time = new DateTime($current_game);
   $end_time = new DateTime($current_time);
   $diff = $end_time->diff($start_time);
   $a = $diff->format('%H:%I:%S');

   $timeArr = array_reverse(explode(":", $a));
   $seconds = 0;
   foreach ($timeArr as $key => $value) {
      if ($key > 2) break;
      $seconds += pow(60, $key) * $value;
   }
} else {

   $d = date('Y-m-d');
   $today = date('Y-m-d');
   if ($today == $d && $current_time < '24:00:00') {
      $current_time = date('Y-m-d H:i:s');
      $date = date('Y-m-d', strtotime(' +1 day'));
   }

   $gt = mysqli_query($con, "SELECT `game_time` From `game_time` order by `game_time_id` ASC limit 1");
   $row = mysqli_fetch_array($gt);
   $current_game = $row['game_time'];

   $start_time = new DateTime($date . " " . $current_game);
   $end_time = new DateTime($current_time);
   $diff = $end_time->diff($start_time);
   $a = $diff->format('%H:%I:%S');

   $timeArr = array_reverse(explode(":", $a));
   $seconds = 0;

   foreach ($timeArr as $key => $value) {
      if ($key > 2) break;
      $seconds += pow(60, $key) * $value;
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Jodi Bazar Result Screen</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body class="fix-header fix-sidebar">
   <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
   <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
   <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
   <style type="text/css">
      .row.rows {
         margin-left: 3px;
      }

      .row {
         margin-right: 0px !important;
      }

      label.form-check-label {
         margin-right: 10px;
         margin-bottom: 0px;
      }

      tr.center td {
         text-align: center;
      }

      table.table.table-bordered th {
         text-align: center;
      }

      .table_th_td {
         border: 1px solid black;
         text-align: center;
         padding: 10px;
         width: 95%;
      }
      
   </style>
   <div class="container-fluid" style="padding-right:0px;padding-left: 0px;">
      <div id="UpdatePanel1">
         <table width="100%">
            <tbody>
               <tr>
                  <td align="center">
                     <table width="100%" style="background-color: #bacfba;">
                        <tbody>
                           <tr>
                              <td align="center">
                                 <div class="row" style="background-color:#888888; height:100%;">
                                    <div class="col-lg-12" style="padding: 0;">
                                       <!-- <h4></h4> -->
                                   </div>
                                 </div>
                              </td>
                           </tr>
                           <tr>
                              <td align="center" valign="top" style="padding:13px">
                              <div class="col-lg-1" style="padding:10px;font-family:Arial" >
                              <button class="btn btn-warning  btn-block mt-3" style="border-radius:25px;border-color:#97144d;background-color:#97144d;">
                                 <a href="http://jodibazar.com/" style="text-decoration: none;color: white;">Jodi Bazar</a></button>
                              </div>
                              <div class="col-lg-1" style="padding:10px;font-family:Arial" >
                              <button class="btn btn-warning  btn-block mt-3" id="refresh" onClick="history.go(0)" style="border-radius:25px;border-color:#97144d;background-color:#97144d;">
                                 Refresh</button>
                              </div>
                              
                                 <div class="col-lg-4"  style="align:left;  ">
                                    <table style="align:left">
                                       <tbody>
                                          <form method="GET">
                                             <tr>
                                                            
                                                         <div style="border-radius:25px;padding:2px; ">
                                                            <td  style="padding:5px; " >

                                                            <!-- <input type="date" name="report_date" min="<?php echo date('Y-m-d', strtotime('-15 day', strtotime($today_date)));?>" 
                                                            value="<?php  if(!empty($_GET['report_date'])) {echo $_GET['report_date'];}else{echo $today_date;} ?>" 
                                                            style="height: 35px;min-width:180px;border-radius: 20px;" class="form-control form-control-rounded" => -->

                                                            <input type="date"  name="report_date"  
                                                            value="<?php  if(!empty($_GET['report_date'])) {echo $_GET['report_date'];}else{echo $today_date;} ?>" 
                                                            style="height: 35px;min-width:150px;border-radius:20px" class="form-control form-control-rounded" = >

                                                            </td>
                                                            <td>
                                                            <select id='game_selected' name="game_selected" class="form-control form-control-rounded" style="height: 35px;border-radius: 20px;min-width:150px;">
                                                                  <option value="">Select Time</option> 
                                                                  <?php 
                                                                     $gt=mysqli_query($con,"SELECT * From `game_time` ");
                                                                     
                                                                     while ($row=mysqli_fetch_array($gt)) {
                                                                     
                                                                      ?>
                                                                  <option value='<?php echo $row['game_time'] ?>' <?php if($row['game_time']==$_GET['game_selected']){echo "selected";} ?> ><?php echo $row['game_time'] ?></option>
                                                                  <?php } ?>
                                                               </select>
                                                            </td>
                                                            <!-- <td bgcolor="">
                                                               <!-- <select id='game_selected' name="game_selected" class="form-control form-control-rounded" style="height: 35px;border-radius: 20px;min-width:180px;">
                                                                  <option value="">Draw Time</option>
                                                                  <?php 
                                                                     $gt=mysqli_query($con,"SELECT * From `game_time` ");
                                                                     
                                                                     while ($row=mysqli_fetch_array($gt)) {
                                                                     
                                                                      ?>
                                                                  <option value='<?php echo $row['game_time'] ?>' <?php if($row['game_time']==$_GET['game_selected']){echo "selected";} ?> ><?php echo $row['game_time'] ?></option>
                                                                  <?php } ?>
                                                               </select>
                                                            <!-- </td> -->
                                                            <td bgcolor="" style="padding: 7px;">
                                                            <input type="submit" name="view_result" value="Submit" class="btn btn-warning" style="background-color:#97144d; min-width:100px;border-radius:25px; color:white;border-color: #97144d;font-family:Arial;">
                                                            </td>
                                                            </div>
                                                         </tr>                                               
                                             </tr>
                                          </form>
                                       </tbody>
                                    </table>
                                 </div>
                                 <div class="col-lg-1" style="padding:12px"></div>                           
                                 <div class="col-lg-2" style="padding:12px">
                                    <button class="btn btn-warning btn-block mt-3" id="refresh" style="font-size: 18px;line-height:18px;border-radius:25px ;color: white;background-color:#97144d;min-width:300px;border-color: #97144d;font-family:Arial;">Current Draw Time: <span  id="current_game"></span></button>
                                 </div>
                                 <div class="col-lg-1" style="padding:12px"></div>                           
                                 <div class="col-lg-2" style="padding:0px">
                                 <div style="padding:12px">
                                    <button class="btn btn-warning btn-block mt-3" style="font-size: 18px;line-height:18px;color: white;border-radius:25px;background-color:#97144d;min-width:215px;border-color: #97144d;font-family:Arial">Time Left: <span  id="timer"> </span></button>
                                    </div>
                                 </div>

                              </td>
                           </tr>
                           <tr >
                              <td align="center" valign="top">
                                 <br>
                                 <?php
                                 if (!empty($_GET['game_selected'])) {
                                    $qry = mysqli_query($con, "SELECT * FROM `win_card` where `game_time`='" . $_GET['game_selected'] . "' and `win_date`='" . $today_date . "'  order by `g_time` ASC ");
                                 } else {
                                    $qry = mysqli_query($con, "SELECT * FROM `win_card` where `win_date`='" . $today_date . "'  order by `g_time` ASC ");
                                 }

                                 while ($row = mysqli_fetch_array($qry)) {

                                    $g_time = strtotime("+24 seconds", strtotime($today_date . " " . $row['g_time']));
                                    $g_show_time = date('Y-m-d H:i:s', $g_time);


                                    if (date('Y-m-d H:i:s') > $g_show_time) {

                                 ?>
                                       <div class="card" style="background: #bacfba;" width="90%">
                                       <div>&nbsp;</div>
                                          <table width="80%" class="table_th_td" style="border: 1px solid black;">
                                             <tbody width="80%" style="border: 1px solid black;" style="border: 1px solid black;">
                                                <tr style="background:#002051 ;"  style="border: 1px solid black;">
                                                   <td colspan="11" align="center" class="table_th_td"><b style="color:white;font-size:20px;">Draw Time: <?php echo $row['game_time'];?>
                                                   &nbsp;-&nbsp;&nbsp;Draw Date: <?php echo " ". date('d-m-Y');
                                                                                                                        ?></b></td>
                                                </tr>
                                                <tr align="center" class="table_th_td">
                                                   <?php $batch_0 = explode(",", $row['batch_0']);
                                                   echo "<td style='background:#fcf8e3;padding: 10px;border-right: 1px solid black'><b style='font-size:20px;'>00<br></b></td>";
                                                   foreach ($batch_0 as $batch_0_result) {

                                                      echo "<td style='font-size:18px;padding: 10px;border-right: 1px solid black; background:#f2f2f2''><b style='font-size:20px;'>" . $batch_0_result . " <br></b></td>";
                                                   }

                                                   ?>
                                                </tr>
                                                <tr align="center" class="table_th_td">
                                                   <?php $batch_1 = explode(",", $row['batch_1']);
                                                   echo "<td style='background:#fcf8e3;padding: 10px;border-right: 1px solid black''><b style='font-size:20px;'>10<br></b></td>";

                                                   foreach ($batch_1 as $batch_1_result) {

                                                      echo "<td style='font-size:18px;padding: 10px;border-right: 1px solid black;background:#f2f2f2''><b style='font-size:20px;'>" . $batch_1_result . " <br></b></td>";
                                                   }

                                                   ?>
                                                </tr>
                                                <tr align="center" class="table_th_td">
                                                   <?php $batch_2 = explode(",", $row['batch_2']);
                                                   echo "<td style='background:#fcf8e3;padding: 10px;border-right: 1px solid black''><b style='font-size:20px;'>20<br></b></td>";

                                                   foreach ($batch_2 as $batch_2_result) {

                                                      echo "<td style='font-size:18px;padding: 10px;border-right: 1px solid black;background:#f2f2f2''><b style='font-size:20px;'>" . $batch_2_result . " <br></></td>";
                                                   }

                                                   ?>
                                                </tr>
                                                <tr align="center" class="table_th_td">
                                                   <?php $batch_3 = explode(",", $row['batch_3']);
                                                   echo "<td style='background:#fcf8e3;padding: 10px;border-right: 1px solid black''><b style='font-size:20px;'>30<br></b></td>";

                                                   foreach ($batch_3 as $batch_3_result) {

                                                      echo "<td style='font-size:18px;padding: 10px;border-right: 1px solid black;background:#f2f2f2''><b style='font-size:20px;'>" . $batch_3_result . " <br></></td>";
                                                   }

                                                   ?>
                                                </tr>
                                                <tr align="center" class="table_th_td">
                                                   <?php $batch_4 = explode(",", $row['batch_4']);
                                                   echo "<td style='background:#fcf8e3;padding: 10px;border-right: 1px solid black''><b style='font-size:20px;'>40<br></b></td>";

                                                   foreach ($batch_4 as $batch_4_result) {

                                                      echo "<td style='font-size:18px;padding: 10px;border-right: 1px solid black;background:#f2f2f2''><b style='font-size:20px;'>" . $batch_4_result . " <br></></td>";
                                                   }

                                                   ?>
                                                </tr>
                                                <tr align="center" class="table_th_td">
                                                   <?php $batch_5 = explode(",", $row['batch_5']);
                                                   echo "<td style='background:#fcf8e3;padding: 10px;border-right: 1px solid black''><b style='font-size:20px;'>50<br></b></td>";
                                                   foreach ($batch_5 as $batch_5_result) {

                                                      echo "<td style='font-size:18px;padding: 10px;border-right: 1px solid black;background:#f2f2f2''><b style='font-size:20px;'>" . $batch_5_result . " <br></b></td>";
                                                   }

                                                   ?>
                                                </tr>
                                                <tr align="center" class="table_th_td">
                                                   <?php $batch_6 = explode(",", $row['batch_6']);
                                                   echo "<td style='background:#fcf8e3;padding: 10px;border-right: 1px solid black''><b style='font-size:20px;'>60<br></b></td>";
                                                   foreach ($batch_6 as $batch_6_result) {

                                                      echo "<td style='font-size:18px;padding: 10px;border-right: 1px solid black;background:#f2f2f2''><b style='font-size:20px;'>" . $batch_6_result . " <br></b></td>";
                                                   }

                                                   ?>
                                                </tr>
                                                <tr align="center" class="table_th_td">
                                                   <?php $batch_7 = explode(",", $row['batch_7']);
                                                   echo "<td style='background:#fcf8e3;padding: 10px;border-right: 1px solid black''><b style='font-size:20px;'>70<br></b></td>";
                                                   foreach ($batch_7 as $batch_7_result) {

                                                      echo "<td style='font-size:18px;padding: 10px;border-right: 1px solid black;background:#f2f2f2''><b style='font-size:20px;'>" . $batch_7_result . " <br></b></td>";
                                                   }

                                                   ?>
                                                </tr>
                                                <tr align="center" class="table_th_td">
                                                   <?php $batch_8 = explode(",", $row['batch_8']);
                                                   echo "<td style='background:#fcf8e3;padding: 10px;border-right: 1px solid black''><b style='font-size:20px;'>80<br></b></td>";
                                                   foreach ($batch_8 as $batch_8_result) {

                                                      echo "<td style='font-size:18px;padding: 10px;border-right: 1px solid black;background:#f2f2f2''><b style='font-size:20px;'>" . $batch_8_result . " <br></b></td>";
                                                   }

                                                   ?>
                                                </tr>
                                                <tr align="center" class="table_th_td">
                                                   <?php $batch_9 = explode(",", $row['batch_9']);
                                                   echo "<td style='background:#fcf8e3;padding: 10px;border-right: 1px solid black''><b style='font-size:20px;'>90<br></b></td>";
                                                   foreach ($batch_9 as $batch_9_result) {

                                                      echo "<td style='font-size:18px;padding: 10px;border-right: 1px solid black;background:#f2f2f2''><b style='font-size:20px;'>" . $batch_9_result . " <br></b></td>";
                                                   }

                                                   ?>
                                                </tr>
                                             
                                             </tbody>
                                          </table>
                                       </div>
                                 <?php
                                    }
                                 }
                                 ?>
                                 <br>
                              </td>
                           </tr>
                           <tr>
                              <td width="980" height="50" align="center" valign="middle" bgcolor="#eee" class="txt-2">

                                 <span style="color: #000000">
                                    <marquee width="100%" direction="left" height="20px">
                                       <?php
                                       $msg_qry = mysqli_query($con, "SELECT * FROM `welcome_msg`");

                                       $msg_row = mysqli_fetch_array($msg_qry);

                                       echo '<b>' . $msg_row['msg'] . '</b>';

                                       ?>
                                    </marquee>
                                 </span>

                              </td>
                           </tr>
                           <tr>
                              <td width="980" height="50" align="center" valign="middle" bgcolor="#fcf8e3" class="txt-2">
                                 <table border="0" cellpadding="0" cellspacing="0">
                                    <tbody>
                                       <tr>
                                          <td align="center">
                                             <span style="color: #000000">
                                             <b>DISCLAIMER:</b> VIEWING THIS WEBSITE IS ON YOUR OWN RISK. ALL THE INFORMATION HERE IS BASED ON NUMERIC ASTROLOGY THAT IS NOT RELATED TO ANY TYPE OF GAMBLING.<br>
                                             WE WARN YOU THAT GAMBLING IN OUR COUNTRY MAY BE BANNED OR ILLEGAL. WE ARE NOT RESPONSIBLE FOR ANY ISSUE OR SCAM.<br> 
                                             WE RESPECT ALL COUNTRY RULES/LAWS. IF YOU NOT AGREE WITH OUR SITE DISCLAIMER. PLEASE QUIT IMMEDIATELY NOW.     
                                                <!-- &nbsp;<b>JodiBazar,</b>&nbsp; All rights reserved. -->
                                             </span>
                                          </td>
                                       </tr>
                                    </tbody>
                                 </table>
                              </td>
                           </tr>
                        </tbody>
                     </table>
                  </td>
               </tr>
            </tbody>
         </table>
      </div>
   </div>
</body>

</html>

<script>
   var count = '<?php echo $seconds; ?>';
   var current_game = '<?php echo $current_game; ?>';
   var counter = setInterval(timer, 1000);

   function timer()

   {
      // count=count-1;
      // if (count == 0)

      // {
      // window.location.reload();
      // }
      // alert(re_count);
      count = count - 1;
      if (count == 0)

      {
         window.location.reload();
      }


      const formatted = moment.utc(count * 1000).format('HH:mm:ss');
      document.getElementById("timer").innerHTML = formatted;
      document.getElementById("current_game").innerHTML = current_game;

      // var dt = new Date();
      // var current_time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
      // document.getElementById("current_time").innerHTML=current_time;
   }
</script>