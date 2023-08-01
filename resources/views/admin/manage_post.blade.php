@include('admin.layouts.head')
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
@include('admin.layouts.topbar')
			<!-- /Header -->
			
			<!-- Sidebar -->
@include('admin/layouts/sidebar')
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="wrap-table">
                    <h3 class='text-center text-white bg-info p-3'>Manage Your all Posts Here</h3>
                    <a class='btn btn-warning' href="{{route('create.post')}}">Add new post</a>
                    <a class='badge badge-info' href="{{route('manage.post')}}">Published</a>
                    <a class='badge badge-danger' href="{{route('post.trash')}}">Trash</a>
                    <br>
                    <div class="card shadow">
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class='alert alert-success'>{{session::get('success')}} <button class='close' data-dismiss='alert'>&times;</button> </p>
                            @endif
                            <div class="form d-flex justify-content-end">
                                <form action="{{route('search.post')}}" method="POST" enctype="multipart/form-data" class='form-inline'>
                                    @csrf
                                    <div class="form-group">
                                        <input name='search' style='width: 200px;' class='form-control' placeholder="Search..." type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class='btn btn-secondary' type="submit" name='submit' value='Search'>
                                    </div>
                                </form>
                            </div>
                            <table class='table table-striped'>
                                <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Post Title</th>
                                        <th>Post Date</th>
                                        <th>Post Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($post_data as $post)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$post->post_title}}</td>
                                        <td>{{$post->created_at->format('d-m-y')}}</td>
                                        <td><img style='width: 100px' src="{{URL::to('/')}}/media/blog_img/{{$post->post_img}}" alt="Post Image"></td>
                                        <td>
                                            <a class='btn btn-info btn-sm' href="{{route('blog.single', $post->id)}}" target='_blank'>View</a>
                                            <a class='btn btn-warning btn-sm' href="{{route('post.edit', $post->id)}}">Edit</a>
                                            <a class='btn btn-danger btn-sm' href="{{route('blog.trash', $post->id)}}">Trash</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- {{$post_data ->links()}} --}}
                </div>

			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
	@include('admin.layouts.script')



