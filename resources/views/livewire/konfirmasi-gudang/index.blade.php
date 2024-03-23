<div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Purchase Order Yang Sudah Di Konfirmasi Bagian Admin</h6>
                <!-- <p>Untuk mengelola data Jenis Satuan.</p> -->
            </div>


            @if(session()->has('success'))
                <div>
                {{ session()->get('success') }}
                </div>
            @endif

            <div class="flex-auto px-0 pt-0 pb-2">
                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    No</th>
                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    ID Order</th>

                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Tgl Order</th>

                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Customer</th>

                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Status Order</th>

                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Completion</th>
                                
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($vieworderkfmpo as $value)
                            <tr>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $loop->iteration }} {{-- Starts with 1 --}}</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $value -> idorder }}</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $value -> tgltransaksi }}</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $value -> namacustomer }}</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $value -> namastatus }}</p>
                                </td>
                                <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <div class="flex items-center justify-center">
                                    <span class="mr-2 font-semibold leading-tight text-size-xs">{{ $value -> persentase }}%</span>
                                    <div>
                                        <div class="text-size-xs h-0.75 w-30 m-0 flex overflow-visible rounded-lg bg-gray-200">
                                        @if ($value->persentase == '0')
                                        <div
                                            class="duration-600 ease-soft bg-gradient-red -mt-0.38 -ml-px flex h-1.5 w-0 flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all"
                                            role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="0"></div>
                                        </div>
                                        @endif
                                        @if ($value->persentase == '20')
                                        <div
                                            class="duration-600 ease-soft bg-gradient-red -mt-0.38 -ml-px flex h-1.5 w-1/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all"
                                            role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20"></div>
                                        </div>
                                        @endif
                                        @if ($value->persentase == '40')
                                        <div
                                            class="duration-600 ease-soft bg-gradient-amber -mt-0.38 -ml-px flex h-1.5 w-2/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all"
                                            role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="40"></div>
                                        </div>
                                        @endif
                                        @if ($value->persentase == '60')
                                        <div
                                            class="duration-600 ease-soft bg-gradient-yellow -mt-0.38 -ml-px flex h-1.5 w-3/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all"
                                            role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="60"></div>
                                        </div>
                                        @endif
                                        @if ($value->persentase == '80')
                                        <div
                                            class="duration-600 ease-soft bg-gradient-cyan -mt-0.38 -ml-px flex h-1.5 w-4/5 flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all"
                                            role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="80"></div>
                                        </div>
                                        @endif
                                        @if ($value->persentase == '100')
                                        <div
                                            class="duration-600 ease-soft bg-gradient-lime -mt-0.38 -ml-px flex h-1.5 w-full flex-col justify-center overflow-hidden whitespace-nowrap rounded bg-fuchsia-500 text-center text-white transition-all"
                                            role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        @endif

                                    </div>
                                    </div>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-base">
                                        <a href="{{route('konfirmasi-gudang.detail', $value->idorder)}}"><i class="fas fa-user" aria-hidden="true"></i></a>
                                        <!-- <a href="{{route('konfirmasi-gudang.edit', $value->idorder)}}"><i class="fas fa-user-edit" aria-hidden="true"></i></a> -->
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                        <div class="d-felx justify-content-center">
                        {{ $vieworderkfmpo->links() }}
                        </div>
                </div>
            </div>
        </div>
        <!-- <script>
            function deleteJenisSatuan(idsatuan) {
                if (confirm("Are you sure to delete this record?"))
                    Livewire.emit('deleteJenisSatuan', idsatuan);
                }
        </script> -->
    </div>