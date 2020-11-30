<?php
$connect = new PDO("mysql:host=localhost;dbname=a", "root", "");
$get_all_table_query = "SHOW TABLES";
$statement = $connect->prepare($get_all_table_query);
$statement->execute();
$result = $statement->fetchAll();

if(isset($_POST['tablea']))
{
 $output = '';
 foreach($_POST["tablea"] as $table)
 {
  $select_query = "DROP TABLE " . $table . "";
  $statement = $connect->prepare($select_query);
  $statement->execute();
  $total_row = $statement->rowCount();
 }
  echo "<script> document.location.href='./as.php';</script>";
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title>How to Take Backup of Mysql Database using PHP Code</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 </head>
 <body>
  <br />
  <div class="container">
   <div class="row">
    <h2 align="center">How to Take Backup of Mysql Database using PHP Code</h2>
    <br />
    <form method="post" id="export_form">
     <h3>Select Tables for Export</h3>
    <?php
    foreach($result as $table)
    {
    ?>
     <div class="checkbox">
      <label><input type="checkbox" class="checkbox_table" name="tablea[]" value="<?php echo $table["Tables_in_a"]; ?>" /> <?php echo $table["Tables_in_a"]; ?></label>
     </div>
    <?php
    }
    ?>
     <div class="form-group">
      <input type="submit" name="submit" id="submit" class="btn btn-info" value="Export" />
     </div>
    </form>
   </div>
  </div>
 </body>
</html>
<script>
$(document).ready(function(){
 $('#submit').click(function(){
  var count = 0;
  $('.checkbox_table').each(function(){
   if($(this).is(':checked'))
   {
    count = count + 1;
   }
  });
  if(count > 0)
  {
   $('#export_form').submit();
  }
  else
  {
   alert("Please Select Atleast one table for Export");
   return false;
  }
 });
});
</script>