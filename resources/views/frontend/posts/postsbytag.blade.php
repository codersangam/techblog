@extends('frontend.layouts.master')
@section('content')

<div class="page-title lb single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <h2><i class="fa fa-star bg-orange"></i> Tags <small class="hidden-xs-down hidden-sm-down"></small></h2>
            </div><!-- end col -->
            <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Blog</a></li>
                    <li class="breadcrumb-item active">Tags</li>
                </ol>
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</div><!-- end page-title -->
<section class="section">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-list clearfix">
                        @forelse ($posts as $post)
                        <div class="blog-box row">
                            <div class="col-md-4">
                                <div class="post-media">
                                    <a href="{{ route('post',$post->slug ) }}" title="">
                                        <img src="{{ Storage::disk('local')->url($post->featuredimage) }}" alt="" class="img-fluid">
                                        <div class="hovereffect"></div>
                                    </a>
                                </div><!-- end media -->
                            </div><!-- end col -->

                            <div class="blog-meta big-meta col-md-8">
                                <h4><a href="{{ route('post',$post->slug ) }}" title="">{{ $post->title }}</a></h4>
                                <p>{{ $post->slug }}</p>
                                @foreach ($post->categories as $category)
                                <small class="firstsmall"><a class="bg-orange" href="{{ route('category', $category->slug) }}" title="">{{ $category->title }}</a></small>
                                @endforeach
                                <small><a href="" title="">{{ $post->created_at->diffForHumans() }}</a></small>
                                <small><a href="" title="">by {{ $post->user->name }}</a></small>
                                <small><a href="" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->

                        <hr class="invis">
                        @empty
                        <h2>No Posts Found!</h2>
                        @endforelse
                    </div><!-- end blog-list -->
                </div><!-- end page-wrapper -->

                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-start">
                                {{ $posts->render() }}
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="widget">
                        <h2 class="widget-title">Follow Us</h2>

                        <div class="row text-center">
                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button facebook-button">
                                    <i class="fa fa-facebook"></i>
                                    <p>27k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button twitter-button">
                                    <i class="fa fa-twitter"></i>
                                    <p>98k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button google-button">
                                    <i class="fa fa-google-plus"></i>
                                    <p>17k</p>
                                </a>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                                <a href="#" class="social-button youtube-button">
                                    <i class="fa fa-youtube"></i>
                                    <p>22k</p>
                                </a>
                            </div>
                        </div>
                    </div><!-- end widget -->

                    <!-- Popular Post -->
                    <div class="widget">
                        <h2 class="widget-title">Popular Posts</h2>
                        <div class="blog-list-widget">
                            @if ($popular_posts)
                            @forelse ($popular_posts as $post)
                            <div class="list-group">
                                <a href="{{ route('post',$post->slug ) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{ Storage::disk('local')->url($post->featuredimage) }}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">{{ $post->title }}</h5>
                                        <small>{{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </a>
                            </div>
                            @empty
                            <h4>No Posts!</h4>
                            @endforelse
                            @endif
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <!-- Recent Posts -->
                    <div class="widget">
                        <h2 class="widget-title">Recent Posts</h2>
                        <div class="blog-list-widget">
                            @if ($recent_posts)
                            @forelse ($recent_posts as $post)
                            <div class="list-group">
                                <a href="{{ route('post',$post->slug ) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="{{ Storage::disk('local')->url($post->featuredimage) }}" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">{{ $post->title }}</h5>
                                        <small>{{ $post->created_at->diffForHumans() }}</small>
                                    </div>
                                </a>
                            </div>
                            @empty
                            <h4>No Posts!</h4>
                            @endforelse
                            @endif
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->

                    <!-- Recent Review -->
                    <div class="widget">
                        <h2 class="widget-title">Recent Reviews</h2>
                        <div class="blog-list-widget">
                            <div class="list-group">
                                <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="upload/tech_blog_02.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">Banana-chip chocolate cake recipe..</h5>
                                        <span class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                </a>

                                <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 justify-content-between">
                                        <img src="upload/tech_blog_03.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">10 practical ways to choose organic..</h5>
                                        <span class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                </a>

                                <a href="tech-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                    <div class="w-100 last-item justify-content-between">
                                        <img src="upload/tech_blog_07.jpg" alt="" class="img-fluid float-left">
                                        <h5 class="mb-1">We are making homemade ravioli..</h5>
                                        <span class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </span>
                                    </div>
                                </a>
                            </div>
                        </div><!-- end blog-list -->
                    </div><!-- end widget -->
                    <div class="widget">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="upload/banner_03.jpg" alt="" class="img-fluid">
                            </div><!-- end banner-img -->
                        </div><!-- end banner -->
                    </div><!-- end widget -->
                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>

@endsection