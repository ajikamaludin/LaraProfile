{{-- POSTS --}}
@if(Route::is('posts.create') || Route::is('posts.edit') )
{{-- CKEditor --}}
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'description', {
        height: 700,
        extraPlugins: 'filebrowser, uploadimage',
        filebrowserBrowseUrl: '/admin/image/browser',
        filebrowserUploadUrl: '/admin/image/upload',
        uploadUrl: '/admin/image/upload',
    } );
</script>
@endif

{{-- POST IMAGE --}}
@if(Route::is('posts.images'))
<script>
// Get the modal
var modal = document.getElementById('imgModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
$(document).on('click','.img-galery', function(){
    var modalImg = document.getElementById("img-modal");
    modal.style.display = "block";
    modalImg.src = this.src;
});

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// Get the modal
var bgmodal = document.getElementsByClassName("modal")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
// When the user clicks on <modal>, close the modal
bgmodal.onclick = function() { 
  modal.style.display = "none";
}
</script>
<script>
  $(document).on('click', '.galery-remove', function(){
      var agree = confirm('Yakin akan menghapus item ?');
      if(agree){
        var url = '{{ url()->current() }}';
        var id = $(this).attr('img-id');
        $.ajax({
            method: "GET",
            url: url + '/' + id + '/delete',
            success: function(data){
                $('div[grid-id=' + id + ']').remove();
                toastr.success(data)
            },
            error: function(data){
                toastr.error(data)
            }
        });
    } 
  });
</script>

{{-- dropzone --}}
<script src="{{ asset('plugins/dropzone/dropzone.js') }}"></script>
<script>
  Dropzone.autoDiscover = false;
  $(function() {
    // Now that the DOM is fully loaded, create the dropzone, and setup the
    // event listeners
    var myDropzone = new Dropzone("#dropzone");

    //when file add to upload
    myDropzone.on("addedfile", function(file, response) {
      file.previewElement.addEventListener("click", function() {
        myDropzone.removeFile(file);
      });
    });

    //when upload was success
    myDropzone.on("success", function(file, response){
      $(
          "<div class='col-md-3' grid-id='"+ response.data.id +"'> " +
                "<img class='img-fluid  img-galery' src='" + response.data.url +"' alt=''> "+
                "<button class='btn btn-danger col-md-12 galery-remove' img-id='"+ response.data.id +"' onclick=''>Delete</button>" +
           "</div>"
      ).insertAfter('#startGrid');
      toastr.success(response.message)
    });

    //when upload was error
    myDropzone.on("error", function(file, response){
        toastr.error(response.message)
    });
  });
</script>
@endif
