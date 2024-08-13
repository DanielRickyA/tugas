@extends('dashboard')

@section('content')

<div class="content">
    <div class="container py-3">
        <div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Data Akun</h4>
                <a href="{{ route('account.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Tambah
                </a>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Role</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($account as $item)

                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->username}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->role}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('account.destroy', $item->username) }}" method="POST">
                                <a href="{{route('account.edit', $item->username) }}" class="btn btn-success"><i class="fa-solid fa-pen me-1"></i>Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger "><i class="fa-solid fa-trash me-1"></i>Hapus</button>
                            </form>
                        </td>
                    </tr>

                    @empty
                    <div class="alert alert-danger">
                        Data Kelas masi kosong
                    </div>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection