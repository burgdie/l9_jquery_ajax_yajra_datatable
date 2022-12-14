<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Create Category</title>
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  {{-- Jquery --}}
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  {{-- SweetAlert 2 --}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  {{-- Start Modal --}}


<!-- Modal -->
<div class="modal fade ajax-modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <form id="ajaxForm">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="category-modal__title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-3">
          <label for="">Name</label>
          <input type="text" id="name" name="name" class="form-control">
          <span  id="nameError" class="mt-2 text-danger error-messages"></span>
        </div>
        <div class="form-group mb-1">
          <label for="">Type</label>
          <select name="type" id="type" class="ms-2">
            <option disabled selected>Choose Option </option>
            <option value="electronic">Electronic</option>
          </select>
          <br>
          <span id="typeError" class="mt-2 text-danger error-messages"></span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="category-modal__saveBtn">Save Category</button>
      </div>
    </div>
  </div>
</form>


</div>

  <div class="row">
    <div class="col-md-6 offset-3 column_6">
      {{--  Button to Launch Modal --}}
      <a class="btn btn-info mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Category</a>
      <table id="category-table" class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>

    </div>





  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    $(document).ready(function() {

      $.ajaxSetup ({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      $('#category-modal__title').html('Create Category');
      $('#category-modal__saveBtn').html('Save Category');
      var form = $('#ajaxForm')[0];

      $('#category-modal__saveBtn').click(function() {
        // var name = $('#name').val();
        // var type = $('#type').val();

        //Clear error messages in HTML when Save Button is clicked again
        $('.error-messages').html('');

        var formData = new FormData(form);


        /*Ajax Call */
        $.ajax({
          url: '{{ route("categories.store") }}',
          method: 'POST',
          processData: false,
          contentType: false,
          data:  formData,
          success: function(response) {
            //console.log( response.success)
            $('.ajax-modal').modal('hide');
            if(response) {
              Swal.fire({
                  position: 'top-end',
                  icon: 'success',
                  title: 'Category has been saved',
                  showConfirmButton: true,
                  timer: 1500
              });
            }
          },
          error: function(error) {
            if(error){
              console.log(error.responseJSON.errors.name)
              $('#nameError').html(error.responseJSON.errors.name);
              $('#typeError').html(error.responseJSON.errors.type);
            }
          }
        });
      })
    });
  </script>
</body>
</html>
