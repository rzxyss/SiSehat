<aside id="application-sidebar-brand"
    class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full  transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-5 xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0  w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar   transition-all duration-300">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="p-4">

        <a href="{{route('dashboard.index')}}" class="text-nowrap">
            <img src="{{ asset('admin/images/logos/logo-light.svg') }}" alt="Logo-Dark" />
        </a>


    </div>
    <div class="scroll-sidebar" data-simplebar="">
        <nav class=" w-full flex flex-col sidebar-nav px-4 mt-5">
            <ul id="sidebarnav" class="text-gray-600 text-sm">
                <li class="text-xs font-bold pb-[5px]">
                    <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                    <span class="text-xs text-gray-400 font-semibold">HOME</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-base  flex items-center relative  rounded-md text-gray-500  w-full"
                        href="../index.html">
                        <i class="ti ti-layout-dashboard ps-2  text-2xl"></i> <span>Dashboard</span>
                    </a>
                </li>

                <li class="text-xs font-bold mb-4 mt-6">
                    <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                    <span class="text-xs text-gray-400 font-semibold">MASTER DATA</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full"
                        href="{{route('dashboard.dokter.index')}}">
                        <i class="fa fa-user-doctor ps-2 text-2xl"></i> <span>Dokter</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full"
                        href="../components/buttons.html">
                        <i class="fa fa-user-nurse ps-2 text-2xl"></i> <span>Apoteker</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full"
                        href="{{route('dashboard.pasien.index')}}">
                        <i class="fa fa-hospital-user ps-2 text-2xl"></i> <span>Pasien</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full {{ request()->is('dashboard.obat.*') ? 'active' : '' }}"
                        href="{{route('dashboard.obat.index')}}">
                        <i class="fa fa-pills ps-2 text-2xl"></i> <span>Obat</span>
                    </a>
                </li>

                <li class="text-xs font-bold mb-4 mt-8">
                    <i class="ti ti-dots nav-small-cap-icon  text-lg hidden text-center"></i>
                    <span class="text-xs text-gray-400 font-semibold">CONTENT DATA</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full"
                        href="../pages/authentication-login.html">
                        <i class="fa fa-newspaper ps-2 text-2xl"></i> <span>Blog</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link gap-3 py-2.5 my-1 text-base   flex items-center relative  rounded-md text-gray-500  w-full"
                        href="../pages/authentication-register.html">
                        <i class="fa fa-calendar-plus ps-2 text-2xl"></i> <span>Janji Temu Pasien</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>