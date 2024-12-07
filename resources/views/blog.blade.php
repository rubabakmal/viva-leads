@extends('viva-layouts.app')
@section('body-class', 'blog-page')
<style>

</style>
@section('content')
    <div class="blog-wrap">
        <div class="container">
            <div class="blog-inner">
                <h4>Our Blog</h4>
                <div class="services-buttons">
                    <button class="btn">Plumbing And Heating</button>
                    <button class="btn">Joinery</button>
                    <button class="btn">Kitchen</button>
                    <button class="btn">Bathrooms</button>
                    <button class="btn">PVC Windows And Doors</button>
                    <button class="btn">Electrics Service</button>
                    <button class="btn">Tilers</button>
                    <button class="btn">Brick Work</button>
                    <button class="btn">Plastering</button>
                    <button class="btn">Carpet And Flooring</button>
                </div>
            </div>
        </div>
    </div>

    <div class="blog-cards container mt-5">
        <h2 class="heading">Our Latest Blog</h2>
        <p>Related to: <span class="services">Latest Blogs</span></p>
        <div class="row">
            @foreach ($blogs as $blog)
                <div class="col-md-4 mb-4">
                    <div class="card blog-card">
                        <!-- Blog Image -->
                        <img src="{{ $blog->image ? asset('storage/' . $blog->image) : asset('assets/imgs/default-blog.jpg') }}"
                            class="card-img-top" alt="{{ $blog->title }}">

                        <div class="card-body">
                            <!-- Meta Info -->
                            <div class="card-meta mb-2">
                                <span>{{ $blog->comments_count }} Comments</span> |
                                <span>{{ $blog->created_at->format('d M Y') }}</span>
                            </div>

                            <!-- Title -->
                            <h5 class="card-title">{{ $blog->title }}</h5>

                            <!-- Content -->
                            <p class="card-text">
                                {{ Str::limit($blog->content, 100) }}
                            </p>

                            <!-- Read More Button -->
                            <a href="{{ route('blogs.blog_detail', ['id' => $blog->id]) }}" class="btn btn-primary">Read
                                More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


@endsection
