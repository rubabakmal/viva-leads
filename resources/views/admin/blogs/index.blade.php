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
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h6>Manage Blogs</h6>
                        <!-- Button to Open Add Blog Modal -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBlogModal">
                            Add Blog
                        </button>
                    </div>

                    <!-- Full-height table container -->
                    <div class="table-responsive" style="height: calc(100vh - 200px); overflow-y: auto;">
                        <table id="blogsTable" class="table table-bordered table-hover w-100">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Title</th>
                                    <th>Related Service</th>
                                    <th>Content</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($blogs as $key => $blog)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->service->service_name ?? 'No service associated' }}</td>
                                        <td>{{ Str::limit($blog->content, 50) }}</td>
                                        <td>
                                            @if ($blog->image)
                                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image"
                                                    style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center gap-2">
                                                <!-- Edit Icon -->
                                                <button class="icon-btn text-warning" data-bs-toggle="modal"
                                                    data-bs-target="#editBlogModal{{ $blog->id }}" title="Edit">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>

                                                <!-- Delete Icon -->
                                                <form action="{{ route('adminblogs.destroy', $blog->id) }}" method="POST"
                                                    onsubmit="return confirm('Are you sure you want to delete this blog?');"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="icon-btn text-danger" title="Delete">
                                                        <i class="bi bi-trash"></i>
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

    <!-- Add Blog Modal -->
    <div class="modal fade" id="addBlogModal" tabindex="-1" aria-labelledby="addBlogModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBlogModalLabel">Add New Blog</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addBlogForm" method="POST" action="{{ route('adminblogs.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="blogTitle" class="form-label">Blog Title</label>
                            <input type="text" class="form-control" id="blogTitle" name="title"
                                placeholder="Enter blog title" required>
                        </div>
                        <div class="mb-3">
                            <label for="blogContent" class="form-label">Content</label>
                            <textarea class="form-control" id="blogContent" name="content" rows="4" placeholder="Enter blog content" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="service" class="form-label">Related Service</label>
                            <select name="service_id" id="service" class="form-control" required>
                                <option value="" selected disabled>Select a Service</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->service_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="blogImage" class="form-label">Blog Image</label>
                            <input type="file" class="form-control" id="blogImage" name="image" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary">Save Blog</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Blog Modals -->
    @foreach ($blogs as $blog)
        <div class="modal fade" id="editBlogModal{{ $blog->id }}" tabindex="-1" aria-labelledby="editBlogModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editBlogModalLabel">Edit Blog</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('adminblogs.update', $blog->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="blogTitle" class="form-label">Title</label>
                                <input type="text" class="form-control" id="blogTitle" name="title"
                                    value="{{ $blog->title }}" required>
                            </div>

                            <!-- Content -->
                            <div class="mb-3">
                                <label for="blogContent" class="form-label">Content</label>
                                <textarea class="form-control" id="blogContent" name="content" rows="4" required>{{ $blog->content }}</textarea>
                            </div>

                            <!-- Service -->
                            <div class="mb-3">
                                <label for="service" class="form-label">Related Service</label>
                                <select name="service_id" id="service" class="form-control" required>
                                    <option value="" disabled>Select a Service</option>
                                    @foreach ($services as $service)
                                        <option value="{{ $service->id }}"
                                            {{ $service->id == $blog->service_id ? 'selected' : '' }}>
                                            {{ $service->service_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>



                            <!-- Image -->
                            <div class="mb-3">
                                <label for="blogImage" class="form-label">Image</label>
                                <input type="file" class="form-control" id="blogImage" name="image"
                                    accept="image/*">
                                @if ($blog->image)
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="Current Image"
                                        class="img-thumbnail mt-2" style="width: 150px;">
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Update Blog</button>
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
            $('#blogsTable').DataTable({
                responsive: true,
                autoWidth: false,
                paging: true,
                searching: true,
                info: true,
                lengthMenu: [5, 10, 25, 50],
            });
        });
    </script>
@endpush

@push('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush
