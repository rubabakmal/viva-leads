@extends('viva-layouts.app')
@section('body-class', 'blog-page')
@section('title', 'Blogs')

@section('content')
    <div class="blog-wrap">
        <div class="container">
            <div class="blog-inner">
                <h4>Our Blog</h4>
                <div class="services-buttons">
                    <!-- Dynamically generate service buttons -->
                    @foreach ($services as $service)
                        <a href="{{ route('blogs.index', ['service_id' => $service->id]) }}"
                            class="btn {{ request('service_id') == $service->id ? 'btn-primary' : '' }}">
                            {{ $service->service_name }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="blog-cards container mt-5">
        <h2 class="heading">Our Latest Blog</h2>
        <p>Related to:
            <span class="services">
                {{ request('service_id') ? $services->firstWhere('id', request('service_id'))->service_name : 'All Blogs' }}
            </span>
        </p>
        <div class="row">
            @if ($blogs->isEmpty())
                <div class="col-12">
                    <p class="text-muted">No blogs available for the selected service.</p>
                </div>
            @else
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
                                <a href="{{ route('blogs.blog_detail', ['id' => $blog->id]) }}"
                                    class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
