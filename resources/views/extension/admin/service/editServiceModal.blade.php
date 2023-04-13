                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Service</h5>
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
                                                        action="{{ route('services.update', $row->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        {{-- @if (session('message'))
                                                                    <div class="alert alert-success">
                                                                        {{ session('message') }}
                                                                    </div>
                                                                @endif --}}
                                                        <div class="card-body">
                                                            <div class="row">
                                                                {{-- <input id="service_id" type="text"
                                                                    name="service_id" class="form-control d-none"
                                                                    value="{{ $row->id }}" style="width: 100%;"
                                                                    required> --}}
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Service Name</label>
                                                                        <input id="service" type="text"
                                                                            name="service" class="form-control"
                                                                            value="{{ $row->service }}"
                                                                            style="width: 100%;" required>
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Price</label>
                                                                        <input id="price" type="number"
                                                                            name="price" class="form-control"
                                                                            value="{{ $row->price }}"
                                                                            style="width: 100%;" required>
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Service Lists</label>
                                                                        <select id="service_list_id" name="service_list_id"
                                                                            class="form-control select2 select2-danger"
                                                                            data-dropdown-css-class="select2-danger"
                                                                            style="width: 100%;">
                                                                            <option value="{{ $row->service_list_id }}"
                                                                                selected="selected">
                                                                                {{ $row->service }}
                                                                            </option>
                                                                            @foreach ($serviceLists as $value)
                                                                                <option value="{{ $value->id }}">
                                                                                    {{ $value->service }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <!-- /.form-group -->
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <label>Vehicle Lists</label>
                                                                        <select id="vehicle_lists_id" name="vehicle_lists_id"
                                                                            class="form-control select2 select2-danger"
                                                                            data-dropdown-css-class="select2-danger"
                                                                            style="width: 100%;">
                                                                            <option value="{{ $row->vehicle_lists_id }}"
                                                                                selected="selected">
                                                                                {{ $row->vehicle_type }}
                                                                            </option>
                                                                            @foreach ($vehicleLists as $value)
                                                                                <option value="{{ $value->id }}">
                                                                                    {{ $value->vehicle_type }}</option>
                                                                            @endforeach
                                                                        </select>
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