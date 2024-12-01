@extends('viva-layouts.app')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
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
                        <div class="card-body info-box-body">
                            <h3><i class="fas fa-check-circle"></i> Roofing Services</h3>
                            <p>Protect your home with our top-notch roofing services. We use high-quality materials and
                                skilled
                                professionals to ensure your roof is durable and long-lasting.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card info-box solar">
                        <div class="card-body info-box-body">
                            <h3><i class="fas fa-check-circle"></i> Solar Panel Installation</h3>
                            <p>Go green with our solar panel installation services. Save on energy bills and reduce your
                                carbon
                                footprint with our efficient and cost-effective solar solutions.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card info-box windows">
                        <div class="card-body info-box-body">
                            <h3><i class="fas fa-check-circle"></i> Windows</h3>
                            <p>Enhance your home’s energy efficiency and curb appeal with our window replacement services.
                                Choose from a variety of styles and materials to fit your needs.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="expert-services">
        <section id="section-about-us-2" class="no-padding" data-bgcolor="#F2F6FE"
            style="background-color: rgb(242, 246, 254); background-size: cover;">
            <div class="image-container col-md-6 pull-left">
                <img src="{{ asset('assets/imgs/18.jpg') }}" alt="">
            </div>

            <div class="row whole-text" style="background-size: cover;">
                <div class="container" style="background-size: cover;">
                    <div class="content" data-animation="fadeInRight" data-delay="200" style="background-size: cover; ">
                        <div class="label-box">What we do?</div>
                        <h2 class="heading">
                            Elevate Your Home with <br class="d-none d-xl-block"> Our Expert Services
                        </h2>
                        <div class="small-border bg-color-secondary sm-left" style="background-size: cover;"></div>

                        <p class="expert-content">
                            At Viva Leads, we specialize in providing top-quality home improvement services to help you
                            create your dream home. Our offerings include expert roofing solutions to protect and enhance
                            your home, state-of-the-art solar panel installations to make your home energy-efficient, and
                            premium window replacements to boost both aesthetics and insulation.

                            <br><br>
                            Additionally, we offer comprehensive bathroom and kitchen remodeling services to transform these
                            essential spaces into luxurious, functional areas. For those unexpected moments, our Motor
                            Vehicle Accident (MVA) services ensure you’re never stranded. Trust Viva Leads for all your home
                            improvement needs and experience unparalleled service and results.
                        </p>
                    </div>
                </div>

            </div>

            <div class="clearfix" style="background-size: cover;"></div>
        </section>
    </section>


    <section class="contact-section">
        <div class="container">
            <div class="row">
                <!-- Left Form Section -->
                <div class="col-md-8">
                    <div class="contact-form">
                        <div class="label-box">Contact Us</div>
                        <h2 class="heading">Get In Touch</h2>
                        <form method="POST" action="{{ route('contact.send') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" name="first_name" placeholder="First Name"
                                        required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" name="last_name" placeholder="Last Name"
                                        required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" name="phone" placeholder="Your Phone" required>
                            </div>
                            <div class="mb-4">
                                <textarea class="form-control" name="message" rows="5" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">SUBMIT FORM</button>
                        </form>

                    </div>
                </div>

                <!-- Right Contact Info Section -->
                <div class="col-md-4">
                    <div class="contact-info">
                        <h3>Contact Info</h3>
                        <ul>
                            <li>
                                <i class="fas fa-phone-alt"></i>
                                <span>+1200 300 9000</span>
                            </li>
                            <li>
                                <i class="fas fa-envelope"></i>
                                <span>info@viva-leads.com</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="no-padding bg-color text-light" style="background-size: cover;">
        <div class="consultation" style="background-size: cover;">
            <div class="row g-0" style="background-size: cover;">
                <div class="col-lg-3 col-md-6" style="background-size: cover;">
                    <div class="feature-box f-boxed style-3" data-bgcolor="rgba(255,255,255,.2)"
                        style="background-color: #67A94A; background-size: cover;">
                        <i class="bg-color-secondary i-boxed fa fa-comments"></i>
                        <div class="text" style="background-size: cover;">
                            <h4>Free Consultation</h4>
                            Get expert advice at no cost. Our team is here to help you plan and design your home
                            improvement
                            projects, ensuring you get the best results.
                        </div>
                        <i class="wm fa fa-comments"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" style="background-size: cover;">
                    <div class="feature-box f-boxed style-3" data-bgcolor="rgba(255,255,255,.15)"
                        style="background-color: #67A94A; background-size: cover;">
                        <i class="bg-color-secondary i-boxed fa fa-address-card"></i>
                        <div class="text" style="background-size: cover;">
                            <h4>Find a Professional</h4>
                            Connect with top-rated contractors and service providers. We help you find the right
                            professionals for your specific home improvement needs.
                        </div>
                        <i class="wm fa fa-address-card"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" style="background-size: cover;">
                    <div class="feature-box f-boxed style-3" data-bgcolor="rgba(255,255,255,.1)"
                        style="background-color: #5EA440; background-size: cover;">
                        <i class="bg-color-secondary i-boxed fa fa-file-text"></i>
                        <div class="text" style="background-size: cover;">
                            <h4>Compare Quotes</h4>
                            Receive and compare quotes from multiple contractors. We ensure you get the best
                            value for your
                            money without compromising on quality.
                        </div>
                        <i class="wm fa fa-file-text"></i>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6" style="background-size: cover;">
                    <div class="feature-box f-boxed style-3" data-bgcolor="rgba(255,255,255,.05)"
                        style="background-color: #5EA440; background-size: cover;">
                        <i class="bg-color-secondary i-boxed fa fa-clock-o"></i>
                        <div class="text" style="background-size: cover;">
                            <h4>Exclusive Discounts</h4>
                            Access all available discounts and special offers. We provide a comprehensive list
                            of promotions
                            to help you save on your projects.
                        </div>
                        <i class="wm fa fa-clock-o"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
