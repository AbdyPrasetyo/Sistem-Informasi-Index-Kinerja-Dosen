@include('layouts.header')
<main>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @include('sweetalert::alert')
    <!--start the project-->
    <div id="main-wrapper" class="flex">
        @include('layouts.aside')
        <div class="page-wrapper w-full" role="main">
            <!--  Header Start -->
            <header
                class="sticky top-header top-0 inset-x-0 z-[1] flex flex-wrap md:justify-start md:flex-nowrap text-sm bg-white dark:bg-dark ">
                <div class="with-vertical w-full">
                    <div class="w-full mx-auto px-4 lg:py-1 py-3 lg:px-4" aria-label="Global">
                        <div class="relative md:flex md:items-center md:justify-between">
                            <div class="hs-collapse  grow md:block">
                                <div class="flex justify-between items-center">
                                    <div class="flex items-center gap-2">
                                        <div class="flex lg:hidden w-10 md:w-full overflow-hidden">
                                            <div class="brand-logo flex  items-center ">
                                                <a href="../main/index.html" class="text-nowrap logo-img">
                                                    <img src="{{ asset('assets/images/logos/dark-logo.svg') }}"
                                                        class="dark:hidden block rtl:hidden" alt="Logo-Dark" />
                                                    <img src="{{ asset('assets/images/logos/light-logo.svg') }}"
                                                        class="dark:block hidden rtl:hidden rtl:dark:hidden"
                                                        alt="Logo-light" />

                                                    <img src="{{ asset('assets/images/logos/dark-logo-rtl.svg') }}"
                                                        class="dark:hidden hidden rtl:block rtl:dark:hidden"
                                                        alt="Logo-Dark" />
                                                    <img src="{{ asset('assets/images/logos/light-logo-rtl.svg') }}"
                                                        class="dark:hidden hidden rtl:hidden rtl:dark:block"
                                                        alt="Logo-light" />
                                                </a>
                                            </div>

                                        </div>
                                        <div class="relative">
                                            <a class="xl:flex hidden text-xl icon-hover cursor-pointer text-link dark:text-darklink sidebartoggler h-10 w-10 hover:text-primary light-dark-hoverbg  justify-center items-center rounded-full"
                                                id="headerCollapse" href="javascript:void(0)">
                                                <i class="ti ti-menu-2 relative z-[1] "></i>
                                            </a>
                                            <!--Mobile Sidebar Toggle -->
                                            <div class="sticky top-0 inset-x-0 xl:hidden">
                                                <div class="flex items-center">
                                                    <!-- Navigation Toggle -->
                                                    <a class="text-xl icon-hover cursor-pointer text-link dark:text-darklink sidebartoggler h-10 w-10 hover:text-primary light-dark-hoverbg flex justify-center items-center rounded-full"
                                                        data-hs-overlay="#application-sidebar-brand"
                                                        aria-controls="application-sidebar-brand"
                                                        aria-label="Toggle navigation">
                                                        <i class="ti ti-menu-2 relative z-[1] "></i>
                                                    </a>
                                                    <!-- End Navigation Toggle -->
                                                </div>
                                            </div>
                                            <!-- End Sidebar Toggle -->
                                        </div>

                                        <a class="hidden lg:flex relative hs-dropdown-toggle cursor-pointer text-xl hover:text-primary text-link dark:text-darklink h-10 w-10 light-dark-hoverbg  justify-center items-center rounded-full"
                                            data-hs-overlay="#hs-focus-management-modal">
                                            <i class="ti ti-search relative"></i>
                                        </a>

                                        <div class="lg:hidden">
                                            <button type="button"
                                                class="p-2 inline-flex h-10 w-10 text-link dark:text-darklink hover:text-primary light-dark-hoverbg  justify-center items-center rounded-full"
                                                data-hs-overlay="#navbar-offcanvas-example-menu"
                                                aria-controls="navbar-offcanvas-example-menu"
                                                aria-label="Toggle navigation">
                                                <i class="ti ti-apps text-xl"></i>
                                            </button>
                                        </div>

                                        <!-- Menu-->
                                        <div id="navbar-offcanvas-example"
                                            class="hs-overlay hs-overlay-open:translate-x-0 z-[2] -translate-x-full fixed top-0 start-0 transition-all duration-300 transform h-full max-w-xs bg-white dark:bg-dark  basis-full grow sm:order-1 lg:static lg:block lg:h-auto sm:max-w-none w-[270px] lg:border-r-transparent lg:transition-none lg:translate-x-0  lg:basis-auto hidden "
                                            tabindex="-1" data-hs-overlay-close-on-resize>
                                            <div class="lg:flex gap-2  items-center ">
                                                <div class="flex lg:hidden lg:p-0 p-5">
                                                    <div class="brand-logo flex  items-center ">
                                                        <a href="../main/index.html" class="text-nowrap logo-img">
                                                            <img src="{{ asset('assets/images/logos/dark-logo.svg') }}"
                                                                class="dark:hidden block rtl:hidden" alt="Logo-Dark" />
                                                            <img src="{{ asset('assets/images/logos/light-logo.svg') }}"
                                                                class="dark:block hidden rtl:hidden rtl:dark:hidden"
                                                                alt="Logo-light" />

                                                            <img src="{{ asset('assets/images/logos/dark-logo-rtl.svg') }}"
                                                                class="dark:hidden hidden rtl:block rtl:dark:hidden"
                                                                alt="Logo-Dark" />
                                                            <img src="{{ asset('assets/images/logos/light-logo-rtl.svg') }}"
                                                                class="dark:hidden hidden rtl:hidden rtl:dark:block"
                                                                alt="Logo-light" />
                                                        </a>
                                                    </div>

                                                </div>
                                                <div class="lg:p-0 p-5 lg:flex gap-2 items-center">


                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="icon-nav items-center gap-3 lg:gap-4 flex">
                                        <!-- Theme Toggle  -->
                                        <button type="button"
                                            class="hs-dark-mode-active:hidden icon-hover block hs-dark-mode group items-center font-medium hover:text-primary text-link dark:text-darklink h-10 w-10 light-dark-hoverbg  justify-center rounded-full"
                                            data-hs-theme-click-value="dark" id="dark-layout">
                                            <i
                                                class="ti ti-moon text-xl  text-link dark:text-darklink relative  hover:text-primary"></i>
                                        </button>
                                        <button type="button"
                                            class="hs-dark-mode-active:block icon-hover hidden hs-dark-mode group  items-center  font-medium hover:text-primary text-link dark:text-darklink h-10 w-10 light-dark-hoverbg  justify-center rounded-full"
                                            data-hs-theme-click-value="light" id="light-layout">
                                            <i
                                                class="ti ti-sun text-xl  text-link dark:text-darklink relative  hover:text-primary"></i>
                                        </button>



                                        {{-- <div
                                            class="hs-dropdown [--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] sm:relative group/menu">
                                            <a id="hs-dropdown-hover-event-notification"
                                                class="relative hs-dropdown-toggle h-10 w-10 text-link dark:text-darklink cursor-pointer hover:bg-lightprimary  hover:text-primary dark:hover:bg-darkprimary flex justify-center items-center rounded-full group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
                                                <i class="ti ti-bell-ringing text-xl relative z-[1]"></i>
                                                <div
                                                    class="absolute inline-flex items-center justify-center  text-white text-[11px] font-medium  bg-primary p-[5px] rounded-full -top-[-5px] -right-[0px]">
                                                </div>
                                            </a>
                                            <div class="card hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 right-0 rtl:right-auto rtl:left-0 mt-2 min-w-max top-auto w-full sm:w-[360px] hidden z-[2]"
                                                aria-labelledby="hs-dropdown-hover-event-notification">
                                                <div class="flex items-center py-4 px-7 justify-between">
                                                    <h3 class="mb-0 card-title">
                                                        Notifications</h3>
                                                    <span class="text-xs badge-md bg-primary text-white">5
                                                        new</span>
                                                </div>
                                                <div class="message-body max-h-[350px]" data-simplebar="">
                                                    <a href="javascript:void(0)"
                                                        class="px-7 py-3 flex items-center light-dark-hoverbg">
                                                        <span
                                                            class="flex-shrink-0 h-12 w-12 rounded-full bg-lightprimary dark:bg-darkprimary flex justify-center items-center">
                                                            <i class="ti ti-dashboard text-primary text-xl"></i>
                                                        </span>
                                                        <div class="ps-4">
                                                            <h5 class="text-sm">
                                                                Launch Admin
                                                            </h5>
                                                            <span>Just see the my new
                                                                admin!</span>
                                                        </div>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                        class="px-7 py-3 flex items-center light-dark-hoverbg">
                                                        <span
                                                            class="flex-shrink-0 h-12 w-12 rounded-full bg-lighterror dark:bg-darkerror flex justify-center items-center">
                                                            <i class="ti ti-screen-share text-error text-xl"></i>
                                                        </span>
                                                        <div class="ps-4">
                                                            <h5 class="text-sm">
                                                                Meeting Today
                                                            </h5>
                                                            <span>Check your schedule</span>
                                                        </div>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                        class="px-7 py-3 flex items-center light-dark-hoverbg">
                                                        <span
                                                            class="flex-shrink-0 h-12 w-12 rounded-full bg-lightsuccess dark:bg-darksuccess flex justify-center items-center">
                                                            <i class="ti ti-coin text-success text-xl"></i>
                                                        </span>
                                                        <div class="ps-4">
                                                            <h5 class="text-sm">
                                                                New Payment received
                                                            </h5>
                                                            <span>Check
                                                                your
                                                                earnings</span>
                                                        </div>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                        class="px-7 py-3 flex items-center light-dark-hoverbg">
                                                        <span
                                                            class="flex-shrink-0 h-12 w-12 rounded-full bg-lightwarning dark:bg-darkwarning flex justify-center items-center">
                                                            <i class="ti ti-credit-card text-warning text-xl"></i>
                                                        </span>
                                                        <div class="ps-4">
                                                            <h5 class="text-sm">
                                                                Pay Bills
                                                            </h5>
                                                            <span>Just a reminder that you have pay</span>
                                                        </div>
                                                    </a>
                                                    <a href="javascript:void(0)"
                                                        class="px-7 py-3 flex items-center light-dark-hoverbg">
                                                        <span
                                                            class="flex-shrink-0 h-12 w-12 rounded-full bg-lightinfo dark:bg-darkinfo flex justify-center items-center">
                                                            <i
                                                                class="ti ti-calendar-month text-info text-xl font-thin"></i>
                                                        </span>
                                                        <div class="ps-4">
                                                            <h5 class="text-sm">
                                                                Go for Event
                                                            </h5>
                                                            <span>Just a reminder for
                                                                event</span>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="pt-3 pb-6 px-7">
                                                    <a href="#" class="btn btn-outline-primary block w-full">
                                                        See All Notifications
                                                    </a>
                                                </div>
                                            </div>
                                        </div> --}}
                                        <!-- Profile DD -->
                                        <div
                                            class="hs-dropdown [--strategy:absolute] [--adaptive:none] [--placement:top-left] sm:[--trigger:hover] sm:relative group/menu">
                                            <a id="hs-dropdown-hover-event-profile"
                                                class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
                                                <img class="object-cover w-9 h-9 rounded-full"
                                                    src="{{ asset('assets/images/profile/user-1.jpg') }}" alt=""
                                                    aria-hidden="true">
                                            </a>
                                            <div class="card hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max top-auto right-0 rtl:right-auto rtl:left-0 w-full sm:w-[360px] hidden z-[2]"
                                                aria-labelledby="hs-dropdown-hover-event-profile">
                                                <div class="card-body">
                                                    <div class="flex items-center pb-4 justify-between">
                                                        <h3 class="mb-0 card-title">User
                                                            Profile</h3>
                                                    </div>
                                                    <div class="message-body max-h-[450px]" data-simplebar="">
                                                        <div class="">
                                                            <div class="flex items-center">
                                                                <img src="{{ asset('assets/images/profile/user-1.jpg') }}"
                                                                    class="h-20 w-20 rounded-full object-cover"
                                                                    alt="profile">
                                                                <div class="ml-4 rtl:mr-4 rtl:ml-auto">
                                                                    <h5 class="text-base">
                                                                        {{ Auth::user()->name }}
                                                                    </h5>
                                                                    <p
                                                                        class="text-xs font-normal text-link dark:text-darklink ">
                                                                        @if (Auth::user()->role == 1)
                                                                        Admin
                                                                        @elseif (Auth::user()->role == 2)
                                                                        Dosen
                                                                        @else
                                                                        Mahasiswa
                                                                        @endif
                                                                    </p>
                                                                    <span
                                                                        class="text-sm font-normal flex items-center text-link dark:text-darklink">
                                                                        <i class="ti ti-mail mr-2"></i>
                                                                        <span> {{ Auth::user()->email }}</span>
                                                                    </span>
                                                                </div>
                                                            </div>

                                                            <ul class="mt-10">
                                                                <li class="mb-5">
                                                                    <a href="{{ url('profile') }}"
                                                                        class="flex gap-3 items-center group">
                                                                        <span
                                                                            class="bg-lightgray dark:bg-darkgray    h-12 w-12 flex justify-center items-center rounded-md">
                                                                            <img src="{{ asset('assets/images/svgs/icon-account.svg') }}"
                                                                                class="h-6 w-6">
                                                                        </span>

                                                                        <div class="">
                                                                            <h6
                                                                                class="text-sm mb-1  group-hover:text-primary">
                                                                                My Profile
                                                                            </h6>
                                                                            <p
                                                                                class="text-xs text-link dark:text-darklink font-normal">
                                                                                Account settings</p>
                                                                        </div>
                                                                    </a>
                                                                </li>

                                                                </li>
                                                            </ul>


                                                        </div>
                                                    </div>
                                                    <div class="mt-5">

                                                        <form action="{{ route('logout') }}" id="logoutForm"
                                                            method="POST">
                                                            @csrf
                                                            <button id="logoutButton" type="sumbit"
                                                                class="btn btn-outline-primary block w-full">
                                                                Logout
                                                            </button>
                                                        </form>
                                                        <script
                                                            src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.1/dist/sweetalert2.all.min.js">
                                                        </script>
                                                        <script>
                                                            document.getElementById('logoutButton').addEventListener(
                                                                'click',
                                                                function (event) {
                                                                    event
                                                                .preventDefault(); // Mencegah submit default form

                                                                    // Tampilkan pesan konfirmasi SweetAlert
                                                                    Swal.fire({
                                                                        title: 'Konfirmasi',
                                                                        text: 'Anda yakin ingin logout?',
                                                                        icon: 'warning',
                                                                        showCancelButton: true,
                                                                        confirmButtonColor: '#3085d6',
                                                                        cancelButtonColor: '#d33',
                                                                        confirmButtonText: 'Yes!',
                                                                        cancelButtonText: 'No'
                                                                    }).then((result) => {
                                                                        // Jika pengguna mengklik "Ya", submit formulir logout
                                                                        if (result.isConfirmed) {
                                                                            document.getElementById(
                                                                                'logoutForm').submit();
                                                                        }
                                                                    });
                                                                });
                                                        </script>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="with-horizontal w-full">
                    <div class="bg-white dark:bg-dark shadow-md dark:shadow-dark-md">
                        <div class="container">
                            <div class="w-full mx-auto">
                                <div class="relative md:flex md:items-center md:justify-between">
                                    <div class="hs-collapse  grow md:block">
                                        <div class="flex justify-between items-center">
                                            <div class="flex items-center gap-2">
                                                <div class="flex  w-10 md:w-full overflow-hidden">
                                                    <div class="brand-logo flex  items-center ">
                                                        <a href="../main/index.html" class="text-nowrap logo-img">
                                                            <img src="../assets/images/logos/dark-logo.svg"
                                                                class="dark:hidden block rtl:hidden" alt="Logo-Dark" />
                                                            <img src="../assets/images/logos/light-logo.svg"
                                                                class="dark:block hidden rtl:hidden rtl:dark:hidden"
                                                                alt="Logo-light" />

                                                            <img src="../assets/images/logos/dark-logo-rtl.svg"
                                                                class="dark:hidden hidden rtl:block rtl:dark:hidden"
                                                                alt="Logo-Dark" />
                                                            <img src="../assets/images/logos/light-logo-rtl.svg"
                                                                class="dark:hidden hidden rtl:hidden rtl:dark:block"
                                                                alt="Logo-light" />
                                                        </a>
                                                    </div>

                                                </div>
                                                <div class="relative">
                                                    <!--Mobile Sidebar Toggle -->
                                                    <div class="sticky top-0 inset-x-0 xl:hidden">
                                                        <div class="flex items-center">
                                                            <!-- Navigation Toggle -->
                                                            <a class="text-xl icon-hover cursor-pointer text-link dark:text-darklink sidebartoggler h-10 w-10 hover:text-primary light-dark-hoverbg flex justify-center items-center rounded-full"
                                                                data-hs-overlay="#application-sidebar-brand"
                                                                aria-controls="application-sidebar-brand"
                                                                aria-label="Toggle navigation">
                                                                <i class="ti ti-menu-2 relative z-[1] "></i>
                                                            </a>
                                                            <!-- End Navigation Toggle -->
                                                        </div>
                                                    </div>
                                                    <!-- End Sidebar Toggle -->
                                                </div>
                                                <div>
                                                    <a class="hidden lg:flex relative hs-dropdown-toggle cursor-pointer text-xl hover:text-primary text-link dark:text-darklink h-10 w-10 light-dark-hoverbg  justify-center items-center rounded-full"
                                                        data-hs-overlay="#hs-focus-management-modal">
                                                        <i class="ti ti-search relative"></i>
                                                    </a>
                                                </div>
                                                <div class="lg:hidden">
                                                    <button type="button"
                                                        class="p-2 inline-flex h-10 w-10 text-link dark:text-darklink hover:text-primary light-dark-hoverbg  justify-center items-center rounded-full"
                                                        data-hs-overlay="#navbar-offcanvas-example-menu"
                                                        aria-controls="navbar-offcanvas-example-menu"
                                                        aria-label="Toggle navigation">
                                                        <i class="ti ti-apps text-xl"></i>
                                                    </button>
                                                </div>



                                            </div>


                                            <div class="icon-nav items-center gap-3 lg:gap-4 flex">
                                                <!-- Theme Toggle  -->
                                                <button type="button"
                                                    class="hs-dark-mode-active:hidden icon-hover block hs-dark-mode group items-center font-medium hover:text-primary text-link dark:text-darklink h-10 w-10 light-dark-hoverbg  justify-center rounded-full"
                                                    data-hs-theme-click-value="dark" id="dark-layout-h">
                                                    <i
                                                        class="ti ti-moon text-xl  text-link dark:text-darklink relative  hover:text-primary"></i>
                                                </button>
                                                <button type="button"
                                                    class="hs-dark-mode-active:block icon-hover hidden hs-dark-mode group  items-center  font-medium hover:text-primary text-link dark:text-darklink h-10 w-10 light-dark-hoverbg  justify-center rounded-full"
                                                    data-hs-theme-click-value="light" id="light-layout-h">
                                                    <i
                                                        class="ti ti-sun text-xl  text-link dark:text-darklink relative  hover:text-primary"></i>
                                                </button>

                                                <!-- Language DD -->
                                                <div
                                                    class="hs-dropdown [--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] sm:relative sm:block hidden group/menu">
                                                    <a id="hs-dropdown-hover-event-lang"
                                                        class="relative hs-dropdown-toggle icon-hover cursor-pointer h-10 w-10  light-dark-hoverbg flex justify-center items-center rounded-full group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
                                                        <img src="../assets/images/svgs/icon-flag-en.svg" alt="language"
                                                            class="object-cover w-5 h-5 rounded-full relative z-[1]" />
                                                    </a>

                                                    <div aria-labelledby="hs-dropdown-hover-event-lang"
                                                        class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 right-0 rtl:right-auto rtl:left-0 hidden z-10 sm:mt-3 top-auto w-full sm:w-[250px] before:absolute">
                                                        <div class="message-body max-h-[200px]">
                                                            <a href="javascript:void(0)"
                                                                class="dropdown-item px-5 py-3 flex items-center light-dark-hoverbg">
                                                                <div class="flex gap-3 items-center">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="../assets/images/svgs/icon-flag-en.svg"
                                                                            alt="user"
                                                                            class="object-cover w-5 h-5 rounded-full">
                                                                    </span>
                                                                    <span
                                                                        class="text-sm block font-normal  text-link dark:text-darklink">English</span>
                                                                </div>
                                                            </a>

                                                            <a href="javascript:void(0)"
                                                                class="dropdown-item px-5 py-3 flex items-center light-dark-hoverbg">
                                                                <div class="flex gap-3 items-center">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="../assets/images/svgs/icon-flag-cn.svg"
                                                                            alt="user"
                                                                            class="object-cover w-5 h-5 rounded-full">
                                                                    </span>
                                                                    <span
                                                                        class="text-sm block font-normal  text-link dark:text-darklink">Chinese</span>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)"
                                                                class="dropdown-item px-5 py-3 flex items-center light-dark-hoverbg">
                                                                <div class="flex gap-3 items-center">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="../assets/images/svgs/icon-flag-fr.svg"
                                                                            alt="user"
                                                                            class="object-cover w-5 h-5 rounded-full">
                                                                    </span>
                                                                    <span
                                                                        class="text-sm block font-normal  text-link dark:text-darklink">French</span>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)"
                                                                class="dropdown-item px-5 py-3 flex items-center light-dark-hoverbg">
                                                                <div class="flex gap-3 items-center">
                                                                    <span class="flex-shrink-0">
                                                                        <img src="../assets/images/svgs/icon-flag-sa.svg"
                                                                            alt="user"
                                                                            class="object-cover w-5 h-5 rounded-full">
                                                                    </span>
                                                                    <span
                                                                        class="text-sm block font-normal  text-link dark:text-darklink">Arabic</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Cart Canvas-->
                                                <a href="#"
                                                    class="rounded-full icon-hover h-10 w-10 flex justify-center text-link dark:text-darklink items-center hover:text-primary  relative light-dark-hoverbg "
                                                    data-hs-overlay="#hs-overlay-right-cart">
                                                    <i class="ti ti-basket text-xl relative "></i>
                                                    <div
                                                        class="absolute inline-flex items-center justify-center w-5 h-5 text-white text-[11px] font-medium  bg-error  rounded-full -top-0 md:-top-[0px] sm:-top-[0px] -right-1">
                                                        2</div>
                                                </a>
                                                <!-- Notifications DD -->

                                                <div
                                                    class="hs-dropdown [--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] sm:relative group/menu">
                                                    <a id="hs-dropdown-hover-event-notification"
                                                        class="relative hs-dropdown-toggle h-10 w-10 text-link dark:text-darklink cursor-pointer hover:bg-lightprimary  hover:text-primary dark:hover:bg-darkprimary flex justify-center items-center rounded-full group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
                                                        <i class="ti ti-bell-ringing text-xl relative z-[1]"></i>
                                                        <div
                                                            class="absolute inline-flex items-center justify-center  text-white text-[11px] font-medium  bg-primary p-[5px] rounded-full -top-[-5px] -right-[0px]">
                                                        </div>
                                                    </a>
                                                    <div class="card hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 right-0 rtl:right-auto rtl:left-0 mt-2 min-w-max top-auto w-full sm:w-[360px] hidden z-[2]"
                                                        aria-labelledby="hs-dropdown-hover-event-notification">
                                                        <div class="flex items-center py-4 px-7 justify-between">
                                                            <h3 class="mb-0 card-title">
                                                                Notifications</h3>
                                                            <span class="text-xs badge-md bg-primary text-white">5
                                                                new</span>
                                                        </div>
                                                        <div class="message-body max-h-[350px]" data-simplebar="">
                                                            <a href="javascript:void(0)"
                                                                class="px-7 py-3 flex items-center light-dark-hoverbg">
                                                                <span
                                                                    class="flex-shrink-0 h-12 w-12 rounded-full bg-lightprimary dark:bg-darkprimary flex justify-center items-center">
                                                                    <i class="ti ti-dashboard text-primary text-xl"></i>
                                                                </span>
                                                                <div class="ps-4">
                                                                    <h5 class="text-sm">
                                                                        Launch Admin
                                                                    </h5>
                                                                    <span>Just see the my new
                                                                        admin!</span>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)"
                                                                class="px-7 py-3 flex items-center light-dark-hoverbg">
                                                                <span
                                                                    class="flex-shrink-0 h-12 w-12 rounded-full bg-lighterror dark:bg-darkerror flex justify-center items-center">
                                                                    <i
                                                                        class="ti ti-screen-share text-error text-xl"></i>
                                                                </span>
                                                                <div class="ps-4">
                                                                    <h5 class="text-sm">
                                                                        Meeting Today
                                                                    </h5>
                                                                    <span>Check your schedule</span>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)"
                                                                class="px-7 py-3 flex items-center light-dark-hoverbg">
                                                                <span
                                                                    class="flex-shrink-0 h-12 w-12 rounded-full bg-lightsuccess dark:bg-darksuccess flex justify-center items-center">
                                                                    <i class="ti ti-coin text-success text-xl"></i>
                                                                </span>
                                                                <div class="ps-4">
                                                                    <h5 class="text-sm">
                                                                        New Payment received
                                                                    </h5>
                                                                    <span>Check
                                                                        your
                                                                        earnings</span>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)"
                                                                class="px-7 py-3 flex items-center light-dark-hoverbg">
                                                                <span
                                                                    class="flex-shrink-0 h-12 w-12 rounded-full bg-lightwarning dark:bg-darkwarning flex justify-center items-center">
                                                                    <i
                                                                        class="ti ti-credit-card text-warning text-xl"></i>
                                                                </span>
                                                                <div class="ps-4">
                                                                    <h5 class="text-sm">
                                                                        Pay Bills
                                                                    </h5>
                                                                    <span>Just a reminder that you have pay</span>
                                                                </div>
                                                            </a>
                                                            <a href="javascript:void(0)"
                                                                class="px-7 py-3 flex items-center light-dark-hoverbg">
                                                                <span
                                                                    class="flex-shrink-0 h-12 w-12 rounded-full bg-lightinfo dark:bg-darkinfo flex justify-center items-center">
                                                                    <i
                                                                        class="ti ti-calendar-month text-info text-xl font-thin"></i>
                                                                </span>
                                                                <div class="ps-4">
                                                                    <h5 class="text-sm">
                                                                        Go for Event
                                                                    </h5>
                                                                    <span>Just a reminder for
                                                                        event</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="pt-3 pb-6 px-7">
                                                            <a href="#" class="btn btn-outline-primary block w-full">
                                                                See All Notifications
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Profile DD -->

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!--  Header End -->



            <!-- Main Content -->
            @yield('content')


            <div class=" max-w-full pt-6">
                <div class="container full-container py-5">
                    <div class="grid grid-cols-12 gap-6">
                        <!---Top Cards--->
                        {{-- <div class="col-span-12">
								<div class="owl-carousel counter-carousel owl-theme ">
									<div class="item">
										<div class="card mb-0 shadow-none bg-lightprimary dark:bg-darkprimary w-full">
											<div class="card-body">
												<div class="text-center">
													<div class="flex justify-center">
														<img src="{{ asset('assets/images/svgs/icon-user-male.svg') }}" width="50"
                        height="50" class="mb-3" alt>
                    </div>
                    <p class="font-semibold  text-primary mb-1">
                        Employees
                    </p>
                    <h5 class="text-lg font-semibold text-primary mb-0">96</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card mb-0 shadow-none bg-lightwarning dark:bg-darkwarning w-full">
            <div class="card-body">
                <div class="text-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('assets/images/svgs/icon-briefcase.svg') }}" width="50" height="50"
                            class="mb-3" alt>
                    </div>
                    <p class="font-semibold  text-warning mb-1">
                        Clients
                    </p>
                    <h5 class="text-lg font-semibold text-warning mb-0">3,650</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card mb-0 shadow-none bg-lightinfo dark:bg-darkinfo w-full">
            <div class="card-body">
                <div class="text-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('assets/images/svgs/icon-mailbox.svg') }}" width="50" height="50"
                            class="mb-3" alt>
                    </div>
                    <p class="font-semibold  text-info mb-1">
                        Projects
                    </p>
                    <h5 class="text-lg font-semibold text-info mb-0">356</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card mb-0 shadow-none bg-lighterror dark:bg-darkerror w-full">
            <div class="card-body">
                <div class="text-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('assets/images/svgs/icon-favorites.svg') }}" width="50" height="50"
                            class="mb-3" alt>
                    </div>
                    <p class="font-semibold  text-error mb-1">
                        Events
                    </p>
                    <h5 class="text-lg font-semibold text-error mb-0">696</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card mb-0 shadow-none bg-lightsuccess dark:bg-darksuccess w-full">
            <div class="card-body">
                <div class="text-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('assets/images/svgs/icon-speech-bubble.svg') }}" width="50" height="50"
                            class="mb-3" alt>
                    </div>
                    <p class="font-semibold  text-success mb-1">
                        Payroll
                    </p>
                    <h5 class="text-lg font-semibold text-success mb-0">$96k</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="card mb-0 shadow-none bg-lightprimary dark:bg-darkprimary w-full">
            <div class="card-body">
                <div class="text-center">
                    <div class="flex justify-center">
                        <img src="{{ asset('assets/images/svgs/icon-connect.svg') }}" width="50" height="50"
                            class="mb-3" alt>
                    </div>
                    <p class="font-semibold  text-primary mb-1">
                        Reports
                    </p>
                    <h5 class="text-lg font-semibold text-primary mb-0">59</h5>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div> --}}
    <!---Top Cards End--->
    {{-- konten --}}



    </div>

    </div>
    </div>



    <!-- Main Content End -->







    </div>

    </div>
    <!--end of project-->

