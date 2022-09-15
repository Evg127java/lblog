@extends('layouts.main')

@section('content')
    <main class="blog-post">
        <div class="container">
            <h1 class="edica-page-title" data-aos="fade-up">{{ $post->title }}</h1>
            <p class="edica-blog-post-meta" data-aos="fade-up" data-aos-delay="200">Written on
                {{ $createDate->format('F') }} {{ $createDate->day }}, {{ $createDate->year }} • {{ $createDate->format('H:m') }} •
                 Comments ({{ $post->comments->count() }})</p>
            <section class="blog-post-featured-img" data-aos="fade-up" data-aos-delay="300">
                <img src="{{ Storage::url($post->image) }}" alt="post image" class="w-100">
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">
                        {!! $post->content !!}
                    </div>
                </div>
            </section>
            <section class="post-content">
                <div class="row">
                    <div class="col-lg-9 mx-auto">

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
                            @if(!auth()->user()->role)
                            <div class="d-inline">
                                <a href="#">
                                    <i class="fas fa-pencil-alt mr-2 text-primary"></i>
                                </a>
                            </div>
                            <div class="d-inline">
                                <a href="#">
                                    <i class="fas fa-trash mr-2 text-danger"></i>
                                </a>
                            </div>
                            @endif
                        </form>
                        @endauth
                        @guest
                            <div class="d-inline">
                                <span>{{ $post->liked_users_count }}</span>
                                <i class="far fa-thumbs-up mr-2"></i>
                            </div>
                        @endguest
                    </div>
                </div>
            </section>

            <div class="row">
                <div class="col-lg-9 mx-auto">
                    @if($relatedPosts->count() > 0)
                    <section class="related-posts">
                        <h2 class="section-title mb-4" data-aos="fade-up">Related Posts</h2>
                        <div class="row">
                            @foreach ($relatedPosts as $relatedPost)
                            <div class="col-md-4" data-aos="fade-right" data-aos-delay="100">
                                <img src="{{ Storage::url($relatedPost->image) }}" alt="related post" class="post-thumbnail">
                                <p class="post-category">{{ $relatedPost->category->title }}</p>
                                <a href="{{ route('post.index', $relatedPost->id) }}"><h5 class="post-title">{{ $relatedPost->title }}</h5></a>
                            </div>
                            @endforeach
                        </div>
                    </section>
                    @endif
                        @if($comments->count() > 0)
                            <section class="comment-list mb-5">
                                <h2 class="section-title mb-2" data-aos="fade-up">Comments({{ $comments->count() }}
                                    )</h2>
                                @foreach($comments as $comment)
                                    <div class="comment-text mb-2">
                            <span class="username">
                                <div>
                                    {{ $comment->user->name }}
                                </div>
                                <span class="text-muted float-right">{{ $comment->carbonDate->diffForHumans() }}</span>
                            </span>
                                        <!-- /.username -->
                                        {{ $comment->content }}
                                    </div>
                                @endforeach
                            </section>
                        @endif
                        @auth
                    <section class="comment-section">
                        <h2 class="section-title mb-2" data-aos="fade-up">Leave a Comment</h2>
                        <form action="{{ route('post.comment.store', $post->id ) }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-12" data-aos="fade-up">
                                    <label for="comment" class="sr-only">Comment</label>
                                    <textarea name="content" id="comment" class="form-control" placeholder="Comment" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12" data-aos="fade-up">
                                    <input type="submit" value="Send Message" class="btn btn-warning">
                                </div>
                            </div>
                        </form>
                    </section>
                    @endauth
                </div>
            </div>
        </div>
    </main>
@endsection
