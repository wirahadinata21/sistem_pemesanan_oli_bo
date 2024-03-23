<div class="flex flex-wrap -mx-3">
    <div class="w-full max-w-full px-3 mt-6 md:w-7/12 md:flex-none">
      <div
        class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-soft-xl rounded-2xl bg-clip-border">
        <div class="p-6 px-4 pb-0 mb-0 bg-white border-b-0 rounded-t-2xl">
       
          <h6 class="mb-0">Detail Role</h6>
         
        </div>
        <div class="flex-auto p-4 pt-6">
          <ul class="flex flex-col pl-0 mb-0 rounded-lg">
          
            <li class="relative flex p-6 mb-2 border-0 rounded-t-inherit rounded-xl bg-gray-50">
              <div class="flex flex-col">
                <h6 class="mb-4 leading-normal text-size-sm">Role</h6>
                <span class="mb-2 leading-tight text-size-xs">ID Role: <span
                    class="font-semibold text-slate-700 sm:ml-2">{{ $tblrole->idrole }}</span></span>
                <span class="mb-2 leading-tight text-size-xs">Deskripsi: <span
                    class="font-semibold text-slate-700 sm:ml-2">{{ $tblrole->deskripsi }}</span></span>
              </div>
            </li>
           
            
          </ul>
          <div class="my-auto ml-auto pr-6">
                <button type="button"                       
                        onclick="goBack()"
                        class="inline-block px-8 py-2 m-0 text-xs font-bold text-center text-white uppercase align-middle transition-all border-0 rounded-lg cursor-pointer ease-soft-in leading-pro tracking-tight-soft bg-gradient-fuchsia shadow-soft-md bg-150 bg-x-25 hover:scale-102 active:opacity-85">+&nbsp;
                        Kembali</button>
            </div>
        </div>
      </div>
    </div>
    <script>
      function goBack() {
        window.history.back();
        }
      </script>
  </div>