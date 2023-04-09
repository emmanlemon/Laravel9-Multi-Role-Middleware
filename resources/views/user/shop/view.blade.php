@extends('layouts.app')
@include('partials.user.left-sidebar')
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
                            {{$usersAndShops}}
                            <br>
                            <hr>
                            <br>
                            {{$vehicle_lists}}
                        </div>
                    </div>


    

                    <!-- Blade Template -->
                    <div class="form-group">
                        <label for="vehicle_list">Vehicle List</label>
                        <select name="vehicle_list" id="vehicle_list" class="form-control">
                          <option value="">-- Select Vehicle --</option>
                          @foreach($vehicle_lists as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->vehicle_type }}</option>
                          @endforeach
                        </select>
                      </div>
                      
                      <div class="form-group">
                        <label for="service_list">Service List</label>
                        <div class="table-responsive">
                          <table id="service_table" class="table">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Service Name</th>
                                <th>Service Price</th>
                              </tr>
                            </thead>
                            <tbody></tbody>
                          </table>
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <strong>Total Price: </strong><span id="total_price">$0.00</span>
                          </div>
                        </div>
                      </div>
                      
                      <style>
                        #service_table td,
                        #service_table th {
                          border: 1px solid #ddd;
                          padding: 8px;
                          text-align: left;
                        }
                      
                        #service_table th {
                          background-color: #f2f2f2;
                        }
                      </style>
                      
                      <script>
                        $(document).ready(function() {
                          $('#vehicle_list').change(function() {
                            var vehicle_lists_id = $(this).val();
                      
                            $.ajax({
                              url: "{{ route('getServices') }}",
                              type: "GET",
                              data: {vehicle_lists_id: vehicle_lists_id},
                              dataType: "json",
                              success: function(data) {
                                var options = '';
                                $.each(data, function(key, value) {
                                  options += '<tr><td><input type="checkbox" name="services[]" value="' + value.id + '"></td><td>' + value.service + '</td><td>$' + value.price + '</td></tr>';
                                });
                                $('#service_table tbody').html(options);
                              }
                            });
                          });
                      
                          $('#service_table').on('change', 'input[type="checkbox"][name="services[]"]', function() {
                            var total = 0;
                            $('input[type="checkbox"][name="services[]"]:checked').each(function() {
                              var price = parseFloat($(this).closest('tr').find('td:nth-child(3)').text().replace('$', ''));
                              total += price;
                            });
                            $('#total_price').text('$' + total.toFixed(2));
                          });
                        });
                      </script>
                    
                    
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
