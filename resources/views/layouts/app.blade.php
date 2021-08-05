<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/slideshow.css">

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <link rel="icon" href="/uc_citcs_logo.png">
    <title>UC | CITCS Internship Album</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

    <style>
        .modal {
            transition: opacity 0.25s ease;
        }

        body.modal-active {
            overflow-x: hidden;
            overflow-y: visible !important;
        }
    </style>

</head>

<body class="flex flex-col min-h-screen" style='font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";'>

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
                    <h2 class="text-3xl italic font-extrabold antialiased" style="font-variant: small-caps;">University <small>of the</small> Cordilleras</h1>
                        <h1 class="" style="font-variant: small-caps;">College of Information Technology and Computer Sciences Gallery</h1>
                </div>

            </div>

            <div class="text-sm pt-5">
                <p>Copyright © 2021. UC CITCS. All Rights Reserved.</p>
                <p>Governor Pack Road, Baguio City, Philippines 2600</p>
            </div>

        </div>

        <div class="p-14 w-1/4 tracking-widest text-white">
            <p class="font-bold mb-2 italic">CITCS GALLERY</p>
            <ul class="text-sm font-semibold">
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
            <p class="font-bold mb-2 italic">UNIVERSITY OF THE CORDILLERAS</p>
            <ul class="text-sm font-semibold">
                <li class="mb-2">
                    <a target="_blank" href="https://www.uc-bcf.edu.ph/">Official Website</a>
                </li>
                <li class="mb-2">
                    <a target="_blank" href="https://www.linkedin.com/school/university-of-the-cordilleras/">LinkedIn</a>
                </li>
                <li class="mb-2">
                    <a target="_blank" href="https://www.facebook.com/UCjaguars">Facebook</a>
                </li>
            </ul>
        </div>

    </footer>

    <script type="text/javascript" src="/js/slideshow-auto.js"></script>
    <script type="text/javascript" src="/js/slideshow.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-success").click(function() {
                var html = $(".clone").html();
                $(".increment").after(html);
            });
            $("body").on("click", ".btn-danger", function() {
                $(this).parents(".control-group").remove();
            });
        });
    </script>

    <!-- FOR DELETE CONFIRMATION -->
    <script type="text/javascript">
        $('.delete-confirm').click(function(e) {
            var form = $(this).closest("form");
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

    <!-- FOR YEAR DROPDOWN -->
    <script>
        let dateDropdown = document.getElementById('filter-by-year');

        let currentYear = new Date().getFullYear();
        let earliestYear = 2016;

        while (currentYear >= earliestYear) {
            let dateOption = document.createElement('option');
            dateOption.text = currentYear;
            dateOption.value = currentYear;
            dateDropdown.add(dateOption);
            currentYear -= 1;
        }
    </script>

    <!-- FOR MODAL -->
    <script>
        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
            openmodal[i].addEventListener('click', function(event) {
                event.preventDefault()
                toggleModal()
            })
        }

        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)

        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
            closemodal[i].addEventListener('click', toggleModal)
        }

        document.onkeydown = function(evt) {
            evt = evt || window.event
            var isEscape = false
            if ("key" in evt) {
                isEscape = (evt.key === "Escape" || evt.key === "Esc")
            } else {
                isEscape = (evt.keyCode === 27)
            }
            if (isEscape && document.body.classList.contains('modal-active')) {
                toggleModal()
            }
        };


        function toggleModal() {
            const body = document.querySelector('body')
            const modal = document.querySelector('.modal')
            modal.classList.toggle('opacity-0')
            modal.classList.toggle('pointer-events-none')
            body.classList.toggle('modal-active')
        }
    </script>

</body>

</html>