</main>




<!-- Menu Canvas-->
<div id="navbar-offcanvas-example-menu"
    class="lg:hidden bg-white hs-overlay  dark:bg-dark hs-overlay-open:translate-x-0  translate-x-full rtl:hs-overlay-open:translate-x-0  rtl:-translate-x-full  fixed top-0 right-0 rtl:left-0 rtl:right-auto transition-all duration-300 transform h-full max-w-xs  w-full z-[60] hidden"
    tabindex="-1" data-hs-overlay-close-on-resize>
    <div class="lg:flex gap-2  items-center ">
        <div class="flex lg:hidden lg:p-0 p-5">
            <div class="brand-logo flex  items-center ">
                <a href="../main/index.html" class="text-nowrap logo-img">
                    <img src="{{ asset('assets/images/logos/dark-logo.svg') }}" class="dark:hidden block rtl:hidden"
                        alt="Logo-Dark" />
                    <img src="{{ asset('assets/images/logos/light-logo.svg') }}"
                        class="dark:block hidden rtl:hidden rtl:dark:hidden" alt="Logo-light" />

                    <img src="{{ asset('assets/images/logos/dark-logo-rtl.svg') }}"
                        class="dark:hidden hidden rtl:block rtl:dark:hidden" alt="Logo-Dark" />
                    <img src="{{ asset('assets/images/logos/light-logo-rtl.svg') }}"
                        class="dark:hidden hidden rtl:hidden rtl:dark:block" alt="Logo-light" />
                </a>
            </div>

        </div>
        <div class="lg:p-0 p-5 lg:flex gap-2 items-center" data-simplebar="" style="height: calc(100vh - 100px)">
            <div class="lg:flex items-center">
                <div
                    class="hs-dropdown lg:py-4  [--strategy:static] lg:[--strategy:absolute] [--adaptive:none] sm:[--trigger:hover] relative group/menu">
                    <button type="button"
                        class="header-link-btn group-hover/menu:bg-lightprimary group-hover/menu:text-primary">
                        <i class="ti ti-api-app lg:hidden lg:text-sm text-xl"></i>Apps
                        <i class="ti ti-chevron-down  ms-auto lg:text-sm text-lg"></i>
                    </button>

                    <div
                        class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] sm:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 left-0 hidden z-10 sm:mt-3 top-full start-0 min-w-[15rem] lg:w-[900px] before:absolute lg:bg-white bg-transparent dark:bg-dark lg:shadow-md shadow-none">
                        <div class="grid grid-cols-12">
                            <div class="lg:col-span-8 col-span-12 flex items-stretch lg:px-5 lg:pr-0 px-0 py-5">
                                <div class="grid grid-cols-12 lg:gap-3 w-full">
                                    <div class="col-span-12 lg:col-span-6 flex items-stretch">
                                        <ul>
                                            <li class="mb-5">
                                                <a href="../main/app-chat.html"
                                                    class="flex gap-3 items-center  group relative">
                                                    <span class="apps-icons">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-chat.svg') }}"
                                                            class="h-6 w-6">
                                                    </span>
                                                    <div class="">
                                                        <h6 class="font-semibold text-sm group-hover:text-primary">
                                                            Chat Application
                                                        </h6>
                                                        <p class="text-xs">
                                                            New messages arrived</p>
                                                    </div>

                                                </a>
                                            </li>
                                            <li class="mb-5">
                                                <a href="../main/page-user-profile.html"
                                                    class="flex gap-3 items-center  group relative">
                                                    <span class="apps-icons">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-invoice.svg') }}"
                                                            class="h-6 w-6">
                                                    </span>
                                                    <div class="">
                                                        <h6 class="font-semibold text-sm group-hover:text-primary ">
                                                            User Profile App
                                                        </h6>
                                                        <p class="text-xs">
                                                            Get profile details</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="mb-5">
                                                <a href="../main/app-contact.html"
                                                    class="flex gap-3 items-center group relative">
                                                    <span class="apps-icons">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-mobile.svg') }}"
                                                            class="h-6 w-6">
                                                    </span>
                                                    <div class="">
                                                        <h6 class="font-semibold text-sm group-hover:text-primary">
                                                            Contact Application
                                                        </h6>
                                                        <p class="text-xs">
                                                            2 Unsaved Contacts</p>
                                                    </div>
                                                </a>
                                            </li>
                                            <li class="mb-5">
                                                <a href="../main/app-email.html"
                                                    class="flex gap-3 items-center group relative">
                                                    <span class="apps-icons">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-message-box.svg') }}"
                                                            class="h-6 w-6">
                                                    </span>
                                                    <div class="">
                                                        <h6 class="font-semibold text-sm group-hover:text-primary">
                                                            Email App
                                                        </h6>
                                                        <p class="text-xs">
                                                            Get new emails</p>
                                                    </div>

                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-span-12 lg:col-span-6 flex items-stretch">
                                        <ul>
                                            <li class="mb-5">
                                                <a href="../main/eco-shop.html"
                                                    class="flex gap-3 items-center  group relative">
                                                    <span class="apps-icons">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-cart.svg') }}"
                                                            class="h-6 w-6">
                                                    </span>
                                                    <div class="">
                                                        <h6 class="font-semibold text-sm group-hover:text-primary">
                                                            eCommerce App

                                                        </h6>
                                                        <p class="text-xs">
                                                            learn more information</p>
                                                    </div>


                                                </a>
                                            </li>
                                            <li class="mb-5">
                                                <a href="../main/app-calendar.html"
                                                    class="flex gap-3 items-center group relative">
                                                    <span class="apps-icons">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-mobile.svg') }}"
                                                            class="h-6 w-6">
                                                    </span>
                                                    <div class="">
                                                        <h6 class="font-semibold text-sm group-hover:text-primary">
                                                            Calendar App
                                                        </h6>
                                                        <p class="text-xs">
                                                            Get dates</p>
                                                    </div>


                                                </a>
                                            </li>
                                            <li class="mb-5">
                                                <a href="../main/page-account-settings.html"
                                                    class="flex gap-3 items-center  group relative">
                                                    <span class="apps-icons">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-lifebuoy.svg') }}"
                                                            class="h-6 w-6">
                                                    </span>
                                                    <div class="">
                                                        <h6 class="font-semibold text-sm group-hover:text-primary ">
                                                            Account Setting App

                                                        </h6>
                                                        <p class="text-xs">
                                                            Account settings</p>
                                                    </div>

                                                </a>
                                            </li>
                                            <li class="mb-5">
                                                <a href="../main/app-notes.html"
                                                    class="flex gap-3 items-center group relative">
                                                    <span class="apps-icons">
                                                        <img src="{{ asset('assets/images/svgs/icon-dd-application.svg') }}"
                                                            class="h-6 w-6">
                                                    </span>
                                                    <div class="">
                                                        <h6 class="font-semibold text-sm group-hover:text-primary">
                                                            Notes Application

                                                        </h6>
                                                        <p class="text-xs">
                                                            To-do and Daily tasks</p>
                                                    </div>

                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div
                                        class="col-span-12 md:col-span-12 border-t border-border dark:border-darkborder hidden lg:flex items-stretch pt-4 pr-4">
                                        <div class="flex items-center justify-between w-full ">
                                            <div class="flex items-center text-dark dark:text-white group">
                                                <i
                                                    class="ti ti-help text-lg text-dark dark:text-darklink group-hover:text-primary"></i>
                                                <a href="../main/page-faq.html"
                                                    class="text-sm font-bold text-dark dark:text-darklink hover:text-primary  ml-2 group-hover:text-primary">
                                                    Frequently Asked Questions
                                                </a>
                                            </div>
                                            <button type="button" class="btn py-2 px-4 ">
                                                Check
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:col-span-4 col-span-12  flex items-strech">
                                <div class="lg:p-5 lg:border-s border-border dark:border-darkborder">
                                    <h5 class="text-xl font-semibold mb-4 text-dark dark:text-white">
                                        Quick Links</h5>
                                    <ul>
                                        <li class="mb-4"><a href="../main/page-pricing.html"
                                                class="card-title text-sm hover:text-primary">Pricing
                                                Page</a></li>
                                        <li class="mb-4"><a href="../main/authentication-login.html"
                                                class="card-title text-sm hover:text-primary">Authentication
                                                Design</a></li>
                                        <li class="mb-4"><a href="../main/authentication-register.html"
                                                class="card-title text-sm hover:text-primary">Register
                                                Now</a></li>
                                        <li class="mb-4"><a href="../main/authentication-error.html"
                                                class="card-title text-sm hover:text-primary">404
                                                Error
                                                Page</a></li>
                                        <li class="mb-4"><a href="../main/app-notes.html"
                                                class="card-title text-sm hover:text-primary">Notes
                                                App</a>
                                        </li>
                                        <li class="mb-4"><a href="../main/page-user-profile.html"
                                                class="card-title text-sm hover:text-primary">User
                                                Application</a></li>
                                        <li class="mb-4"><a href="../main/blog-posts.html"
                                                class="card-title text-sm hover:text-primary">Blog
                                                Design</a></li>
                                        <li class="mb-4"><a href="../main/eco-checkout.html"
                                                class="card-title text-sm hover:text-primary">Shopping
                                                Cart</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a href="../main/app-chat.html" class="header-link-btn">
                    <i class="ti ti-message-dots lg:hidden lg:text-sm text-xl"></i>Chat</a>
            </div>
            <div>
                <a href="../main/app-calendar.html" class="header-link-btn">
                    <i class="ti ti-calendar lg:hidden lg:text-sm text-xl"></i>Calender</a>
            </div>
            <div>
                <a href="../main/app-email.html" class="header-link-btn">
                    <i class="ti ti-mail lg:hidden lg:text-sm text-xl"></i>Email</a>
            </div>
        </div>
    </div>
