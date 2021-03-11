<?php
$connect = new PDO("mysql:host=localhost;dbname=sistembarang", "root", "");
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
echo "<script> document.location.href='./hapusdatabase.php';</script>";
}

?>
<?php
$halaman = 'Hapus Tabel/Datbase';
include 'global_header.php';
?>

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Hapus tabel dalam Database NOTE: TABLE USER JANGAN DIHAPUS</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <form method="post" id="export_form">
                            <h3>Pilih Tabel yang ingin di Hapus</h3>
                            <?php
    foreach($result as $table)
    {
    ?>
                            <div class="checkbox">
                                <label><input type="checkbox" class="checkbox_table" name="tablea[]"
                                        value="<?php echo $table["Tables_in_sistembarang"]; ?>" />
                                    <?php echo $table["Tables_in_sistembarang"]; ?></label>
                            </div>
                            <?php
    }
    ?>
                            <div class="form-group">
                                <input type="submit" name="submit1" id="submit1" class="btn btn-danger" value="Hapus" />
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
        $('#submit1').click(function () {
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