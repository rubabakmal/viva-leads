@extends('viva-layouts.app')
@section('body-class', 'blog-page')
@section('title', 'Blog Details')

@php
    function get_gravatar($email, $size = 50, $default = 'mp', $rating = 'g')
    {
        $hash = md5(strtolower(trim($email)));
        return "https://www.gravatar.com/avatar/$hash?s=$size&d=$default&r=$rating";
    }
@endphp
@section('content')
    <div class="blog-wrap">
        <div class="container">
            <div class="blog-inner">
                <h4>Blog Detail</h4>
            </div>
        </div>
    </div>

    <div class="blog-details">
        <div class="container">
            <div class="row">
                <!-- Blog Content Section -->
                <div class="col-md-8">
                    <div class="blog-card1">
                        <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="Blog Image">
                    </div>
                    <div class="card-body">
                        <div class="card-meta mb-2">
                            <span class="comments">{{ $blog->comments->count() }} Comments</span> |
                            <span class="date">{{ $blog->created_at->format('d M Y') }}</span>
                        </div>

                        <h5 class="title">{{ $blog->title }}</h5>
                        <p class="card-text">
                            {{ $blog->content }}
                        </p>
                    </div>

                    <!-- Comments Section -->
                    <div class="comments-section mt-5">
                        <h5 class="mb-4">
                            <b>{{ $blog->comments->count() }} Comments on {{ $blog->title }}...</b>
                        </h5>
                        @foreach ($blog->comments as $comment)
                            <div class="comment d-flex mb-4 p-3 border-bottom">
                                <!-- Show profile image via Gravatar -->
                                <div class="comment-avatar me-3">
                                    <img src="{{ get_gravatar($comment->email) }}" alt="User Image" class="rounded-circle"
                                        width="50">
                                </div>
                                <div>
                                    <h6 class="m-0 fw-bold">{{ $comment->first_name }} {{ $comment->last_name }}</h6>
                                    <small class="text-muted d-block mb-2">{{ $comment->email }}</small>
                                    <p class="mb-2" style="line-height: 1.5;">{{ $comment->comment }}</p>
                                </div>
                            </div>
                        @endforeach
                        <div class="comment-form">
                            <form method="POST" action="{{ route('comments.store', $blog->id) }}">
                                @csrf
                                <h6 class="title" style="font-size: 1.5rem;">Write a Comment</h6>

                                <!-- Name Fields -->
                                <div class="form-group" style="margin-bottom: 1rem;">
                                    <input type="text" name="first_name" placeholder="First Name" required
                                        style="margin-right: 10px; width: 48%; padding: 10px;">
                                    <input type="text" name="last_name" placeholder="Last Name" required
                                        style="width: 48%; padding: 10px;">
                                </div>

                                <!-- Email Field -->
                                <div class="form-group" style="margin-bottom: 1rem;">
                                    <input type="email" name="email" placeholder="Your Email" required
                                        style="width: 100%; padding: 10px;">
                                </div>

                                <!-- Comment Field -->
                                <div class="form-group" style="margin-bottom: 1rem;">
                                    <textarea name="comment" placeholder="Write a comment..." required
                                        style="width: 100%; padding: 10px; height: 100px; resize: none; border: 1px solid #ddd; border-radius: 5px;"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" class="submit-btn"
                                    style="background-color: #4caf50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
                                    Submit
                                </button>
                            </form>
                        </div>


                    </div>
                </div>

                <div class="col-md-4">
                    <div class="recent-posts">
                        <h5><i class="fa fa-thumb-tack text-warning me-2"></i>Recent Posts</h5>

                        <!-- Loop through recent blogs -->
                        @foreach ($recentBlogs as $recentBlog)
                            <div class="recent-item d-flex mb-3">
                                <img src="{{ asset('storage/' . $recentBlog->image) }}" alt="Recent Blog Image"
                                    class="me-3 rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                <div>
                                    <a href="{{ route('blogs.blog_detail', $recentBlog->id) }}" class="text-dark">
                                        <h6 class="mb-1">{{ Str::limit($recentBlog->title, 50) }}</h6>
                                    </a>
                                    <small class="text-muted">{{ $recentBlog->created_at->format('d M Y') }}</small>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection
