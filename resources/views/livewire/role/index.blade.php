<div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Role</h6>
                <!-- <p>Untuk mengelola data Jenis Satuan.</p> -->
            </div>

            <div class="my-auto ml-auto pr-6">
                <button type="button"                       
                        onclick="location.href='{{ url('role/create') }}'"
                        class="inline-block px-8 py-2 m-0 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-fuchsia shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">+&nbsp;
                        Tambah Role</button>
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
                                    ID Role</th>

                                <th
                                    class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Deskripsi</th>
                                
                                <th
                                    class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-size-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tblrole as $value)
                            <tr>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $loop->iteration }} {{-- Starts with 1 --}}</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $value -> idrole }}</p>
                                </td>
                                <td
                                    class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-size-xs">{{ $value -> deskripsi }}</p>
                                </td>
                                <td
                                    class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <p class="mb-0 font-semibold leading-tight text-base">
                                        <a href="{{route('role.detail', $value->idrole)}}"><i class="fas fa-user" aria-hidden="true"></i></a>
                                        <a href="{{route('role.edit', $value->idrole)}}"><i class="fas fa-user-edit" aria-hidden="true"></i></a>
                                        <a href="{{route('role.delete', $value->idrole)}}"><i class="cursor-pointer fas fa-trash" aria-hidden="true"></i></a>
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                        <div class="d-felx justify-content-center">
                        {{ $tblrole->links() }}
                        </div>
                </div>
            </div>
        </div>
        <script>
            function deleteJenisSatuan(idsatuan) {
                if (confirm("Are you sure to delete this record?"))
                    Livewire.emit('deleteJenisSatuan', idsatuan);
                }
        </script>
    </div>