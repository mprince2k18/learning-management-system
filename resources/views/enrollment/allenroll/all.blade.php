@extends('layout.master')
@section('title', 'All Enrolls')
@section('parentPageTitle', 'Enrollment Area')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css')}}"/>
@stop
@section('content')

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <h2><strong>All</strong> teacher </h2>
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
                              <th>Roll No</th>
                              <th>Batch No</th>
                              <th>Course</th>
                              <th>Enrolled On</th>
                              <!-- <th>Due</th> -->
                              <th>Next Payment</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                              <th>Photo</th>
                              <th>Name</th>
                              <th>Roll No</th>
                              <th>Batch No</th>
                              <th>Course</th>
                              <th>Enrolled On</th>
                              <!-- <th>Due</th> -->
                              <th>Next Payment</th>
                              <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                          @foreach ($enrolls as $enroll)

                            @php
                              $firstDate = $enroll->relationBetweenInstallment->firstInstallmentDate;
                              $secondDate = $enroll->relationBetweenInstallment->secondInstallmentDate;
                              $thirdDate = $enroll->relationBetweenInstallment->thirdInstallmentDate;
                              $fourDate = $enroll->relationBetweenInstallment->fourInstallmentDate;
                              $fiveDate = $enroll->relationBetweenInstallment->fiveInstallmentDate;


                              $firstPay = $enroll->relationBetweenInstallment->firstInstallment;
                              $secondPay = $enroll->relationBetweenInstallment->secondInstallment;
                              $thirdPay = $enroll->relationBetweenInstallment->thirdInstallment;
                              $fourPay = $enroll->relationBetweenInstallment->fourInstallment;
                              $fivePay = $enroll->relationBetweenInstallment->fiveInstallment;

                              $today = Carbon\Carbon::now();
                              $nextPaymentDate = null;

                              if($enroll->relationBetweenInstallment->secondInstallmentCheck != 'paid'){
                                  $nextPaymentDate = $enroll->relationBetweenInstallment->secondInstallmentDate;
                              }
                              elseif($enroll->relationBetweenInstallment->thirdInstallmentCheck != 'paid'){
                                  $nextPaymentDate = $enroll->relationBetweenInstallment->thirdInstallmentDate;
                              }
                              elseif($enroll->relationBetweenInstallment->fourInstallment != 'paid'){
                                  $nextPaymentDate = $enroll->relationBetweenInstallment->fourInstallmentDate;
                              }
                              elseif($enroll->relationBetweenInstallment->fiveInstallmentCheck != 'paid'){
                                  $nextPaymentDate = $enroll->relationBetweenInstallment->fiveInstallmentDate;
                              }

                            @endphp




                          <tr class="@if($nextPaymentDate != null && $nextPaymentDate <= $today) bg-danger text-white @endif">
                          <!-- <tr class="bg-danger"> -->
                              <td>
                                <img src="{{ asset('uploads/student') }}/{{ $enroll->relationBetweenStudent->avatar }}" style="width: 13%;border-radius: 50%;" alt="">
                              </td>
                              <td>{{ $enroll->relationBetweenStudent->name }}</td>
                              <td>{{ $enroll->student_roll }}</td>
                              <td>{{ $enroll->relationBetweenBatch->batch_no }}</td>
                              <td>{{ $enroll->relationBetweenCourse->course_name }}</td>
                              <td>{{ $enroll->created_at }}</td>

                              @php
                              $discount = $enroll->relationBetweenInstallment->course_discount;
                              $course_fee = $enroll->course_fee;
                              $paid = $enroll->relationBetweenInstallment->firstInstallment;


                              @endphp


                              <!-- <td>{{ $discount }}</td> -->
                              <!-- <td>{{ $course_fee - $discount }}</td> -->
                              <td>
                                  {{ $nextPaymentDate }}
                              </td>
                              <td>
                                <a href="{{ url('enroll/profile') }}/{{ $enroll->id }}" class="btn-sm btn-primary">View</a>
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
