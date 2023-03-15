<!-- jQuery -->
<script src="{{ asset('/template_admin/vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('/template_admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('/template_admin/vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('/template_admin/vendors/nprogress/nprogress.js') }}"></script>
<!-- bootstrap-progressbar -->
<script src="{{ asset('/template_admin/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
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
<!-- bootstrap-daterangepicker -->
<script src="{{ asset('/template_admin/vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{ asset('/template_admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/jquery.hotkeys/jquery.hotkeys.js') }}"></script>
<script src="{{ asset('/template_admin/vendors/google-code-prettify/src/prettify.js') }}"></script>
<!-- jQuery Tags Input -->
<script src="{{ asset('/template_admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js') }}"></script>
<!-- Switchery -->
<script src="{{ asset('/template_admin/vendors/switchery/dist/switchery.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('/template_admin/vendors/select2/dist/js/select2.full.min.js') }}"></script>
<!-- Parsley -->
<script src="{{ asset('/template_admin/vendors/parsleyjs/dist/parsley.min.js') }}"></script>
<!-- Autosize -->
<script src="{{ asset('/template_admin/vendors/autosize/dist/autosize.min.js') }}"></script>
<!-- jQuery autocomplete -->
<script src="{{ asset('/template_admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js') }}"></script>
<!-- starrr -->
<script src="{{ asset('/template_admin/vendors/starrr/dist/starrr.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('/template_admin/build/js/custom.min.js') }}"></script>


<!-- Custom Min Theme Scripts -->
<script src="{{ asset('/template_admin/build/js/custom.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('/template_admin/build/js/custom.js') }}"></script>

{{-- Camera JS --}}
@vite('/resources/js/cam.js')

{{-- set-value-to-file-input - pqina --}}
<script>
    // Get a reference to our file input
    const fileInput = document.querySelector('input[type="file"]');

    // Create a new File object
    const myFile = new File(['Laska'], 'No file', {
        type: 'text/plain',
        lastModified: new Date(),
    });

    // Now let's create a DataTransfer to get a FileList
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(myFile);
    fileInput.files = dataTransfer.files;
</script>


{{-- Appendchild --}}
<script>
    var i = 1;

    function additem() {
        var itemlist = document.getElementById('itemlist');

        //                membuat element
        var row = document.createElement('tr');
        var name = document.createElement('td');
        var amount = document.createElement('td');
        var photo = document.createElement('td');
        var action = document.createElement('td');

        //                meng append element
        itemlist.appendChild(row);
        row.appendChild(name);
        row.appendChild(amount);
        row.appendChild(photo);
        row.appendChild(action);

        //                membuat element input
        var input_name = document.createElement('input');
        input_name.setAttribute('name', 'items[' + i + '][name]');
        input_name.setAttribute('class', 'form-control');

        var input_amount = document.createElement('input');
        input_amount.setAttribute('type', 'number');
        input_amount.setAttribute('name', 'items[' + i + '][amount]');
        input_amount.setAttribute('class', 'form-control');

        var upload_photo = document.createElement('input');
        upload_photo.setAttribute('type', 'file');
        upload_photo.setAttribute('name', 'items[' + i + '][photo]');
        upload_photo.setAttribute('class', 'form-control');

        var hapus = document.createElement('a');

        name.appendChild(input_name);
        amount.appendChild(input_amount);
        photo.appendChild(upload_photo);
        action.appendChild(hapus);

        hapus.innerHTML =
            '<a class="btn btn-danger text-white"><i class="fa fa-trash px-2"></i></a>';
        //                Aksi Delete
        hapus.onclick = function() {
            row.parentNode.removeChild(row);
        };

        i++;

    }
</script>


<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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