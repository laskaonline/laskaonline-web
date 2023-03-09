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

<!-- Custom Min Theme Scripts -->
<script src="{{ asset('/template_admin/build/js/custom.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('/template_admin/build/js/custom.js') }}"></script>

{{-- Camera JS --}}
@vite('/resources/js/cam.js')

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
        input_name.setAttribute('name', 'input_name[' + i + ']');
        input_name.setAttribute('class', 'form-control');

        var input_amount = document.createElement('input');
        input_amount.setAttribute('name', 'input_amount[' + i + ']');
        input_amount.setAttribute('class', 'form-control');

        var upload_photo = document.createElement('a');
        // upload_photo.setAttribute('type', 'file');
        // upload_photo.setAttribute('name', 'upload_photo[' + i + ']');
        // upload_photo.setAttribute('class', 'form-control');

        var hapus = document.createElement('a');

        name.appendChild(input_name);
        amount.appendChild(input_amount);
        photo.appendChild(upload_photo);
        action.appendChild(hapus);

        upload_photo.innerHTML =
            '<div class="col"> <a class="btn btn-block btn-primary text-white" data-toggle="collapse" id="open" data-target="#cam_goods"><i class="fa fa-camera px-2"></i> Open cam</a> </div> <div class="row collapse" id="cam_goods"> <div class="col-md-6"> <video id="video" width="100%" height="auto"></video> </div> <div class="col-md-6 border border-dark"> <canvas id="canvas"></canvas></div><div class="row x_content"><a class="btn btn-app h6" id="snap"><i class="fa fa-camera"></i>Camera</a><a class="btn btn-app" id="show"><i class="fa fa-eye"></i>Open Cam</a><a class="btn btn-app" id="close"><i class="fa fa-eye-slash"></i>Hide Cam</a><a class="btn btn-app" data-toggle="collapse" data-target="#cam_goods" id="exit"><i class="fa fa-close"></i> close</a></div></div>';

        hapus.innerHTML =
            '<a class="btn btn-danger text-white"><i class="fa fa-trash px-2"></i></a>';
        //                Aksi Delete
        hapus.onclick = function() {
            row.parentNode.removeChild(row);
        };

        i++;
    }
</script>

{{-- set-value-to-file-input - pqina --}}
<script>
    // Get a reference to our file input
    const fileInput = document.querySelector('input[type="file"]');

    // Create a new File object
    const myFile = new File(['Hello World!'], 'myFile.txt', {
        type: 'text/plain',
        lastModified: new Date(),
    });

    // Now let's create a DataTransfer to get a FileList
    const dataTransfer = new DataTransfer();
    dataTransfer.items.add(myFile);
    fileInput.files = dataTransfer.files;
</script>