</div>



<div id="hs-focus-management-modal"
    class="hs-overlay hs-overlay-open:opacity-100 hs-overlay-open:duration-500 hidden w-full h-full fixed top-0 start-0 z-[60] opacity-0 overflow-x-hidden transition-all overflow-y-auto pointer-events-none">
    <div
        class="hs-overlay-open:opacity-100 hs-overlay-open:duration-500 opacity-0 transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto">
        <div class="flex flex-col bg-white dark:bg-dark  shadow-md dark:shadow-dark-md rounded-md pointer-events-auto">
            <div class="p-4 overflow-y-auto">
                <input type="email" class="w-full form-control" placeholder="you@site.com" autofocus>
            </div>
            <div class="items-center gap-x-2 py-3 px-4 border-t border-border dark:border-darkborder">

                <div class="overflow-hidden">
                    <h5 class="text-lg  mb-4 px-4">Quick Page Links</h5>
                    <div class="message-body max-h-[300px]" data-simplebar="">
                        <ul>
                            <li class="light-dark-hoverbg rounded-md  mb-2 px-4 py-2">
                                <a href="#" class="font-semibold text-sm text-link dark:text-darklink ">
                                    Modern
                                    <p class="text-sm text-link dark:text-darklink opacity-50 font-normal">
                                        /dashboards/modern</p>
                                </a>
                            </li>
                            <li class="light-dark-hoverbg rounded-md  mb-2 px-4 py-2">
                                <a href="#" class="font-semibold text-sm text-link dark:text-darklink">
                                    eCommerce
                                    <p class="text-sm text-link dark:text-darklink opacity-50 font-normal">
                                        /dashboards/ecommerce</p>
                                </a>
                            </li>
                            <li class="light-dark-hoverbg rounded-md  mb-2 px-4 py-2">
                                <a href="#" class="font-semibold text-sm text-link dark:text-darklink">
                                    Contacts
                                    <p class="text-sm text-link dark:text-darklink opacity-50 font-normal">
                                        /apps/contacts</p>
                                </a>
                            </li>
                            <li class="light-dark-hoverbg rounded-md  mb-2 px-4 py-2">
                                <a href="#" class="font-semibold text-sm text-link dark:text-darklink">
                                    Shop
                                    <p class="text-sm text-link dark:text-darklink opacity-50 font-normal">
                                        /ecommerce/products</p>
                                </a>
                            </li>
                            <li class="light-dark-hoverbg rounded-md  mb-2 px-4 py-2">
                                <a href="#" class="font-semibold text-sm text-link dark:text-darklink">
                                    Checkout
                                    <p class="text-sm text-link dark:text-darklink opacity-50 font-normal">
                                        /ecommerce/checkout</p>
                                </a>
                            </li>
                            <li class="light-dark-hoverbg rounded-md  mb-2 px-4 py-2">
                                <a href="#" class="font-semibold text-sm text-link dark:text-darklink">
                                    Chats
                                    <p class="text-sm text-link dark:text-darklink opacity-50 font-normal">
                                        /apps/chats</p>
                                </a>
                            </li>
                            <li class="light-dark-hoverbg rounded-md  mb-2 px-4 py-2">
                                <a href="#" class="font-semibold text-sm text-link dark:text-darklink">
                                    Notes
                                    <p class="text-sm text-link dark:text-darklink opacity-50 font-normal">
                                        /apps/notes</p>
                                </a>
                            </li>
                            <li class="light-dark-hoverbg rounded-md  mb-2 px-4 py-2">
                                <a href="#" class="font-semibold text-sm text-link dark:text-darklink">
                                    Pricing
                                    <p class="text-sm text-link dark:text-darklink opacity-50 font-normal">
                                        /pages/pricing</p>
                                </a>
                            </li>
                            <li class="light-dark-hoverbg rounded-md  mb-2 px-4 py-2">
                                <a href="#" class="font-semibold text-sm text-link dark:text-darklink">
                                    Account Setting
                                    <p class="text-sm text-link dark:text-darklink opacity-50 font-normal">
                                        /pages/account-settings</p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!------- Customizer Options--------->

<div id="hs-overlay-right-cart"
    class=" bg-white hs-overlay  dark:bg-dark hs-overlay-open:translate-x-0  translate-x-full rtl:hs-overlay-open:translate-x-0  rtl:-translate-x-full  fixed top-0 right-0 rtl:left-0 rtl:right-auto transition-all duration-300 transform h-full max-w-xs  w-full z-[60] hidden "
    tabindex="-1">

    <div class="card-body h-full">
        <div class="flex items-center  justify-between mb-5">
            <h3 class="mb-0 text-lg">
                Shopping Cart</h3>
            <span class="text-xs badge-md bg-primary text-white">
                5 new</span>
        </div>
        <div data-simplebar="" class="h-full" style="max-height: calc(100vh - 270px);">
            <div class="flex flex-col gap-5">



            </div>
        </div>
        @include('layouts.footer')