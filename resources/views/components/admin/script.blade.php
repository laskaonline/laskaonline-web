<!-- jQuery -->
<script src="{{ asset('/template_admin/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('/template_admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/template_admin/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('/template_admin/vendors/nprogress/nprogress.js') }}"></script>
<!-- iCheck -->
<script src="{{ asset('/template_admin/vendors/iCheck/icheck.min.js') }}"></script>
<!-- Datatables -->
<script src="{{ asset('/template_admin/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}">
</script>
<script src="{{ asset('/template_admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}">
</script>
<script src="{{ asset('/template_admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/jszip/dist/jszip.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/pdfmake/build/pdfmake.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/pdfmake/build/vfs_fonts.js') }}"></script>
<!-- Dropzone.js -->
<script src="{{ asset('/template_admin/vendors/dropzone/dist/min/dropzone.min.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ asset('/template_admin/build/js/custom.min.js') }}"></script>

<!-- DataTables  & Plugins -->
<script src={{asset("/template_admin/vendors/datatables/jquery.dataTables.min.js")}}></script>
<script src={{asset("/template_admin/vendors/datatables-bs4/js/dataTables.bootstrap4.min.js")}}></script>
<script src={{asset("/template_admin/vendors/datatables-responsive/js/dataTables.responsive.min.js")}}></script>
<script src={{asset("/template_admin/vendors/datatables-responsive/js/responsive.bootstrap4.min.js")}}></script>
<script src={{asset("/template_admin/vendors/datatables-buttons/js/dataTables.buttons.min.js")}}></script>
<script src={{asset("/template_admin/vendors/datatables-buttons/js/buttons.bootstrap4.min.js")}}></script>
<script src={{asset("/template_admin/vendors/jszip/jszip.min.js")}}></script>
<script src={{asset("/template_admin/vendors/pdfmake/pdfmake.min.js")}}></script>
<script src={{asset("/template_admin/vendors/pdfmake/vfs_fonts.js")}}></script>
<script src={{asset("/template_admin/vendors/datatables-buttons/js/buttons.html5.min.js")}}></script>
<script src={{asset("/template_admin/vendors/datatables-buttons/js/buttons.print.min.js")}}></script>
<script src={{asset("/template_admin/vendors/datatables-buttons/js/buttons.colVis.min.js")}}></script>

<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

    //Date picker
    $('#reservationdate').datetimepicker({
        format: 'L'
    });
    $('#reservationdate2').datetimepicker({
        format: 'L'
    });
</script>