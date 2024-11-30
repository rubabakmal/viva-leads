<div class="modal fade" id="editServiceModal{{ $service->id }}" tabindex="-1" aria-labelledby="editServiceModalLabel"
    aria-hidden="true">
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
                        <textarea class="form-control" id="serviceDescription{{ $service->id }}" name="description" rows="3" required>{{ $service->description }}</textarea>
                    </div>

                    <!-- Service Image -->
                    <div class="mb-3">
                        <label for="serviceImage{{ $service->id }}" class="form-label">Service Image</label>
                        <input type="file" class="form-control" id="serviceImage{{ $service->id }}" name="image"
                            accept="image/*">
                        @if ($service->image)
                            <img src="{{ asset('storage/' . $service->image) }}" alt="Current Image" class="mt-2"
                                style="width: 100px; height: 100px; object-fit: cover;">
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Update Service</button>
                </form>
            </div>
        </div>
    </div>
</div>
