@extends('admin.layoutsadmin')

@section('title','Data Admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

    <h3 class="fw-bold text-success">
        Data Admin
    </h3>

    <a href="{{ route('admin.tambah') }}" class="btn btn-success">
        + Tambah Admin
    </a>

    <

</div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead class="table-success">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @foreach($admin as $item)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>
                    <img src="{{ asset('asset/gambar/admin/'.$item->foto) }}"
                         width="60"
                         class="rounded">
                </td>

                <td>{{ $item->nama }}</td>

                <td>{{ $item->username }}</td>

               

                <td>

                <a href="{{ route('admin.edit', $item->id) }}"
                class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('admin.destroy', $item->id) }}"
                    method="POST"
                    class="d-inline"
                    onsubmit="return confirm('Yakin ingin menghapus admin ini?')">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm">
                        Hapus
                    </button>

                </form>

            </td>


            </tr>

            @endforeach

        </tbody>

    </table>

</div>

@endsection