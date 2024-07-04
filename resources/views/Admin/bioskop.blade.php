<div>

<div class="mb-3 text-3xl font-semibold">Bioskop</div>
<p class="mb-8">Tambah, Edit, & Hapus Bioskop & Teater</p>

{{-- Toolbar --}}
<div class="mb-3 w-full sticky top-20 z-20 flex flex-row 
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
        placeholder="Search User..." wire:model="search"/>
    </div>
    @if (Auth::user()->isSuperAdmin())
        <button data-modal-target="create-modal-bioskop" data-modal-toggle="create-modal-bioskop"
                class="w-2/12 h-full font-medium rounded-lg text-md px-3 py-2 flex justify-center
                        items-center bg-emerald-700 hover:bg-emerald-800 focus:ring-2 drop-shadow-2xl
                        focus:outline-none focus:ring-emerald-600 active:bg-emerald-900">
            <i class="bi bi-building-add text-lg mr-2"></i> Tambah Bioskop
        </button>
    @endif
</div>

<hr class="h-1 my-4 bg-emerald-700 border-0 rounded-md">

@if (auth()->user()->isSuperAdmin())
<div class="w-full">
    @foreach ($list_data as $bioskop)
        <div class="mb-3 w-full rounded-md">
            <div class="px-3 py-2 text-lg text-gray-200 flex flex-row
                        justify-between items-center rounded-t-md bg-emerald-600/30">
                <div class="mr-3">{{ $bioskop->nama_bioskop }}</div>
                <div>
                    <button wire:click="editBioskop({{ $bioskop->id }})"
                            data-modal-target="update-modal-bioskop" data-modal-toggle="update-modal-bioskop"
                            class="mr-2 z-30 h-10 w-10 font-medium rounded-md bg-neutral-700/80
                                border border-neutral-600 hover:bg-neutral-700 text-sm shadow-lg active:bg-neutral-800">
                        <i class="bi bi-pencil-square text-md"></i>
                    </button>
                    <button wire:click="deleteBioskop({{ $bioskop->id }})"
                            data-modal-target="delete-modal-bioskop" data-modal-toggle="delete-modal-bioskop"
                            class="z-30 h-10 w-10 font-medium rounded-md bg-red-600/80
                                border border-red-600 hover:bg-red-700 text-sm shadow-lg active:bg-red-800">
                        <i class="bi bi-trash text-md"></i>
                    </button>
                </div>
            </div>
            <div class="p-3 flex flex-row rounded-b-md bg-neutral-800">
                <div class="w-11/12 grid grid-cols-4 gap-2">
                    @foreach ($bioskop->teater() as $teater)
                        <div class="h-28 relative border border-neutral-700 rounded-md cursor-pointer
                                    shadow-lg hover:border-gray-700 hover:bg-neutral-700/30">
                                <div class="mr-10 h-full flex flex-col justify-center items-center text-center">
                                    <div class="text-2xl font-medium">{{ $teater->nama_teater }}</div>
                                    <div class="text-lg font-normal">Kapasitas : {{ $teater->kapasitas }}</div>
                                </div>
                                <button wire:click="deleteTeater({{ $teater->id }})"
                                        data-modal-target="delete-modal-teater" data-modal-toggle="delete-modal-teater"
                                        class="absolute top-1 right-0 z-30 m-2 h-10 w-10 font-medium rounded-md bg-red-600/80
                                            border border-red-600 hover:bg-red-700 text-sm shadow-lg active:bg-red-800">
                                    <i class="bi bi-trash text-md"></i>
                                </button>
                                <button wire:click="editTeater({{ $teater->id }})"
                                        data-modal-target="update-modal-teater" data-modal-toggle="update-modal-teater"
                                        class="absolute bottom-1 right-0 z-30 m-2 h-10 w-10 font-medium rounded-md bg-neutral-700/80
                                            border border-neutral-600 hover:bg-neutral-700 text-sm shadow-lg active:bg-neutral-800">
                                    <i class="bi bi-pencil-square text-md"></i>
                                </button>
                        </div>
                    @endforeach
                </div>
                <button 
                    data-modal-target="create-modal-teater" data-modal-toggle="create-modal-teater"
                    class="ml-3 font-medium rounded-lg px-4 py-2 flex justify-center focus:ring-2
                        items-center border border-emerald-600 hover:bg-emerald-700 text-sm
                        shadow-lg active:bg-emerald-800 focus:ring-emerald-700">
                <i class="bi bi-plus-square text-lg mr-2"></i> Tambah Teater
                </button> 
            </div>
        </div>
    @endforeach
