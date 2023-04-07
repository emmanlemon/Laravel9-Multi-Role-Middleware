@extends('layouts.app')
@include('partials.superadmin.left-sidebar')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Shops</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Shops</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <!-- Main row -->
                <div class="row">


                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th class="text-center">Shop Name</th>
                                        <th class="text-center">Owner</th>
                                        <th class="text-center">Active</th>
                                        <th class="text-center">Location</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usersAndShops as $row)
                                        <tr>
                                            <td class="text-center">{{ $row->id }}</td>
                                            <td class="text-center">{{ $row->shop_name }}</td>
                                            <td class="text-center">{{ $row->name }}</td>
                                            <td class="text-center"><span
                                                    class="{{ $row->status == 1 ? 'badge badge-success' : 'badge badge-danger' }}">{{ $row->status == 1 ? 'Active' : 'Not Active' }}</span>
                                            </td>
                                            <td class="text-center">{{ $row->address }}</td>
                                            <td class="text-center">
                                                <a href="#" data-toggle="modal"
                                                    data-target="#viewModal{{ $row->id }}"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-folder">
                                                    </i>View</a>
                                                {{-- <a href="{{ route('shops.show', $row->id) }}"
                                                    class="btn btn-primary btn-sm">
                                                    <i class="fas fa-folder">
                                                    </i>View</a> --}}
                                                <a href="#" data-toggle="modal"
                                                    data-target="#editModal{{ $row->id }}"
                                                    class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt">
                                                    </i>Edit</a>
                                                {{-- <a href="{{ route('shops.edit', $row->id) }}" class="btn btn-info btn-sm"><i
                                                        class="fas fa-pencil-alt">
                                                    </i>Edit</a> --}}
                                                <a href="#" data-toggle="modal"
                                                    data-target="#deleteModal{{ $row->id }}"
                                                    class="btn btn-danger btn-sm"><i class="fas fa-trash">
                                                    </i>Delete</a>
                                            </td>
                                        </tr>

                                        <!-- View Modal -->
                                        <div class="modal fade" id="viewModal{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewModalLabel">View Shop</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- {"id":3,
                                                        "active":0,
                                                        "name":"testOwnerName",
                                                        "email":"test@email.com",
                                                        "email_verified_at":null,
                                                        "role":2,
                                                        "created_at":"2023-04-06 14:58:21",
                                                        "updated_at":"2023-04-06 15:18:46",
                                                        "shop_name":"testShopName",
                                                        "user_role_id":2,
                                                        "users_id":6,
                                                        "status":0,
                                                        "logo":"default.png"} --}}
                                                        <div class="card card-default">
                                                          <div class="card-header">
                                                              <h3 class="card-title">List of Shops</h3>

                                                              <div class="card-tools">
                                                              </div>
                                                          </div>
                                                          <!-- /.card-header -->
                                                          <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Shop Name</label>
                                                                        <input id="shop_name" type="text"
                                                                            name="shop_name" class="form-control"
                                                                            value="{{ $row->shop_name }}"
                                                                            style="width: 100%;" disabled>
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label>Email</label>
                                                                        <input id="email" type="text"
                                                                            name="email" class="form-control"
                                                                            value="{{ $row->email }}"
                                                                            style="width: 100%;" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                      <label>Date Created</label>
                                                                      <input id="name" type="text"
                                                                          name="name" class="form-control"
                                                                          value="{{ \Carbon\Carbon::parse($row->created_at)->format('F j, Y, g:i a') }}"
                                                                          style="width: 100%;" disabled>
                                                                  </div>
                                                                  <div class="form-group">
                                                                    <label>Location</label>
                                                                    <input id="address" type="text"
                                                                        name="address" class="form-control"
                                                                        value="{{ $row->address }}"
                                                                        style="width: 100%;" disabled>
                                                                </div>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                                <!-- /.col -->
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Owner Name</label>
                                                                        <input id="name" type="text"
                                                                            name="name" class="form-control"
                                                                            value="{{ $row->name }}"
                                                                            style="width: 100%;" disabled>
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <input id="name" type="text"
                                                                            name="status" class="form-control"
                                                                            value="{{ $row->status == 1 ? 'Active' : 'Not Active' }}"
                                                                            style="width: 100%;" disabled>
                                                                    </div>
                                                                    <div class="form-group">
                                                                      <label>Date Updated</label>
                                                                      <input id="updated_at" type="text"
                                                                          name="updated_at" class="form-control"
                                                                          value="{{ \Carbon\Carbon::parse($row->updated_at)->format('F j, Y, g:i a') }}"
                                                                          style="width: 100%;" disabled>
                                                                  </div>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                                {{-- <div class="col-md-6">
                                                                  <div class="form-group">
                                                                      <label>Date Created</label>
                                                                      <input id="name" type="text"
                                                                          name="name" class="form-control"
                                                                          value="{{ $row->created_at }}"
                                                                          style="width: 100%;" disabled>
                                                                  </div>
                                                                  <!-- /.form-group -->
                                                                  <div class="form-group">
                                                                      <label>Date Updated</label>
                                                                      <input id="name" type="text"
                                                                          name="status" class="form-control"
                                                                          value="{{ $row->updated_at }}"
                                                                          style="width: 100%;" disabled>
                                                                  </div>
                                                                  <!-- /.form-group -->
                                                              </div> --}}
                                                                <!-- /.col -->
                                                            </div>
                                                            <!-- /.row -->
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editModalLabel">Edit Shop</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card card-default">
                                                            <div class="card-header">
                                                                <h3 class="card-title">List of Shops</h3>

                                                                <div class="card-tools">
                                                                </div>
                                                            </div>
                                                            <!-- /.card-header -->
                                                            <form method="POST"
                                                                action="{{ route('shops.update', $row->id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                @if (session('message'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('message') }}
                                                                    </div>
                                                                @endif
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <input id="users_id" type="text" name="users_id"
                                                                            class="form-control d-none"
                                                                            value="{{ $row->users_id }}"
                                                                            style="width: 100%;" required>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Shop Name</label>
                                                                                <input id="shop_name" type="text"
                                                                                    name="shop_name" class="form-control"
                                                                                    value="{{ $row->shop_name }}"
                                                                                    style="width: 100%;" required>
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            <div class="form-group">
                                                                                <label>Email</label>
                                                                                <input id="email" type="text"
                                                                                    name="email" class="form-control"
                                                                                    value="{{ $row->email }}"
                                                                                    style="width: 100%;" required>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label>Location</label>
                                                                                <input id="address" type="text"
                                                                                    name="address" class="form-control"
                                                                                    value="{{ $row->address }}"
                                                                                    style="width: 100%;" required>
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Owner Name</label>
                                                                                <input id="name" type="text"
                                                                                    name="name" class="form-control"
                                                                                    value="{{ $row->name }}"
                                                                                    style="width: 100%;" required>
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                            <div class="form-group">
                                                                                <label>Status</label>
                                                                                <select id="status" name="status"
                                                                                    class="form-control select2 select2-danger"
                                                                                    data-dropdown-css-class="select2-danger"
                                                                                    style="width: 100%;">
                                                                                    <option value="{{ $row->status }}"
                                                                                        selected="selected">
                                                                                        {{ $row->status == 1 ? 'Active' : 'Not Active' }}
                                                                                    </option>
                                                                                    <option value="1">Active</option>
                                                                                    <option value="0">Not Active
                                                                                    </option>
                                                                                </select>
                                                                            </div>
                                                                            <!-- /.form-group -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                    </div>
                                                                    <!-- /.row -->
                                                                </div>
                                                                <div class="card-footer">
                                                                    <button type="submit" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Delete Shop</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure you want to delete this shop?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form method="POST"
                                                            action="{{ route('shops.destroy', $row->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if (session('message'))
                                        <div class="alert alert-success">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('js')
    <script>
        $(function() {
            $('#datatable').DataTable({
                responsive: true,
                autoWidth: false,
            });
        });
    </script>
@stop
