@section('content')
<div class="mb-3 text-3xl font-semibold">Laporan Web Bioskop</div>
<p class="mb-8">Tambah, Edit, & Hapus Laporan</p>

<div class="mb-6 w-full sticky top-20 z-20 flex flex-row 
            items-center rounded-lg text-gray-200">
    <select class="mr-3 w-auto bg-neutral-700 drop-shadow-2xl focus:ring-emerald-600
                    border border-transparent outline-none rounded-lg ring-2 ring-transparent" 
                    name="filter_role" id="filter_role" wire:model="filter_role">
        <option value="All" selected>Semua</option>
        <option value="Super">Super Admin</option>
        <option value="Admin">Admin Bioskop</option>
        <option value="Member">Member Bioskop</option>
    </select>
    <div class="mr-3 w-8/12 relative drop-shadow-2xl">
        <i class="bi bi-search absolute inset-y-0 start-0 flex 
                    items-center ps-3 pointer-events-none ml-1"></i>
        <input class=" w-full p-2 ps-10 rounded-lg bg-neutral-700 outline-none
                        ring-2 ring-neutral-700 focus:ring-emerald-600"
        placeholder="Search User..." required wire:model="search"/>
    </div>
    <button data-modal-target="create-modal" data-modal-toggle="create-modal"
            class="w-2/12 h-full font-medium rounded-lg text-md px-3 py-2 flex justify-center
                    items-center bg-emerald-700 hover:bg-emerald-800 focus:ring-2 drop-shadow-2xl
                    focus:outline-none focus:ring-emerald-600 active:bg-emerald-900">
        <i class="bi bi-person-plus text-lg mr-2"></i> Tambah User
    </button>
</div>

<div class="relative overflow-x-auto rounded-lg">
    <table class="w-full table-auto text-md text-left bg-neutral-800 text-gray-200 ">
        <thead class="text-md text-gray-200 bg-emerald-800">
            <tr>
                <th scope="col" class="px-6 py-2.5">Tgl_laporan</th>
                <th scope="col" class="px-6 py-2.5">ID_bioskop</th>
                <th scope="col" class="px-6 py-2.5">Jml_penjualan</th>
                <th scope="col" class="px-6 py-2.5">Kursi_terjual</th>
                <th scope="col" class="px-6 py-2.5">Pendapatan_rp</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporans as $laporan)
                <tr class="border-b border-neutral-700 hover:bg-neutral-700/30">
                    <th class="px-6 py-2 w-1/12 font-medium"
                        scope="row" > {{ $loop->index + 1 }} </th>
                    <td class="px-6 py-2 w-3/12"> {{ $laporan->tgl_laporan  }} </td>
                    <td class="px-6 py-2 w-3/12"> {{ $laporan->id_bioskop }} </td>
                    <td class="px-6 py-2 w-3/12"> {{ $laporan->jml_penjualan  }} </td>
                    <td class="px-6 py-2 w-3/12"> {{ $laporan->kursi_terjual  }} </td>
                    <td class="px-6 py-2 w-3/12"> {{ $laporan->pendapatan_rp  }} </td>
                    <td class="px-6 py-2 w-2/12 flex flex-row gap-4 items-center">
                        <button wire:click="editUser({{ $user->id }})"
                                data-modal-target="update-modal" data-modal-toggle="update-modal"
                                class="h-full font-medium rounded-lg px-4 py-2 flex justify-center focus:ring-2
                                    items-center border border-neutral-600 hover:bg-neutral-700 text-sm
                                    shadow-lg active:bg-neutral-800 focus:ring-neutral-700">
                            <i class="bi bi-pencil-square text-md mr-2"></i> Edit
                        </button>
                        <button wire:click="deleteUser({{ $user->id }})"
                                data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                                class="h-full font-medium rounded-lg px-3 py-2 flex justify-center text-sm focus:ring-2
                                    items-center bg-red-600 hover:bg-red-700 border border-red-600 shadow-lg
                                    focus:outline-none active:bg-red-900 focus:ring-red-700">
                            <i class="bi bi-trash text-md mr-2"></i> Hapus
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection