@extends('admin-layouts.app')
@section('content')
    <!-- Content Start -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-top: 1rem;">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6>Manage Services</h6>
                        <!-- Add Services Button -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addServiceModal">
                            Add Service
                        </button>
                    </div>

                    <!-- Responsive Table -->
                    <div class="table-responsive">
                        <table id="servicesTable" class="table table-bordered table-hover">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Service</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $service)
                                    <tr>
                                        <th>{{ $loop->iteration }}</th>
                                        <td>{{ $service->service_name }}</td>
                                        <td>{{ $service->description }}</td>
                                        <td>
                                            @if ($service->image)
                                                <img src="{{ asset('storage/' . $service->image) }}" alt="Service Image"
                                                    style="width: 50px; height: 50px; object-fit: cover;">
                                            @else
                                                No Image
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button
                                                    class="btn btn-sm btn-{{ $service->status === 'active' ? 'success' : 'danger' }} dropdown-toggle"
                                                    type="button" id="statusDropdown{{ $service->id }}"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{ ucfirst($service->status) }}
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="statusDropdown{{ $service->id }}">
                                                    <li>
                                                        <form action="{{ route('adminservices.toggleStatus', $service) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PATCH')
                                                            <button type="submit" class="dropdown-item">
                                                                {{ $service->status === 'active' ? 'Mark as Not Active' : 'Mark as Active' }}
                                                            </button>
                                                        </form>

                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <!-- Edit Button -->
                                                <button class="btn btn-sm p-0 mx-1" data-bs-toggle="modal"
                                                    data-bs-target="#editServiceModal{{ $service->id }}">
                                                    <i class="bi bi-pencil-square"
                                                        style="color: #33A046; font-size: 1.2rem;"></i>
                                                </button>

                                                <!-- Delete Button -->
                                                <form action="{{ route('adminservices.destroy', $service) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this service?');"
                                                    class="m-0">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm p-0 mx-1">
                                                        <i class="bi bi-trash" style="color: red; font-size: 1.2rem;"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content End -->

    <!-- Add Service Modal -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addServiceForm" method="POST" action="{{ route('adminservices.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="serviceName" class="form-label">Service Name</label>
                            <input type="text" class="form-control" id="serviceName" name="service_name"
                                placeholder="Enter service name" required>
                        </div>
                        <div class="mb-3">
                            <label for="serviceDescription" class="form-label">Service Description</label>
                            <textarea class="form-control" id="serviceDescription" name="description" rows="3"
                                placeholder="Enter service description" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="serviceImage" class="form-label">Service Image</label>
                            <input type="file" class="form-control" id="serviceImage" name="image" accept="image/*">
                        </div>
                        <button type="submit" class="btn btn-primary">Save Service</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Service Modals -->
    @foreach ($services as $service)
        <div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1"
            aria-labelledby="editServiceModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editServiceForm{{ $service->id }}" method="POST"
                            action="{{ route('adminservices.update', $service) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Service Name -->
                            <div class="mb-3">
                                <label for="serviceName{{ $service->id }}" class="form-label">Service Name</label>
                                <input type="text" class="form-control" id="serviceName{{ $service->id }}"
                                    name="service_name" value="{{ $service->service_name }}" required>
                            </div>

                            <!-- Service Description -->
                            <div class="mb-3">
                                <label for="serviceDescription{{ $service->id }}" class="form-label">Service
                                    Description</label>
                                <textarea class="form-control" id="serviceDescription{{ $service->id }}" name="description" rows="3"
                                    required>{{ $service->description }}</textarea>
                            </div>

                            <!-- Service Image -->
                            <div class="mb-3">
                                <label for="serviceImage{{ $service->id }}" class="form-label">Service Image</label>
                                <input type="file" class="form-control" id="serviceImage{{ $service->id }}"
                                    name="image" accept="image/*">
                                @if ($service->image)
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="Current Image"
                                        class="mt-2" style="width: 100px; height: 100px; object-fit: cover;">
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update Service</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#servicesTable').DataTable({
                responsive: true,
                paging: true,
                searching: true,
                info: true
            });
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush
