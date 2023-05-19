<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Small blog project</title>

  <link rel="stylesheet" href="{{ asset('frontEndAsset') }}/css/bootstrap.css">
</head>

<body>

  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <a href="{{ route('all.blog') }}" class="btn btn-primary"> Total Blog </a>

      </div>


    </div>
    <br>
    <br>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('new.blog') }}" method="post" enctype="multipart/form-data">

              @csrf

              <label class="">Create New Blog : </label>
              <input type="text" class="form-control" name="blog" required>
              <br>
              <select class="form-control" id="status" name="status">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>
              <br><br>
              <div class="form-floating mb-3 mb-md-0">
              </div>
              <input type="submit" value="submit" class="form-control btn btn-danger">
            </form>
          </div>
        </div>
      </div>
    </div>

  </div>


</body>

</html>