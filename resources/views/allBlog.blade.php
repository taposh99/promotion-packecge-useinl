<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Simple Project</title>

    <link rel="stylesheet" href="{{asset('frontEndAsset')}}/css/bootstrap.css">
</head>

<body>

    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center"> {{ session('message') }}</h1>
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Create New Blog</a>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <tr>
                            <th>sl</th>
                            <th>Blog List</th>
                            <th>Tittle list</th>
                            <th>Banner list</th>
                            <th>Details</th>
                            <th>status</th>

                            <th>Action</th>
                        </tr>
                        @php $i=1 @endphp
                        @foreach($blogs as $blog)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $blog->blog }}</td>
                            <td>{{ $blog->title }}</td>
                            <td><img src="{{asset('images/banner/'.$blog->banner)}}" width="55px" height="55px"></td>
                            <td>{{ $blog->details }}</td>

                            <!-- <td>

                                    @if($blog->status==1)
                                    <a href="{{ url('change-status/'.$blog->id) }}" class="btn btn-sm btn-success">Active</a>
                                    @else
                                    <a href="{{ url('change-status/'.$blog->id) }}" class="btn btn-sm btn-danger">Inactive</a>
                                    @endif
                                </td> -->
                            <td>

                                @if ($blog->status == 1)
                                <a href="#" class="btn btn-sm btn-success">Active</a>
                                @else
                                <a href="#" class="btn btn-sm btn-danger">Inactive</a>
                                @endif
                            </td>

                            <td>

                                <a href="{{ route('edit.blog',['id'=>$blog->id]) }}"><i class="fa fa-edit"></i></a>
                                <form action="{{ route('delete.blog') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                    <button style="font-size:13px;border: none;background: none;padding: 0;color: inherit;font: inherit;cursor: pointer;" role="button" onclick="return confirm('Are You Sure !!')"><i class="fa fa-trash" aria-hidden="true" style="color: red;"></i></button>
                                </form>


                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>

    </div>


</body>

</html>