<?php
$halaman = 'Import';
include "global_header.php"; 

$message = '';
if(isset($_POST["import"]))
{
 if($_FILES["database"]["name"] != '')
 {
  $array = explode(".", $_FILES["database"]["name"]);
  $extension = end($array);
  if($extension == 'sql')
  {
   $connect = mysqli_connect("localhost", "root", "", "sistembarang");
   $output = '';
   $count = 0;
   $file_data = file($_FILES["database"]["tmp_name"]);
   foreach($file_data as $row)
   {
    $start_character = substr(trim($row), 0, 2);
    if($start_character != '--' || $start_character != '/*' || $start_character != '//' || $row != '')
    {
     $output = $output . $row;
     $end_character = substr(trim($row), -1, 1);
     if($end_character == ';')
     {
      if(!mysqli_query($connect, $output))
      {
       $count++;
      }
      $output = '';
     }
    }
   }
   if($count > 0)
   {
    $message = '<label class="text-danger">Database berhasil di Import dan timpa table yang sudah ada</label>';
   }
   else
   {
    $message = '<label class="text-success">Database berhasil di Import</label>';
   }
  }
  else
  {
   $message = '<label class="text-danger">Invalid File</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select Sql File</label>';
 }
}
?>
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
            <div class="alert alert-info alert-dismissible">
                        <h5><i class="icon fas fa-info"></i>Tip!</h5>
                        Sebelum Import database harap menghapus semua table yang sama yang ada dalam database yang ingin di Import
                    </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Import Database</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div><?php echo $message; ?></div>
                        <form method="post" enctype="multipart/form-data">
                            <p><label>Select Sql File</label>
                                <input type="file" name="database" /></p>
                            <br />
                            <input type="submit" name="import" class="btn btn-info" value="Import" />
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

<?php include "global_footer.php"; ?>