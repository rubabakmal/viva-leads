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
        <p>Related to: <span class="services">Kitchen</span></p>
        <div class="row">
            @for ($i = 1; $i <= 3; $i++)
                {{-- Repeat for the number of cards --}}
                <div class="col-md-4 mb-4">
                    <div class="card blog-card">
                        <img src="{{ asset('assets/imgs/pexels-pixabay-257736.jpg') }}" class="card-img-top"
                            alt="Blog Image">
                        <div class="card-body">
                            <div class="card-meta mb-2">
                                <span>5 Comments</span> | <span>28th January</span>
                            </div>
                            <h5 class="card-title">All test cost 25% in always in our laboratory</h5>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blanditiis aliquid architecto
                                facere...
                            </p>
                            <a href="{{ route('blogs.blog_detail') }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
