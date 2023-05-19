<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog tittle</title>

    <link rel="stylesheet" href="{{asset('frontEndAsset')}}/css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <a href="{{ route('all.blog') }}" class="btn btn-primary">All Blog</a>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('update.blog') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $blog->id }}" name="blog_id">
                            <label class="">Update blogs : </label>
                            <input type="text" class="form-control" value="{{ $blog->blog }}" name="blog"><br>

                            <label class="">Status : </label>
                            <input type="hidden" name="status" value="{{ $blog->status ? 0 : 1 }}">
                            <button type="submit">{{ $blog->status ? 'Inactivate' : 'Activate' }}</button>
                            <br> <br>


                            <input type="submit" value="Update" class="form-control btn btn-danger">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


</body>

</html>