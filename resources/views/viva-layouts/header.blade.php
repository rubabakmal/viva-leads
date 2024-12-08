 <!-- Top Bar -->
 @php
     $services = App\Models\Service::where('status', 'active')->get(); // Fetch only active services

 @endphp
 <style>
     .header-blog {
         /* Custom color for the blog header */
         color: white;
         /* Adjust text color if needed */
         /* Optional shadow */
     }

     .header-blog .nav-link {
         color: white !important;
         /* Ensure nav links are visible */
     }

     .header-blog .navbar-brand img {
         filter: brightness(0) invert(1);
         /* Adjust logo for contrast, if needed */
     }
 </style>
 <div class="top-bar" id="topBar">
     <div class="container d-flex justify-content-between align-items-center">
         <div class="topbar-widget tb-social">
             <a href="#"><i class="fab fa-facebook-f"></i></a>
             <a href="#"><i class="fab fa-twitter"></i></a>
             <a href="#"><i class="fab fa-instagram"></i></a>
         </div>
         <div class="topbar-widget tb-social">
             <a href="#">Privacy Policy</a>
             <a href="#">Terms & Condition</a>
         </div>
     </div>
 </div>
 <!-- Header -->
 <header id="header" class="header {{ request()->is('blogs*') ? 'header-blog' : '' }}">
     <div class="container">
         <nav class="navbar navbar-expand-lg">
             <a class="navbar-brand" href="#">
                 <img src="{{ asset('assets/logo-green.png') }}" alt="Logo">
             </a>
             <div class="d-flex">
                 <button class="navbar-toggler ms-3" type="button" data-toggle="collapse" data-target="#navbarNav"
                     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                 </button>
             </div>
             <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                 <ul class="navbar-nav">
                     <li class="nav-item">
                         <a class="nav-link active" href="{{ route('index') }}">Home</a>
                     </li>
                     <li class="nav-item"><span class="dot"></span></li>
                     <li class="nav-item dropdown">
                         <a class="nav-link" href="#">Services</a>
                         <ul class="dropdown-menu">
                             @foreach ($services as $service)
                                 <li>
                                     <a
                                         href="{{ route('services.show', $service->id) }}">{{ $service->service_name }}</a>
                                 </li>
                             @endforeach
                         </ul>
                     </li>



                     <li class="nav-item"><span class="dot"></span></li>
                     <li class="nav-item"><a class="nav-link" href="{{ route('blogs.index') }}">Blog</a></li>
                     <li class="nav-item"><span class="dot"></span></li>

                     <li class="nav-item"><a class="nav-link" href="">Contact Us</a></li>
                     <li class="nav-item">
                         <span class="navbar-text d-flex d-lg-none">
                             <i class="fa-solid fa-phone fa__phone"></i>
                             <div>
                                 <span>Need Help?</span><br>
                                 <span class="span-num">1200 300 9000</span>
                             </div>
                         </span>
                     </li>
                 </ul>

             </div>

             <div class="d-none d-lg-block">
                 <span class="navbar-text d-flex">
                     <i class="fa-solid fa-phone fa__phone"></i>
                     <div>
                         <span>Need Help?</span><br>
                         <span class="span-num">1200 300 9000</span>
                     </div>
                 </span>
             </div>
         </nav>
     </div>
 </header>
 <!-- Header -->

 <script>
     // Scroll Animation for Header and Top Bar
     window.addEventListener('scroll', function() {
         const header = document.getElementById('header');
         const topBar = document.getElementById('topBar');

         // When scrolling, hide the Top Bar and adjust Header
         if (window.scrollY > 50) {
             header.classList.add('scrolled');
             topBar.classList.add('hidden'); // Hide Top Bar
         } else {
             header.classList.remove('scrolled');
             topBar.classList.remove('hidden'); // Show Top Bar
         }
     });

     // Enable dropdown toggling on small screens
     document.addEventListener('DOMContentLoaded', function() {
         const dropdowns = document.querySelectorAll('.nav-item.dropdown');

         dropdowns.forEach(function(dropdown) {
             dropdown.addEventListener('click', function() {
                 this.classList.toggle('show'); // Toggle dropdown on click
             });
         });
     });
 </script>