</div>

@elseif (auth()->user()->isAdminBioskop())
<div class="w-full grid grid-cols-5 gap-2">
    @foreach ($list_data as $teater)
        <div class="h-28 relative border border-neutral-700 rounded-md cursor-pointer
                    shadow-lg hover:border-gray-700 hover:bg-neutral-700/30">
                <div class="mr-10 h-full flex flex-col justify-center items-center text-center">
                    <div class="text-2xl font-medium">{{ $teater->nama_teater }}</div>
                    <div class="text-lg font-normal">Kapasitas : {{ $teater->kapasitas }}</div>
                </div>
                <button wire:click="deleteTeater({{ $teater->id }})"
                        data-modal-target="delete-modal-teater" data-modal-toggle="delete-modal-teater"
                        class="absolute top-1 right-0 z-30 m-2 h-10 w-10 font-medium rounded-md bg-red-600/80
                            border border-red-600 hover:bg-red-700 text-sm shadow-lg active:bg-red-800">
                    <i class="bi bi-trash text-md"></i>
                </button>
                <button wire:click="editTeater({{ $teater->id }})"
                        data-modal-target="update-modal-teater" data-modal-toggle="update-modal-teater"
                        class="absolute bottom-1 right-0 z-30 m-2 h-10 w-10 font-medium rounded-md bg-neutral-700/80
                            border border-neutral-600 hover:bg-neutral-700 text-sm shadow-lg active:bg-neutral-800">
                    <i class="bi bi-pencil-square text-md"></i>
                </button>
        </div>
    @endforeach
</div>
@endif

<!-- Modal Create Bioskop -->
<div id="create-modal-bioskop" tabindex="-1" aria-hidden="true" wire:ignore.self
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-40 modal
       justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-800 rounded-lg shadow-lg
                    border border-neutral-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 
                        border-b border-neutral-700 rounded-t">
                <h3 class="text-xl font-semibold text-white">
                    Tambah Bioskop
                </h3>
                <button type="button" data-modal-hide="create-modal-bioskop"
                        class="w-8 h-8 ms-auto inline-flex justify-center items-center text-gray-200 
                                bg-transparent hover:bg-neutral-700 hover:text-white rounded-lg text-lg">
                    <i class="bi bi-x-lg font-semibold"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form wire:submit.prevent="storeBioskop">
                    @csrf
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="nama_bioskop">Nama Bioskop</label>
                        <input type="text" name="nama_bioskop" wire:model="nama_bioskop"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                            @error('nama_bioskop')
                                <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                            @enderror
                    </div>
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="lokasi_bioskop">Lokasi Bioskop</label>
                        <input type="text" name="lokasi_bioskop" wire:model="lokasi_bioskop"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                        @error('lokasi_bioskop')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="flex justify-end items-center">
                        <button type="submit"
                                class="font-normal rounded-lg text-sm px-5 py-2.5 text-center text-white 
                                        focus:outline-none focus:ring-emerald-600 bg-emerald-700
                                        focus:ring-2 hover:bg-emerald-800">
                            <i class="bi bi-building-add text-md mr-1"></i> Tambah Bioskop
                        </button>
                        <button data-modal-hide="create-modal-bioskop" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-200 focus:outline-none
                                        border border-neutral-600 hover:text-white hover:bg-neutral-900 
                                        rounded-lg focus:z-10 focus:ring-2 focus:ring-neutral-700">
                                        Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Bioskop -->
