<div>
    <div class="mb-3 text-3xl font-semibold">List Film</div>
    <p class="mb-8">Tambah, Edit, & Hapus Film</p>
    
    {{-- Toolbar --}}
    <div class="mb-3 w-full sticky top-20 z-20 flex flex-row 
                items-center rounded-lg text-gray-200">
        {{-- <select class="mr-3 w-auto bg-neutral-700 drop-shadow-2xl focus:ring-emerald-600
                       border border-transparent outline-none rounded-lg ring-2 ring-transparent" 
                       name="kota" id="kota">
            <option value="all">Semua</option>
            <option value="super-admin">Super Admin</option>
            <option value="admin-bioskop">Admin Bioskop</option>
            <option value="member-bioskop">Member Bioskop</option>
        </select> --}}
        <div class="mr-3 w-10/12 relative drop-shadow-2xl">
            <i class="bi bi-search absolute inset-y-0 start-0 flex 
                        items-center ps-3 pointer-events-none ml-1"></i>
            <input class="w-full p-2 ps-10 rounded-lg bg-neutral-700 outline-none
                          ring-2 ring-neutral-700 focus:ring-emerald-600"
            placeholder="Search Film..." wire:model="search"/>
        </div>
        @if (auth()->user()->isSuperAdmin())    
            <button data-modal-target="create-modal-film" data-modal-toggle="create-modal-film"
                    class="w-2/12 h-full font-medium rounded-lg text-md px-3 py-2 flex justify-center
                        items-center bg-emerald-700 hover:bg-emerald-800 focus:ring-2 drop-shadow-2xl
                        focus:outline-none focus:ring-emerald-600 active:bg-emerald-900">
                <i class="bi bi-film text-lg mr-3"></i> Tambah Film
            </button>
        @endif
    </div>
    
    <hr class="h-1 my-4 bg-emerald-700 border-0 rounded-md">

    <div class="my-6 mb-12 grid grid-cols-6 gap-4">
        @foreach ($films as $film)
            <div class="relative border border-neutral-800 rounded-lg 
                        shadow-lg cursor-pointer hover:border-gray-700">
                <img class="block w-full h-fit z-20 rounded-lg" alt="..." 
                    src="{{ asset('storage/'.$film->poster_film) }}">

                @if (auth()->user()->isSuperAdmin()) 
                    <button wire:click="deleteFilm({{ $film->id }})"
                            data-modal-target="delete-modal-film" data-modal-toggle="delete-modal-film"
                            class="absolute top-0 right-0 z-30 m-1 h-10 w-10 font-medium rounded-md bg-red-600/80
                                border border-red-600 hover:bg-red-700 text-sm shadow-lg active:bg-red-800">
                        <i class="bi bi-trash text-md"></i>
                    </button>
                    <button wire:click="editFilm({{ $film->id }})"
                            data-modal-target="update-modal-film" data-modal-toggle="update-modal-film"
                            class="absolute top-0 right-12 z-30 m-1 h-10 w-10 font-medium rounded-md bg-neutral-700/80
                                border border-neutral-600 hover:bg-neutral-700 text-sm shadow-lg active:bg-neutral-800">
                        <i class="bi bi-pencil-square text-md"></i>
                    </button>
                @endif
            </div>
        @endforeach
    </div>

