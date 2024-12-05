<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Viva Lead|Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('assets/logo-green.png') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .sidebar .navbar .navbar-nav .nav-link:hover,
        .sidebar .navbar .navbar-nav .nav-link.active {
            color: #33A046;
        }

        .content .navbar .navbar-nav .nav-link:hover {
            color: #33A046;
        }

        a {
            color: #33A046;
        }

        a:hover {
            color: #33A046;
        }

        .btn-primary {
            background-color: #33A046 !important;
            border-color: #33A046 !important;
        }

        .btn-primary:hover {
            background-color: white;
            border-color: #33A046;
        }

        .nav-item {
            margin-top: 10px;
        }

        .d-flex.align-items-center button {
            margin: 0 5px;
            /* Adjust spacing between buttons */
        }

        .text-primary {
            color: #33A046 !important;
        }

        .table-responsive {
            height: calc(100vh - 200px);
            /* Adjust based on navbar and padding */
            overflow-y: auto;
            /* Adds vertical scrolling if needed */
        }

        .table {
            width: 100% !important;
            /* Ensures table spans full width */
            table-layout: auto;
            /* Flexible column widths */
        }

        th,
        td {
            white-space: nowrap;
            /* Prevent text wrapping */
            overflow: hidden;
            /* Hide overflowing text */
            text-overflow: ellipsis;
            /* Add ellipsis for overflowing text */
        }



        /* Icon Button Styling */
        .icon-btn {
            background: none;
            /* No background */
            border: none;
            /* No border */
            padding: 0;
            /* No padding */
            margin: 0;
            /* No margin */
            font-size: 0.90rem;
            /* Increase icon size */
            cursor: pointer;
            /* Pointer cursor on hover */
        }

        .icon-btn.text-danger {
            margin-top: 0.2rem;
            /* Adjust this value to fine-tune alignment */
        }

        .d-flex.gap-2 {
            align-items: center;
            /* Center aligns all icons */
        }

        .icon-btn.text-danger {
            align-self: flex-end;
            /* Moves the trash icon slightly downward */
        }

        /* Icon Hover Effect */
        .icon-btn:hover {
            opacity: 0.8;
            /* Slight opacity change on hover */
            transform: scale(1.1);
            /* Slightly enlarge on hover */
            transition: all 0.2s ease-in-out;
            /* Smooth transition */
        }

        /* Remove Focus Background */
        .icon-btn:focus {
            outline: none;
            /* Remove outline */
            background: none;
            /* No background on focus */
        }

        /* Alignment Fix */
        .d-flex.gap-2 {
            align-items: center;
            /* Vertically align icons */
        }
    </style>
</head>

<body>


    <div class="container-xxl position-relative bg-white d-flex p-0">

        @include('admin-layouts.sidebar')
        <div class="content">

            @include('admin-layouts.header')

            @yield('content')
        </div>


    </div>



    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
