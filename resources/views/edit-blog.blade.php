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
                            <label class="">Update Title : </label>
                            <input type="text" class="form-control" value="{{ $blog->title }}" name="title"><br>

                            
                                <label for="" class="col-sm-2 col-form-label">Banner:</label>
                                <input type="file" id="banner" class="form-control"value="{{ $blog->banner }}" name="banner">

                                <img width="55px" height="55px" id="showImage" src="{{asset('images/banner')}}/{{ $blog->banner }}" alt="Card image cap">

                       <br>
                       <!-- <div class="col-lg-6 mb-5">
                                <label class="">Status : </label>
                                <select class="form-control" id="status"  name="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div> -->

                            <br>


                            <label for="details">Details:</label>
                            <textarea id="details" name="details">{{ $blog->details }}</textarea><br>


                
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