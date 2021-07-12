@extends('layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <a href="{{ route('dashboard.index') }}" class="btn btn-danger btn-sm">Kembali</a>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#tambah_user">Tambah User</button>
                <br><br>

                <table class="table table-striped table-hover table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $user_data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user_data->name }}</td>
                                <td>{{ $user_data->username }}</td>
                                <td>{{ $user_data->role }}</td>
                                <td>
                                    <div class="text-center">
                                        <a href="#" class="btn btn-info btn-sm fas fa-edit" data-toggle="modal"
                                            data-target="#editUser-{{ $user_data->id }}" value=""></a>
                                        <form action="{{ route('dashboard.destroy', $user_data->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm fas fa-trash-alt delete_user"></button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- awal modal tambah user --}}
    <div id="tambah_user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('dashboard') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name"
                                class="col-form-label @error('name') is-invalid @enderror">Nama:</label>
                            <input type="text" class="form-control" name="name">
                            <div class="text-danger">
                                @error('name')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name"
                                class="col-form-label @error('username') is-invalid @enderror">Username:</label>
                            <input type="text" class="form-control" name="username">
                            <div class="text-danger">
                                @error('username')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="recipient-name"
                                class="col-form-label @error('password') is-invalid @enderror">Password</label>
                            <input type="password" class="form-control" name="password">
                            <div class="text-danger">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Role</label>
                            <select name="role" class="form-control @error('role') is-invalid @enderror">
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>
                            <div class="text-danger">
                                @error('role')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- akhir modal tambah user --}}

    {{-- awal modal edit user --}}
    @foreach ($user as $data)
        <div id="editUser-{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true" data-modal="">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('dashboard.update', $data->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Nama:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $data->name }}">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Username:</label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror"
                                    name="username" value="{{ $data->username }}">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password">
                            </div>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Role</label>
                                <select name="role" class="form-control @error('role') is-invalid @enderror" name="role">
                                    <option value="admin" @if ($data->role == 'admin ') selected @endif>Admin</option>
                                    <option value="petugas" @if ($data->role == 'petugas') selected @endif>Petugas</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    {{-- akhir modal edit user --}}
    @if (Session::get('Success'))
        <script>
            swal("Succes");
        </script>
    @endif
@endsection
