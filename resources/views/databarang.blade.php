@extends('layouts.sidebar')

@section('title', 'Data Barang')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">Data Data Barang</h1>

                <!-- Button trigger modal -->
                <button type="button" style="border-radius: 10px;" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    <i class="bi bi-folder-plus"></i>
                    Tambah Data Barang
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content  ">
                            <!-- HEADER -->
                            <div class="modal-header bg-primary">
                                <h1 class="modal-title fs-6 text-white" id="exampleModalLabel">Form Tambah Data Barang
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                <form id="dynamicForm" action="/" method="POST">
                                    @csrf
                                    <div id="formInputs">
                                        <div class="form-group mb-3 d-flex">
                                            <input type="text" name="kode_barang[]" placeholder="Kode Barang"
                                                class="form-control me-2" required>
                                            <input type="text" name="jenis_barang[]" placeholder="Jenis Barang"
                                                class="form-control me-2" required>
                                            <input type="text" name="nama_barang[]" placeholder="Nama Barang"
                                                class="form-control me-2" required>
                                            <input type="text" name="dekripsi[]" placeholder="Deskripsi barang"
                                                class="form-control me-2" required>
                                            <input type="text" name="maker[]" placeholder="Maker" class="form-control"
                                                required>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success" id="addButton"><i
                                            class="bi bi-bag-plus me-1"></i>Tambah Item</button>
                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash3"> Hapus
                                            Item</i></button>
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <script>
                    // Tambah Barang
                    document.getElementById('addButton').addEventListener('click', function() {
                        const formInputs = document.getElementById('formInputs');
                        const newInputGroup = document.createElement('div');
                        newInputGroup.className = 'form-group mb-3 d-flex';
                        newInputGroup.innerHTML = `
                        <input type="text" name="kode_barang[]" placeholder="Kode Barang" class="form-control me-2">
                        <input type="text" name="jenis_barang[]" placeholder="Jenis Barang" class="form-control me-2">
                        <input type="text" name="nama_barang[]" placeholder="Nama Barang" class="form-control me-2">
                        <input type="text" name="dekripsi[]" placeholder="Deskripsi barang" class="form-control me-2">
                        <input type="text" name="maker[]" placeholder="Maker" class="form-control">`;
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
                                    <th>JENIS BARANG</th>
                                    <th>NAMA BARANG</th>
                                    <th>MAKER</th>
                                    <th>JUMLAH</th>
                                    <th>DESKRIPSI</th>
                                    <th>EDIT</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($barang as $data)
                                    <tr>
                                        <td class="text-center">{{$loop->iteration}}</td>
                                        <td>{{ $data->kode_barang }}</td>
                                        <td>{{ $data->jenis_barang }}</td>
                                        <td>{{ $data->nama_barang }}</td>
                                        <td>{{ $data->maker }}</td>
                                        <td>{{ $data->stok }}</td>
                                        <td>{{ $data->deskripsi }}</td>
                                        <td><button class="bg-primary">KETERANGAN</button></td>
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
