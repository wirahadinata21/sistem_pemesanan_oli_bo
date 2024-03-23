<div class="w-full p-6 mx-auto">
@if (Session::has('message'))

<div id="alert"
    class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-dark-gray border-slate-100">
    {{ Session::get('message') }}
    <button type="button" onclick="alertClose()"
        class="box-content absolute top-0 right-0 p-2 text-white bg-transparent border-0 rounded w-4-em h-4-em text-size-sm z-2">
        <span aria-hidden="true" class="text-center cursor-pointer">&#10005;</span>
    </button>
</div>

@endif

@if (Session::has('demo'))
<div id="alert"
    class="relative p-4 pr-12 mb-4 text-white border border-solid rounded-lg bg-gradient-red border-slate-100">
    {{ Session::get('demo') }}
    <button type="button" onclick="alertClose()"
        class="box-content absolute top-0 right-0 p-2 text-white bg-transparent border-0 rounded w-4-em h-4-em text-size-sm z-2">
        <span aria-hidden="true" class="text-center cursor-pointer">&#10005;</span>
    </button>
</div>
@endif
<!-- <form wire:submit.prevent="update" action="/detail" method="PUT" class="w-full"> -->
  <div class="flex flex-wrap -mx-3">
    <div class="max-w-full px-3 lg:w-2/3 lg:flex-none">
      <div class="flex flex-wrap -mx-3">
        <div class="w-full max-w-full px-3 mb-4 xl:mb-0 xl:w-1/2 xl:flex-none">
          <div
            class="relative flex flex-col min-w-0 break-words bg-transparent border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
            <!-- <div class="relative overflow-hidden rounded-2xl"
              style="background-image: url('../assets/img/curved-images/curved14.jpg')">
              <span
                class="absolute top-0 left-0 w-full h-full bg-center bg-cover bg-gradient-dark-gray opacity-80"></span>
              <div class="relative z-10 flex-auto p-4">
                <i class="p-2 text-white fas fa-wifi"></i>
                <h5 class="pb-2 mt-6 mb-12 text-white">
                  4562&nbsp;&nbsp;&nbsp;1122&nbsp;&nbsp;&nbsp;4594&nbsp;&nbsp;&nbsp;7852</h5>
                <div class="flex">
                  <div class="flex">
                    <div class="mr-6">
                      <p class="mb-0 leading-normal text-white text-size-sm opacity-80">Card Holder</p>
                      <h6 class="mb-0 text-white">Jack Peterson</h6>
                    </div>
                    <div>
                      <p class="mb-0 leading-normal text-white text-size-sm opacity-80">Expires</p>
                      <h6 class="mb-0 text-white">11/22</h6>
                    </div>
                  </div>
                  <div class="flex items-end justify-end w-1/5 ml-auto">
                    <img class="w-3/5 mt-2" src="../assets/img/logos/mastercard.png" alt="logo" />
                  </div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
        @foreach($viewordermskpo as $valueheader)
        <div class="w-full max-w-full px-3 xl:w-1/2 xl:flex-none">
          <div class="flex flex-wrap -mx-3">
            <div class="w-full max-w-full px-3 md:w-1/2 md:flex-none">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div
                  class="p-4 mx-6 mb-0 text-center bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                  <div class="w-16 h-16 text-center bg-center icon bg-gradient-fuchsia shadow-soft-2xl rounded-xl">
                    <i class="relative text-white opacity-100 fas fa-landmark text-size-xl top-31/100"></i>
                  </div>
                </div>
                <div class="flex-auto p-4 pt-0 text-center">
                  <h6 class="mb-0 text-center">Komisi</h6>
                  <span class="leading-tight text-size-xs">Untuk Marketing</span>
                  <hr class="h-px my-4 bg-transparent bg-gradient-horizontal-dark" />
                  <h6 class="mb-0 text-center">@currency($valueheader->komisi)</h6>
                </div>
              </div>
            </div>
            <div class="w-full max-w-full px-3 mt-6 md:mt-0 md:w-1/2 md:flex-none">
              <div
                class="relative flex flex-col min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div
                  class="p-4 mx-6 mb-0 text-center bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                  <div class="w-16 h-16 text-center bg-center icon bg-gradient-fuchsia shadow-soft-2xl rounded-xl">
                    <i class="relative text-white opacity-100 fab fa-paypal text-size-xl top-31/100"></i>
                  </div>
                </div>
                <div class="flex-auto p-4 pt-0 text-center">
                  <h6 class="mb-0 text-center">PO</h6>
                  <span class="leading-tight text-size-xs">Dari Customer</span>
                  <hr class="h-px my-4 bg-transparent bg-gradient-horizontal-dark" />
                  <h6 class="mb-0 text-center">@currency($valueheader->nilaipo)</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="max-w-full px-3 mb-4 lg:mb-0 lg:w-full lg:flex-none">
          <div
            class="relative flex flex-col min-w-0 mt-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
              <div class="flex flex-wrap -mx-3">
                <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                  <h6 class="mb-0">Payment Method</h6>
                </div>
                <div class="flex-none w-1/2 max-w-full px-3 text-right">
                  <a class="inline-block px-6 py-3 font-bold text-center text-white uppercase align-middle transition-all bg-transparent rounded-lg cursor-pointer leading-pro text-size-xs ease-soft-in shadow-soft-md bg-150 bg-gradient-dark-gray hover:shadow-soft-xs active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25"
                    href="javascript:;"> <i class="fas fa-plus"> </i>&nbsp;&nbsp;Add New Card</a>
                </div>
              </div>
            </div>
            <div class="flex-auto p-4">
              <div class="flex flex-wrap -mx-3">
                <div class="max-w-full px-3 mb-6 md:mb-0 md:w-1/2 md:flex-none">
                  <div
                    class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl border-slate-100 bg-clip-border">
                    <img class="mb-0 mr-4 w-1/10" src="../assets/img/logos/mastercard.png" alt="logo" />
                    <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;7852</h6>
                    <i class="ml-auto cursor-pointer fas fa-pencil-alt text-slate-700" data-target="tooltip_trigger"
                      data-placement="top"></i>
                    <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-size-sm">
                      Edit Card
                      <div
                        class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                        data-popper-arrow></div>
                    </div>
                  </div>
                </div>
                <div class="max-w-full px-3 md:w-1/2 md:flex-none">
                  <div
                    class="relative flex flex-row items-center flex-auto min-w-0 p-6 break-words bg-transparent border border-solid shadow-none rounded-xl border-slate-100 bg-clip-border">
                    <img class="mb-0 mr-4 w-1/10" src="../assets/img/logos/visa.png" alt="logo" />
                    <h6 class="mb-0">****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;****&nbsp;&nbsp;&nbsp;5248</h6>
                    <i class="ml-auto cursor-pointer fas fa-pencil-alt text-slate-700" data-target="tooltip_trigger"
                      data-placement="top"></i>
                    <div data-target="tooltip" class="hidden px-2 py-1 text-white bg-black rounded-lg text-size-sm">
                      Edit Card
                      <div
                        class="invisible absolute h-2 w-2 bg-inherit before:visible before:absolute before:h-2 before:w-2 before:rotate-45 before:bg-inherit before:content-['']"
                        data-popper-arrow></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
      </div>
    </div>
    <div class="w-full max-w-full px-3 lg:w-1/3 lg:flex-none">
      <color:div
        class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-4 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
          <div class="flex flex-wrap -mx-3">
            <div class="flex items-center flex-none w-1/2 max-w-full px-3">
              <h6 class="mb-0">Purchase Order</h6>
            </div>
            <div class="flex-none w-1/2 max-w-full px-3 text-right">
              <!-- <button
                class="inline-block px-8 py-2 mb-0 font-bold text-center uppercase align-middle transition-all bg-transparent border border-solid rounded-lg shadow-none cursor-pointer leading-pro ease-soft-in text-size-xs bg-150 active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 border-fuchsia-500 text-fuchsia-500 hover:opacity-75">View
                All</button> -->
            </div>
          </div>
        </div>
        <div class="flex-auto p-4 pb-0">
          <ul class="flex flex-col pl-0 mb-0 rounded-lg">
            <li
              class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-t-inherit text-size-inherit rounded-xl">
              <div class="flex flex-col">
                <h6 class="mb-1 font-semibold leading-normal text-size-sm text-slate-700">{{ $valueheader->tglpo }}</h6>
                <span class="leading-tight text-size-xs">#{{ $valueheader->nomorpo }}</span>
              </div>
              <div class="flex items-center leading-normal text-size-sm">
              <!-- @currency($valueheader->nilaipo) -->
                <button
                  class="inline-block px-0 py-3 mb-0 ml-6 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-soft-in bg-150 text-size-sm active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 text-slate-700"><i
                    class="mr-1 fas fa-file-pdf text-size-lg"></i> PDF</button>
              </div>
            </li>
            <!-- <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-xl text-inherit">
              <div class="flex flex-col">
                <h6 class="mb-1 font-semibold leading-normal text-size-sm text-slate-700">February, 10, 2021</h6>
                <span class="leading-tight text-size-xs">#RV-126749</span>
              </div>
              <div class="flex items-center leading-normal text-size-sm">
                $250
                <button
                  class="inline-block px-0 py-3 mb-0 ml-6 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-soft-in bg-150 text-size-sm active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 text-slate-700"><i
                    class="mr-1 fas fa-file-pdf text-size-lg"></i> PDF</button>
              </div>
            </li>
            <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-xl text-inherit">
              <div class="flex flex-col">
                <h6 class="mb-1 font-semibold leading-normal text-size-sm text-slate-700">April, 05, 2020</h6>
                <span class="leading-tight text-size-xs">#FB-212562</span>
              </div>
              <div class="flex items-center leading-normal text-size-sm">
                $560
                <button
                  class="inline-block px-0 py-3 mb-0 ml-6 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-soft-in bg-150 text-size-sm active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 text-slate-700"><i
                    class="mr-1 fas fa-file-pdf text-size-lg"></i> PDF</button>
              </div>
            </li>
            <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-xl text-inherit">
              <div class="flex flex-col">
                <h6 class="mb-1 font-semibold leading-normal text-size-sm text-slate-700">June, 25, 2019</h6>
                <span class="leading-tight text-size-xs">#QW-103578</span>
              </div>
              <div class="flex items-center leading-normal text-size-sm">
                $120
                <button
                  class="inline-block px-0 py-3 mb-0 ml-6 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-soft-in bg-150 text-size-sm active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 text-slate-700"><i
                    class="mr-1 fas fa-file-pdf text-size-lg"></i> PDF</button>
              </div>
            </li>
            <li
              class="relative flex justify-between px-4 py-2 pl-0 bg-white border-0 rounded-b-inherit rounded-xl text-inherit">
              <div class="flex flex-col">
                <h6 class="mb-1 font-semibold leading-normal text-size-sm text-slate-700">March, 01, 2019</h6>
                <span class="leading-tight text-size-xs">#AR-803481</span>
              </div>
              <div class="flex items-center leading-normal text-size-sm">
                $300
                <button
                  class="inline-block px-0 py-3 mb-0 ml-6 font-bold leading-normal text-center uppercase align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer ease-soft-in bg-150 text-size-sm active:opacity-85 hover:scale-102 tracking-tight-soft bg-x-25 text-slate-700"><i
                    class="mr-1 fas fa-file-pdf text-size-lg"></i> PDF</button>
              </div>
            </li> -->
          </ul>
        </div>
      </color:div>
    </div>
  </div>

  <div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 mt-6 md:w-7/12 md:flex-none">
      <div
        class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
          <h6 class="mb-0">Informasi Purchase Order </h6>
        </div>
        <div class="flex-auto p-4 pt-6">
          <ul class="flex flex-col pl-0 mb-0 rounded-lg">
            <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
            
              <div class="flex flex-col">
                <h6 class="mb-4 leading-normal text-size-sm">Header PO</h6>
                <span class="mb-2 leading-tight text-size-xs">ID Order: <span
                    class="font-semibold text-slate-700 sm:ml-2">{{ $valueheader->idorder }}</span></span>
                <span class="mb-2 leading-tight text-size-xs">Tgl Order: <span
                    class="font-semibold text-slate-700 sm:ml-2">{{ $valueheader->tgltransaksi }}</span></span>
                <span class="mb-2 leading-tight text-size-xs">Customer: <span
                    class="font-semibold text-slate-700 sm:ml-2">{{ $valueheader->namacustomer }}</span></span>
                <span class="mb-2 leading-tight text-size-xs">Status Order: <span
                    class="font-semibold text-slate-700 sm:ml-2">{{ $valueheader->statusorder }}</span></span>
                <span class="mb-2 leading-tight text-size-xs">Marketing: <span
                    class="font-semibold text-slate-700 sm:ml-2">{{ $valueheader->namakaryawan }}</span></span>
              </div>
            @endforeach
            </li>
            <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
            <div class="flex flex-col">
                <h6 class="mb-4 leading-normal text-size-sm">Detail PO</h6>
            <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    No</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Barang</th>

                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Jumlah</th>                 
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vieworderdetail as $valuedetail)
                            <tr>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $loop->iteration }} {{-- Starts with 1 --}}</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $valuedetail->namabarang }}</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $valuedetail->jumlah }}</p>
                                </td>
                                
                            </tr>
                          @endforeach   
                        </tbody>
                    </table>
              </div>
            </li>
            
          </ul>
        </div>
      </div>
    </div>
    <div class="w-full max-w-full px-3 mt-6 md:w-5/12 md:flex-none">
      <div
        class="relative flex flex-col h-full min-w-0 mb-6 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
          <div class="flex flex-wrap -mx-3">
            <div class="max-w-full px-3 md:w-1/2 md:flex-none">
              <h6 class="mb-0">Log Transaksi</h6>
            </div>
            <div class="flex items-center justify-end max-w-full px-3 md:w-1/2 md:flex-none">
              <!-- <i class="mr-2 far fa-calendar-alt"></i>
              <small>23 - 30 March 2020</small> -->
            </div>
          </div>
        </div>
        
        <div class="flex-auto p-4 pt-6">
          <ul class="flex flex-col pl-0 mb-0 rounded-lg">
          @foreach($tokenlogorder as $log)
            <li
              class="relative flex justify-between px-4 py-2 pl-0 mb-2 bg-white border-0 rounded-t-inherit text-size-inherit rounded-xl">
              <div class="flex items-center">
                <button
                  class="leading-pro ease-soft-in text-size-xs bg-150 w-6.35 h-6.35 p-1.2 rounded-3.5xl tracking-tight-soft bg-x-25 mr-4 mb-0 flex cursor-pointer items-center justify-center border border-solid border-lime-500 border-transparent bg-transparent text-center align-middle font-bold uppercase text-lime-500 transition-all hover:opacity-75"><i
                    class="fas fa-arrow-up text-size-3xs"></i></button>
                <div class="flex flex-col">
                  <h6 class="mb-1 leading-normal text-size-sm text-slate-700">{{ $log->namastatus }}</h6>
                  <span class="leading-tight text-size-xs">{{ $log->created_at }}</span>
                </div>
              </div>
              <div class="flex flex-col items-center justify-center">
                <p
                  class="relative z-10 inline-block m-0 font-semibold leading-normal text-transparent bg-gradient-lime text-size-sm bg-clip-text">
                  {{ $log->user }}</p>
              </div>
            </li>
           @endforeach
            
          </ul>
        </div>
      </div>
    </div>
  </div>
  
                <div class="flow-root">
                  
                <a href="{{route('konfirmasi-suratjalan.delete', $valueheader->idorder)}}">
                              <button type="submit"
                                
                                class="float-right inline-block px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-dark-gray hover:border-slate-700 hover:bg-slate-700 hover:text-white">
                                Konfirmasi
                            </button>
                            </a>                  
                            <a href="{{url()->previous()}}">
                              <button type="submit"
                                
                                class="float-right inline-block px-6 py-3 mt-6 mb-2 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer active:opacity-85 hover:scale-102 hover:shadow-soft-xs leading-pro text-size-xs ease-soft-in tracking-tight-soft shadow-soft-md bg-150 bg-x-25 bg-gradient-dark-gray hover:border-slate-700 hover:bg-slate-700 hover:text-white">
                                Kembali
                            </button>
                            </a>

                </div>
<!-- </form> -->

</div>
