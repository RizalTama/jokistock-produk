<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Soft UI Dashboard Tailwind</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Main Styling -->
    <link href="../assets/css/soft-ui-dashboard-tailwind.css?v=1.0.5" rel="stylesheet" />

    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">

    @include('partials.adminSidebar')

    <main class="ease-soft-in-out xl:ml-68.5 relative h-full max-h-screen rounded-xl transition-all duration-200">
        <!-- Navbar -->


        <div class="w-full px-6 py-6 mx-auto">
            <!-- table 1 -->

            <div class="flex flex-wrap -mx-3">
                <div class="flex-none w-full max-w-full px-3">
                    <div
                        class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                        <div class="flex justify-between items-center px-2">
                            <div
                                class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <h6>List Karyawan</h6>
                            </div>
                            <button class="text-white font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150" style="background-color: green;">+ Tambah Karyawan</button>
                        </div>
                        <div class="flex-auto px-0 pt-0 pb-2">
                            <div class="p-0 overflow-x-auto">
                                <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                                    <thead class="align-bottom">
                                        <tr>
                                            <th
                                                class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Nama</th>
                                            <th
                                                class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                No.HP</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Email</th>
                                            <th
                                                class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                                Alamat</th>
                                            <th
                                                class="px-6 py-3 font-semibold capitalize align-middle bg-transparent border-b border-gray-200 border-solid shadow-none tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                            </th>
                                        </tr>
                                    </thead>
                                    @foreach ($karyawan as $karyawan )
                                    <tbody>
                                        <tr>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <div class="flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('storage/' . $karyawan->foto) }}" alt="karyawan"
                                                            class="inline-flex items-center justify-center mr-4 text-sm text-white transition-all duration-200 ease-soft-in-out h-9 w-9 rounded-xl"
                                                            alt="user1" />
                                                    </div>
                                                    <div class="flex flex-col justify-center">
                                                        <h6 class="mb-0 text-sm leading-normal">{{ $karyawan->nama }}</h6>
                                                        <p class="mb-0 text-xs leading-tight text-slate-400">
                                                            {{ $karyawan->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td
                                                class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $karyawan->no_hp }}</span>

                                            </td>
                                            <td
                                                class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $karyawan->email }}</span>

                                            </td>
                                            <td
                                                class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                                <span
                                                    class="text-xs font-semibold leading-tight text-slate-400">{{ $karyawan->alamat }}</span>
                                            </td>
                                            <td class="p-2 align-middle border-b">
                                                <div class="flex px-2 py-1 w-full gap-4">
                                                    <button id="edit" class="editButton text-xs font-semibold text-white px-4 py-1 rounded-xl mr-2" style="background-color: #3A416F">
                                                        Edit
                                                    </button>
                                                    <form action="{{ route('karyawan.destroy', $karyawan->karyawan_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data karyawan ini?')">
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

            <!-- Modal Tambah Karyawan -->



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

    <!-- modal tambah karyawan -->
    <div id="modalTambahKaryawan" class="absolute z-50 hidden items-center justify-center p-4 top-0 left-0 w-1/2 translate-y-1/2 translate-x-1/2  ">
        <div class="bg-white rounded-lg shadow-lg w-full p-6 relative border-black border-2 shadow-black">
            <!-- Header Modal -->
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-lg font-bold">Tambah Karyawan</h5>
                <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 text-2xl font-bold leading-none">&times;</button>
            </div>

            <!-- Form -->
            <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="nama_karyawan" class="block text-sm font-medium text-gray-700">Nama </label>
                    <input type="text" id="nama_karyawan" name="nama" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="gambar_karyawan" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" id="gambar_karyawan" name="foto" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="nohp" class="block text-sm font-medium text-gray-700">No. HP</label>
                    <input type="text" id="nohp" name="no_hp" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" id="alamat" name="alamat" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
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
    <!-- modal edit karyawan -->
    <div id="modalEditKaryawan" class="absolute z-50 hidden items-center justify-center p-4 top-0 left-0 w-1/2 translate-y-1/2 translate-x-1/2  ">
        <div class="bg-white rounded-lg shadow-lg w-full p-6 relative border-black border-2 shadow-black">
            <!-- Header Modal -->
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-lg font-bold">Edit Karyawan</h5>
                <button onclick="closeModalEdit()" class="text-gray-500 hover:text-gray-700 text-2xl font-bold leading-none">&times;</button>
            </div>

            <!-- Form -->
            <form action="{{ route('karyawan.update', $karyawan->karyawan_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nama_karyawan" class="block text-sm font-medium text-gray-700">Nama </label>
                    <input type="text" id="nama_karyawan" name="nama" value="{{ $karyawan->nama }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="gambar_karyawan" class="block text-sm font-medium text-gray-700">Foto</label>
                    <input type="file" id="gambar_karyawan" name="foto" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="nohp" class="block text-sm font-medium text-gray-700">No. HP</label>
                    <input type="text" id="nohp" name="no_hp" value="{{ $karyawan->no_hp }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <input type="text" id="alamat" value="{{ $karyawan->alamat }}" name="alamat" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ $karyawan->email }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" value="" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required>
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
        document.getElementById('modalTambahKaryawan').classList.remove('hidden');
    }

    // Menutup modal
    function closeModal() {
        document.getElementById('modalTambahKaryawan').classList.add('hidden');
    }

    // Event listener untuk tombol
    document.querySelector('button[style="background-color: green;"]').addEventListener('click', openModal);

    // Event listener untuk tombol editButton
    document.querySelectorAll('.editButton').forEach(button => {
        button.addEventListener('click', openModalEdit);
    });

    function openModalEdit() {
        document.getElementById('modalEditKaryawan').classList.remove('hidden');
    }

    function closeModalEdit() {
        document.getElementById('modalEditKaryawan').classList.add('hidden');
    }
</script>
<!-- plugin for scrollbar  -->
<script src="../assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- github button -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- main script file  -->
<script src="../assets/js/soft-ui-dashboard-tailwind.js?v=1.0.5" async></script>

</html>