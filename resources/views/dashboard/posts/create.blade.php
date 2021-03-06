@extends('dashboard.layouts.master')
@section('title')
    Add Post
@endsection
@section('content')

    <section class="content">
        @include('dashboard.layouts.messages')
        <form method="POST" action="{{route('dashboard.posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">General</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                                <i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="inputName">Post Code</label>
                            <input type="text" name="code" value="{{old('Code')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Post Title</label>
                            <input type="text" name="title" value="{{old('Title')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputName">Author Email</label>
                            <input type="text" name="author_email" value="{{old('author_email')}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Post Body</label>
                            <textarea id="body" name="body" class="form-control" rows="4">
                                {{old('Body')}}
                            </textarea>
                        </div>

                        <div class="form-group">
                            <label for="inputStatus">Category</label>
                            <select class="form-control custom-select" name="category_id">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->Name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="post_image" ">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    <!-- /.card-body -->
                </div>

                <!-- /.card -->
            </div>
            </div>

        <div class="row">
            <div class="col-12">
                <a href="{{route('dashboard.posts.create')}}" class="btn btn-secondary">Cancel</a>.
                <input type="submit" value="Create new Post" class="btn btn-success float-right">
            </div>
        </div>


        </form>
    </section>


@endsection
