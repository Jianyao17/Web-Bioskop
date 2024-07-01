@extends('_Layouts.base-admin')

@section('content')

<div class="mb-3 text-3xl font-semibold">User Web Bioskop</div>
<p class="mb-8">Tambah, Edit, & Hapus User</p>

{{-- Toolbar --}}
<div class="mb-6 w-full sticky top-20 z-20 flex flex-row 
            items-center rounded-lg text-gray-200">
    <select class="mr-3 w-auto bg-neutral-700 rounded-lg drop-shadow-2xl
                   border border-transparent outline-none" 
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

{{-- Tabel User --}}
<div class="relative overflow-x-auto rounded-lg">
    <table class="w-full table-auto text-md text-left bg-neutral-800 text-gray-200 ">
        <thead class="text-md text-gray-200 bg-emerald-800">
            <tr>
                <th scope="col" class="px-6 py-2.5">No.</th>
                <th scope="col" class="px-6 py-2.5">Username</th>
                <th scope="col" class="px-6 py-2.5">Email</th>
                <th scope="col" class="px-6 py-2.5">Role</th>
                <th scope="col" class="px-6 py-2.5">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr class="border-b border-neutral-700 hover:bg-neutral-700/30">
                <th class="px-6 py-2 w-1/12 font-medium"
                    scope="row" > 1 </th>
                <td class="px-6 py-2 w-3/12"> Arief WT </td>
                <td class="px-6 py-2 w-4/12"> ariefwt@gmail.com </td>
                <td class="px-6 py-2 w-2/12"> Super-Admin </td>
                <td class="px-6 py-2 w-2/12 flex flex-row gap-4 items-center">
                    <button data-modal-target="update-modal" data-modal-toggle="update-modal"
                            class="h-full font-medium rounded-lg px-4 py-2 flex justify-center focus:ring-2
                                   items-center border border-neutral-600 hover:bg-neutral-700 text-sm
                                   shadow-lg active:bg-neutral-800 focus:ring-neutral-700">
                        <i class="bi bi-pencil-square text-md mr-2"></i> Edit
                    </button>
                    <button data-modal-target="delete-modal" data-modal-toggle="delete-modal"
                            class="h-full font-medium rounded-lg px-3 py-2 flex justify-center text-sm focus:ring-2
                                   items-center bg-red-600 hover:bg-red-700 border border-red-600 shadow-lg
                                   focus:outline-none active:bg-red-900 focus:ring-red-700">
                        <i class="bi bi-trash text-md mr-2"></i> Hapus
                    </button>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>

{{-- Modal Tambah User --}}
<div id="create-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50
            justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-800 rounded-lg shadow-lg
                    border border-neutral-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 
                        border-b border-neutral-700 rounded-t">
                <h3 class="text-xl font-semibold text-white">
                    Tambah User
                </h3>
                <button type="button" data-modal-hide="create-modal"
                        class="w-8 h-8 ms-auto inline-flex justify-center items-center text-gray-200 
                               bg-transparent hover:bg-neutral-700 hover:text-white rounded-lg text-lg">
                    <i class="bi bi-x-lg font-semibold"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-normal text-gray-200" for="name">Input Name</label>
                    <input type="text" id="name" name="name" required
                           class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                  text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-normal text-gray-200" for="email">Input Email</label>
                    <input type="email" placeholder="YourEmail@example.com" id="email" name="email" required
                           class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                  text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-normal text-gray-200" for="password">Input Password</label>
                    <input type="password" id="password" name="password" required 
                           class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                  text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                </div>
                <div class="mb-8">
                    <label class="block mb-2 text-sm font-normal text-gray-200" for="role">Select Role</label>
                    <select class="w-full bg-neutral-700 rounded-lg text-md
                                   border border-transparent outline-none" 
                                   name="role" id="role">
                        <option value="super-admin">    Super Admin</option>
                        <option value="admin-bioskop">  Admin Bioskop</option>
                        <option value="member-bioskop"> Member Bioskop</option>
                    </select>
                </div>
                <div class="flex justify-end items-center">
                    <button data-modal-hide="create-modal" type="button"
                            class="font-normal rounded-lg text-sm px-5 py-2.5 text-center text-white 
                                   focus:outline-none focus:ring-emerald-600 bg-emerald-700
                                   focus:ring-2 hover:bg-emerald-800">
                        <i class="bi bi-person-add text-md mr-1"></i> Tambah User
                    </button>
                    <button data-modal-hide="create-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-200 focus:outline-none
                                   border border-neutral-600 hover:text-white hover:bg-neutral-900 
                                   rounded-lg focus:z-10 focus:ring-2 focus:ring-neutral-700">
                                   Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit User --}}
<div id="update-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50
            justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-800 rounded-lg shadow-lg
                    border border-neutral-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 
                        border-b border-neutral-700 rounded-t">
                <h3 class="text-xl font-semibold text-white">
                    Update User
                </h3>
                <button type="button" data-modal-hide="update-modal"
                        class="w-8 h-8 ms-auto inline-flex justify-center items-center text-gray-200 
                               bg-transparent hover:bg-neutral-700 hover:text-white rounded-lg text-lg">
                    <i class="bi bi-x-lg font-semibold"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-normal text-gray-200" for="name">Input Name</label>
                    <input type="text" id="name" name="name" required
                           class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                  text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-normal text-gray-200" for="email">Input Email</label>
                    <input type="email" placeholder="YourEmail@example.com" id="email" name="email" required
                           class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                  text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                </div>
                <div class="mb-5">
                    <label class="block mb-2 text-sm font-normal text-gray-200" for="password">Input Password</label>
                    <input type="password" id="password" name="password" required 
                           class="block w-full p-2.5 border bg-neutral-700 border-neutral-800 text-gray-200 
                                  text-sm rounded-lg focus:ring-emerald-600 focus:border-emerald-700"/>
                </div>
                <div class="mb-8">
                    <label class="block mb-2 text-sm font-normal text-gray-200" for="role">Select Role</label>
                    <select class="w-full bg-neutral-700 rounded-lg text-md
                                   border border-transparent outline-none" 
                                   name="role" id="role">
                        <option value="super-admin">    Super Admin</option>
                        <option value="admin-bioskop">  Admin Bioskop</option>
                        <option value="member-bioskop"> Member Bioskop</option>
                    </select>
                </div>
                <div class="flex justify-end items-center">
                    <button data-modal-hide="update-modal" type="button"
                            class="font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white 
                                   focus:outline-none focus:ring-emerald-600 bg-emerald-700
                                   focus:ring-2 hover:bg-emerald-800">
                        <i class="bi bi-pencil-square text-md mr-1"></i> Update User
                    </button>
                    <button data-modal-hide="update-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-200 focus:outline-none
                                   border border-neutral-600 hover:text-white hover:bg-neutral-900 
                                   rounded-lg focus:z-10 focus:ring-2 focus:ring-neutral-700">
                                   Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Hapus User --}}
<div id="delete-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50
            justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-neutral-800 rounded-lg shadow-lg
                    border border-neutral-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 
                        border-b border-neutral-700 rounded-t">
                <h3 class="text-xl font-semibold text-white">
                    <i class="bi bi-exclamation-triangle mr-2 text-red-500"></i> Hapus User
                </h3>
                <button type="button" data-modal-hide="delete-modal"
                        class="w-8 h-8 ms-auto inline-flex justify-center items-center text-gray-200 
                               bg-transparent hover:bg-neutral-700 hover:text-white rounded-lg text-lg">
                    <i class="bi bi-x-lg font-semibold"></i>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <div class="mb-6 text-lg">
                    Apakah Anda yakin ingin menghapus user ini?
                </div>
                <div class="flex justify-center items-center">
                    <button data-modal-hide="delete-modal" type="button"
                            class="font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white 
                                   focus:outline-none focus:ring-red-700 bg-red-600
                                   focus:ring-2 hover:bg-red-800">
                        <i class="bi bi-trash text-md mr-1"></i> Hapus User
                    </button>
                    <button data-modal-hide="delete-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-200 focus:outline-none
                                   border border-neutral-600 hover:text-white hover:bg-neutral-900 
                                   rounded-lg focus:z-10 focus:ring-2 focus:ring-neutral-700">
                                   Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection