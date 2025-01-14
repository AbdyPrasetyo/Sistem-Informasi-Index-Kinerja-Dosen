@include('layouts.header')


    <main>
        <!--start the project-->
        <div id="main-wrapper" class="flex">
            <!-- Main Content -->
            <main class="h-screen w-full">
                <div class="h-full w-full flex justify-center items-center">
                    <div class="flex justify-center w-full">
                        <div class="sm:w-2/6 w-full">
                            <div class="text-center ">
                                <img src="{{ asset('assets/images/background/errorimg.svg') }}" alt="" class="mx-auto"
                                    width="500">
                                <h1 class="mb-7 text-4xl">Opps!!!</h1>
                                <h4 class="text-xl mb-7 ">This page you are looking for could not be found.
                                </h4>
                                <a class="btn" href="{{ url('dashboard') }}" role="button">Go Back
                                    to Home</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Main Content End -->
        </div>
        <!--end of project-->
    </main>
    <div class="hidden">
        <!------- Customizer button--------->
<button type="button" class="btn overflow-hidden  sm:h-14 sm:w-14 h-10 w-10 rounded-full fixed sm:bottom-8 bottom-5 right-8 flex justify-center items-center rtl:left-8 rtl:right-auto z-10"
  data-hs-overlay="#hs-overlay-right">
  <i class="ti ti-settings sm:text-2xl text-lg text-white"></i>
</button>


@include('layouts.footer')
