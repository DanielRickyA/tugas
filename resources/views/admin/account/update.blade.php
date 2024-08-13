@extends('dashboard')

@section('content')

<div class="container">
    <div class="py-3">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title font-weight-bold fs-2">Update Data Akun</h1>
                <form class="card-text row g-3 needs-validation" action="{{ route('account.update', $account->username) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    @if($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="Username" class="form-label">Username </label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                                value="{{ old('username', $account->username) }}" placeholder="Masukan username">
                            @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                                value="{{ old('name', $account->name) }}" placeholder="Masukan nama">
                            @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role"
                                value="{{ old('role', $account->role) }}" placeholder="Masukan role">
                                <option value="admin" {{ $account->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="author" {{ $account->role == 'author' ? 'selected' : '' }}>Author</option>
                            </select>
                            @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-12 form-group">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

@endsection