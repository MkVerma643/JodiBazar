<?php
require_once("../../AJS/includes/db.php");
date_default_timezone_set("Asia/Kolkata"); 
$today_date=date('Y-m-d');  
if(!empty($_GET['report_date']))
{
$today_date=$_GET['report_date'];
}

?>
<?php
$current_time = date('H:i:s');
$s_time = mysqli_query($con, "SELECT `g_time` FROM `game_time` ORDER BY `game_time_id` ASC LIMIT 1");
$s_time_row = mysqli_fetch_array($s_time);
$st=strtotime('-30 minutes',strtotime($s_time_row['g_time']));
$start_t=date('h:i:s',$st);

$end_time = mysqli_query($con, "SELECT `g_time` FROM `game_time` ORDER BY `game_time_id` DESC LIMIT 1");
$end_time_row = mysqli_fetch_array($end_time);

$current_game = $row['game_time'];

if ($current_time > $start_t and $current_time < $end_time_row['g_time'])
{
   $gt = mysqli_query($con, "SELECT `game_time` From `game_time` where `g_time`> '$current_time' limit 1");
   $row = mysqli_fetch_array($gt);
   $current_game = $row['game_time'];
   $start_time = new DateTime($current_game);
   $end_time = new DateTime($current_time);
   $diff = $end_time->diff($start_time);
   $a = $diff->format('%H:%I:%S');

   $timeArr = array_reverse(explode(":", $a));
   $seconds = 0;
   foreach ($timeArr as $key => $value)
   {
       if ($key > 2) break;
       $seconds += pow(60, $key) * $value;
   }
}
else
{

   $d = date('Y-m-d');
   $today = date('Y-m-d');
   if ($today == $d && $current_time < '24:00:00')
   {
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

   foreach ($timeArr as $key => $value)
   {
    if ($key > 2) break;
      $seconds += pow(60, $key) * $value;
   }
}
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>LuckyFour Result Chart</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
         rel="stylesheet" type="text/css" />
   </head>
   <body class="fix-header fix-sidebar">
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
      <link href="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/css/bootstrap.min.css"
         rel="stylesheet" type="text/css" />
      <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.0.3/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
      <style type="text/css">
         .row.rows {
         margin-left: 3px;
         }
         .row{
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
      </style>
      <div class="container-fluid" style="padding-right:0px;padding-left: 0px;">
         <div id="UpdatePanel1">
            <table width="100%">
               <tbody>
                  <tr>
                     <td align="center">
                        <table width="100%" style="background-color: #f9bf25;">
                           <tbody>
                            <tr>
                                  <td align="center">
                                          <div class="row" style="background-color:#002051; height:100%;">
                                            <div class="col-lg-12" style="padding:10px 0;">
                                           
                                               <div class="col-lg-4" ><h4 ><b style="font-size: 24px; color: white;">LuckyFour Result Chart </b></h4></div>
                                              <div class="col-lg-4" ><h5><b style="font-size: 21px;line-height:20px;color: white;">Next Draw Time : <span class="navtext" id="current_game"></span></b></h5></div>
                                              <div class="col-lg-4" ><h5 ><b style="font-size: 21px;line-height:20px;color: white;">Time To Draw : <span class="navtext" id="timer"> </span></b> </h5></div>
                                            </div>
                                          </div>
                                 </td>
                            </tr>
                              <tr>
                                 <td align="center" valign="top" >
                                    <h3 style="color: #000000"> <span class="text-Primary">Online Lottery Result Of Draw Date :</span> <span class="text-secondary"><?php echo date('d-m-Y',strtotime($today_date)) ; ?></span></h3>
                                    <div class="card" >
                                    <table align="center">
                                       <tbody>
                                          <form method="GET">
                                             <tr>
                                                <td>
                                                   <table border="0" align="left" cellpadding="5" cellspacing="0">
                                                      <tbody>
                                                        
                                                         <tr>
                                                            <td align="left" bgcolor="#fff" style="padding: 20px;">
                                                               <input type="date" name="report_date" min="<?php echo date('Y-m-d', strtotime('-15 day', strtotime($today_date)));?>" value="<?php  if(!empty($_GET['report_date'])) {echo $_GET['report_date'];}else{echo $today_date;} ?>" style="height: 35px;min-width:180px;border-radius: 20px;" class="form-control form-control-rounded" =>
                                                            </td>
                                                            <td bgcolor="#fff"><span style="margin: 10px;display: none;"></span></td>
                                                            <td bgcolor="#fff">
                                                               <select id='game_selected' name="game_selected" class="form-control form-control-rounded" style="height: 35px;border-radius: 20px;min-width:180px;">
                                                                  <option value="">Draw Time</option>
                                                                  <?php 
                                                                     $gt=mysqli_query($con,"SELECT * From `game_time` ");
                                                                     
                                                                     while ($row=mysqli_fetch_array($gt)) {
                                                                     
                                                                      ?>
                                                                  <option value='<?php echo $row['game_time'] ?>' <?php if($row['game_time']==$_GET['game_selected']){echo "selected";} ?> ><?php echo $row['game_time'] ?></option>
                                                                  <? } ?>
                                                               </select>
                                                            </td>
                                                         </tr>
                                                      </tbody>
                                                   </table>
                                                </td>
                                                <td bgcolor="#fff"><span style="margin: 10px;display: none;"></span></td>
                                                <td bgcolor="#fff" style="padding: 20px;">
                                                   <input type="submit" name="view_result" value="Show" class="btn btn-primary" style="background-color:#008cff">
                                                </td>
                                             </tr>
                                          </form>
                                       </tbody>
                                    </table>
                                    </div>
                                 </td>
                              </tr>
                           
                              <tr>
                              <tr>
                                 <td align="center" valign="top">
                                    <br>
                                    <?php 
                                       if(!empty($_GET['game_selected']))
                                       {
                                       $qry=mysqli_query($con,"SELECT * FROM `win_card` where `game_time`='".$_GET['game_selected']."' and `win_date`='".$today_date."'  order by `g_time` ASC ");
                                       }
                                       else
                                       {
                                       $qry=mysqli_query($con,"SELECT * FROM `win_card` where `win_date`='".$today_date."'  order by `g_time` ASC ");
                                       }
                                       
                                       while ($row=mysqli_fetch_array($qry)) {

                                          $g_time = strtotime("+24 seconds", strtotime($today_date." ".$row['g_time']));
                                          $g_show_time=date('Y-m-d H:i:s', $g_time);


                                          if( date('Y-m-d H:i:s')>$g_show_time   ){

                                          ?>
                                        <div class="card" style="background: white;">
                                    <table width="90%" class="table" >
                                       <tbody>
                                          <tr>
                                             <td colspan="10" align="center"><b style="color:red;font-size:20px;"><?php echo $row['game_time']; 
                                            // echo " ".$g_show_time; echo " ". date('Y-m-d H:i:s');
                                             ?></b></td>
                                          </tr>
                                          <tr align="center">
                                             <?php $batch_1=explode(",", $row['batch_1']) ;
                                                foreach ($batch_1 as $batch_1_result ) {
                                                
                                                 echo "<td><b style='font-size:18px;'>".$batch_1_result." <br></b></td>";
                                                
                                                }
                                                
                                                ?>
                                          </tr>
                                          <tr align="center">
                                             <?php $batch_2=explode(",", $row['batch_2']) ;
                                                foreach ($batch_2 as $batch_2_result ) {
                                                
                                                 echo "<td><b style='font-size:18px;'>".$batch_2_result." <br></b></td>";
                                                
                                                }
                                                
                                                ?>
                                          </tr>
                                          <tr align="center">
                                             <?php $batch_3=explode(",", $row['batch_3']) ;
                                                foreach ($batch_3 as $batch_3_result ) {
                                                
                                                 echo "<td><b style='font-size:18px;'>".$batch_3_result." <br></b></td>";
                                                
                                                }
                                                
                                                ?>
                                          </tr>
                                       </tbody>
                                    </table>
                                    </div>
                                    <?
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
                                                   $msg_qry=mysqli_query($con,"SELECT * FROM `welcome_msg`");
                                                   
                                                   $msg_row=mysqli_fetch_array($msg_qry);
                                                   
                                                   echo '<b>'.$msg_row['msg'].'</b>';
                                                   
                                                   ?>
                                                </marquee>
                                                </span>
                                             
                                 </td>
                              </tr>
                              <tr>
                                 <td width="980" height="50" align="center" valign="middle" bgcolor="#ccc" class="txt-2">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                       <tbody>
                                          <tr>
                                             <td align="center">
                                                <span style="color: #000000">
                                                Purchase of lottery using this website is strictly prohibited in the states where lotteries are banned. You must be above 18 years to play Online Lottery.
                                                <br>
                                                &nbsp;LFRC all rights reserved.
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
var count='<?php echo $seconds; ?>';
var current_game='<?php echo $current_game; ?>';
var counter=setInterval(timer, 1000);

function timer()

{
// count=count-1;
// if (count == 0)

// {
// window.location.reload();
// }
// alert(re_count);
count=count-1;
if (count == 0)

{
window.location.reload();
}


const formatted = moment.utc(count*1000).format('HH:mm:ss');
document.getElementById("timer").innerHTML=formatted;
document.getElementById("current_game").innerHTML=current_game;

// var dt = new Date();
// var current_time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();
// document.getElementById("current_time").innerHTML=current_time;
}
   
</script>