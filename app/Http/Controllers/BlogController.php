<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Exists;

class BlogController extends Controller
{
    // load main page of frontend
    public function index(){
        $all_posts = Blog::orderby("id", "DESC")->paginate(3);
        return view('home', [
            "all_data" => $all_posts
        ]);
    }

    //all data show method in frontend blog page
    public function blogpage(){
        $all_posts = Blog::orderby("id", "DESC")->paginate();
        return view('blog', [
            "all_data" => $all_posts
        ]);
    }

    //single blog data show in the single blog page
    public function singleblog($id){
        $all_posts = Blog::find($id);
        return view('single', [
            "single_data" => $all_posts
        ]);
    }

    //login page load
    public function login(){
        return view('admin.login');
    }

    // load register page 
    public function register(){
        return view('admin.register');
    }

    //load add post page
    public function addPost(){
        return view('admin.add_post');
    }

    //load manage post page
    public function managePost(){
        $posts = Blog::orderby("id", "DESC")->paginate();
        return view('admin.manage_post',[
            "post_data" => $posts
        ]);
    }


    //search function for searching
    public function search(Request $request){
        $search = $request->search;
        $data = Blog::latest()->where('post_title', 'LIKE', '%'.$search.'%')->orWhere("post_category", 'LIKE', '%'.$search.'%')->get();
        return view('admin.manage_post', [
            'post_data' => $data
        ]);
    }

    //search function for searching in home
    public function searchPostInHome(Request $request){
        $search_home = $request->searchhome;
        $data = Blog::latest()->where('post_title', 'LIKE', '%'.$search_home.'%')->orWhere("post_category", 'LIKE', '%'.$search_home.'%')->get();
        return view('home', [
            'all_data' => $data
        ]);
    }


    //create a new post method 
    public function store(Request $request){
        //validation
        $this->validate($request, [
            "post_title" =>['required'],
        ]);

        //if the method has image file
        if($request->hasFile('post_img')){
            $img = $request->file('post_img');
            $unique_name = md5(time().rand()). "." . $img->getClientOriginalExtension();
            $img->move(public_path("media/blog_img"), $unique_name);

        }

        //call the create method and send into database
        Blog::create([
            "post_title" => $request->post_title,
            "post_description" => $request->post_description,
            "post_category" => $request->category,
            "post_img" => $unique_name 
        ]);
        return redirect()->route('manage.post')->with("success", "Post Uploaded Successfull");
    }

    //edit post method with single data
    public function editPost($id){
        $post = Blog::find($id);
        return view('admin.edit_post',[
            'edit_data' => $post
        ]);
    }

    //update method 
    public function update(Request $request, $id){
        $update_post = Blog::find($id);
        $update_post->post_title = $request->post_title;
        $update_post->post_description = $request->post_description;
        $update_post->post_category = $request->category;
        //if post_img has previous file then it will delete previous file and add the updated post_img[photo]
        if($request->hasFile('post_img')){
            $desti = "media/blog_img/" .$update_post->post_img;
            if(File::exists($desti)){
                File::delete($desti);
            }
            //image name generation and adding the public folder
            $img = $request->file('post_img');
            $unique_name = md5(time().rand()). "." . $img->getClientOriginalExtension();
            $img->move(public_path("media/blog_img"), $unique_name);
        }
        $update_post->post_img = $unique_name;
        $update_post->update();
        return redirect()->route('manage.post')->with('success', "Post Updated Successfull");

    }

    //going to the trash data method
    public function trash($id){
        $trash_post = Blog::find($id);
        $trash_post->delete();
        return redirect("trash_posts")->with("success", "data Trashed Success");
    }

    //go to the trash page data
    public function gotrash(){
        $trashed = Blog::onlyTrashed()->get();
        return view('admin.trash', [
            'trash_post' => $trashed
        ]);
    }

    //restore the trash data from trash page
    public function restore($id){
        $trash_post = Blog::withTrashed()->find($id);
        $trash_post->restore();
        return redirect("manage_your_all_posts")->with("success", "data Restore Success");
    }

    //force delete to the trash data permanantly from trash page
    public function forceDelete($id){
        $trashed = Blog::withTrashed()->find($id);
        $trashed->forceDelete();
        return redirect('trash_posts')->with("success", "Your Trashed Data Delete Successfull");
    }

    //user (subscriber) account register
    public function registerAccount(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = HASH::make($request->password);
        $user->save();
        return redirect()->route('login.dashboard')->with('success', "$request->name Register Successfull");
    }

    //login account methdo
    public function loginAccount(Request $request){
        $credetials =[
            "email" => $request->email,
            "password" => $request->password
        ];

        if(Auth::attempt($credetials)){
            return redirect()->route("blog.dashboard")->with('success', "Login Success!!!!");
        }else{
            return redirect()->route('login.dashboard')->with('error', "Email or Password has been wrong");
        }

    }

    //dashboard view method
    public function dashboard(){
        return view('admin.dashboard');
    }


    //logout method
    public function logout(){
        Session::flush();
        Auth::guard("web")->logout();
        return redirect()->route('login.dashboard')->with('success', "logged out successfully");
    }

}
