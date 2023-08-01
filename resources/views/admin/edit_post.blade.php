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
                    <br>
                    <a class='btn btn-info' href="{{route('manage.post')}}">Back</a>
                    <br>
                    <br>
                    @if(Session::has('success'))
                    <p class='alert alert-success'>{{session::get('success')}} <button class='close' data-dismiss='alert'>&times;</button> </p>
                    @elseif($errors->any())
                    <p class='alert alert-danger'>{{$errors->first()}} <button class='close' data-dismiss='alert'>&times;</button> </p>

                    @endif
                    <form action="{{route('post.update', $edit_data->id)}}" method='POST' enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="post">Post Title</label>
                            <input name='post_title' value="{{$edit_data->post_title}}" style='width: 500px;' class='form-control' type="text">
                        </div>
                        <div class="form-group">
                            <label for="post">Post Description</label>
                            <textarea name='post_description' style='width: 500px; height: 100px; resize: none;' class='form-control' type="text">{{$edit_data->post_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="post">Category</label>
                            <select name="category" value="{{$edit_data->category}}" id="">
                                <option @if($edit_data->post_category=='Uncategory') selected='selected' @endif value="Uncategory" class='disabled'>Uncategory</option>
                                <option @if($edit_data->post_category=='Political') selected='selected' @endif value="Political">Political</option>
                                <option @if($edit_data->post_category=='Religional') selected='selected' @endif value="Religional">Religional</option>
                                <option @if($edit_data->post_category=='English') selected='selected' @endif  value="English">English</option>
                                <option @if($edit_data->post_category=='Bangla') selected='selected' @endif value="Bangla">Bangla</option>
                                <option @if($edit_data->post_category=='Drama') selected='selected' @endif value="Drama">Drama</option>
                                <option @if($edit_data->post_category=='Industry') selected='selected' @endif value="Industry">Industry</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="post">Attach a Photo</label>
                            <input name='post_img' style='width: 500px;' class='form-control' value="{{$edit_data->post_img}}" type="file">
                        </div>
                        <input class='btn btn-info' value='Update Post' type="submit">
                    </form>
                </div>
                
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
	@include('admin.layouts.script')