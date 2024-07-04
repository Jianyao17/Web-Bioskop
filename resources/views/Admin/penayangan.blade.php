<div>
    
<div class="mb-3 text-3xl font-semibold">Penayangan Film</div>
<p class="mb-8">Tambah, Edit & Atur Penayangan Film</p>

{{-- Toolbar --}}
<div class="mb-6 w-full sticky top-20 z-20 flex flex-row 
            items-center rounded-lg text-gray-200">
    <select class="mr-3 w-auto bg-neutral-700 drop-shadow-2xl focus:ring-emerald-600
                   border border-transparent outline-none rounded-lg ring-2 ring-transparent" 
                   name="kota" id="kota">
        <option value="all">Semua</option>
        <option value="super-admin">Super Admin</option>
        <option value="admin-bioskop">Admin Bioskop</option>
        <option value="member-bioskop">Member Bioskop</option>
    </select>
    <div class="mr-3 w-8/12 relative drop-shadow-2xl">
        <i class="bi bi-search absolute inset-y-0 start-0 flex 
                    items-center ps-3 pointer-events-none ml-1"></i>
        <input class=" w-full p-2 ps-10 rounded-lg bg-neutral-700 outline-none
                      ring-2 ring-neutral-700 focus:ring-emerald-600"
        placeholder="Search User..." required/>
    </div>
    <button data-modal-target="create-modal" data-modal-toggle="create-modal"
            class="w-2/12 h-full font-medium rounded-lg text-md px-3 py-2 flex justify-center
                   items-center bg-emerald-700 hover:bg-emerald-800 focus:ring-2 drop-shadow-2xl
                   focus:outline-none focus:ring-emerald-600 active:bg-emerald-900">
        <i class="bi bi-person-plus text-lg mr-2"></i> Tambah User
    </button>
</div>



</div>