@extends('admin.layoutsadmin')

@section('title','Tambah Admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-success text-white">
            <h4 class="mb-0">Tambah Admin</h4>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.simpan') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>

                    <div class="input-group">

                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-control"
                            required>

                        <button
                            type="button"
                            class="btn btn-outline-secondary"
                            id="btnShow"
                            onclick="togglePassword()">

                            Show

                        </button>

                    </div>

                </div>

                <div class="mb-3">
                    <label>Role</label>

                    <select name="role" class="form-select" required>
                        <option value="Admin">Admin</option>
                        <option value="Super Admin">Super Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button class="btn btn-success">
                    Simpan
                </button>

                <a href="{{ route('admin.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>

    </div>

</div>

<script>

function togglePassword(){

    let password = document.getElementById('password');
    let button = document.getElementById('btnShow');

    if(password.type === "password"){

        password.type = "text";
        button.innerHTML = "Hide";

    }else{

        password.type = "password";
        button.innerHTML = "Show";

    }

}

</script>


@endsection