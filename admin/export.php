<?php
$connect = new PDO("mysql:host=localhost;dbname=sistembarang", "root", "");
$get_all_table_query = "SHOW TABLES";
$statement = $connect->prepare($get_all_table_query);
$statement->execute();
$result = $statement->fetchAll();

if(isset($_POST['table']))
{
$output = '';
foreach($_POST["table"] as $table)
{
  $show_table_query = "SHOW CREATE TABLE " . $table . "";
  $statement = $connect->prepare($show_table_query);
  $statement->execute();
  $show_table_result = $statement->fetchAll();

  foreach($show_table_result as $show_table_row)
  {
  $output .= "\n\n" . $show_table_row["Create Table"] . ";\n\n";
  }
  $select_query = "SELECT * FROM " . $table . "";
  $statement = $connect->prepare($select_query);
  $statement->execute();
  $total_row = $statement->rowCount();

  for($count=0; $count<$total_row; $count++)
  {
  $single_result = $statement->fetch(PDO::FETCH_ASSOC);
  $table_column_array = array_keys($single_result);
  $table_value_array = array_values($single_result);
  $output .= "\nINSERT INTO $table (";
  $output .= "" . implode(", ", $table_column_array) . ") VALUES (";
  $output .= "'" . implode("','", $table_value_array) . "');\n";
  }
}
$file_name = 'database_backup_on_' . date('y-m-d') . '.sql';
$file_handle = fopen($file_name, 'w+');
fwrite($file_handle, $output);
fclose($file_handle);
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . basename($file_name));
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize($file_name));
    ob_clean();
    flush();
    readfile($file_name);
    unlink($file_name);
}


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
  echo "<script> document.location.href='./display.php';</script>";
}

?>
<?php
$halaman = 'Export';
include 'global_header.php';
?>

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Export Database</h3>
          </div>

          <!-- /.card-header -->
          <div class="card-body">
            <form method="post" id="export_form">
              <h3>Pilih tabel yang ingin di Export</h3>
              <?php
    foreach($result as $table)
    {
    ?>
              <div class="checkbox">
                <label><input type="checkbox" class="checkbox_table" name="table[]"
                    value="<?php echo $table["Tables_in_sistembarang"]; ?>" />
                  <?php echo $table["Tables_in_sistembarang"]; ?></label>
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
        <!-- /.card -->


      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'global_footer.php';?>
</div>

</div>
<script>
  $(document).ready(function () {
    $('#submit').click(function () {
      var count = 0;
      $('.checkbox_table').each(function () {
        if ($(this).is(':checked')) {
          count = count + 1;
        }
      });
      if (count > 0) {
        $('#export_form').submit();
      } else {
        alert("Please Select Atleast one table for Export");
        return false;
      }
    });
  });
</script>