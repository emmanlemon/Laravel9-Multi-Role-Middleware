
                                  <!-- Create Service Modal -->
                                  <div class="modal fade" id="createServiceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel" style="color:black;">Create Service</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="card card-default">
                                                {{-- <div class="card-header">
                                                    <h3 class="card-title" style="color:black;">Create Service</h3>
                                
                                                    <div class="card-tools">
                                                    </div>
                                                </div> --}}
                                                <!-- /.card-header -->
                                                <form method="POST" action="{{ route('services.store') }}">
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
                                                                    <label style="color:black;">Service Name</label>
                                                                    <input id="service" type="text"
                                                                        name="service" class="form-control"
                                                                        value="{{ old('service') }}"
                                                                        placeholder="Service Name"
                                                                        style="width: 100%;" required>
                                                                </div>
                                                                <!-- /.form-group -->
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label style="color:black;">Price</label>
                                                                    <input id="price" type="number"
                                                                        name="price" class="form-control"
                                                                        value="{{ old('price') }}"
                                                                        style="width: 100%;" required>
                                                                </div>
                                                                <!-- /.form-group -->
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label style="color:black;">Service Lists</label>
                                                                    <select id="service_list_id" name="service_list_id"
                                                                        class="form-control select2 select2-danger"
                                                                        data-dropdown-css-class="select2-danger"
                                                                        style="width: 100%;">
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
                                                                    <label style="color:black;">Vehicle Lists</label>
                                                                    <select id="vehicle_lists_id" name="vehicle_lists_id"
                                                                        class="form-control select2 select2-danger"
                                                                        data-dropdown-css-class="select2-danger"
                                                                        style="width: 100%;">
                                                                        @foreach ($vehicleLists as $value)
                                                                            <option value="{{ $value->id }}">
                                                                                {{ $value->vehicle_type }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <!-- /.form-group -->
                                                            </div>
                                                        </div>
                                                        <!-- /.row -->
                                                    </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                          <button type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                    </form>
                                      </div>
                                    </div>
                                  </div>
                                @yield('deleteServiceModal')