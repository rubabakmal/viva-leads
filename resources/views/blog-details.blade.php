@extends('viva-layouts.app')
@section('body-class', 'blog-page')

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
                        <img src="{{ asset('assets/imgs/pexels-pixabay-257736.jpg') }}" class="card-img-top" alt="Blog Image">
                    </div>
                    <div class="card-body">
                        <div class="card-meta mb-2">
                            <span class="comments">5 Comments</span> | <span class="date">28th January</span>
                        </div>
                        <h5 class="title">All test cost 25% in always in our laboratory</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae esse debitis architecto quod?
                            Distinctio reiciendis dicta totam odit provident facilis magnam quas et eos culpa consectetur,
                            enim excepturi nostrum error porro eveniet sit recusandae nihil!
                        </p>
                    </div>

                    <!-- Comments Section -->
                    <div class="comments-section mt-5">
                        <h5 class="mb-4"><b>2 Comments on Healthy environment...</b></h5>

                        <!-- First Comment -->
                        <div class="comment d-flex mb-4 p-3 border-bottom">
                            <div class="comment-avatar me-3">
                                <img src="{{ asset('assets/imgs/testimonial1.jpg') }}" alt="User 1" class="rounded-circle"
                                    width="50">
                            </div>
                            <div>
                                <h6 class="m-0 fw-bold">John</h6>
                                <small class="text-muted d-block mb-2">United Kingdom | Posted April 7, 2019</small>
                                <p class="mb-2" style="line-height: 1.5;">
                                    Some consultants are employed indirectly by the client via a consultancy staffing
                                    company, a company that provides consultants on an agency basis.
                                </p>
                                <a href="#" class="text-primary fw-bold"><i class="fa fa-reply"
                                        aria-hidden="true"></i>
                                    Reply</a>
                            </div>
                        </div>

                        <!-- Second Comment -->
                        <div class="comment d-flex mb-4 p-3 border-bottom">
                            <div class="comment-avatar me-3">
                                <img src="{{ asset('assets/imgs/testimonial2.jpg') }}" alt="User 2" class="rounded-circle"
                                    width="50">
                            </div>
                            <div>
                                <h6 class="m-0 fw-bold">Philip W</h6>
                                <small class="text-muted d-block mb-2">United Kingdom | Posted June 7, 2019</small>
                                <p class="mb-2" style="line-height: 1.5;">
                                    Some consultants are employed indirectly by the client via a consultancy staffing
                                    company, a company that provides consultants on an agency basis.
                                </p>
                                <a href="#" class="text-primary fw-bold"><i class="fa fa-reply"
                                        aria-hidden="true"></i>
                                    Reply</a>
                            </div>
                        </div>
                        <div class="comment-form">
                            <form method="POST" action="">
                                <h6 class="title" style="font-size: 1.5rem;">Write a Comment</h6>
                                @csrf
                                <!-- Name Fields -->
                                <div class="form-group" style="margin-bottom: 1rem;">
                                    <input type="text" name="first_name" placeholder="First Name" required
                                        style="margin-right: 10px; width: 48%; padding: 10px;">
                                    <input type="text" name="last_name" placeholder="Last Name" required
                                        style="width: 48%; padding: 10px;">
                                </div>

                                <!-- Address Fields -->
                                <div class="form-group" style="margin-bottom: 1rem;">
                                    <textarea name="comment" placeholder="Write a comment..." required
                                        style="width: 100%; padding: 10px; height: 100px; resize: none; border: 1px solid #ddd; border-radius: 5px;"></textarea>
                                </div>

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
                        <h5><i class="fa fa-thumb-tack text-warning me-2"></i>Recent Post</h5>

                        <!-- Single Recent Post -->
                        <div class="recent-item">
                            <img src="{{ asset('assets/imgs/roofing.jpg') }}" alt="Post 1">
                            <div>
                                <h6>Things To Know Choosing A Cleaning...</h6>
                                <small class="date">07 AUG 2024</small>
                            </div>
                        </div>

                        <!-- Second Recent Post -->
                        <div class="recent-item">
                            <img src="{{ asset('assets/imgs/solar-panel.jpg') }}" alt="Post 2">
                            <div>
                                <h6>Step By Step Guide To Clean Your Carpets.</h6>
                                <small class="date">07 AUG 2024</small>
                            </div>
                        </div>

                        <!-- Third Recent Post -->
                        <div class="recent-item">
                            <img src="{{ asset('assets/imgs/windows.jpg') }}" alt="Post 3">
                            <div>
                                <h6>How You Typically Do Your Cleaning Process</h6>
                                <small class="date">07 AUG 2024</small>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
