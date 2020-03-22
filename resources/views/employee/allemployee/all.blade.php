@extends('layout.master')
@section('title', 'All Employee')
@section('parentPageTitle', 'Employee Area')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
@stop
@section('content')

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>All</strong> Employee </h2>
                <ul class="header-dropdown">
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="javascript:void(0);">Action</a></li>
                            <li><a href="javascript:void(0);">Another action</a></li>
                            <li><a href="javascript:void(0);">Something else</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Designation</th>
                                <th>Duty</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Photo</th>
                              <th>Name</th>
                              <th>Phone</th>
                              <th>Designation</th>
                              <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                          @foreach ($employees as $employee)

                          <tr>
                              <td>
                                <img src="{{ asset('uploads/employee') }}/{{ $employee->photo }}" style="width: 25%;border-radius: 50%;" alt="">
                              </td>
                              <td>{{ $employee->name }}</td>
                              <td>{{ $employee->phone }}</td>
                              <td>{{ $employee->relationBetweenDesignation->name }}</td>
                              <td>{{ $employee->relationBetweenDuty->name }}</td>
                              <td>

                                @anypermission('admin')
                                <a href="{{ url('employee/edit') }}/{{ $employee->id }}" class="btn-sm btn-primary">Edit</a>
                                @endanypermission

                                @anypermission('desk-admin','admin')
                                <a href="{{ url('employee/profile') }}/{{ $employee->id }}" class="btn-sm btn-success">View</a>
                                @endanypermission

                                @anypermission('admin')
                                <a href="#" class="btn-sm btn-danger">Delete</a>
                                @endanypermission

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
@stop
@section('page-script')
<script src="{{asset('assets/bundles/datatablescripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.flash.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-datatable/buttons/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/js/pages/tables/jquery-datatable.js')}}"></script>
@stop
