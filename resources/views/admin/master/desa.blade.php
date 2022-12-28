@extends('admin.layout.layout')

@section('content')
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Data Profil Desa</h4>
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
                        <a href="#">Profil Desa</a>
                    </li>
                </ul>
            </div>
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Profil Desa</h4>

                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Desa</th>
                                            <th>Alamat</th>
                                            <th>No Telp</th>
                                            <th>Visi</th>
                                            <th>Misi</th>
                                            <th>Sejarah</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1 ?>
                                        @foreach ($data as $desa)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$desa->desa_nama}}</td>
                                            <td>{{$desa->desa_alamat}}</td>
                                            <td>{{$desa->desa_telp}}</td>
                                            <td>{{$desa->desa_visi}}</td>
                                            <td>{{$desa->desa_misi}}</td>
                                            <td>{{$desa->desa_sejarah}}</td>
                                            <td>
                                                <div>

                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="#modalEditDesa{{$desa->desa_id}}" data-toggle="modal" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>

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

<!-- Edit data -->

@foreach($data as $g)
<div class="modal fade" id="modalEditDesa{{$g->desa_id}}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Edit Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/desa_edit/{id}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{$g->desa_id}}" name="id" required>
                <div class="modal-body">
                    <div class="form-grup">
                        <label>Nama Desa</label>
                        <input type="text" value="{{$g->desa_nama}}" class="form-control" name="desa_nama" placeholder="Nama Lengkap ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Alamat</label>
                        <input type="text" value="{{$g->desa_alamat}}" class="form-control" name="desa_alamat" placeholder="Nama Lengkap ..." required>
                    </div>
                    <div class="form-grup">
                        <label>No Telp</label>
                        <input type="text" value="{{$g->desa_telp}}" class="form-control" name="desa_telp" placeholder="Nama Lengkap ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Visi</label>
                        <input type="text" value="{{$g->desa_visi}}" class="form-control" name="desa_visi" placeholder="Nama Lengkap ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Misi</label>
                        <input type="text" value="{{$g->desa_misi}}" class="form-control" name="desa_misi" placeholder="Nama Lengkap ..." required>
                    </div>
                    <div class="form-grup">
                        <label>Sejarah</label>
                        <textarea class="form-control" name="desa_sejarah" id="" cols="10" rows="5">{{$g->desa_sejarah}}</textarea>
                    </div>
                    <div class="form-grup">
                        <label>Foto 1</label><br>
                        <input type="file" name="desa_foto">
                    </div>
                    <div class="form-grup">
                        <label>Foto 2</label><br>
                        <input type="file" name="desa_foto2">
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

@endforeach -->

@endsection