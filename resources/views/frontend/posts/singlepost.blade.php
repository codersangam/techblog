@extends('frontend.layouts.master')
@section('content')
<div id="wrapper">
    <section class="section single-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-wrapper">
                        <div class="single-post-media">
                            <img src="{{ Storage::disk('local')->url($post->featuredimage) }}" alt="" class="img-fluid">
                        </div><!-- end media -->
                        <div class="blog-title-area text-left">
                            <ol class="breadcrumb hidden-xs-down">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Blog</a></li>
                                <li class="breadcrumb-item active">{{ $post->slug }}</li>
                            </ol>
                            <div class="row ml-1">
                                @foreach ($post->categories as $category)
                                <span class="color-orange pr-2"><a href="{{ route('category', $category->slug) }}" title="">{{ $category->title }}</a></span>
                                @endforeach
                            </div>
                            <h3>{{ $post->title }}</h3>

                            <div class="blog-meta big-meta">
                                <small><a href="" title="">{{ $post->created_at->diffForHumans() }}</a></small>
                                <small><a href="" title="">by {{$post->user->name}}</a></small>
                                <small><a href="" title=""><i class="fa fa-eye"></i> {{ $post->views }}</a></small>
                            </div><!-- end meta -->
                        </div><!-- end title -->

                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>

                        <div class="blog-content">
                            {!! htmlspecialchars_decode($post->body) !!}
                        </div><!-- end content -->

                        <div class="blog-title-area">
                            <div class="tag-cloud-single">
                                <span>Tags</span>
                                @foreach ($post->tags as $tag)
                                <small><a href="{{ route('tag', $tag->slug) }}" title="">{{ $tag->title }}</a></small>
                                @endforeach
                            </div><!-- end meta -->
                        </div><!-- end title -->

                        <!-- Go to www.addthis.com/dashboard to customize your tools -->
                        <div class="addthis_inline_share_toolbox"></div>

                        <!-- <div class="row pt-5">
                            <div class="col-lg-12">
                                <div class="banner-spot clearfix">
                                    <div class="banner-img">
                                        <img src="{{ asset('frontend/upload/banner_01.jpg') }}" alt="" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <hr class="invis1">

                        <div class="custombox prevnextpost clearfix">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="blog-list-widget">
                                        <div class="list-group">
                                            @if (isset($post->previous))
                                            <a href="{{ route('post', $post->previous->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between text-right">
                                                    <img src="{{ Storage::disk('local')->url($post->previous->featuredimage) }}" alt="" class="img-fluid float-right">
                                                    <h5 class="mb-1">{{ $post->previous->title }}</h5>
                                                    <small>Prev Post</small>
                                                </div>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div><!-- end col -->

                                <div class="col-lg-6">
                                    <div class="blog-list-widget">
                                        <div class="list-group">
                                            @if (isset($post->next))
                                            <a href="{{ route('post', $post->next->slug) }}" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between text-left">
                                                    <img src="{{ Storage::disk('local')->url($post->next->featuredimage) }}" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1">{{ $post->next->title }}</h5>
                                                    <small>Next Post</small>
                                                </div>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">

                        <div class="custombox authorbox clearfix">
                            <h4 class="small-title">About author</h4>
                            <div class="row">
                                <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">

                                    <img src="{{ Storage::disk('local')->url($post->user->profile_photo_path) }}" alt="" class="img-fluid rounded-circle">
                                </div><!-- end col -->

                                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                                    <h4><a href="#">{{ $post->user->name }}</a></h4>
                                    <p>{{ $post->user->about }}</p>
                                    <!-- <div class="topsocial">
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Youtube"><i class="fa fa-youtube"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i class="fa fa-instagram"></i></a>
                                        <a href="#" data-toggle="tooltip" data-placement="bottom" title="Website"><i class="fa fa-link"></i></a>
                                    </div> -->
                                    <!-- end social -->
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end author-box -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <h4 class="small-title">You may also like</h4>
                            <div class="row">
                                @if ($random_posts)
                                @forelse ($random_posts as $random_post)
                                <div class="col-lg-6">
                                    <div class="blog-box">
                                        <div class="post-media">
                                            <a href="tech-single.html" title="">
                                                <img src="{{ Storage::disk('local')->url($random_post->featuredimage) }}" alt="" class="img-fluid">
                                                <div class="hovereffect">
                                                    <span class=""></span>
                                                </div><!-- end hover -->
                                            </a>
                                        </div><!-- end media -->
                                        <div class="blog-meta">
                                            <h4><a href="tech-single.html" title="">{{ $random_post->title }}</a></h4>
                                            @foreach ($random_post->categories as $category)
                                            <small><a href="blog-category-01.html" title="">{{ $category->title }}</a></small>
                                            @endforeach
                                            <small><a href="" title="">{{ $random_post->created_at->diffForHumans() }}</a></small>
                                        </div><!-- end meta -->
                                    </div><!-- end blog-box -->
                                </div><!-- end col -->
                                @empty
                                <h3>No Posts Found!</h3>
                                @endforelse
                                @endif
                            </div><!-- end row -->
                        </div><!-- end custom-box -->

                        <hr class="invis1">

                        <div class="custombox clearfix">
                            <!-- <h4 class="small-title"></h4> -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="comments-list">
                                        <div class="media">
                                            <!-- Comment form-->
                                            <div class="fb-comments" data-href="{{ Request::url() }}" data-width="" data-numposts="5"></div>
                                        </div>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                        </div><!-- end custom-box -->

                        <hr class="invis1">


                    </div><!-- end page-wrapper -->
                </div><!-- end col -->

                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="sidebar">
                        <!-- <div class="widget">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="{{ asset('frontend/upload/banner_101.jpg') }}" alt="" class=" img-fluid">
                                </div>
                            </div>
                        </div> -->

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

                        <div class="widget">
                            <h2 class="widget-title">Follow Us</h2>

                            <!-- Go to www.addthis.com/dashboard to customize your tools -->
                            <div class="addthis_inline_follow_toolbox"></div>
                        </div><!-- end widget -->

                        <!-- <div class="widget">
                            <div class="banner-spot clearfix">
                                <div class="banner-img">
                                    <img src="{{ asset('frontend/upload/banner_03.jpg') }}" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div> -->
                        <!-- end widget -->
                    </div><!-- end sidebar -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </section>
</div>

@endsection