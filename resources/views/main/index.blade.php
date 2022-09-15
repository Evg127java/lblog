@extends('layouts.main')

@section('content')
<main class="blog">
    <div class="container">
        <h1 class="edica-page-title" data-aos="fade-up">Blog</h1>
        <section class="featured-posts-section">
            <div class="row">
                <div class="mx-auto mb-2">
                    {{ $posts->links() }}
                </div>
            </div>
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-md-4 fetured-post blog-post" data-aos="fade-upr">
                        <div class="blog-post-thumbnail-wrapper">
                            <img src="{{ Storage::url($post->preview) }}" alt="blog post image preview">
                        </div>
                        <div class="d-flex justify-content-between">
                            <p class="blog-post-category">{{ $post->category->title }}</p>
                            @auth
                            <form action="{{ route('post.like.store', $post->id) }}" method="post">
                                @csrf
                                <span>{{ $post->liked_users_count }}</span>
                                <button class="bg-transparent border-0">
                                        @if(auth()->user()->likedPosts->contains($post->id))
                                            <i class="fas fa-thumbs-up"></i>
                                        @else
                                            <i class="far fa-thumbs-up"></i>
                                        @endif
                                </button>
                            </form>
                            @endauth
                            @guest
                                <div class="d-inline">
                                    <span>{{ $post->liked_users_count }}</span>
                                    <i class="far fa-thumbs-up mr-2"></i>
                                </div>
                            @endguest
                        </div>
                        <a href="{{ route('post.index', $post->id) }}" class="blog-post-permalink">
                            <h6 class="blog-post-title">{{ $post->title }}</h6>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="mx-auto mb-2" style="margin-top: -100px">
                    {{ $posts->links() }}
                </div>
            </div>
        </section>

        <div class="row">
            <div class="col-md-8">
                <section>
                    <div class="row blog-post-row">
                        @foreach($randomPosts as $randomPost)
                            <div class="col-md-6 blog-post" data-aos="fade-up">
                                <div class="blog-post-thumbnail-wrapper">
                                    <img src="{{ Storage::url($randomPost->preview) }}" alt="blog post image preview">
                                </div>
                                <p class="blog-post-category">{{ $randomPost->category->title }}</p>
                                <a href="{{ route('post.index', $randomPost->id) }}" class="blog-post-permalink">
                                    <h6 class="blog-post-title">{{ $randomPost->title }}</h6>
                                </a>
                            </div>
                        @endforeach

                    </div>
                </section>
            </div>
            <div class="col-md-4 sidebar" data-aos="fade-left">
                <div class="widget widget-post-list">
                    <h5 class="widget-title">Top posts List</h5>
                    <ul class="post-list">
                        @foreach($likedPosts as $likedPost)
                            <li class="post">
                                <a href="{{ route('post.index', $likedPost->id) }}" class="post-permalink media">
                                    <img src="{{ Storage::url($likedPost->preview) }}" alt="blog post image preview">
                                    <div class="media-body">
                                        <h6 class="post-title">{{ $likedPost->title }}</h6>
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="widget">
                    <h5 class="widget-title">Categories</h5>
                    <img src="{{asset('assets/images/blog_widget_categories.jpg')}}" alt="categories" class="w-100">
                </div>
            </div>
        </div>
    </div>

</main>
@endsection
