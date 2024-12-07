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
                        <h6>Manage Comments</h6>
                    </div>

                    <!-- Full-height table container -->
                    <div class="table-responsive" style="height: calc(100vh - 200px); overflow-y: auto;">
                        <table id="commentsTable" class="table table-bordered table-hover w-100">
                            <thead class="table-secondary">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Comment</th>
                                    <th>Author</th>
                                    <th>Related Blog</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($comments as $key => $comment)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $comment->first_name }}</td>
                                        <td>{{ $comment->email }}</td>
                                        <td>{{ Str::limit($comment->comment, 50) }}</td>

                                        <td>{{ $comment->author_name ?? 'Anonymous' }}</td>
                                        <td>{{ $comment->blog->title ?? 'No Blog' }}</td>
                                        <td>
                                            <form action="{{ route('admincomments.destroy', $comment->id) }}" method="POST"
                                                onsubmit="return confirm('Are you sure you want to delete this comment?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="icon-btn text-danger" title="Delete">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
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
@endsection

@push('scripts')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#commentsTable').DataTable({
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
