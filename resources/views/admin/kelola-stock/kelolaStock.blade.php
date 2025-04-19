<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="/assets/img/favicon.png" />
    <title>Inventaris Saung Teh</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="/assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

    @include('partials.adminSidebar')

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">

        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex justify-between items-center px-2">
                            <div
                                class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <h6>Stock Table</h6>
                            </div>
                            <button class="text-white font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" style="background-color: green;">+ Tambah Stock</button>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                ID produk</th>
                                            <th
                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Stock</th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Quantity</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Harga</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Ditambahkan pada</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Ditambahkan pada</th>
                                            <th
                                                class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            </th>
                                        </tr>
                                    </thead>
                                    @foreach ($produk as $produk )
                                    <tbody>
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <p class="flex px-2 py-1 ml-2 font-bold mb-0 text-xs leading-tight ">
                                                    {{ $produk->kode_produk }}
                                                </p>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('storage/' . $produk->foto) }}" alt="Foto Produk"
                                                            class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl"
                                                             />
                                                    </div>
                                                    <div class="flex flex-col justify-center">
                                                        <h6 class="mb-0 text-sm leading-normal">{{ $produk->nama_produk }}</h6>
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            </p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $produk->stok }}</span>

                                            </td>
                                            <td
                                                class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span class="text-xs font-semibold leading-tight text-slate-400">Rp.
                                                    {{ number_format($produk->harga, 0, ',', '.') }}</span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ \Carbon\Carbon::parse($produk->created_at)->translatedFormat('d F Y, H:i') }}
                                                </span>
                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">
                                                    @php
                                                    if ($produk->admin_id) {
                                                        $penambah = \App\Models\Admin::find($produk->admin_id)?->nama ?? 'Admin tidak ditemukan';
                                                    } elseif ($produk->karyawan_id) {
                                                        $penambah = \App\Models\Karyawan::find($produk->karyawan_id)?->nama ?? 'Karyawan tidak ditemukan';
                                                    } else {
                                                        $penambah = 'Tidak diketahui';
                                                    }
                                                @endphp
                                                        {{-- {{ $stok->admin_id }} --}}
                    
                                                    {{ $penambah }}
                                                </span>
                                            </td>
                                            <td class="p-2 align-middle border-b">
                                                <div class="flex px-2 py-1 w-full gap-4 items-center justify-center">
                                                    <button id="edit{{ $produk->produk_id }}" class="editButton text-xs font-semibold text-white px-4 py-1 rounded-xl mr-2" style="background-color: #3A416F">
                                                        Edit
                                                    </button>

                                                    <form action="{{ route('produk.destroy', $produk->produk_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            type="submit"
                                                            class="text-xs font-semibold text-white px-2 py-1 rounded-xl"
                                                            style="background-color: red">
                                                            Hapus
                                                        </button>
                                                    </form>

                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- card 2 -->


            <footer class="pt-4">
                <div class="w-full px-6 mx-auto">
                    <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                        <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                            <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
                                ©
                                <script>
                                    document.write(new Date().getFullYear() + ",");
                                </script>
                                Inventaris Saung Teh
                            </div>
                        </div>

                    </div>
                </div>
            </footer>
        </div>
    </main>


    <!-- Modal Tambah Stock-->
    <div id="modalTambahStock" class="absolute z-50 hidden items-center justify-center p-4 top-0 left-0 w-1/2 translate-y-1/2 translate-x-1/2  ">
        <div class="bg-white rounded-lg shadow-lg w-full p-6 relative border-black border-2 shadow-black">
            <!-- Header Modal -->
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-lg font-bold">Tambah Stock</h5>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 text-2xl font-bold leading-none">&times;</button>
            </div>

            <!-- Form -->
            <form action="{{ route('produk.storeAdmin') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="kode_produk" class="block text-sm font-medium text-gray-700">ID Produk</label>
                    <input type="text" id="kode_produk" name="kode_produk" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama </label>
                    <input type="text" id="nama_produk" name="nama_produk" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="gambar_stok" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" id="gambar_stok" name="foto" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="stok" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" id="stok" name="stok" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" id="harga" name="harga" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>

                <!-- Footer Modal -->
                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" onclick="closeModal()" class="mr-2 text-sm px-4 py-2 text-white font-bold rounded-lg hover:bg-gray-400" style="background-color: red;">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2  text-white rounded-lg font-bold text-sm " style="background-color: green;">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit Stock-->
    <div id="modalEditStock" class="absolute z-50 hidden  items-center justify-center p-4 top-0 left-0 w-1/2 translate-y-1/2 translate-x-1/2  ">
        <div class="bg-white rounded-lg shadow-lg w-full p-6 relative border-black border-2 shadow-black">
            <!-- Header Modal -->
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-lg font-bold">Edit Stock</h5>
                <button onclick="closeModalEdit()" class="text-gray-500 hover:text-gray-700 text-2xl font-bold leading-none">&times;</button>
            </div>

            <!-- Form -->
            <form action="{{ route('produk.destroy', $produk->produk_id) }}" method="POST"  enctype="multipart/form-data" >
                @csrf
                @method('PUT')
                <input type="hidden" name="produk_id" value="{{ $produk->produk_id }}">
                <div class="mb-4">
                    <label for="kode_produk" class="block text-sm font-medium text-gray-700">ID Produk</label>
                    <input type="text" id="kode_produk" name="kode_produk" value="{{ $produk->kode_produk }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="nama_produk" class="block text-sm font-medium text-gray-700">Nama </label>
                    <input type="text" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="gambar_stok" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" id="gambar_stok" name="foto"  class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="stok" class="block text-sm font-medium text-gray-700">Quantity</label>
                    <input type="number" id="stok" name="stok" value="{{ $produk->stok }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="harga" class="block text-sm font-medium text-gray-700">Harga</label>
                    <input type="number" id="harga" name="harga" value="{{ $produk->harga }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>

                <!-- Footer Modal -->
                <div class="flex justify-end gap-2 mt-6">
                    <button type="button" onclick="closeModalEdit()" class="mr-2 text-sm px-4 py-2 text-white font-bold rounded-lg hover:bg-gray-400" style="background-color: red;">
                        Cancel
                    </button>
                    <button type="submit" class="px-4 py-2  text-white rounded-lg font-bold text-sm " style="background-color: green;">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

<script>
    // Menampilkan modal
    function openModal() {
        document.getElementById('modalTambahStock').classList.remove('hidden');
    }

    // Menutup modal
    function closeModal() {
        document.getElementById('modalTambahStock').classList.add('hidden');
    }

    // Event listener untuk tombol
    document.querySelector('button[style="background-color: green;"]').addEventListener('click', openModal);

    // Event listener untuk tombol editButton
    document.querySelectorAll('.editButton').forEach(button => {
        button.addEventListener('click', openModalEdit);
    });

    function openModalEdit() {
        document.getElementById('modalEditStock').classList.remove('hidden');
    }

    function closeModalEdit() {
        document.getElementById('modalEditStock').classList.add('hidden');
    }
</script>
<!-- plugin for scrollbar  -->
<script src="/assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- github button -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- main script file  -->
<script src="/assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>

</html>