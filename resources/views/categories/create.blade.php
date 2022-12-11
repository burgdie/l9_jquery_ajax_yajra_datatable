<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Create Category</title>
  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
  {{-- Start Modal --}}


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="category-modal__title"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-3">
          <label for="">Name</label>
          <input type="text" id="name" class="form-control">
        </div>
        <div class="form-group mb-1">
          <label for="">Type</label>
          <select name="" id="type" class="ms-2">
            <option disabled selected>Choose Option </option>
            <option value="electronic">Electronic</option>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="category-modal__save--btn"></button>
      </div>
    </div>
  </div>
</div>

  <div class="row">
    <div class="col-md-6 offset-3 column_6">
      {{--  Button to Launch Modal --}}
    <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Category</a>

    </div>



  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
