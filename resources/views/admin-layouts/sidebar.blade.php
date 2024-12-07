<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <img src="{{ asset('assets/logo-green.png') }}" alt="" style="width: 7rem;">
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('assets/imgs/images.png') }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">
                    <!-- Display the logged-in user's name -->
                    {{ Auth::user()->name ?? 'Guest' }}
                </h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Services</a>
        </div>
    </nav>
</div>
<!-- Sidebar End -->