<div id="update-modal-bioskop" tabindex="-1" aria-hidden="true" wire:ignore.self
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-40 modal
               justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-800 rounded-lg shadow-lg
                    border border-neutral-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 
                        border-b border-neutral-700 rounded-t">
                <h3 class="text-xl font-semibold text-white">
                    Update Bioskop
                </h3>
                <button type="button" data-modal-hide="update-modal-bioskop"
                        class="w-8 h-8 ms-auto inline-flex justify-center items-center text-gray-200 
                                bg-transparent hover:bg-neutral-700 hover:text-white rounded-lg text-lg">
                    <i class="bi bi-x-lg font-semibold"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form wire:submit.prevent="updateBioskop">
                    @csrf
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="nama_bioskop">Nama Bioskop</label>
                        <input type="text" name="nama_bioskop" wire:model="nama_bioskop"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                            @error('nama_bioskop')
                                <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                            @enderror
                    </div>
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="lokasi_bioskop">Lokasi Bioskop</label>
                        <input type="text" name="lokasi_bioskop" wire:model="lokasi_bioskop"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                        @error('lokasi_bioskop')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="flex justify-end items-center">
                        <button type="submit"
                                class="font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white 
                                        focus:outline-none focus:ring-emerald-600 bg-emerald-700
                                        focus:ring-2 hover:bg-emerald-800">
                            <i class="bi bi-pencil-square text-md mr-1"></i> Update Bioskop
                        </button>
                        <button data-modal-hide="update-modal-bioskop" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-200 focus:outline-none
                                        border border-neutral-600 hover:text-white hover:bg-neutral-900 
                                        rounded-lg focus:z-10 focus:ring-2 focus:ring-neutral-700">
                                        Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Bioskop -->
<div id="delete-modal-bioskop" tabindex="-1" aria-hidden="true" wire:ignore.self
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-40 modal
               justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-800 rounded-lg shadow-lg
                    border border-neutral-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 
                        border-b border-neutral-700 rounded-t">
                <h3 class="text-xl font-semibold text-white">
                    <i class="bi bi-exclamation-triangle mr-2 text-red-500"></i> Hapus Bioskop
                </h3>
                <button type="button" data-modal-hide="delete-modal-bioskop"
                        class="w-8 h-8 ms-auto inline-flex justify-center items-center text-gray-200 
                                bg-transparent hover:bg-neutral-700 hover:text-white rounded-lg text-lg">
                    <i class="bi bi-x-lg font-semibold"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form wire:submit.prevent="delete1">
                    <div class="mb-6 text-lg">
                        Apakah Anda yakin ingin menghapus bioskop ini?
                    </div>
                    <div class="flex justify-center items-center">
                        <button data-modal-hide="delete-modal-bioskop" type="submit"
                                class="font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white 
                                        focus:outline-none focus:ring-red-700 bg-red-600
                                        focus:ring-2 hover:bg-red-800">
                            <i class="bi bi-trash text-md mr-1"></i> Hapus Bioskop
                        </button>
                        <button data-modal-hide="delete-modal-bioskop" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-200 focus:outline-none
                                        border border-neutral-600 hover:text-white hover:bg-neutral-900 
                                        rounded-lg focus:z-10 focus:ring-2 focus:ring-neutral-700">
                                        Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Create Teater -->
<div id="create-modal-teater" tabindex="-1" aria-hidden="true" wire:ignore.self
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-40 modal
       justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-800 rounded-lg shadow-lg
                    border border-neutral-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 
                        border-b border-neutral-700 rounded-t">
                <h3 class="text-xl font-semibold text-white">
                    Tambah Teater
                </h3>
                <button type="button" data-modal-hide="create-modal-teater"
                        class="w-8 h-8 ms-auto inline-flex justify-center items-center text-gray-200 
                                bg-transparent hover:bg-neutral-700 hover:text-white rounded-lg text-lg">
                    <i class="bi bi-x-lg font-semibold"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form wire:submit.prevent="storeTeater">
                    @csrf
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="nama_teater">Nama Teater</label>
                        <input type="text" name="nama_teater" wire:model="nama_teater"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                        @error('nama_teater')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    {{-- <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="id_bioskop">ID Bioskop</label>
                        <input type="text" name="id_bioskop" wire:model="id_bioskop"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                        @error('id_bioskop')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div> --}}
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="list_kursi">List Kursi</label>
                        <input type="text" name="list_kursi" wire:model="list_kursi"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                        @error('list_kursi')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="kapasitas">Kapasitas</label>
                        <input type="number" name="kapasitas" wire:model="kapasitas"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                        @error('kapasitas')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="flex justify-end items-center">
                        <button type="submit"
                                class="font-normal rounded-lg text-sm px-5 py-2.5 text-center text-white 
                                        focus:outline-none focus:ring-emerald-600 bg-emerald-700
                                        focus:ring-2 hover:bg-emerald-800">
                            <i class="bi bi-ticket-perforated text-md mr-1"></i> Tambah Teater
                        </button>
                        <button data-modal-hide="create-modal-teater" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-200 focus:outline-none
                                        border border-neutral-600 hover:text-white hover:bg-neutral-900 
                                        rounded-lg focus:z-10 focus:ring-2 focus:ring-neutral-700">
                                        Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Update Teater -->
