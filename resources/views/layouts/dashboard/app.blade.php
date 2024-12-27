<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="{{ asset('admin/css/theme.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SiSehat - Admin Panel</title>
</head>

<body class=" bg-surface">
    <main>
        <!--start the project-->
        <div id="main-wrapper" class=" flex p-5 xl:pr-0 min-h-screen">
            <!--  Sidebar Start -->
            @include('layouts.dashboard.sidebar')
            <!--  Sidebar End -->
            <div class=" w-full page-wrapper xl:px-6 px-0">
                <!-- Main Content -->
                <main class="h-full  max-w-full">
                    <div class="container full-container p-0 flex flex-col gap-6">
                        <!--  Header Start -->
                        @include('layouts.dashboard.header')
                        <!--  Header End -->
                        <div class="card">
                            <div class="card-body">
                                @yield('content')
                            </div>
                        </div>
                    </div>


                </main>
                <!-- Main Content End -->

            </div>
        </div>
        <!--end of project-->
    </main>



    <script src="{{ asset('admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/libs/simplebar/dist/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/libs/iconify-icon/dist/iconify-icon.min.js') }}"></script>
    <script src="{{ asset('admin/libs/@preline/dropdown/index.js') }}"></script>
    <script src="{{ asset('admin/libs/@preline/overlay/index.js') }}"></script>
    <script src="{{ asset('admin/js/sidebarmenu.js') }}"></script>




</body>

</html>