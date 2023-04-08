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
                        <h1 class="m-0">Vehicle List</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Vehicle List</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <!-- /.card -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Vehicle</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool py-3" data-toggle="modal"
                        data-target="#createModal">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Vehicle</th>
                                <th class="text-center">Date Created</th>
                                <th class="text-center">Date Updated</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vehicleLists as $row)
                                <tr>

                                    <td class="text-center">{{ $row->id }}</td>
                                    <td class="text-center">{{ $row->vehicle_type }}</td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($row->created_at)->format('F j, Y, g:i a') }}</td>
                                    <td class="text-center">
                                        {{ \Carbon\Carbon::parse($row->updated_at)->format('F j, Y, g:i a') }}</td>
                                    <td class="text-center py-0 align-middle">
                                        <div class="btn-group btn-group-sm">
                                            <a href="#" data-toggle="modal"
                                                data-target="#editModal{{ $row->id }}" class="btn btn-info"><i
                                                    class="fa fa-pencil-alt"></i></a>
                                            <a href="#" data-toggle="modal"
                                            data-target="#deleteModal{{ $row->id }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit vehicle</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h3 class="card-title">List of Vehicles</h3>

                                                        <div class="card-tools">
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <form method="POST"
                                                        action="{{ route('vehicleList.update', $row->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        {{-- @if (session('message'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('message') }}
                                                                    </div>
                                                                @endif --}}
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <input id="vehicleList_id" type="text"
                                                                    name="vehicleList_id" class="form-control d-none"
                                                                    value="{{ $row->id }}" style="width: 100%;"
                                                                    required>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>vehicle</label>
                                                                        <input id="vehicle" type="text" name="vehicle"
                                                                            class="form-control" value="{{ $row->vehicle }}"
                                                                            style="width: 100%;" required>
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                                <!-- /.col -->
                                                                {{-- <div class="col-md-6">
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
                                                                        </div> --}}
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

                                <!-- Create Modal -->
                                <div class="modal fade" id="createModal" tabindex="-1" role="dialog"
                                    aria-labelledby="createModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="createModalLabel">Create vehicle</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card card-default">
                                                    <div class="card-header">
                                                        <h3 class="card-title">List of Vehicles</h3>

                                                        <div class="card-tools">
                                                        </div>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <form method="POST" action="{{ route('vehicleList.store') }}">
                                                        @csrf
                                                        {{-- @if (session('message'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('message') }}
                                                                    </div>
                                                                @endif --}}
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>vehicle</label>
                                                                        <input id="vehicle" type="text"
                                                                            name="vehicle" class="form-control"
                                                                            value="{{ old('vehicle') }}"
                                                                            style="width: 100%;" required>
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                            </div>
                                                            <!-- /.row -->
                                                        </div>
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-primary">Create</button>
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
                                                <h5 class="modal-title" id="deleteModalLabel">Delete vehicle</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Are you sure you want to delete this Vehicle?
                                            </div>
                                            <div class="modal-footer">
                                                <form method="POST"
                                                    action="{{ route('vehicleList.destroy', $row->id) }}">
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
                        </tbody>
                        @endforeach
                        @if (session('message'))
                            <div class="alert alert-success">
                                {{ session('message') }}
                            </div>
                        @endif
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
