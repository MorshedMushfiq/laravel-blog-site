
@include('layouts.header')
@include('layouts.cta')


<section class="section lb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    @foreach($all_data as $data)
                    <div class="blog-custom-build">
                        <div class="blog-box wow fadeIn">
                            <div class="post-media">
                                <a href="{{route('blog.single', $data->id)}}" title="">
                                    <img src="{{URL::to('/')}}/media/blog_img/{{$data->post_img}}" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                        <span></span>
                                    </div>
                                    <!-- end hover -->
                                </a>
                            </div>
                            <!-- end media -->
                            <div class="blog-meta big-meta text-center">
                                <div class="post-sharing">
                                    <ul class="list-inline">
                                        <li><a href="#" class="fb-button btn btn-primary"><i class="fa fa-facebook"></i> <span class="down-mobile">Share on Facebook</span></a></li>
                                        <li><a href="#" class="tw-button btn btn-primary"><i class="fa fa-twitter"></i> <span class="down-mobile">Tweet on Twitter</span></a></li>
                                        <li><a href="#" class="gp-button btn btn-primary"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div><!-- end post-sharing -->
                                <h4><a href="{{route('blog.single', $data->id)}}" title="">{{$data->post_title}}</a></h4>
                                <p>{{$data->post_description}}</p>
                                <small><a href="marketing-category.html" title="">{{$data->post_category}}</a></small>
                                <small><a href="{{route('blog.single', $data->id)}}" title="">{{$data->created_at}}</a></small>
                                <small><a href="#" title="">by Jack</a></small>
                                <small><a href="#" title=""><i class="fa fa-eye"></i> 2291</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">

                    </div>
                    @endforeach
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item">
                                    <a class="page-link" href="{{route('blog.page')}}">See all posts from Blog Page</a>
                                </li>
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->

            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                @foreach($all_data as $data)
                                <a href="{{route('blog.single', $data->id)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    
                                    <div class="w-100 justify-content-between">
                                        <img src="upload/small_07.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">{{$data->post_title}}</h5>
                                        <small>{{$data->created_at->format('d-m-y')}}</small>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <div class="widget">
                        <h2 class="widget-title">Popular Categories</h2>
                        <div class="link-widget">
                            <ul>
                                @foreach($all_data as $data)
                                <li><a href="#">{{$data->post_category}}<span>(21)</span></a></li>
                                @endforeach
                            </ul>
                        </div><!-- end link-widget -->
                    </div><!-- end widget -->
                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>



@include('layouts.footer')
