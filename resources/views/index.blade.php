@extends('viva-layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <div class="content-box">
                <h1>Transform Your Home with Expert Services</h1>
                <div class="service-icon">
                    <a href="#"><i class="fas fa-hammer"></i> Roofing</a>
                    <a href="#"><i class="fas fa-solar-panel"></i> Solar</a>
                    <a href="#"><i class="fas fa-window-maximize"></i> Windows</a>
                    <a href="#"><i class="fas fa-bath"></i> Bathroom</a>
                    <a href="#"><i class="fas fa-utensils"></i> Kitchen</a>
                    <a href="#"><i class="fas fa-car"></i> MVA</a>
                    <a href="#"><i class="fas fa-car"></i> MVA</a>
                    <a href="#"><i class="fas fa-car"></i> MVA</a>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    {{-- <section class="how-it-works">
        <div class="container">
            <div class="row">
                <!-- Left Text Section -->
                <div class="col-md-6">
                    <div class="label-box">How It Works?</div>
                    <h3>Easy Steps to <br> Improve Your Home</h3>
                </div>
                <div class="col-md-6">
                    <p>At Viva Leads, we simplify your home improvement projects into easy and manageable steps. First, get
                        in touch with us to discuss your needs. Our team will then connect you with top-rated professionals
                        in roofing, solar, windows, bathrooms, and kitchens. Finally, sit back and watch as your home
                        transformation becomes a reality with our reliable and efficient services.</p>
                </div>
            </div>

            <!-- Card Section with Overlay -->
            <div class="row info-box-container mt-4">
                <div class="card info-box roofing">
                    <h3><i class="fas fa-check-circle"></i> Roofing Services</h3>
                    <p>Protect your home with our top-notch roofing services. We use high-quality materials and skilled
                        professionals to ensure your roof is durable and long-lasting.</p>
                </div>
                <div class="card info-box solar">
                    <h3><i class="fas fa-check-circle"></i> Solar Panel Installation</h3>
                    <p>Go green with our solar panel installation services. Save on energy bills and reduce your carbon
                        footprint with our efficient and cost-effective solar solutions.</p>
                </div>
                <div class="card info-box windows">
                    <h3><i class="fas fa-check-circle"></i> Windows</h3>
                    <p>Enhance your home' s energy efficiency and curb appeal with our window replacement services.
                        Choose from
                        a variety of styles and materials to fit your needs.</p>
                </div>
            </div>
        </div>

    </section> --}}
    <section class="how-it-works">
        <div class="container">
            <div class="row">
                <!-- Left Text Section -->
                <div class="col-md-6">
                    <div class="label-box">How It Works?</div>
                    <h3 class="title">Easy Steps to <br> Improve Your Home</h3>
                </div>
                <div class="col-md-6">
                    <p>At Viva Leads, we simplify your home improvement projects into easy and manageable steps. First, get
                        in touch with us to discuss your needs. Our team will then connect you with top-rated professionals
                        in roofing, solar, windows, bathrooms, and kitchens. Finally, sit back and watch as your home
                        transformation becomes a reality with our reliable and efficient services.</p>
                </div>
            </div>

            <!-- Card Section -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="card info-box roofing">
                        <div class="card-body">
                            <h3><i class="fas fa-check-circle"></i> Roofing Services</h3>
                            <p>Protect your home with our top-notch roofing services. We use high-quality materials and
                                skilled
                                professionals to ensure your roof is durable and long-lasting.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card info-box solar">
                        <div class="card-body">
                            <h3><i class="fas fa-check-circle"></i> Solar Panel Installation</h3>
                            <p>Go green with our solar panel installation services. Save on energy bills and reduce your
                                carbon
                                footprint with our efficient and cost-effective solar solutions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card info-box windows">
                        <div class="card-body">
                            <h3><i class="fas fa-check-circle"></i> Windows</h3>
                            <p>Enhance your home’s energy efficiency and curb appeal with our window replacement services.
                                Choose from a variety of styles and materials to fit your needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- CSS for Styling -->
@endsection