<div id="update-modal-teater" tabindex="-1" aria-hidden="true" wire:ignore.self
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-40 modal
               justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-800 rounded-lg shadow-lg
                    border border-neutral-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 
                        border-b border-neutral-700 rounded-t">
                <h3 class="text-xl font-semibold text-white">
                    Update Teater
                </h3>
                <button type="button" data-modal-hide="update-modal-teater"
                        class="w-8 h-8 ms-auto inline-flex justify-center items-center text-gray-200 
                                bg-transparent hover:bg-neutral-700 hover:text-white rounded-lg text-lg">
                    <i class="bi bi-x-lg font-semibold"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form wire:submit.prevent="updateTeater">
                    @csrf
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="nama_teater">Nama Teater</label>
                        <input type="text" name="nama_teater" wire:model="nama_teater"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                            @error('nama_teater')
                                <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                            @enderror
                    </div>
                    {{-- <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="id_bioskop">ID Bioskop</label>
                        <input type="text" name="id_bioskop" wire:model="id_bioskop"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                        @error('id_bioskop')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div> --}}
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="list_kursi">List Kursi</label>
                        <input type="text" name="list_kursi" wire:model="list_kursi"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                        @error('list_kursi')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="kapasitas">Kapasitas</label>
                        <input type="number" name="kapasitas" wire:model="kapasitas"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                        @error('kapasitas')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="flex justify-end items-center">
                        <button type="submit"
                                class="font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white 
                                        focus:outline-none focus:ring-emerald-600 bg-emerald-700
                                        focus:ring-2 hover:bg-emerald-800">
                            <i class="bi bi-pencil-square text-md mr-1"></i> Update Teater
                        </button>
                        <button data-modal-hide="update-modal-teater" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-200 focus:outline-none
                                        border border-neutral-600 hover:text-white hover:bg-neutral-900 
                                        rounded-lg focus:z-10 focus:ring-2 focus:ring-neutral-700">
                                        Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete Teater -->
<div id="delete-modal-teater" tabindex="-1" aria-hidden="true" wire:ignore.self
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-40 modal
               justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-800 rounded-lg shadow-lg
                    border border-neutral-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 
                        border-b border-neutral-700 rounded-t">
                <h3 class="text-xl font-semibold text-white">
                    <i class="bi bi-exclamation-triangle mr-2 text-red-500"></i> Hapus Teater
                </h3>
                <button type="button" data-modal-hide="delete-modal-teater"
                        class="w-8 h-8 ms-auto inline-flex justify-center items-center text-gray-200 
                                bg-transparent hover:bg-neutral-700 hover:text-white rounded-lg text-lg">
                    <i class="bi bi-x-lg font-semibold"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form wire:submit.prevent="delete2">
                    <div class="mb-6 text-lg">
                        Apakah Anda yakin ingin menghapus Teater ini?
                    </div>
                    <div class="flex justify-center items-center">
                        <button data-modal-hide="delete-modal-teater" type="submit"
                                class="font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white 
                                        focus:outline-none focus:ring-red-700 bg-red-600
                                        focus:ring-2 hover:bg-red-800">
                            <i class="bi bi-trash text-md mr-1"></i> Hapus Teater
                        </button>
                        <button data-modal-hide="delete-modal-teater" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-200 focus:outline-none
                                        border border-neutral-600 hover:text-white hover:bg-neutral-900 
                                        rounded-lg focus:z-10 focus:ring-2 focus:ring-neutral-700">
                                        Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


</div>