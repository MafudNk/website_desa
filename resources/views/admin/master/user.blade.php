@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data User</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="/dashboard">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">User</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data User</h4>
                                <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddUser">
                                    <i class="fa fa-plus"></i>
                                    Create
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach ($data as $user_data)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $user_data->user_name }}</td>
                                            <td>{{ $user_data->email }}</td>
                                            <td>
                                                <div>
                                                    <!-- <form action="{{ 'user_destroy',$user_data->user_id }}" method="Post"> -->
                                                    @csrf
                                                    @method('DELETE')
                                                    <!-- <a href="#modalEditUser{{$user_data->user_id}}"  data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a> -->
                                                    <a href="#modalEditUser{{$user_data->user_id}}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                                    <a href="#modalHapusUser{{$user_data->user_id}}" data-toggle="modal" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>Hapus</a>
                                                    <!-- </form> -->
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


// add data user

<div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/user" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" name="full_name" placeholder="Nama Lengkap ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password ..." required>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


//hapus data user

@foreach($data as $g)
<div class="modal fade" id="modalHapusUser{{$g->user_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Hapus User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="GET" enctype="multipart/form-data" action="/user_destroy/{id}">
                @csrf
                <div class="modal-body">

                    <input type="hidden" value="{{$g->user_id}}" name="id" required>

                    <div class="form-grup">
                        <h4>Apakah anda ingin menghapus data ini?</h4>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                        <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i>Hapus Data</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach

//edit user

@foreach($data as $g)
<div class="modal fade" id="modalEditUser{{$g->user_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/user_edit/{id}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$g->user_id}}" name="id" required>
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama Lengkap</label>
                        <input type="text" value="{{$g->user_name}}" class="form-control" name="full_name" placeholder="Nama Lengkap ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Username</label>
                        <input type="text" class="form-control" value="{{$g->username}}" name="username" placeholder="Username ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Email</label>
                        <input type="email" class="form-control" value="{{$g->email}}" name="email" placeholder="Email ..." required>
                    </div>

                    <div class="form-grup">
                        <label>Password</label>
                        <input type="password" class="form-control" value="" name="password" placeholder="isi jika ganti password ...">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-undo"></i>Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endforeach

@endsection