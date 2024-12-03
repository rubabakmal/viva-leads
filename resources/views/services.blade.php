@extends('viva-layouts.app')

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

                    <form method="POST" action="">
                        @csrf
                        <!-- Name Fields -->
                        <div class="form-group">
                            <input type="text" name="first_name" placeholder="First Name" required>
                            <input type="text" name="last_name" placeholder="Last Name" required>
                        </div>
                        <!-- Address Fields -->
                        <div class="form-group">
                            <input type="text" name="address" placeholder="Address" required>
                            <input type="text" name="city" placeholder="City" required>
                        </div>
                        <!-- State and Zip Code -->
                        <div class="form-group">
                            <select name="state" required>
                                <option value="" disabled selected>Select State</option>
                                <option value="CA">California</option>
                                <option value="TX">Texas</option>
                                <option value="NY">New York</option>
                                <option value="FL">Florida</option>
                            </select>
                            <input type="text" name="zip_code" placeholder="Zip Code" required>
                        </div>
                        <!-- Contact Details -->
                        <div class="form-group">
                            <input type="tel" name="phone_number" placeholder="Phone Number" required>
                            <input type="email" name="email" placeholder="Email" required>
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
