<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Viva Leads</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Radio+Canada+Big:ital,wght@0,400..700;1,400..700&family=Red+Hat+Display:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/services.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/blog.css') }}">
    <style>
        .blog-header {
            background-color: #4caf50;
            color: white;
        }

        .default-header {
            background-color: #ffffff;
            color: black;
        }

        /* Header styles for the blog page when scrolled */
        body.blog-page .header.scrolled {
            background-color: white;
            color: black;
        }

        /* Ensure nav links remain visible */
        body.blog-page .header.scrolled .nav-link {
            color: black !important;
        }

        /* Adjust the logo if it becomes invisible (optional) */
        /* Default header styles for logo (black logo for white background) */
        .header .navbar-brand img {
            filter: none;
            /* Default: no filter */
            transition: filter 0.3s ease;
            /* Smooth transition */
        }

        /* When scrolled on blog page, logo changes color for better visibility */
        body.blog-page .header.scrolled .navbar-brand img {
            filter: none;
            /* Restore default logo color for white background */
        }

        /* Specific for blog pages (white logo on the green/dark background) */
        body.blog-page .header .navbar-brand img {
            filter: brightness(0) invert(1);
            /* White logo for dark background */
        }

        /* Default .span-num color */
        .navbar-text .span-num {
            color: black;
            /* Default black color */
            transition: color 0.3s ease;
            /* Smooth transition */
        }

        /* Change to white color on the blog page */
        body.blog-page .navbar-text .span-num {
            color: white;
            /* White color specifically for blog page */
        }

        body.blog-page .navbar-text {
            color: white;
            /* White color specifically for blog page */
        }

        /* Change to black color when scrolled */
        body.blog-page .header.scrolled .navbar-text .span-num {
            color: black;
            /* Change to black on scroll */
        }

        body.blog-page .header.scrolled .navbar-text {
            color: black;
            /* Change to black on scroll */
        }

        /* General Blog Header (Desktop) */


        /* Mobile-Specific Header Background */
        @media (max-width: 551px) {

            /* For smaller screens */

            .header-blog .nav-link {
                color: black;
            }
        }

        /* Scrolled Header for Blog Page */
        .header-blog.scrolled {
            background-color: white !important;
            /* White on scroll for both mobile and desktop */
            color: black;
        }

        /* Nav Links and Text When Scrolled */
        .header-blog.scrolled .nav-link,
        .header-blog.scrolled .navbar-text .span-num {
            color: black !important;
        }

        /* Reset Logo for Scrolled State */
        .header-blog.scrolled .navbar-brand img {
            filter: none;
        }
    </style>
</head>

<body>

    <body class="@yield('body-class', 'default-page')">
        @include('viva-layouts.header')
        <div class="main">
            @yield('content')
        </div>
        @include('viva-layouts.footer')
    </body>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</body>

</html>
