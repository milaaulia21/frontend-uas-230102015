@extends('layouts.app')

@section('title', 'Data Mahasiswa')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
        <a href="{{ route('mahasiswa.create') }}" class="btn btn-sm btn-primary">
            <i class="fas fa-user-plus"></i> Insert Data
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="mahasiswaTable">
                <thead>
                    <tr>
                        <th>NPM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $mhs)
                        <tr>
                            <td>{{ $mhs['npm'] }}</td>
                            <td>{{ $mhs['nama_mahasiswa'] }}</td>
                            <td>{{ $mhs['email'] }}</td>
                            <td class="text-center">
                                <a href="{{ route('mahasiswa.edit', $mhs['npm']) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('mahasiswa.destroy', $mhs['npm']) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function () {
        $('#mahasiswaTable').DataTable();
    });
</script>
@endsection
