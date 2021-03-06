@extends('layout.master')
@section('title', 'Student Profile')
@section('parentPageTitle', 'Pages')
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/light-gallery/css/lightgallery.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/fullcalendar/fullcalendar.min.css')}}">
@stop
@section('content')
<div class="row clearfix">
    <div class="col-lg-4 col-md-12">
        <div class="card mcard_3">
            <div class="body">
                <a href="{{ url('employee/profile') }}/{{ $employee->id }}"><img src="{{ asset('uploads/employee') }}/{{ $employee->photo }}" class="rounded-circle shadow " alt="profile-image"></a>
                <h4 class="m-t-10">{{ $employee->name }}</h4>
                <div class="row">

                    <div class="col-12">
                        <ul class="social-links list-unstyled">
                            <li><a title="facebook" href="javascript:void(0);"><i class="zmdi zmdi-facebook"></i></a></li>
                            <li><a title="twitter" href="javascript:void(0);"><i class="zmdi zmdi-twitter"></i></a></li>
                            <li><a title="instagram" href="javascript:void(0);"><i class="zmdi zmdi-instagram"></i></a></li>
                        </ul>


                          <p class="text-muted">{{ $employee->relationBetweenDesignation->name }}</p>


                    </div>



                </div>
            </div>
        </div>

        <a href="{{ url('employee/edit') }}/{{ $employee->id }}">
          <div class="card info-box-2 hover-zoom-effect social-widget facebook-widget">
              <div class="icon"><i class="zmdi zmdi-edit"></i></div>
              <div class="content">
                  <div class="text">Edit Profile</div>
              </div>
          </div>
        </a>



        <div class="card">
            <div class="header">
                <h2><strong>Activities</strong></h2>
                <ul class="header-dropdown">
                    <li><a href="javascript:void(0);" title="add new"><i class="zmdi zmdi-plus"></i></a></li>
                    <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                        <ul class="dropdown-menu dropdown-menu-right slideUp">
                            <li><a href="javascript:void(0);">Edit</a></li>
                            <li><a href="javascript:void(0);">Delete</a></li>
                            <li><a href="javascript:void(0);">Report</a></li>
                        </ul>
                    </li>
                    <li class="remove">
                        <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                    </li>
                </ul>
            </div>
            <div class="body">
                <ul class="list-unstyled activity">
                    <li class="a_birthday">
                        <h4>Admin Birthday</h4>
                        <p>Lorem Ipsum is simply dummy text of the printing</p>
                        <small>1 months ago.</small>
                    </li>
                    <li class="a_code">
                        <h4>Code Change</h4>
                        <p>It is a long established fact that a reader will be distracted</p>
                        <small>1 week ago.</small>
                    </li>
                    <li class="a_contact">
                        <h4>Add New Contact</h4>
                        <code>maryamamiri@gmail.com</code>
                        <code>fideltonn@gmail.com</code>
                        <small>1 months ago.</small>
                    </li>

                </ul>
            </div>
        </div>

    </div>
    <div class="col-lg-8 col-md-12">

      <div class="card">
          <div class="body">

            <small class="text-muted">Name: </small>
            <p>{{ $employee->name }}</p>
            <hr>


            <small class="text-muted">Designation: </small>
            <p>{{ $employee->relationBetweenDesignation->name }}</p>
            <hr>

            <small class="text-muted">Duty: </small>
            <p>{{ $employee->relationBetweenDuty->name }}</p>
            <hr>


              <small class="text-muted">Phone: </small>
              <p>{{ $employee->phone }}</p>
              <hr>



              <small class="text-muted">Present Address: </small>
              <p>{{ $employee->address }}</p>






          </div>
      </div>

    </div>
</div>
@stop
@section('page-script')
<script src="{{asset('assets/plugins/light-gallery/js/lightgallery-all.min.js')}}"></script>
<script src="{{asset('assets/bundles/fullcalendarscripts.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/medias/image-gallery.js')}}"></script>
<script src="{{asset('assets/js/pages/calendar/calendar.js')}}"></script>
@stop
