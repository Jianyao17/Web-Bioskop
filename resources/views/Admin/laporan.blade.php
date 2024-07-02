@section('content')
    <div class="w-full">
        <!-- Main content -->
        <div class="flex-1 p-6">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold">Laporan</h1>
                <div class="flex items-center">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded">Buat Laporan</button>
                </div>
            </div>
            <div class="flex justify-between items-center mb-4">
                <div class="flex items-center">
                    <label class="mr-2">All</label>
                    <input type="text" placeholder="Cari Tanggal Laporan : Ctrl+/" class="w-64 px-3 py-2 border rounded">
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full shadow-md rounded-lg">
                    <thead class="">
                        <tr>
                            <th class="py-2 px-4 border-b">#</th>
                            <th class="py-2 px-4 border-b">Tanggal Laporan</th>
                            <th class="py-2 px-4 border-b">Jumlah Kendaraan</th>
                            <th class="py-2 px-4 border-b">Pendapatan (Rp)</th>
                        </tr>
                    </thead>
                    <tbody id="reportTableBody">
                        <!-- Example Data -->
                        <tr>
                            <td class="py-2 px-4 border-b">1</td>
                            <td class="py-2 px-4 border-b">02-May-2024</td>
                            <td class="py-2 px-4 border-b">51</td>
                            <td class="py-2 px-4 border-b">Rp. 986,000.00</td>
                        </tr>
                        <!-- More data -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection