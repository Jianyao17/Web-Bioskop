@extends('_Layouts.base-admin')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Parkiran Web</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.5.3/flowbite.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <div class="flex">
        <!-- Main content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">User Web Bioskop</h1>
                <div class="flex items-center">
                </div>
            </div>
            <button id="addUserBtn" class="mb-4 px-4 py-2 bg-blue-500 text-white rounded">Tambah User</button>
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">#</th>
                        <th class="py-2 px-4 border-b">Username</th>
                        <th class="py-2 px-4 border-b">Role</th>
                        <th class="py-2 px-4 border-b">No Telp</th>
                        <th class="py-2 px-4 border-b">Date Created</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody id="userTableBody">
                    <!-- Example Data -->
                    <tr>
                        <td class="py-2 px-4 border-b">1</td>
                        <td class="py-2 px-4 border-b">Arief17</td>
                        <td class="py-2 px-4 border-b">Admin</td>
                        <td class="py-2 px-4 border-b">085606632738</td>
                        <td class="py-2 px-4 border-b">00:26 | Hari Ini</td>
                        <td class="py-2 px-4 border-b">
                            <button class="editUserBtn text-blue-500 mr-2 px-2 py-1 border rounded">Edit</button>
                            <button class="deleteUserBtn text-red-500 px-2 py-1 border rounded">Hapus</button>
                        </td>
                    </tr>
                    <!-- More data -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal for Add/Edit User -->
    <div id="userModal" class="hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg p-6">
                <h2 id="modalTitle" class="text-xl font-bold mb-4">Tambah User</h2>
                <form id="userForm">
                    <input type="hidden" id="userId" name="userId">
                    <div class="mb-4">
                        <label for="userName" class="block text-gray-700">Nama</label>
                        <input type="text" id="userName" name="userName" class="w-full px-3 py-2 border rounded">
                    </div>
                    <div class="mb-4">
                        <label for="userEmail" class="block text-gray-700">Email</label>
                        <input type="email" id="userEmail" name="userEmail" class="w-full px-3 py-2 border rounded">
                    </div>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Simpan</button>
                    <button type="button" id="cancelBtn" class="px-4 py-2 bg-gray-300 text-black rounded">Batal</button>
                </form>
            </div>
        </div>
    </div>
@endsection