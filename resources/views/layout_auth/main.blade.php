@include('layout_auth.header')
<main>
    <!--start the project-->
    <div id="main-wrapper" class="flex">
        <!-- Main Content -->
        <main class="h-screen w-full">
            <div class="h-screen w-full">
                <div class="xl:flex justify-center  w-full">
                    <div class="xl:w-4/6 w-full">
                        <div class="card-body p-5 bg-lightprimary xl:h-screen">
                            <div class="brand-logo flex  items-center ">
                                <a href="#" class="text-nowrap logo-img">
                                    <img src="{{ asset('assets/images/logos/cropped-logoweb-1.png') }}"
                                        class="dark:hidden block rtl:hidden" alt="Logo-Dark" />
                                    <img src="{{ asset('assets/images/logos/light-logo.svg') }}"
                                        class="dark:block hidden rtl:hidden rtl:dark:hidden" alt="Logo-light" />

                                    <img src="{{ asset('assets/images/logos/dark-logo.svg') }}"
                                        class="dark:hidden hidden rtl:block rtl:dark:hidden" alt="Logo-Dark" />
                                    <img src="{{ asset('assets/images/logos/light-logo-rtl.svg') }}"
                                        class="dark:hidden hidden rtl:hidden rtl:dark:block" alt="Logo-light" />
                                </a>
                            </div>

                            <div class="h-n80 xl:flex hidden justify-center items-center ">
                                <img src="{{ asset('assets/images/background/login-security.svg') }}" alt="" class="img-fluid"
                                    width="500">
                            </div>

                        </div>
                    </div>
                    <div class="xl:w-2/6 w-full">
                        <div class="card-body flex justify-center items-center bg-base-100 h-screen">
                            <div class="max-w-[400px] sm:px-6 w-full">
                                <h2 class="font-bold text-2xl">Welcome to SIIKD</h2>
                                <p class="mb-7">Sistem Informasi Index Kinerja Dosen</p>
                                @yield('login')


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <!-- Main Content End -->
    </div>
    <!--end of project-->
</main>
@include('layout_auth.footer')
