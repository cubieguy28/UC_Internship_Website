<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slideshow.css') }}">

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">

	<title>University of the Cordilleras</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

</head>
<body class="flex flex-col min-h-screen" style="font-family: Verdana;" >

    <header>
        <div class="w-full">
            <img src="/citcs_header.jpg">
        </div>
            
        <nav class="p-2 bg-gray-100">
            <ul class="flex items-center text-sm font-semibold tracking-wider flex justify-around" style="color: #003d13;">
                <li class="hover:bg-gray-200 p-1 rounded-lg">
                    <a href="/" class="p-3">Home</a>
                </li>
                <li class="hover:bg-gray-200 p-1 rounded-lg">
                    <a href="/advisers" class="p-3">About</a>
                </li>
                <li class="hover:bg-gray-200 p-1 rounded-lg">
                    <a href="/partners" class="p-3">Industry Partners</a>
                </li>
                <li class="hover:bg-gray-200 p-1 rounded-lg">
                    <a href="/events" class="p-3">Activities/Accomplishments</a>
                </li>
                <li class="hover:bg-gray-200 p-1 rounded-lg">
                    <a href="/testimonials" class="p-3">Alumni Testimonials</a>
                </li>
            
            </ul>

        </nav>
    </header>

    <main class="flex-grow">
        @yield('content')
    </main>
    
    <footer class="w-full h-auto flex justify-around" style="background-color: #003d13;">

        <div class="p-10 w-1/2 font-bold tracking-widest text-white">
            <div class="flex items-center">
                <div>
                    <img src="/uc_citcs_logo.png">
                </div>
                <div>
                    <h2 class="text-3xl">University of the Cordilleras</h1>
                    <h1>College of Information Technology and Computer Sciences Gallery</h1>
                </div>
                
            </div>

            <div class="text-sm pt-5">
                <p>Copyright © 2021. UC CITCS. All Rights Reserved.</p>
                <p>Governor Pack Road, Baguio City, Philippines 2600</p>
            </div>
            
        </div>

        <div class="p-14 w-1/4 tracking-widest text-white">
            <p class="font-bold mb-5">CITCS GALLERY</p>
            <ul class="text-xs">
                <li class="mb-2">
                    <a href="/">Home</a>
                </li>
                <li class="mb-2">
                    <a href="/advisers">About</a>
                </li>
                <li class="mb-2">
                    <a href="/partners">Industry Partners</a>
                </li>
                <li class="mb-2">
                    <a href="/events">Activities/Accomplishments</a>
                </li>
                <li class="mb-2">
                    <a href="/testimonials">Alumni Testimonials</a>
                </li>
                
            </ul>
            
        </div>

        <div class="p-14 w-1/4 tracking-widest text-white">
            <p class="font-bold mb-5">UNIVERSITY OF THE CORDILLERAS</p>
            <ul class="text-xs">
                <li class="mb-2">
                    <a href="https://www.uc-bcf.edu.ph/">Official Website</a>
                </li>
                <li class="mb-2">
                    <a href="https://www.linkedin.com/school/university-of-the-cordilleras/">LinkedIn</a>
                </li>
                <li class="mb-2">
                    <a href="https://www.facebook.com/UCjaguars">Facebook</a>
                </li>
            </ul>
        </div>

    </footer>

    <!-- <script type="text/javascript" src="{{ asset('js/slideshow.js') }}"></script> -->
    <script type="text/javascript" src="{{ asset('js/slideshow-2.js') }}"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>


    <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var html = $(".clone").html();
          $(".increment").after(html);
      });
      $("body").on("click",".btn-danger",function(){ 
          $(this).parents(".control-group").remove();
      });
    });
    </script>

    <script type="text/javascript">
        $('.delete-confirm').click(function(e) {
              var form =  $(this).closest("form");
              var name = $(this).data("name");
              e.preventDefault();
              swal({
                  title: `Are you sure you want to delete this data?`,
                  text: "If you delete this, it will be gone forever.",
                  icon: "warning",
                  buttons: true,
                  dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  form.submit();
                }
              });
          });
    </script>
    
</body>
</html>