{{-- Modal Tambah User --}}
<div id="create-modal-film" tabindex="-1" aria-hidden="true" wire:ignore.self
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
                    Tambah Film
                </h3>
                <button type="button" data-modal-hide="create-modal-film"
                        class="w-8 h-8 ms-auto inline-flex justify-center items-center text-gray-200 
                                bg-transparent hover:bg-neutral-700 hover:text-white rounded-lg text-lg">
                    <i class="bi bi-x-lg font-semibold"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form wire:submit.prevent="store">
                    @csrf
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="judul">Judul Film</label>
                        <input type="text" name="judul" wire:model="judul"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                            @error('judul')
                                <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                            @enderror
                    </div>
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="durasi">Durasi Film </label>
                        <input type="number" name="durasi" wire:model="durasi"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                        text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                        @error('durasi')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="deskripsi">Deskripsi Film</label>
                        <textarea class="block p-2.5 w-full text-sm text-gray-200 bg-neutral-700 rounded-lg 
                                        border border-neutral-800 focus:ring-emerald-600 focus:border-emerald-700" 
                                        name="deskripsi" id="deskripsi" rows="3" wire:model="deskripsi">
                        </textarea>
                        @error('deskripsi')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="poster">Poster Film </label>
                        <input class="block w-full h-10 text-sm text-gray-200 border border-transparent rounded-lg
                                      cursor-pointer bg-neutral-700 focus:outline-none" id="poster" name="poster" 
                                      type="file" wire:model="poster">
                        @error('poster')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="flex justify-end items-center">
                        <button type="submit"
                                class="font-normal rounded-lg text-sm px-5 py-2.5 text-center text-white 
                                        focus:outline-none focus:ring-emerald-600 bg-emerald-700
                                        focus:ring-2 hover:bg-emerald-800">
                            <i class="bi bi-film text-md mr-1"></i> Tambah Film
                        </button>
                        <button data-modal-hide="create-modal-film" type="button"
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

{{-- Modal Edit Film --}}
<div id="update-modal-film" tabindex="-1" aria-hidden="true" wire:ignore.self
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
                    Update Film
                </h3>
                <button type="button" data-modal-hide="update-modal-film"
                        class="w-8 h-8 ms-auto inline-flex justify-center items-center text-gray-200 
                                bg-transparent hover:bg-neutral-700 hover:text-white rounded-lg text-lg">
                    <i class="bi bi-x-lg font-semibold"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form wire:submit.prevent="update">
                    @csrf
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="judul">Judul Film</label>
                        <input type="text" name="judul" wire:model="judul"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                            @error('judul')
                                <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                            @enderror
                    </div>
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="durasi">Durasi Film </label>
                        <input type="number" name="durasi" wire:model="durasi"
                                class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                        text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                        @error('durasi')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="deskripsi">Deskripsi Film</label>
                        <textarea class="block p-2.5 w-full text-sm text-gray-200 bg-neutral-700 rounded-lg 
                                        border border-neutral-800 focus:ring-emerald-600 focus:border-emerald-700" 
                                        name="deskripsi" id="deskripsi" rows="3" wire:model="deskripsi">
                        </textarea>
                        @error('deskripsi')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="mb-7">
                        <label class="block mb-1 text-sm font-normal text-gray-200" for="poster">Poster Film </label>
                        <input class="block w-full h-10 text-sm text-gray-200 border border-transparent rounded-lg
                                      cursor-pointer bg-neutral-700 focus:outline-none" id="poster" name="poster" 
                                      type="file" wire:model="poster">
                        @error('poster')
                            <span class="absolute mt-1 text-xs font-medium text-red-500"> {{ $message }} </span>
                        @enderror
                    </div>
                    <div class="flex justify-end items-center">
                        <button type="submit"
                                class="font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white 
                                        focus:outline-none focus:ring-emerald-600 bg-emerald-700
                                        focus:ring-2 hover:bg-emerald-800">
                            <i class="bi bi-pencil-square text-md mr-1"></i> Update Film
                        </button>
                        <button data-modal-hide="update-modal-film" type="button"
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

{{-- Modal Hapus Film --}}
<div id="delete-modal-film" tabindex="-1" aria-hidden="true" wire:ignore.self
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
                    <i class="bi bi-exclamation-triangle mr-2 text-red-500"></i> Hapus Film
                </h3>
                <button type="button" data-modal-hide="delete-modal-film"
                        class="w-8 h-8 ms-auto inline-flex justify-center items-center text-gray-200 
                                bg-transparent hover:bg-neutral-700 hover:text-white rounded-lg text-lg">
                    <i class="bi bi-x-lg font-semibold"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <form wire:submit.prevent="delete">
                    <div class="mb-6 text-lg">
                        Apakah Anda yakin ingin menghapus Film ini?
                    </div>
                    <div class="flex justify-center items-center">
                        <button data-modal-hide="delete-modal-film" type="submit"
                                class="font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white 
                                        focus:outline-none focus:ring-red-700 bg-red-600
                                        focus:ring-2 hover:bg-red-800">
                            <i class="bi bi-trash text-md mr-1"></i> Hapus Film
                        </button>
                        <button data-modal-hide="delete-modal-film" type="button"
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

