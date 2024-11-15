@extends('layouts.sidebar')

@section('title', 'Barang Masuk')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Data Masuk Barang</h1>

                <!-- Button trigger modal -->
                <button type="button" style="border-radius: 10px;" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="bi bi-plus-circle"></i>
                    Tambah Masuk Barang
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl"> <!-- Menggunakan kelas modal-xl di sini -->
                        <div class="modal-content">
                            <!-- HEADER -->
                            <div class="modal-header bg-success">
                                <h1 class="modal-title fs-6 text-white" id="exampleModalLabel">Form Tambah Barang</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <form id="dynamicForm" action="function.php" method="POST">
                                    <div class="form-group mb-3 d-flex">
                                        <input type="date" name="tanggal" placeholder="Tanggal Barang Masuk"
                                            class="form-control me-2" onclick="this.showPicker()">
                                        <input type="text" name="supplier" placeholder="Supplier" class="form-control"
                                            required>
                                    </div>
                                    <h2 class="fs-6">Detail:</h2>
                                    <div id="formInputs">
                                        <div class="form-group mb-3 d-flex">
                                            <div class="input-group">
                                                <select name="kodebarang[]" class="form-control me-2"
                                                    onchange="fetchBarangData(this)">
                                                    <option value="">Kode Barang</option>
                                                </select>
                                                <select name="jenisbarang[]" class="form-control me-2 jenisbarang">
                                                    <option value="">Pilih Jenis Barang</option>
                                                </select>
                                                <select name="namabarang[]" class="form-control me-2 namabarang">
                                                    <option value="">Pilih Nama Barang</option>
                                                </select>

                                                <select name="maker[]" class="form-control me-2 maker">
                                                    <option value="">Pilih Maker</option>
                                                </select>

                                                <!-- Input untuk Jumlah Barang -->
                                                <input type="number" name="jumlah[]" placeholder="Jumlah barang"
                                                    class="form-control me-2">

                                                <!-- Input untuk Catatan (Note) -->
                                                <input type="text" name="note[]" placeholder="Note"
                                                    class="form-control me-2">
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        function fetchBarangData(selectElement) {
                                            var kodeBarang = selectElement.value;

                                            // Check jika ada kode barang yang dipilih
                                            if (kodeBarang) {
                                                var xhr = new XMLHttpRequest();
                                                xhr.open("POST", "get_barang.php", true);
                                                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                                xhr.onreadystatechange = function() {
                                                    if (xhr.readyState === 4 && xhr.status === 200) {
                                                        var response = JSON.parse(xhr.responseText);

                                                        // Mendapatkan elemen parent untuk input jenisbarang, namabarang, dan maker
                                                        var parent = selectElement.closest('.form-group');

                                                        // Update input jenisbarang, namabarang, dan maker
                                                        parent.querySelector('.jenisbarang').innerHTML = '<option value="' + response.jenis_barang +
                                                            '">' + response.jenis_barang + '</option>';
                                                        parent.querySelector('.namabarang').innerHTML = '<option value="' + response.nama_barang +
                                                            '">' + response.nama_barang + '</option>';
                                                        parent.querySelector('.maker').innerHTML = '<option value="' + response.maker + '">' + response
                                                            .maker + '</option>';
                                                    }
                                                };
                                                xhr.send("kode_barang=" + kodeBarang);
                                            }
                                        }
                                    </script>

                                    <!-- Tombol tambah dan hapus -->
                                    <button type="button" class="btn btn-success" id="addButton">
                                        <i class="bi bi-bag-plus me-1"></i>Tambah Item
                                    </button>
                                    <button type="button" class="btn btn-danger" id="removeButton">
                                        <i class="bi bi-trash3"> Hapus Item</i>
                                    </button>
                                    <button type="submit" class="btn btn-primary" name="addnewbarangmasuk">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    document.getElementById('dynamicForm').addEventListener('submit', function(event) {
                        let isValid = true;

                        const inputs = document.querySelectorAll('#formInputs input, #formInputs select');

                        inputs.forEach(input => {
                            if (input.value.trim() === '') {
                                isValid = false;
                                input.classList.add('is-invalid');
                            } else {
                                input.classList.remove('is-invalid');
                            }
                        });

                        if (!isValid) {
                            event.preventDefault();
                            alert('Semua field harus diisi.');
                        }
                    });



                    // Tambah Barang
                    document.getElementById('addButton').addEventListener('click', function() {
                        const formInputs = document.getElementById('formInputs');
                        const newInputGroup = document.createElement('div');
                        newInputGroup.className = 'form-group mb-3 d-flex';
                        newInputGroup.innerHTML = `

    <select name="kodebarang[]" class="form-control me-2" onchange="fetchBarangData(this)">
        <option value="">Kode Barang</option>
    </select>

    <select name="jenisbarang[]" class="form-control me-2 jenisbarang">
        <option value="">Pilih Jenis Barang</option>
    </select>

    <select name="namabarang[]" class="form-control me-2 namabarang">
        <option value="">Pilih Nama Barang</option>
    </select>

    <select name="maker[]" class="form-control me-2 maker">
        <option value="">Pilih Maker</option>
    </select>

    <input type="number" name="jumlah[]" placeholder="Jumlah barang" class="form-control me-2">
    <input type="text" name="note[]" placeholder="Note" class="form-control me-2">`;
                        formInputs.appendChild(newInputGroup);
                    });

                    // Hapus Item
                    document.querySelector('.btn-danger').addEventListener('click', function() {
                        const formInputs = document.getElementById('formInputs');
                        const inputGroups = formInputs.getElementsByClassName('form-group mb-3');

                        // Hapus grup input terakhir jika ada
                        if (inputGroups.length > 1) {
                            formInputs.removeChild(inputGroups[inputGroups.length - 1]);
                        } else {
                            alert("Tidak ada item untuk dihapus!");
                        }
                    });
                </script>



                <!-- tabel hasil data -->
                <div class="card mt-2">
                    <div class="card-header ">
                        <i class="fas fa-table me-1"></i>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>KODE BARANG</th>
                                    <th>TANGGAL KELUAR</th>
                                    <th>SUPPLIER</th>
                                    <th>JENIS BARANG</th>
                                    <th>NAMA BARANG</th>
                                    <th>MAKER</th>
                                    <th>JUMLAH</th>
                                    <th>NOTE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barangmasuk as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->kode_barang }}</td>
                                        <td>{{ $data->tanggal_masuk }}</td>
                                        <td>{{ $data->supplier }}</td>
                                        <td>{{ $data->jenis_barang }}</td>
                                        <td>{{ $data->nama_barang }}</td>
                                        <td>{{ $data->maker }}</td>
                                        <td>{{ $data->jumlah }}</td>
                                        <td>{{ $data->note }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>
@endsection
