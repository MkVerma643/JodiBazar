<?php
include('../check.php');
if (isset($_POST['game_time'])) {


   function num($define_number, $rand_number)
   {
      global $rand_number;

      $num = rand(0, 99);
      if (strlen($num) == 1) {
         $rand_no = "0" . $num;
      } else {
         $rand_no = $num;
      }

      if (in_array($rand_no, $rand_number) or ($rand_no == $define_number)) {
         return num($define_number, $rand_number);
      } else {
         array_push($rand_number, $rand_no);
         return $rand_no;
      }
   }


   $game_time = $_POST['game_time'];
   $game_date = $_POST['game_date'];

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
      array_push($rand_number, $ignore);
   }


   for ($i = 0; $i < 10; $i++) {
      // result calculation of batch zero
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



?>

   <div class="row form-group">
      <div class="col col-md-2"><label for="select" class=" form-control-label">Game00</label></div>
      <?php
      // $batch_0=explode(",",$row['batch_0']);

      for ($i = 0; $i < 10; $i++) {
      ?>
         <div class="col col-md-1"><input type="text" id="batch_0<?php echo $i ?>" name=batch_0[] value="<?php echo $batch_0_result_arr[$i]; ?>" class="is-valid form-control-success form-control number-input" maxlength="4" style="font-size: 12px;"></div>
         <script type="text/javascript">
            $('#batch_1<?php echo $i ?>').keydown(function(e) {

               var value = $('#batch_1<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value < 3)
                  e.preventDefault();
            });
         </script>
      <?php } ?>
   </div>
   <div class="row form-group">
      <div class="col col-md-2"><label for="select" class=" form-control-label">Game10</label></div>
      <?php
      // $batch_1=explode(",",$row['batch_1']);

      for ($i = 0; $i < 10; $i++) {
      ?>
         <div class="col col-md-1"><input type="text" id="batch_1<?php echo $i ?>" name=batch_1[] value="<?php echo $batch_1_result_arr[$i]; ?>" class="is-valid form-control-success form-control number-input" maxlength="4" style="font-size: 12px;"></div>
         <script type="text/javascript">
            $('#batch_1<?php echo $i ?>').keydown(function(e) {

               var value = $('#batch_1<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value < 3)
                  e.preventDefault();
            });
         </script>
      <?php } ?>
   </div>
   <div class="row form-group">
      <div class="col col-md-2"><label for="select" class=" form-control-label">Game20</label></div>
      <?php
      // $batch_2=explode(",",$row['batch_2']);
      for ($i = 0; $i < 10; $i++) { ?>
         <div class="col col-md-1"><input type="text" id="batch_2<?php echo $i ?>" name=batch_2[] value="<?php echo $batch_2_result_arr[$i]; ?>" class="is-valid form-control-success form-control number-input" maxlength="4" style="font-size: 12px;"></div>
         <script type="text/javascript">
            $('#batch_2<?php echo $i ?>').keydown(function(e) {

               var value2 = $('#batch_2<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value2 < 3)
                  e.preventDefault();
            });
         </script>
      <?php } ?>
   </div>
   <div class="row form-group">
      <div class="col col-md-2"><label for="select" class=" form-control-label">Game30</label></div>
      <?php
      // $batch_2=explode(",",$row['batch_2']);
      for ($i = 0; $i < 10; $i++) { ?>
         <div class="col col-md-1"><input type="text" id="batch_3<?php echo $i ?>" name=batch_3[] value="<?php echo $batch_3_result_arr[$i]; ?>" class="is-valid form-control-success form-control number-input" maxlength="4" style="font-size: 12px;"></div>
         <script type="text/javascript">
            $('#batch_3<?php echo $i ?>').keydown(function(e) {

               var value2 = $('#batch_3<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value2 < 3)
                  e.preventDefault();
            });
         </script>
      <?php } ?>
   </div>
   <div class="row form-group">
      <div class="col col-md-2"><label for="select" class=" form-control-label">Game40</label></div>
      <?php
      // $batch_3=explode(",",$row['batch_3']);
      for ($i = 0; $i < 10; $i++) { ?>
         <div class="col col-md-1"><input type="text" id="batch_4<?php echo $i ?>" name=batch_4[] value="<?php echo $batch_4_result_arr[$i]; ?>" class="is-valid form-control-success form-control number-input" maxlength="4" style="font-size: 12px;"></div>
         <script type="text/javascript">
            $('#batch_4<?php echo $i ?>').keydown(function(e) {

               var value3 = $('#batch_4<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value3 < 3)
                  e.preventDefault();

            });
         </script>
      <?php } ?>
   </div>
   <div class="row form-group">
      <div class="col col-md-2"><label for="select" class=" form-control-label">Game50</label></div>
      <?php
      // $batch_3=explode(",",$row['batch_3']);
      for ($i = 0; $i < 10; $i++) { ?>
         <div class="col col-md-1"><input type="text" id="batch_5<?php echo $i ?>" name=batch_5[] value="<?php echo $batch_5_result_arr[$i]; ?>" class="is-valid form-control-success form-control number-input" maxlength="4" style="font-size: 12px;"></div>
         <script type="text/javascript">
            $('#batch_5<?php echo $i ?>').keydown(function(e) {

               var value3 = $('#batch_5<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value3 < 3)
                  e.preventDefault();

            });
         </script>
      <?php } ?>
   </div>
   <div class="row form-group">
      <div class="col col-md-2"><label for="select" class=" form-control-label">Game60</label></div>
      <?php
      // $batch_3=explode(",",$row['batch_3']);
      for ($i = 0; $i < 10; $i++) { ?>
         <div class="col col-md-1"><input type="text" id="batch_6<?php echo $i ?>" name=batch_6[] value="<?php echo $batch_6_result_arr[$i]; ?>" class="is-valid form-control-success form-control number-input" maxlength="4" style="font-size: 12px;"></div>
         <script type="text/javascript">
            $('#batch_6<?php echo $i ?>').keydown(function(e) {

               var value3 = $('#batch_6<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value3 < 3)
                  e.preventDefault();

            });
         </script>
      <?php } ?>
   </div>
   <div class="row form-group">
      <div class="col col-md-2"><label for="select" class=" form-control-label">Game70</label></div>
      <?php
      // $batch_3=explode(",",$row['batch_3']);
      for ($i = 0; $i < 10; $i++) { ?>
         <div class="col col-md-1"><input type="text" id="batch_7<?php echo $i ?>" name=batch_7[] value="<?php echo $batch_7_result_arr[$i]; ?>" class="is-valid form-control-success form-control number-input" maxlength="4" style="font-size: 12px;"></div>
         <script type="text/javascript">
            $('#batch_7<?php echo $i ?>').keydown(function(e) {

               var value3 = $('#batch_7<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value3 < 3)
                  e.preventDefault();

            });
         </script>
      <?php } ?>
   </div>
   <div class="row form-group">
      <div class="col col-md-2"><label for="select" class=" form-control-label">Game80</label></div>
      <?php
      // $batch_3=explode(",",$row['batch_3']);
      for ($i = 0; $i < 10; $i++) { ?>
         <div class="col col-md-1"><input type="text" id="batch_8<?php echo $i ?>" name=batch_8[] value="<?php echo $batch_8_result_arr[$i]; ?>" class="is-valid form-control-success form-control number-input" maxlength="4" style="font-size: 12px;"></div>
         <script type="text/javascript">
            $('#batch_8<?php echo $i ?>').keydown(function(e) {

               var value3 = $('#batch_8<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value3 < 3)
                  e.preventDefault();

            });
         </script>
      <?php } ?>
   </div>
   <div class="row form-group">
      <div class="col col-md-2"><label for="select" class=" form-control-label">Game90</label></div>
      <?php
      // $batch_3=explode(",",$row['batch_3']);
      for ($i = 0; $i < 10; $i++) { ?>
         <div class="col col-md-1"><input type="text" id="batch_9<?php echo $i ?>" name=batch_9[] value="<?php echo $batch_9_result_arr[$i]; ?>" class="is-valid form-control-success form-control number-input" maxlength="4" style="font-size: 12px;"></div>
         <script type="text/javascript">
            $('#batch_9<?php echo $i ?>').keydown(function(e) {

               var value3 = $('#batch_9<?php echo $i ?>').val().length;
               if (e.keyCode == 8 && value3 < 3)
                  e.preventDefault();

            });
         </script>
      <?php } ?>
      </div>
       <script type="text/javascript">
      $(".number-input").keypress(function(e) {
      //if the letter is not digit then display error and don't type anything
      if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which> 57)) {
         //display error message
         return false;
         }
         });
         document.body.addEventListener('keydown', event => {
         if (event.ctrlKey && 'cvxspwuaz'.indexOf(event.key) !== -1) {
         event.preventDefault()
         }
         });
         </script>
      <?php
   }
      ?>