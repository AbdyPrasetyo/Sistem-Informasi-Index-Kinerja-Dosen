<aside id="application-sidebar-brand" class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full xl:rtl:-translate-x-0 rtl:translate-x-full  left-0      rtl:left-auto rtl:right-0 transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed top-0 with-vertical  left-sidebar transition-all duration-300 h-screen xl:z-[2] z-[60] flex-shrink-0 border-r rtl:border-l rtl:border-r-0 w-[270px] border-border dark:border-darkborder bg-white dark:bg-dark">
    <!-- ---------------------------------- -->
    <!-- Start Vertical Layout Sidebar -->
    <!-- ---------------------------------- -->
    <div class="py-5 px-5 flex justify-between">
        <div class="brand-logo flex  items-center ">
            <a href="#" class="text-nowrap logo-img">
                <img src="{{ asset('assets/images/logos/cropped-logoweb-1.png') }}" class="dark:hidden block rtl:hidden" width="130px"
                    alt="Logo-Dark" />
                <img src="{{ asset('assets/images/logos/siikdlight.svg') }}"
                    class="dark:block hidden rtl:hidden rtl:dark:hidden" width="150px" alt="Logo-light" />

                <img src="{{ asset('assets/images/logos/cropped-logoweb-1.png') }}"
                    class="dark:hidden hidden rtl:block rtl:dark:hidden" alt="Logo-Dark" />
                <img src="{{ asset('assets/images/logos/cropped-logoweb-1.png') }}"
                    class="dark:hidden hidden rtl:hidden rtl:dark:block" alt="Logo-light" />
            </a>
        </div>

    </div>
    <div class="overflow-hidden">
        <div class="scroll-sidebar" data-simplebar="">
            <div class="px-6 mt-8 mini-layout" data-te-sidenav-menu-ref>
                <nav class="hs-accordion-group w-full flex flex-col">
                    <ul data-te-sidenav-menu-ref id="sidebarnav">
                        @if(Auth::check())
                        <!---Dashboard Menu---->

                        @if(Auth::user()->role == 1)

                        <div class="caption">
                            <i class="ti ti-dots nav-small-cap-icon"></i>
                            <span class="hide-menu">MASTER DATA</span>
                        </div>
                        <li class="sidebar-item ">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('dashboard') ? 'activemenu ' : '' }}" href="{{ url('dashboard') }}">
                                <i class="ti ti-brand-chrome text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('admin') ? 'activemenu ' : '' }}" href="{{ url('admin') }}">
                                <i class="ti ti-user-check text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Data Admin</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('dosen') ? 'activemenu ' : '' }}" href="{{ url('dosen') }}">
                                <i class="ti ti-users-group text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Data Dosen</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('mahasiswa') ? 'activemenu ' : '' }}" href="{{ url('mahasiswa') }}">
                                <i class="ti ti-users-plus text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Data Mahasiswa</span>
                            </a>
                        </li>

                        <!---Apps Menu---->
                        <div class="caption mt-8">
                            <i class="ti ti-dots nav-small-cap-icon"></i>
                            <span class="hide-menu">AKADEMIK</span>
                        </div>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('fakultas') ? 'activemenu ' : '' }}" href="{{ url('fakultas') }}">
                                <i class="ti ti-school text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Data Fakultas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('prodi') ? 'activemenu ' : '' }}" href="{{ url('prodi') }}">
                                <i class="ti ti-tag text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Data Prodi</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('matkul') ? 'activemenu ' : '' }}" href="{{ url('matkul') }}">
                                <i class="ti ti-books text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Data Matakuliah</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('kelas') ? 'activemenu ' : '' }}" href="{{ url('kelas') }}">
                                <i class="ti ti-home text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Data Kelas</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('krs') ? 'activemenu ' : '' }}" href="{{ url('krs') }}">
                                <i class="ti ti-layout-dashboard text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Data KRS Mahasiswa</span>
                            </a>
                        </li>

                        <!---Apps Menu---->
                        <div class="caption mt-8">
                            <i class="ti ti-dots nav-small-cap-icon"></i>
                            <span class="hide-menu">KUISIONER</span>
                        </div>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('skala') ? 'activemenu ' : '' }}" href="{{ url('skala') }}">
                                <i class="ti ti-chart-dots text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Skala Penilaian</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('kriteria') ? 'activemenu ' : '' }}" href="{{ url('kriteria') }}">
                                <i class="ti ti-list-letters text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Kriteria</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('subkriteria') ? 'activemenu ' : '' }}" href="{{ url('subkriteria') }}">
                                <i class="ti ti-list-check text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Sub Kriteria</span>
                            </a>
                        </li>

                        <div class="caption mt-8">
                            <i class="ti ti-dots nav-small-cap-icon"></i>
                            <span class="hide-menu">INDEX KINERJA</span>
                        </div>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('ikd') ? 'activemenu ' : '' }}" href="{{ url('ikd') }}">
                                <i class="ti ti-notes text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Hasil Penilaian</span>
                            </a>
                        </li>

                        @endif



                        @if(Auth::user()->role == 2)
                        <!---Apps Menu---->
                        <div class="caption">
                            <i class="ti ti-dots nav-small-cap-icon "></i>
                            <span class="hide-menu">DOSEN</span>
                        </div>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('dashboard') ? 'activemenu ' : '' }}" href="{{ url('dashboard') }}">
                                <i class="ti ti-brand-chrome  text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Dashboard </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('result-ikd') ? 'activemenu ' : '' }}" href="{{ url('result-ikd') }}">
                                <i class="ti ti-report-search  text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Hasil Penilaian </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('kritik-saran') ? 'activemenu ' : '' }}" href="{{ url('kritik-saran') }}">
                                <i class="ti ti-message-dots  text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Kritik Saran </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('profile') ? 'activemenu ' : '' }}" href="{{ url('profile') }}">
                                <i class="ti ti-user-check  text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Users </span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::user()->role == 3)
                        <!---Ui Elements---->
                        <div class="caption">
                            <i class="ti ti-dots nav-small-cap-icon "></i>
                            <span class="hide-menu">MAHASISWA</span>
                        </div>
                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('dashboard') ? 'activemenu ' : '' }}" href="{{ url('dashboard') }}">
                                <i class="ti ti-brand-chrome  text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Dashboard </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('kuisioner') ? 'activemenu ' : '' }}" href="{{ url('kuisioner') }}">
                                <i class="ti ti-notes  text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Kuisioner </span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link dark-sidebar-link active {{ Request::is('profile') ? 'activemenu ' : '' }}" href="{{ url('profile') }}">
                                <i class="ti ti-user-check  text-xl flex-shrink-0"></i>
                                <span class="hide-menu flex-shrink-0">Profile </span>
                            </a>
                        </li>
                        @endif
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Bottom User Profile -->
    <div class="px-6 pt-6  bg-surface  dark:bg-dark-surface relative">
        <div class="bg-lightsecondary dark:bg-darksecondary p-4 rounded-md">
            <div class="hide-menu ">
                <div class="flex items-center">
                    <img src="{{ asset('assets/images/profile/user-1.jpg') }}" class="h-9 w-9 rounded-full object-cover"
                        alt="profile" />
                    <div class="ml-4 rtl:mr-4 rtl:ml-0">
                        <h5 class="text-base font-semibold text-dark dark:text-white">{{ Auth::user()->name }}</h5>
                        <p class="text-xs font-normal text-link dark:text-darklink ">
                            @if ( Auth::user()->role == 1)
                                Admin
                            @elseif (Auth::user()->role == 2)
                                Dosen

                            @else
                             Mahasiswa

                            @endif




                        </p>
                    </div>
                    <div class="ms-auto hs-tooltip hs-tooltip-toggle">
                        <form action="{{ route('logout') }}" id="logoutForm" method="POST">
                            @csrf
                            <button type="button" id="logoutButton"> <i class="ti ti-power text-primary me-3 text-2xl "></i></button>

                            <span
                                class="tooltip hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible"
                                role="tooltip">
                                Logouts
                            </span>
                        </form>


                        <script>
                            // Menangani klik tombol logout
                            document.getElementById('logoutButton').addEventListener('click', function () {
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
                                        document.getElementById('logoutForm').submit();
                                    }
                                });
                            });
                        </script>









                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </aside> -->
</aside>
