    @php
        $footerServices = App\Models\Service::where('status', 'active')->get();
    @endphp


    <div class="border-bottom"></div>
    <div class="footer" style="margin-top: 7rem;">
        <div class="container px-5 mb-5">
            <div class="row">
                {{-- Col 1 --}}
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single_footer">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="{{ route('index') }}">Home</a></li>
                            <li><a href="{{ route('blogs.index') }}">Blogs</a></li>
                            <li><a href="#contact">Contact Us</a></li>
                        </ul>
                    </div>
                </div><!--- END COL -->
                <!-- Services -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single_footer">
                        <h4>Services</h4>
                        <ul>
                            @foreach ($footerServices as $service)
                                <li><a
                                        href="{{ route('services.show', $service->id) }}">{{ $service->service_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div><!-- END COL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single_footer single_footer_address">
                        <h4>Term Links</h4>
                        <ul>
                            <li><a href="{{ route('terms') }}">Terms & Condition</a></li>
                            <li><a href="{{ route('privacy') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div><!--- END COL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="single_footer single_footer_address">
                        <h4>Get In Touch</h4>
                        <p>We're here to listen:</p>

                        <span><i class="fa-solid fa-phone me-2"></i> +1 200 300 9000</span><br>
                        <span><i class="fa-regular fa-envelope me-2"></i><a href="">
                                info@viva-leads.com</a></span>

                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->

        <div class="border-bottom"></div>

        <div class="container px-5 mb-3">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <p class="copyright">© Copyright 2024 - <a href="#">Viva Leads</a></p>
                </div><!--- END COL -->
                <div class="col-lg-6 col-sm-6 col-xs-6 social_profile">
                    <ul>
                        <li><a href="#"><i class="fab fa-facebook-f" style="padding-top: 10px"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter" style="padding-top: 10px"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram" style="padding-top: 10px"></i></a></li>
                    </ul>
                </div>
            </div><!--- END ROW -->
        </div>
    </div>
