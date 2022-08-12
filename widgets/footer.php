  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
      <div class="copyright">
          <strong><span> &copy; 2022 PT. PINANG WITMAS SEJATI </span></strong> </>. All Rights Reserved.
      </div>
      <div class="credits">
          Develop by <a href="https://github.com/muhammadrafihadikesuma">
              Muhammad Rafi Hadi Kesuma
          </a>
      </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <!-- Scripts Select2 -->
  <script src="../assets/js/jquery.slim.min.js"></script>
  <script src="../assets/js/select2.full.min.js"></script>
  <!-- DATATABLES -->
  <script src="../assets/js/jquery.dataTables.min.js"></script>
  <script src="../assets/js/dataTables.bootstrap5.min.js"></script>
  <script src="../assets/js/dataTables.buttons.min.js"></script>
  <script src="../assets/js/buttons.bootstrap5.min.js"></script>
  <script src="../assets/js/buttons.html5.min.js"></script>
  <script src="../assets/js/jszip.min.js"></script>
  <script src="../assets/js/pdfmake.min.js"></script>
  <script src="../assets/js/vfs_fonts.js"></script>
  <script src="../assets/js/buttons.print.min.js"></script>
  <script src="../assets/js/buttons.colVis.min.js"></script>
  <script src="../assets/js/moment-with-locales.min.js"></script>
  <script src="../assets/js/moment.min.js"></script>
  <script src="../assets/js/dataTables.dateTime.min.js"></script>
  <!-- <script src="../assets/js/jquery-3.5.1.js"></script> -->

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>

  <script>
      var minDate, maxDate;
      $.fn.dataTable.ext.search.push(
          function(settings, data, dataIndex) {
              var min = minDate.val();
              var max = maxDate.val();
              var date = new Date(data[4]);

              if (
                  (min === null && max === null) ||
                  (min === null && date <= max) ||
                  (min <= date && max === null) ||
                  (min <= date && date <= max)
              ) {
                  return true;
              }
              return false;
          }
      );

      $(document).ready(function() {
          var table = $('#rPendaftaran').DataTable({
              // lengthChange: false,
              dom: 'Bfrtip',
              buttons: [
                  // {
                  //       text: 'Tambah Pasien',
                  //       action: function(e, dt, button, config) {
                  //           window.location = '../forms/add_pasien.php';
                  //       }
                  //   },
                  'copy',
                  {
                      extend: 'excelHtml5',
                      exportOptions: {
                          columns: ':visible'
                      }
                  },
                  'print',
                  {
                      extend: 'pdfHtml5',
                      orientation: 'landscape',
                      pageSize: 'LEGAL',
                      download: 'open',

                  },
                  'colvis'

              ],

              dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                  "<'row'<'col-md-12'tr>>" +
                  "<'row'<'col-md-5'i><'col-md-7'p>>",
              lengthMenu: [
                  [10, 25, 50, 100, -1],
                  [10, 25, 50, 100, "All"]
              ]
          });

          table.buttons().container()
              .appendTo('#dataTable_wrapper .col-md-5:eq(0)');

          minDate = new DateTime($('#min'), {
              format: 'MMMM Do YYYY'
          });
          maxDate = new DateTime($('#max'), {
              format: 'MMMM Do YYYY'
          });
          $('#min, #max').on('change', function() {
              table.draw();
          });
      });
  </script>

  <!-- DATATABLE PASIEN -->
  <script>
      $(document).ready(function() {
          var table = $('#dataTablepasien').DataTable({
              // lengthChange: false,
              dom: 'Bfrtip',
              buttons: [
                  // {
                  //       text: 'Tambah Pasien',
                  //       action: function(e, dt, button, config) {
                  //           window.location = '../forms/add_pasien.php';
                  //       }
                  //   },
                  <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'manager' || $_SESSION['level'] == 'dokter' ) { ?>,
                      'copy',
                      {
                          extend: 'excelHtml5',
                          exportOptions: {
                              columns: ':visible'
                          }
                      },
                      'print',
                      {
                          extend: 'pdfHtml5',
                          orientation: 'landscape',
                          pageSize: 'LEGAL',
                          download: 'open',

                      },
                      'colvis'
                  <?php } ?>

              ],

              dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +

                  "<'row'<'col-md-12'tr>>" +
                  "<'row'<'col-md-5'i><'col-md-7'p>>",
              lengthMenu: [
                  [10, 25, 50, 100, -1],
                  [10, 25, 50, 100, "All"]
              ]
          });

          table.buttons().container()
              .appendTo('#dataTable_wrapper .col-md-5:eq(0)');
      });
  </script>


  <!-- Script DataTables -->
  <script>
      $(document).ready(function() {
          var table = $('#dataTable').DataTable({
              // lengthChange: false,
              dom: 'Bfrtip',
              buttons: [
                  // {
                  //       text: 'Tambah Pasien',
                  //       action: function(e, dt, button, config) {
                  //           window.location = '../forms/add_pasien.php';
                  //       }
                  //   },
                  <?php if ($_SESSION['level'] == 'admin' || $_SESSION['level'] == 'manager' || $_SESSION['level'] == 'dokter' ) { ?>,

                      'copy',
                      {
                          extend: 'excelHtml5',
                          exportOptions: {
                              columns: ':visible'
                          }
                      },
                      'print',
                      {
                          extend: 'pdfHtml5',
                          orientation: 'landscape',
                          pageSize: 'LEGAL',
                          download: 'open',

                      },
                      'colvis'
                  <?php } ?>
              ],

              dom: "<'row'<'col-md-3'l><'col-md-5'B><'col-md-4'f>>" +
                  "<'row'<'col-md-12'tr>>" +
                  "<'row'<'col-md-5'i><'col-md-7'p>>",
              lengthMenu: [
                  [10, 25, 50, 100, -1],
                  [10, 25, 50, 100, "All"]
              ]
          });

          table.buttons().container()
              .appendTo('#dataTable_wrapper .col-md-5:eq(0)');
      });
  </script>

  <!-- DATATABLES PENDAFTARAN -->
  <script>
      $(document).ready(function() {
          var table = $('#dataTablePendaftaran').DataTable({

              lengthMenu: [
                  [5, 10, 25, 50, 100, -1],
                  [5, 10, 25, 50, 100, "All"]
              ]
          });

          table.buttons().container()
              .appendTo('#dataTable_wrapper .col-md-5:eq(0)');
      });
  </script>

  <!-- SELECT 2 -->
  <!-- <script>
      $(document).ready(function() {
          $("#jabatanPekerja").select2({
              placeholder: "Select a state",
              allowClear: true,
              width: 'resolve',
              dropdownParent: $('#jabatanPekerja'),

          });

      });
  </script> -->

  <!-- SCRIPT COLLAPSED -->
  <!-- <script>
      $(document).ready(function() {
          $("#collapsed").click(function(){

            $("#myCollapsed").colapse("show");

          });

      });
  </script> -->

  <!-- SELECT2 PENYAKIT -->
  <script>
      $(document).ready(function() {
          $("#diagnosa").select2({
              placeholder: "Pilih Jenis Penyakit",
              allowClear: true,
              width: 'resolve'

          });

      });
  </script>

  <!-- SCRIPT DATE TIME -->
  <!-- <script type="text/javascript">
      $(function() {
          $('#tanggalbeli').datetimepicker({
              language: 'en',
              pick12HourFormat: false,
              format: 'mm/dd/yyyy hh:ii:ss'
          });
      });
  </script> -->

  <!-- SCRIPT TIDAK BISA SPASI -->
  <script>
      $("#space").on({
          keydown: function(e) {
              if (e.which === 32)
                  return false;
          },
          keyup: function() {
              this.value = this.value.toUpperCase();
          },
          change: function() {
              this.value = this.value.replace(/\s/g, "");

          }
      });
  </script>

  <script>
      function my1() {
          var a = document.getElementById("1");
          a.value = a.value.toUpperCase();
      }
  </script>

  <script>
      function my2() {
          var a = document.getElementById("2");
          a.value = a.value.toUpperCase();
      }
  </script>

  <script>
      function my3() {
          var a = document.getElementById("3");
          a.value = a.value.toLowerCase();
      }
  </script>

  <script>
      function my4() {
          var a = document.getElementById("4");
          a.value = a.value.toLowerCase();
      }
  </script>

  <script>
      function my5() {
          var a = document.getElementById("5");
          a.value = a.value.toLowerCase();
      }
  </script>

  <script>
      function my6() {
          var a = document.getElementById("6");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- Processor -->
  <script>
      function my7() {
          var a = document.getElementById("7");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- RAM -->
  <script>
      function my8() {
          var a = document.getElementById("8");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- Harddisk -->
  <script>
      function my9() {
          var a = document.getElementById("9");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- Cassing -->
  <script>
      function my10() {
          var a = document.getElementById("10");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- Windows Edition -->
  <script>
      function my11() {
          var a = document.getElementById("11");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- Windows Version -->
  <script>
      function my12() {
          var a = document.getElementById("12");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- Licenses PC -->
  <script>
      function my13() {
          var a = document.getElementById("13");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- Office -->
  <script>
      function my14() {
          var a = document.getElementById("14");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- Licenses Office -->
  <script>
      function my15() {
          var a = document.getElementById("15");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- Spesifikasi Lainnya -->
  <script>
      function my16() {
          var a = document.getElementById("16");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- Status -->
  <script>
      function my17() {
          var a = document.getElementById("17");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- Age -->
  <script>
      function my18() {
          var a = document.getElementById("18");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- UPS -->
  <script>
      function my19() {
          var a = document.getElementById("19");
          a.value = a.value.toLowerCase();
      }
  </script>

  <!-- Printer -->
  <script>
      function my20() {
          var a = document.getElementById("20");
          a.value = a.value.toLowerCase();
      }
  </script>
  <script>
      function my21() {
          var a = document.getElementById("21");
          a.value = a.value.toUpperCase();
      }
  </script>
  <script>
      function my22() {
          var a = document.getElementById("22");
          a.value = a.value.toUpperCase();
      }
  </script>
  <script>
      function my23() {
          var a = document.getElementById("23");
          a.value = a.value.toUpperCase();
      }
  </script>

  <script>
      function my24() {
          var a = document.getElementById("24");
          a.value = a.value.toUpperCase();
      }
  </script>
  <script>
      function my25() {
          var a = document.getElementById("25");
          a.value = a.value.toUpperCase();
      }
  </script>
  <script>
      function my26() {
          var a = document.getElementById("26");
          a.value = a.value.toUpperCase();
      }
  </script>
  <script>
      function my27() {
          var a = document.getElementById("27");
          a.value = a.value.toUpperCase();
      }
  </script>

  <script>
      function my28() {
          var a = document.getElementById("28");
          a.value = a.value.toUpperCase();
      }
  </script>
  <script>
      function my29() {
          var a = document.getElementById("29");
          a.value = a.value.toUpperCase();
      }
  </script>

  <script>
      function my30() {
          var a = document.getElementById("30");
          a.value = a.value.toUpperCase();
      }
  </script>
  </body>

  </html>