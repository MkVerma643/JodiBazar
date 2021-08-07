<?php 
   include('../check.php');
   if(isset($_POST['game_time']))
   { 
    $game_time=$_POST['game_time'];
    $check=mysqli_query($con,"SELECT * FROM `result_number_setting` where `game_time`='$game_time' and `added_date`='".date('Y-m-d')."' ");
    $row=mysqli_fetch_array($check);
   
   ?>
<div class="row form-group">
      <div class="col col-md-3"><label for="ignore_number" class=" form-control-label">Number To Ignore</label></div>
      <div class="col-md-6">
        <textarea  cols="60" rows="4" name="ignore_number" id="ignore_number" ><?php  echo $row['ignore_number']; ?></textarea>
      </div>
   </div>

   <div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game00</label></div>
   <?php 
      $batch_0=explode(",",$row['batch_0']);
      
         for ($i=0; $i <10 ; $i++) { 
          if(empty($batch_0[$i]))
          {
              $batch_0_value="0".$i;
          }
          else
          {
             $batch_0_value=$batch_0[$i];
          }
      ?>
   <div class="col col-md-1"><input type="text" id="batch_0<?php echo $i ?>" name=batch_0[] value="<?php echo $batch_0_value; ?>" class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4" / ></div>
   <script type="text/javascript">
      $('#batch_0<?php echo $i ?>').keydown(function(e)
        {
      
         var value =  $('#batch_0<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value < 3)
             e.preventDefault();
       });
   </script>
   <?php 
      } ?>
</div>
<div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game10</label></div>
   <?php 
      $batch_1=explode(",",$row['batch_1']);
      
         for ($i=0; $i <10 ; $i++) { 
          if(empty($batch_1[$i]))
          {
              $batch_1_value="1".$i;
          }
          else
          {
             $batch_1_value=$batch_1[$i];
          }
      ?>
   <div class="col col-md-1"><input type="text" id="batch_1<?php echo $i ?>" name=batch_1[] value="<?php echo $batch_1_value; ?>" class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4" / ></div>
   <script type="text/javascript">
      $('#batch_1<?php echo $i ?>').keydown(function(e)
        {
      
         var value1 =  $('#batch_1<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value1 < 3)
             e.preventDefault();
       });
   </script>
   <?php 
      } ?>
</div>
<div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game20</label></div>
   <?php 
      $batch_2=explode(",",$row['batch_2']);
      
         for ($i=0; $i <10 ; $i++) { 
          if(empty($batch_2[$i]))
          {
              $batch_2_value="2".$i;
          }
          else
          {
             $batch_2_value=$batch_2[$i];
          }
      ?>
   <div class="col col-md-1"><input type="text" id="batch_2<?php echo $i ?>" name=batch_2[] value="<?php echo $batch_2_value; ?>" class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4" / ></div>
   <script type="text/javascript">
      $('#batch_2<?php echo $i ?>').keydown(function(e)
        {
      
         var value2 =  $('#batch_2<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value2 < 3)
             e.preventDefault();
       });
   </script>
   <?php 
      } ?>
</div>
<div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game30</label></div>
   <?php 
      $batch_3=explode(",",$row['batch_3']);
         for ($i=0; $i <10 ; $i++) { 
           if(empty($batch_3[$i]))
          {
              $batch_3_value="3".$i;
          }
          else
          {
             $batch_3_value=$batch_3[$i];
          }
          ?>
   <div class="col col-md-1"><input type="text" id="batch_3<?php echo $i ?>" name=batch_3[]  value="<?php echo $batch_3_value; ?>"  class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4"></div>
   <script type="text/javascript">
      $('#batch_3<?php echo $i ?>').keydown(function(e)
        {
      
         var value3 =  $('#batch_3<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value3 < 3)
             e.preventDefault();
       });
   </script>
   <?php } ?>
</div>
<div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game40</label></div>
   <?php 
      $batch_4=explode(",",$row['batch_4']);
         for ($i=0; $i <10 ; $i++) { 
           if(empty($batch_4[$i]))
          {
              $batch_4_value="4".$i;
          }
          else
          {
             $batch_4_value=$batch_4[$i];
          }
          ?>
   <div class="col col-md-1"><input type="text" id="batch_4<?php echo $i ?>" name=batch_4[]  value="<?php echo $batch_4_value; ?>"  class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4"></div>
   <script type="text/javascript">
      $('#batch_4<?php echo $i ?>').keydown(function(e)
        {
      
         var value4 =  $('#batch_4<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value4 < 3)
             e.preventDefault();
       });
   </script>
   <?php } ?>
</div>
<div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game50</label></div>
   <?php 
      $batch_5=explode(",",$row['batch_5']);
         for ($i=0; $i <10 ; $i++) {
          if(empty($batch_5[$i]))
          {
              $batch_5_value="5".$i;
          }
          else
          {
             $batch_5_value=$batch_5[$i];
          }
           ?>
   <div class="col col-md-1"><input type="text" id="batch_5<?php echo $i ?>" name=batch_5[] value="<?php echo $batch_5_value; ?>"  class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4" ></div>
   <script type="text/javascript">
      $('#batch_5<?php echo $i ?>').keydown(function(e)
        {
      
         var value5 =  $('#batch_5<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value5 < 3)
             e.preventDefault();
       });
     
   </script>
   <?php } ?>
</div>
<div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game60</label></div>
   <?php 
      $batch_6=explode(",",$row['batch_6']);
         for ($i=0; $i <10 ; $i++) {
          if(empty($batch_6[$i]))
          {
              $batch_6_value="6".$i;
          }
          else
          {
             $batch_6_value=$batch_6[$i];
          }
           ?>
   <div class="col col-md-1"><input type="text" id="batch_6<?php echo $i ?>" name=batch_6[] value="<?php echo $batch_6_value; ?>"  class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4" ></div>
   <script type="text/javascript">
      $('#batch_6<?php echo $i ?>').keydown(function(e)
        {
      
         var value6 =  $('#batch_6<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value6 < 3)
             e.preventDefault();
       });
     
   </script>
   <?php } ?>
</div>
<div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game70</label></div>
   <?php 
      $batch_7=explode(",",$row['batch_7']);
         for ($i=0; $i <10 ; $i++) {
          if(empty($batch_7[$i]))
          {
              $batch_7_value="7".$i;
          }
          else
          {
             $batch_7_value=$batch_7[$i];
          }
           ?>
   <div class="col col-md-1"><input type="text" id="batch_7<?php echo $i ?>" name=batch_7[] value="<?php echo $batch_7_value; ?>"  class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4" ></div>
   <script type="text/javascript">
      $('#batch_7<?php echo $i ?>').keydown(function(e)
        {
      
         var value7 =  $('#batch_7<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value7 < 3)
             e.preventDefault();
       });
     
   </script>
   <?php } ?>
</div>
<div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game80</label></div>
   <?php 
      $batch_8=explode(",",$row['batch_8']);
         for ($i=0; $i <10 ; $i++) {
          if(empty($batch_8[$i]))
          {
              $batch_8_value="8".$i;
          }
          else
          {
             $batch_8_value=$batch_8[$i];
          }
           ?>
   <div class="col col-md-1"><input type="text" id="batch_8<?php echo $i ?>" name=batch_8[] value="<?php echo $batch_8_value; ?>"  class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4" ></div>
   <script type="text/javascript">
      $('#batch_8<?php echo $i ?>').keydown(function(e)
        {
      
         var value8 =  $('#batch_8<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value8 < 3)
             e.preventDefault();
       });
     
   </script>
   <?php } ?>
</div>
<div class="row form-group">
   <div class="col col-md-2"><label for="select" class=" form-control-label">Game90</label></div>
   <?php 
      $batch_9=explode(",",$row['batch_9']);
         for ($i=0; $i <10 ; $i++) {
          if(empty($batch_9[$i]))
          {
              $batch_9_value="9".$i;
          }
          else
          {
             $batch_9_value=$batch_9[$i];
          }
           ?>
   <div class="col col-md-1"><input type="text" id="batch_9<?php echo $i ?>" name=batch_9[] value="<?php echo $batch_9_value; ?>"  class="is-valid form-control-success form-control number-input" style="font-size: 12px;" maxlength="4" ></div>
   <script type="text/javascript">
      $('#batch_9<?php echo $i ?>').keydown(function(e)
        {
      
         var value9 =  $('#batch_9<?php echo $i ?>').val().length;
          if ( e.keyCode == 8 && value9 < 3)
             e.preventDefault();
       });
     
   </script>
   <?php } ?>
</div>
<script type="text/javascript">
    $(".number-input").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
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