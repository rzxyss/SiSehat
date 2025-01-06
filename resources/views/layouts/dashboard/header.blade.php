<header class=" bg-white shadow-md rounded-md w-full text-sm py-4 px-6">
    <nav class=" w-ful flex items-center justify-between" aria-label="Global">
        <ul class="icon-nav flex items-center gap-4">
            <li class="relative xl:hidden">
                <a class="text-xl  icon-hover cursor-pointer text-heading" id="headerCollapse"
                    data-hs-overlay="#application-sidebar-brand" aria-controls="application-sidebar-brand"
                    aria-label="Toggle navigation" href="javascript:void(0)">
                    <i class="ti ti-menu-2 relative z-1"></i>
                </a>
            </li>
            <li>
                <h1>Header</h1>
            </li>
        </ul>
        <div class="flex items-center gap-4">
            <div class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                    <h1>{{ Auth::user()->name }}</h1>
                </a>
                <div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[200px] hidden z-[12]"
                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="card-body p-0 py-2">
                        <div class="px-4 mt-[7px] grid">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit"
                                    class="btn-outline-primary font-medium text-[15px] w-full hover:bg-blue-600 hover:text-white">Logout</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </nav>
</header>