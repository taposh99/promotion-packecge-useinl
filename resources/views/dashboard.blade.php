<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Project</title>

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
                <!-- message -->
                @if($errors->any())
                    {!! implode('', $errors->all('<div>:message</div>')) !!}
                @endif
          <div class="card-body">
            <form action="{{ route('new.blog') }}" method="post" enctype="multipart/form-data">

              @csrf

              <label class="">New Create Blog : </label>
              <input type="text" class="form-control" name="blog" required>
              <br>
              <label class="">Title : </label>
              <input type="text" class="form-control" name="title" nullable>
              <br>
              <label class="">Banner : </label>
              <input type="file" id="image" name="banner" nullable>
              <br> <br>
              <label class="">Details : </label>
              <textarea type="text" name="details" id="message" rows="4" cols="40"></textarea>
              <br>
              <label class="">Status : </label>
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