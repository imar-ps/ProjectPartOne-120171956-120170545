@extends('dashboard.layouts.master')
@section('title')
    List Posts
@endsection
@section('content')
    <section class="content">
    @include('dashboard.layouts.messages')
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Posts</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped posts">
                    <thead>
                    <tr>
                        <th>
                            #
                        </th>

                        <th>
                            Post Title
                        </th>

                        <th>
                            Image
                        </th>

                        <th>
                            Category
                        </th>

                        <th style="">
                            Views
                        </th>

                        <th style="">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr>
                        <td>
                            {{$loop->iteration}}
                        </td>
                        <td>
                            <a>
                                {{$post->Title}}
                            </a>
                            <br/>
                            <small>
                                Created {{$post->created_at}}
                            </small>
                        </td>
                        <td>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img alt="Avatar" class="table-avatar" width="50" height="50" src="{{asset('post_images/'.$post->Image)}}">
                                </li>
                            </ul>
                        </td>
                        <td class="project_progress">
                                {{$post->category->Name}}

                        </td>
                        <td class="project-state">
                            {{$post->Views}}
                        </td>
                        <td class="project-actions text-right">
                            <form action="{{route('dashboard.posts.destroy', $post)}}" method="POST">
                            <a class="btn btn-primary btn-sm" href="{{route('dashboard.posts.show', $post)}}">
                                <i class="fas fa-folder">
                                </i>
                                View
                            </a>
                            <a class="btn btn-info btn-sm" href="{{route('dashboard.posts.edit', $post)}}">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Edit
                            </a>
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        {{$posts->links()}}

    </section>
@endsection
