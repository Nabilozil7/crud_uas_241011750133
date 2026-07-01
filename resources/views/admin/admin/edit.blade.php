@extends('admin.layoutsadmin')

@section('title', 'Edit Admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Edit Data Admin</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.update', $admin->id) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3 text-center">

                    @if($admin->foto)
                        <img src="{{ asset('asset/gambar/admin/'.$admin->foto) }}"
                             width="120"
                             class="rounded-circle mb-3">
                    @else
                        <img src="{{ asset('asset/gambar/admin/admindefault.png') }}"
                             width="120"
                             class="rounded-circle mb-3">
                    @endif

                </div>

                <div class="mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text"
                           name="nama"
                           class="form-control"
                           value="{{ $admin->nama }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text"
                           name="username"
                           class="form-control"
                           value="{{ $admin->username }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Password Baru</label>
                    <input type="password"
                           name="password"
                           class="form-control"
                           placeholder="Kosongkan jika tidak diubah">
                </div>

                <button type="submit" class="btn btn-success">
                    Simpan Perubahan
                </button>

                <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection