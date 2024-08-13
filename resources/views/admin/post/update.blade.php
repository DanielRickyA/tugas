@extends('dashboard')

@section('content')

<div class="container">
    <div class="py-3">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title font-weight-bold fs-2">Update Data Post</h1>
                <form class="card-text row g-3 needs-validation" action="{{ route('post.update', $post->idpost) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")


                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <label for="title" class="form-label">Title </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" placeholder="Masukan Title">
                            @error('title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="content" class="form-label">Content</label>
                            <input type="text" class="form-control @error('content') is-invalid @enderror" id="content" name="content" value="{{ old('content' , $post->content) }}" placeholder="Masukan Content">
                            @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date', substr($post->date, 0, 10)) }}" placeholder="Masukan Date">
                            @error('date')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>S
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="role" class="form-label">Username</label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="username" value="{{ old('username', $post->username) }}" placeholder="Masukan role">
                                @foreach($users as $user)
                                <option value="{{$user->username}}" {{ $post->username == $user->username ? 'selected' : '' }}>{{$user->name}}</option>
                                @endforeach
                            </select>
                            @error('username')
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