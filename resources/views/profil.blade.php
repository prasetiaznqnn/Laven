@extends('layouts.sidebar')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
                <h1 class="mt-4">DATA USER</h1>




                <div class="card mt-2">
                    <div class="card-header ">
                        <i class="fas fa-table me-1"></i>
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Departemen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>P01</td>
                                    <td><BUTton style="border-radius:20px" class="bg-success">DISETUJUI</BUTton></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </div>
    </main>
    </div>
@endsection
