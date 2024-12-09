@extends('viva-layouts.app')
@section('title', 'Services')

@section('content')
    <div class="service-wrap">
        <div class="container">
            <div class="form-container">
                <!-- Image section -->
                <div class="form-left">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->service_name }}">
                </div>
                <!-- Form section -->
                <div class="form-right">
                    <h1>{{ $service->service_name }}</h1>
                    <p>{{ $service->description }}</p>

                    <form method="POST" action="{{ route('storeservicerequest') }}">
                        @csrf
                        <input type="hidden" name="service_id" value="123">

                        <div class="form-group">
                            <input type="text" name="name" placeholder="Full Name" required> <!-- Updated name -->
                            <input type="email" name="email" placeholder="Email" required>
                        </div>

                        <!-- Contact Details -->
                        <div class="form-group">
                            <input type="tel" name="phone_number" placeholder="Phone Number" required>
                            <input type="text" name="address" placeholder="Address">

                        </div>

                        <!-- Description -->
                        <div class="form-group">
                            <input type="text" name="description" placeholder="Describe your requirement">
                        </div>

                        <!-- Terms Checkbox -->
                        <label>
                            <input type="checkbox" name="terms" required>
                            <span>
                                By Clicking “Get Quote”, I Acknowledge That I Have Read And Agreed To This Website's
                                <a href="#">Terms and Conditions</a> and
                                <a href="#">Privacy Policy</a>. And Authorize Home Improvement Companies, Their Agents
                                And
                                Marketing Partners To Contact Me About Home Improvement Products And Offers By Telephone
                                Calls
                                And Text Messages To The Number I Provided.
                            </span>
                        </label>
                        <!-- Submit Button -->
                        <button type="submit" class="submit-btn">Get Quote</button>
                    </form>
                </div>


            </div>
            <div class="expertise form-right" style=" padding-bottom: 4rem !important;">
                <h1>Expertise</h1>
                <p>{{ $service->expertise }}</p>
            </div>
        </div>

    </div>
@endsection
