<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->

<!-- Main Footer -->
<footer class="main-footer">
  <strong>Copyright &copy; 2020 <a href="">SIB - Sistem Inventory Barang</a>.</strong> All rights
  reserved.
  <div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 3.0.5
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>


<!-- AdminLTE -->
<script src="../assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="../assets/plugins/chart.js/Chart.min.js"></script>
<script src="../assets/plugins/select2/js/select2.full.min.js"></script>
<script src="../assets/plugins/moment/moment.min.js"></script>
<script src="../assets/dist/js/demo.js"></script>
<script src="../assets/dist/js/pages/dashboard3.js"></script>
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="../assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
<script>
  $(function () {


    //Date range picker
    $('#reservationdate').datetimepicker({
      format: 'DD-MM-YYYY'
    });
    // //Date range picker
    // $('#reservation').daterangepicker()
    //Date range picker with time picker
    // $('#reservationtime').daterangepicker({
    //   timePicker: true,
    //   timePickerIncrement: 30,
    //   locale: {
    //     format: 'DD/MM/YYYY hh:mm A'
    //   }
    // })

  })
</script>
<script type="text/javascript">
  $(document).ready(function () {
    bsCustomFileInput.init();
  });
</script>
<script>
  window.setTimeout(function () {
    $(".hilang").fadeTo(500, 0).slideUp(500, function () {
      $(this).remove();
    });
  }, 5000);
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $('#largeModal').on('show.bs.modal', function (e) {
      var rowid = $(e.relatedTarget).data('id');
      //menggunakan fungsi ajax untuk pengambilan data
      $.ajax({
        type: 'post',
        url: 'detailbarang.php',
        data: 'rowid=' + rowid,
        success: function (data) {
          $('.fetched-data').html(data); //menampilkan data ke dalam modal
        }
      });
    });
  });
</script>
</body>

</html>