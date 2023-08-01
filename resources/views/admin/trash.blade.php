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
                    <h3 class='text-center text-white bg-info p-3'>Manage Your all trashed Posts Here</h3>
                    <a class='btn btn-warning' href="{{route('manage.post')}}">Back</a>
                    <a class='badge badge-info' href="{{route('manage.post')}}">Published</a>
                    <a class='badge badge-danger' href="{{route('post.trash')}}">Trash</a>
                    <br>
                    <div class="card shadow">
                        <div class="card-body">
                            @if(Session::has('success'))
                            <p class='alert alert-success'>{{session::get('success')}} <button class='close' data-dismiss='alert'>&times;</button> </p>
                            @endif
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
                                    @foreach($trash_post as $post)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$post->post_title}}</td>
                                        <td>{{$post->created_at}}</td>
                                        <td><img style='width: 100px' src="{{URL::to('/')}}/media/blog_img/{{$post->post_img}}" alt="Post Image"></td>
                                        <td>
                                            <a class='btn btn-warning btn-sm' href="{{route('blog.restore', $post->id)}}">Restore</a>
                                            <a class='btn btn-danger btn-sm' href="{{route('force.delete', $post->id)}}">Delete Permanently</a>
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



