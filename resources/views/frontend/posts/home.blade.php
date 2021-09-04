@extends('frontend.layouts.master')
@section('content')

<section class="section">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-custom-build">
                        @forelse ($posts as $post)
                        <div class="blog-box">
                            <div class="post-media">
                                <a href="{{ route('post',$post->slug ) }}" title="">
                                    <img src="{{ Storage::disk('local')->url($post->featuredimage) }}" alt="" class="img-fluid">
                                    <div class="hovereffect">
                                    </div>
                                    <!-- end hover -->
                                </a>
                            </div>
                            <!-- end media -->
                            <div class="blog-meta big-meta text-center">
                                <h4><a href="{{ route('post',$post->slug ) }}" title="">{{ $post->title }}</a></h4>
                                <p>{{ $post->slug }}</p>
                                @foreach ($post->categories as $category)
                                <small class="firstsmall"><a class="bg-orange" href="{{ route('category', $category->slug) }}" title="">{{ $category->title }}</a></small>
                                @endforeach
                                <small><a href="#" title="">{{ $post->created_at->diffForHumans() }}</a></small>
                                <small><a href="#" title="">by {{ $post->user->name }}</a></small>
                                <small><a href="#" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end blog-box -->
                        <hr class="invis">
                        @empty
                        <h2>No Posts Found!</h2>
                        @endforelse

                    </div><!-- end blog-custom-build -->
                </div><!-- end page-wrapper -->
                <hr class="invis">

                <div class="row">
                    <div class="col-md-12">
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                {{ $posts->render() }}
                            </ul>
                        </nav>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end col -->

            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                <div class="sidebar">

                    <!-- Follow us -->
                    <div class="widget">
                        <h2 class="widget-title">Follow Us</h2>


                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_follow_toolbox"></div>

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

                    <!-- <div class="widget">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="upload/banner_07.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div> -->

                    <!-- Recent Review -->
                    <!-- <div class="widget">
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
                        </div>
                    </div>

                    <div class="widget">
                        <div class="banner-spot clearfix">
                            <div class="banner-img">
                                <img src="upload/banner_03.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div> -->

                </div>
            </div><!-- end col -->
        </div>
    </div><!-- end container -->
</section>

@endsection