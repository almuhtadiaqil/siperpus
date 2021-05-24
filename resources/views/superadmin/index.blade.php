@extends('include.master')
@section('content')
<div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
<a href="superadmin" class="btn btn-danger btn-sm">Kembali</a>
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
        <tr>
            <td>1</td>
            <td>Hishna</td>
            <td>Ganteng</td>
            <td>Admin/visit</td>
            <td>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_user">Edit</button>
                <form action="" method="POST" style="display: inline;">
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            
            </td>
        </tr>
        
    </tbody>
</table>
</div>
</div>
</div>

<div id="tambah_user" class="modal fade"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password</label>
            <input type="password" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Role</label>
            <select name="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="visitor">Visitor</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>
      </div>
      </div>
      </div>

      <div id="edit_user" class="modal fade"tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nama:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Username:</label>
            <input type="text" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Password</label>
            <input type="password" class="form-control">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Role</label>
            <select name="role" class="form-control">
            <option value="admin">Admin</option>
            <option value="visitor">Visitor</option>
            </select>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Simpan</button>
      </div>

</div>
</div>
</div>
@endsection
