@extends('dashboard')

@section('content')

<div class="content">
    <div class="container py-3">
        <div>
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h4>Data Akun</h4>
                <a href="{{ route('post.create') }}" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Tambah
                </a>
            </div>

            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Content</th>
                        <th scope="col">date</th>
                        <th scope="col">Username</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($post as $item)

                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$item->title}}</td>
                        <td>{{$item->content}}</td>
                        <td>{{substr($item->date, 0, 10)}}</td>
                        <td>{{$item->username}}</td>
                        <td>
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('post.destroy', $item->idpost) }}" method="POST">
                                <a href="{{route('post.edit', $item->idpost) }}" class="btn btn-success"><i class="fa-solid fa-pen me-1"></i>Edit</a>
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