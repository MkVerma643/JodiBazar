<?php
include('AJS/includes/db.php');
date_default_timezone_set("Asia/Kolkata");
$game_date = date('Y-m-d');
$game_time = date('h:i A');
//$game_time="01:25 PM";
//
//$in=mysqli_query($con,"INSERT INTO `test`(`test`, `create_at`) VALUES ('2','".date('h:i A')."')");

$select = mysqli_query($con, "SELECT `game_time` FROM `game_time` WHERE `game_time`='" . $game_time . "'");

if (mysqli_num_rows($select) > 0) {
  $check_win = mysqli_query($con, "SELECT `id` FROM `win_card` WHERE `game_time`='" . $game_time . "' and `win_date`='" . $game_date . "' ");
  if (mysqli_num_rows($check_win) < 1) {

    $rand_number = [];
    $batch_0_result_arr = [];
    $batch_1_result_arr = [];
    $batch_2_result_arr = [];
    $batch_3_result_arr = [];
    $batch_4_result_arr = [];
    $batch_5_result_arr = [];
    $batch_6_result_arr = [];
    $batch_7_result_arr = [];
    $batch_8_result_arr = [];
    $batch_9_result_arr = [];

    $check_num = mysqli_query($con, "SELECT * FROM `result_number_setting` WHERE `game_time`='" . $game_time . "' and `added_date`='" . $game_date . "' ");
    $row = mysqli_fetch_array($check_num);
    $batch_0_old = explode(",", $row['batch_0']);
    $batch_1_old = explode(",", $row['batch_1']);
    $batch_2_old = explode(",", $row['batch_2']);
    $batch_3_old = explode(",", $row['batch_3']);
    $batch_4_old = explode(",", $row['batch_4']);
    $batch_5_old = explode(",", $row['batch_5']);
    $batch_6_old = explode(",", $row['batch_6']);
    $batch_7_old = explode(",", $row['batch_7']);
    $batch_8_old = explode(",", $row['batch_8']);
    $batch_9_old = explode(",", $row['batch_9']);

    $ignore_number = explode(",", $row['ignore_number']);

    foreach ($ignore_number as $ignore) {
      // array_push($rand_number, $ignore);
      array_push($ignore_number, $ignore);
    }


    for ($i = 0; $i < 10; $i++) {
      // result calculation of batch Zero
      $b_0_d = substr($batch_0_old[$i], 2); //batch one predefine data

      if (!empty($b_0_d)) {
        array_push($rand_number, $b_0_d);
      }
      
      // result calculation of batch one
      $b_1_d = substr($batch_1_old[$i], 2); //batch one predefine data

      if (!empty($b_1_d)) {
        array_push($rand_number, $b_1_d);
      }

      // result calculation of batch two
      $b_2_d = substr($batch_2_old[$i], 2);  // batch two predefine data

      if (!empty($b_2_d)) {
        array_push($rand_number, $b_2_d);
      }
      // result calculation of batch three
      $b_3_d = substr($batch_3_old[$i], 2);  // batch three predefine data

      if (!empty($b_3_d)) {
        array_push($rand_number, $b_3_d);
      }
      // result calculation of batch 4
      $b_4_d = substr($batch_4_old[$i], 2);  // batch three predefine data

      if (!empty($b_4_d)) {
        array_push($rand_number, $b_4_d);
      }
      // result calculation of batch 5
      $b_5_d = substr($batch_5_old[$i], 2);  // batch three predefine data

      if (!empty($b_5_d)) {
        array_push($rand_number, $b_5_d);
      }
      // result calculation of batch 6
      $b_6_d = substr($batch_6_old[$i], 2);  // batch three predefine data

      if (!empty($b_6_d)) {
        array_push($rand_number, $b_6_d);
      }
      // result calculation of batch 7
      $b_7_d = substr($batch_7_old[$i], 2);  // batch three predefine data

      if (!empty($b_7_d)) {
        array_push($rand_number, $b_7_d);
      }
      // result calculation of batch 8
      $b_8_d = substr($batch_8_old[$i], 2);  // batch three predefine data

      if (!empty($b_8_d)) {
        array_push($rand_number, $b_8_d);
      }
      // result calculation of batch 9
      $b_9_d = substr($batch_9_old[$i], 2);  // batch three predefine data

      if (!empty($b_9_d)) {
        array_push($rand_number, $b_9_d);
      }
    }




    for ($i = 0; $i < 10; $i++) {

      // result calculation of batch 0
      $b_0 = $batch_0_old[$i];
      $b_0_n = substr($batch_0_old[$i], 2); //batch one predefine data

      if (empty($b_0_n)) {

        $row_0_no = num($b_0_n, $rand_number);
        $final_b_0 = "0" . $i . $row_0_no;
        array_push($batch_0_result_arr, $final_b_0);
      } else {
        // $b_1_n=substr($b_1,2)
        array_push($rand_number, $b_0_n);
        array_push($batch_0_result_arr, $b_0);
      }

      // result calculation of batch one
      $b_1 = $batch_1_old[$i];
      $b_1_n = substr($batch_1_old[$i], 2); //batch one predefine data

      if (empty($b_1_n)) {

        $row_1_no = num($b_1_n, $rand_number);
        $final_b_1 = "1" . $i . $row_1_no;
        array_push($batch_1_result_arr, $final_b_1);
      } else {
        // $b_1_n=substr($b_1,2)
        array_push($rand_number, $b_1_n);
        array_push($batch_1_result_arr, $b_1);
      }

      // result calculation of batch two
      $b_2 = $batch_2_old[$i];
      $b_2_n = substr($batch_2_old[$i], 2);  // batch two predefine data

      if (empty($b_2_n)) {

        $row_2_no = num($b_2_n, $rand_number);

        $final_b_2 = "2" . $i . $row_2_no;
        array_push($batch_2_result_arr, $final_b_2);
      } else {
        // $b_2_n=substr($b_2, 2)
        array_push($rand_number, $b_2_n);
        array_push($batch_2_result_arr, $b_2);
      }

      // result calculation of batch three
      $b_3 = $batch_3_old[$i];
      $b_3_n = substr($batch_3_old[$i], 2);  // batch three predefine data

      if (empty($b_3_n)) {
        $row_3_no = num($b_3_n, $rand_number);

        $final_b_3 = "3" . $i . $row_3_no;
        array_push($batch_3_result_arr, $final_b_3);
      } else {
        // $b_3_n=substr($b_3, 2)
        array_push($rand_number, $b_3_n);
        array_push($batch_3_result_arr, $b_3);
      }

      // result calculation of batch 4
      $b_4 = $batch_4_old[$i];
      $b_4_n = substr($batch_4_old[$i], 2);  // batch three predefine data

      if (empty($b_4_n)) {
        $row_4_no = num($b_4_n, $rand_number);

        $final_b_4 = "4" . $i . $row_4_no;
        array_push($batch_4_result_arr, $final_b_4);
      } else {
        // $b_3_n=substr($b_3, 2)
        array_push($rand_number, $b_4_n);
        array_push($batch_4_result_arr, $b_4);
      }

      // result calculation of batch 5
      $b_5 = $batch_5_old[$i];
      $b_5_n = substr($batch_5_old[$i], 2);  // batch three predefine data

      if (empty($b_5_n)) {
        $row_5_no = num($b_5_n, $rand_number);

        $final_b_5 = "5" . $i . $row_5_no;
        array_push($batch_5_result_arr, $final_b_5);
      } else {
        // $b_3_n=substr($b_3, 2)
        array_push($rand_number, $b_5_n);
        array_push($batch_5_result_arr, $b_5);
      }

      // result calculation of batch 6
      $b_6 = $batch_6_old[$i];
      $b_6_n = substr($batch_6_old[$i], 2);  // batch three predefine data

      if (empty($b_6_n)) {
        $row_6_no = num($b_6_n, $rand_number);

        $final_b_6 = "6" . $i . $row_6_no;
        array_push($batch_6_result_arr, $final_b_6);
      } else {
        // $b_3_n=substr($b_3, 2)
        array_push($rand_number, $b_6_n);
        array_push($batch_6_result_arr, $b_6);
      }

      // result calculation of batch 7
      $b_7 = $batch_7_old[$i];
      $b_7_n = substr($batch_7_old[$i], 2);  // batch three predefine data

      if (empty($b_7_n)) {
        $row_7_no = num($b_7_n, $rand_number);

        $final_b_7 = "7" . $i . $row_7_no;
        array_push($batch_7_result_arr, $final_b_7);
      } else {
        // $b_3_n=substr($b_3, 2)
        array_push($rand_number, $b_7_n);
        array_push($batch_7_result_arr, $b_7);
      }

      // result calculation of batch 8
      $b_8 = $batch_8_old[$i];
      $b_8_n = substr($batch_8_old[$i], 2);  // batch three predefine data

      if (empty($b_8_n)) {
        $row_8_no = num($b_8_n, $rand_number);

        $final_b_8 = "8" . $i . $row_8_no;
        array_push($batch_8_result_arr, $final_b_8);
      } else {
        // $b_3_n=substr($b_3, 2)
        array_push($rand_number, $b_8_n);
        array_push($batch_8_result_arr, $b_8);
      }

      // result calculation of batch 9
      $b_9 = $batch_9_old[$i];
      $b_9_n = substr($batch_9_old[$i], 2);  // batch three predefine data

      if (empty($b_9_n)) {
        $row_9_no = num($b_9_n, $rand_number);

        $final_b_9 = "9" . $i . $row_9_no;
        array_push($batch_9_result_arr, $final_b_9);
      } else {
        // $b_3_n=substr($b_3, 2)
        array_push($rand_number, $b_9_n);
        array_push($batch_9_result_arr, $b_9);
      }
    }

    $batch_0_result = implode(",", $batch_0_result_arr);
    $batch_1_result = implode(",", $batch_1_result_arr);
    $batch_2_result = implode(",", $batch_2_result_arr);
    $batch_3_result = implode(",", $batch_3_result_arr);
    $batch_4_result = implode(",", $batch_4_result_arr);
    $batch_5_result = implode(",", $batch_5_result_arr);
    $batch_6_result = implode(",", $batch_6_result_arr);
    $batch_7_result = implode(",", $batch_7_result_arr);
    $batch_8_result = implode(",", $batch_8_result_arr);
    $batch_9_result = implode(",", $batch_9_result_arr);


    $insert_result = mysqli_query($con, "INSERT INTO `win_card`(`game_time`, `batch_0`, `batch_1`, `batch_2`, `batch_3`,`batch_4`,`batch_5`,`batch_6`,`batch_7`,`batch_8`,`batch_9`, `win_date`, `added_time`, `type`,`g_time`) VALUES ('$game_time','" . $batch_0_result . "','" . $batch_1_result . "','" . $batch_2_result . "','" . $batch_3_result . "','" . $batch_4_result . "','" . $batch_5_result . "','" . $batch_6_result . "','" . $batch_7_result . "','" . $batch_8_result . "','" . $batch_9_result . "','" . date('Y-m-d') . "','" . date('h:i A') . "','Auto','" . date('H:i:s') . "')");
  }
}


function num($define_number, $rand_number)
{
  global $rand_number;
  global $ignore_number;
  $count = 0;

  $num=rand(0,99);
    if(strlen($num)==1){
      $rand_no="0".$num;
    }
    else{
       $rand_no=$num;
    }

  if(!in_array($rand_no,$rand_number) and !in_array($rand_no,$ignore_number)){
    array_push($rand_number,$rand_no);
    $count = $count + 1;
    return $rand_no; 
  }
  elseif(in_array($rand_no,$rand_number) and !in_array($rand_no,$ignore_number) and $count < 2){
    if(($rand_no == $define_number)){
      return num($define_number,$rand_number);
     }
   else{
    array_push($rand_number,$rand_no);
    $count = $count + 1;
    return $rand_no;
   }
  }
  else{
    if(!in_array($rand_no,$ignore_number)){
      array_push($rand_number,$rand_no);
      return $rand_no;
    }
    else{
      return num($define_number,$rand_number);
    }
  }

}
