@extends('admin-layouts.app')
@php
    $servicesCount = App\Models\Service::count(); // Fetch total services count

@endphp
@section('content')
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>



    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-sm-6 col-xl-6">
                <a href="{{ route('adminservices.index') }}">
                    <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                        <i class="fa fa-chart-line fa-3x text-primary"></i>
                        <div class="ms-3">
                            <p class="mb-2">Total Services</p>
                            <h6 class="mb-0">{{ $servicesCount }}</h6> <!-- Dynamically display the count -->
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-sm-6 col-xl-6">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Total Emails</p>
                        <h6 class="mb-0">$1234</h6>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>
