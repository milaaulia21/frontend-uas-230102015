@extends('layouts.app')

@section('title', 'Data Mata Kuliah')

@section('content')
<div class="container-fluid">
    <h3 class="mb-4">Daftar Mata Kuliah</h3>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('matkul.create') }}" class="btn btn-success mb-3">+ Tambah Matkul</a>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table id="matkulTable" class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $d)
                            <tr>
                                <td>{{ $d['kode_matkul'] }}</td>
                                <td>{{ $d['nama_matkul'] }}</td>
                                <td>{{ $d['sks'] }}</td>
                                <td>
                                    <a href="{{ route('matkul.edit', $d['kode_matkul']) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('matkul.destroy', $d['kode_matkul']) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#matkulTable').DataTable({
            "language": {
                "search": "Cari:",
                "lengthMenu": "Tampilkan _MENU_ data per halaman",
                "zeroRecords": "Data tidak ditemukan",
                "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
                "infoEmpty": "Data tidak tersedia",
                "infoFiltered": "(difilter dari _MAX_ total data)"
            }
        });
    });
</script>
@endpush
