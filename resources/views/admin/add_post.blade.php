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
                <div class="container m-3 p-3">
                    <h4 class='text-center text-bold bg-primary text-white p-3'>Create a New Post</h4>
                    @if(Session::has('success'))
                    <p class='alert alert-success'>{{session::get('success')}} <button class='close' data-dismiss='alert'>&times;</button> </p>
                    @elseif($errors->any())
                    <p class='alert alert-danger'>{{$errors->first()}} <button class='close' data-dismiss='alert'>&times;</button> </p>

                    @endif
                    <form action="{{route('blog.store')}}" method='POST' enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="post">Post Title</label>
                            <input name='post_title' style='width: 500px;' class='form-control' type="text">
                        </div>
                        <div class="form-group">
                            <label for="post">Post Description</label>
                            <textarea name='post_description' style='width: 500px; height: 100px; resize: none;' class='form-control' type="text"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="post">Category</label>
                            <select name="category" id="">
                                <option value="Uncategory" class='disabled'>Uncategory</option>
                                <option value="Political">Political</option>
                                <option value="Religional">Religional</option>
                                <option value="English">English</option>
                                <option value="Bangla">Bangla</option>
                                <option value="Drama">Drama</option>
                                <option value="Industry">Industry</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post">Attach a Photo</label>
                            <input name='post_img' style='width: 500px;' class='form-control' type="file">
                        </div>
                        <input class='btn btn-info' value='Publish' type="submit">
                    </form>
                </div>
                
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
	@include('admin.layouts.script')