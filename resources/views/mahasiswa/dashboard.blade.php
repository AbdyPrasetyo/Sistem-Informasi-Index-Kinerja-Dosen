 <!-- Main Content -->
<div class="pt-6">
                    <div class="container full-container py-5">

                        <!---Welcome back Card--->

                            <div class="lg:col-span-8 md:col-span-12 sm:col-span-12 col-span-12">
                                <div class="card bg-lightprimary dark:bg-darkprimary mb-0 overflow-hidden">
                                    <div class="card-body pb-10">
                                        <div class="grid grid-cols-12">
                                            <div class="lg:col-span-7 md:col-span-7 sm:col-span-12 col-span-12">
                                                <div class="flex gap-3 items-center mb-7">
                                                    <div class="rounded-full overflow-hidden">
                                                        <img src="../assets/images/profile/user-1.jpg"
                                                            class="h-10 w-10" alt="">
                                                    </div>
                                                    <h5 class="text-lg">
                                                        Welcome back {{ Auth::user()->name }}!</h5>
                                                </div>
                                                <div class="flex gap-6 items-center">
                                                    <div
                                                        class="pe-6 rtl:pe-auto rtl:ps-6  border-e border-[#adb0bb] border-opacity-20  dark:border-darkborder">
                                                        <h3
                                                            class="flex items-start mb-0 text-3xl">
                                                           {{ Auth::user()->mahasiswa->nim }}
                                                            <i
                                                                class="ti ti-arrow-up-right text-base  text-success "></i>
                                                        </h3>
                                                        <p class="text-sm mt-1">NIM
                                                        </p>
                                                    </div>


                                                </div>
                                            </div>
                                            <div class="lg:col-span-5 md:col-span-5 sm:col-span-12 col-span-12">
                                                <div class="sm:absolute relative right-0 rtl:right-auto rtl:left-0 -bottom-8">
                                                    <img src="{{ asset('assets/images/background/welcome-bg.svg') }}" alt=""
                                                        class="img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <!---Welcome back Card End--->

   <!---Card With Progressbar-->

<div class="grid grid-cols-12 gap-6 mt-3">
   <div
       class="lg:col-span-4 md:col-span-6 sm:col-span-6 col-span-12">
       <div class="card ">
           <div class="card-body">
               <div class="flex justify-between">
                   <div
                       class="flex justify-center items-center w-14 h-[50px] bg-lightwarning dark:bg-darkwarning rounded-md">
                       <i
                           class="ti ti-books text-3xl text-warning"></i>
                   </div>
                   <div class="text-end">
                       <h5
                           class="card-title">{{ $jumlahMatkul }}</h5>
                       <p class="font-medium">Total Matakuliah
                           </p>
                   </div>
               </div>
               <div
                   class="flex w-full h-1.5 bg-lightwarning dark:bg-darkwarning rounded-md overflow-hidden mt-4"
                   role="progressbar"
                   aria-valuenow="{{ $jumlahMatkul }}"
                   aria-valuemin="0"
                   aria-valuemax="144">
                   <div
                       class="flex flex-col justify-center overflow-hidden bg-warning text-xs text-white text-center whitespace-nowrap transition duration-500 "
                       style="width: {{ min(($jumlahMatkul / 144) * 100, 100) }}%"></div>
               </div>
           </div>
       </div>
   </div>
   <div
       class="lg:col-span-4 md:col-span-6 sm:col-span-6 col-span-12">
       <div class="card ">
           <div class="card-body">
               <div class="flex justify-between">
                   <div
                       class="flex justify-center items-center w-14 h-[50px] bg-lightprimary dark:bg-darkprimary rounded-md">
                       <i
                           class="ti ti-file-pencil text-3xl text-primary"></i>
                   </div>
                   <div class="text-end">
                       <h5
                           class="card-title">{{ $totalBelumDiisi }}</h5>
                       <p
                           class="font-medium">Pengisian Kuisioner
                           </p>
                   </div>
               </div>
               <div
                   class="flex w-full h-1.5 bg-lightprimary dark:bg-darkprimary rounded-md overflow-hidden mt-4"
                   role="progressbar"
                   aria-valuenow="{{ $percentageNotFilled }}"
                   aria-valuemin="0"
                   aria-valuemax="100">
                   <div
                       class="flex flex-col justify-center overflow-hidden bg-primary text-xs text-white text-center whitespace-nowrap transition duration-500 "
                       style="width: {{ $percentageNotFilled }}%"></div>
               </div>
           </div>
       </div>
   </div>
   <div
       class="lg:col-span-4 md:col-span-6 sm:col-span-6 col-span-12">
       <div class="card ">
           <div class="card-body">
               <div class="flex justify-between">
                   <div
                       class="flex justify-center items-center w-14 h-[50px] bg-lighterror dark:bg-darkerror rounded-md">
                       <i
                           class="ti ti-notes text-3xl text-error"></i>
                   </div>
                   <div class="text-end">
                       <h5
                           class="card-title">{{ $totalSudahDiisi }}</h5>
                       <p class="font-medium">Kuisioner Terisi
                           </p>
                   </div>
               </div>
               <div
                   class="flex w-full h-1.5 bg-lighterror dark:bg-darkerror rounded-md overflow-hidden mt-4"
                   role="progressbar"
                   aria-valuenow="{{ $percentageFilled }}"
                   aria-valuemin="0"
                   aria-valuemax="100">
                   <div
                       class="flex flex-col justify-center overflow-hidden bg-error text-xs text-white text-center whitespace-nowrap transition duration-500 "
                       style="width: {{ $percentageFilled }}%"></div>
               </div>
           </div>
       </div>
   </div>


</div>
<!---Card With Progressbar End-->







  </div>
  </div>
 <!-- Main Content End -->

