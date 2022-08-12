<nav class="navbar">
    <!-- Logo Area -->
    <div class="navbar-header">
        <a href="{{url('home')}}" class="navbar-brand">
            <img class="logo-expand" width="100px" alt="" src="{{url('')}}/logo.png">
            <img class="logo-collapse" width="50px"  alt="" src="{{url('')}}/logo.png">
            <!-- <p>BonVue</p> -->
        </a>
    </div>
    <!-- navbar-header -->
    <!-- Left Menu & Sidebar Toggle -->
    <ul class="nav navbar-nav">
        <li class="sidebar-toggle dropdown"><a href="javascript:void(0)" class="ripple"><i
                        class="feather feather-menu list-icon fs-20"></i></a>
        </li>
    </ul>
    <!-- /.navbar-left -->
    <!-- Search Form -->
    <form class="navbar-search d-none d-sm-block" role="search"><i class="feather feather-search list-icon"></i>
        <input type="search" class="search-query" placeholder="Search anything..."> <a href="javascript:void(0);"
                                                                                       class="remove-focus"><i
                    class="feather feather-x"></i></a>
    </form>
    <!-- /.navbar-search -->
    <div class="spacer"></div>
    <!-- Right Menu -->
    <ul class="nav navbar-nav d-none d-lg-flex ml-2 ml-0-rtl">
        @if(auth()->user()->role_id==1)
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="feather feather-bell list-icon"></i> <span class="button-pulse bg-danger"></span></a>
                <div class="dropdown-menu dropdown-right dropdown-card animated flipInY">
                    <div class="card">
                        <header class="card-header d-flex justify-content-between mb-0"><a href="javascript:void(0);"><i
                                        class="feather feather-bell color-primary" aria-hidden="true"></i></a> <span
                                    class="heading-font-family flex-1 text-center fw-400"></span> <a
                                    href="javascript:void(0);"><i
                                        class="feather feather-settings color-content"></i></a>
                        </header>
                        <ul class="card-body list-unstyled dropdown-list-group">
                            @foreach(\App\Models\Activity::with('admin')->latest()->limit(5)->get() as $activity)
                                <li><a href="#" class="">{{$activity->admin->name}}<br> {{$activity->details}} </a>
                                </li>
                            @endforeach
                        </ul>
                        <!-- /.dropdown-list-group -->
                        <footer class="card-footer text-center"><a href="javascript:void(0);"
                                                                   class="headings-font-family text-uppercase fs-13">See
                                all activity</a>
                        </footer>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.dropdown-menu -->
            </li>
    @endif
    <!-- /.dropdown -->
        <li><a href="javascript:void(0);" class="right-sidebar-toggle"><i
                        class="feather feather-settings list-icon"></i></a>
        </li>
    </ul>
    <!-- /.navbar-right -->
    <!-- User Image with Dropdown -->
    <ul class="nav navbar-nav">
        <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle dropdown-toggle-user ripple"
                                data-toggle="dropdown"><span class="avatar thumb-xs2"><span
                            style="padding-right: 20px;"> {{auth()->user()->name}}</span><img
                            src="uploads/avatars/{{ auth()->user()->avator}}" class="rounded-circle" alt=""> <i
                            class="feather feather-chevron-down list-icon"></i> </span></a>
            <div
                    class="dropdown-menu dropdown-right dropdown-card dropdown-card-profile animated flipInY">
                <div class="card">
                    <header class="card-header d-flex mb-0">
                        <a href="javascript:void(0);" class="col-md-4 text-center"><i
                                    class="feather feather-inbox align-middle"></i> </a>
                        <a href="javascript:void(0);" class="col-md-4 text-center"><i
                                    class="feather feather-settings align-middle"></i> </a>
                        <a href="{{url('logout')}}" class="col-md-4 text-center"><i
                                    class="feather feather-power align-middle"></i>
                        </a>
                    </header>
                    <ul class="list-unstyled card-body">
                        <li><a href="#"><b><span class="align-middle">{{auth()->user()->name}}</span></b></a>
                        </li>
                        {{--<li><a href="#"><span><span class="align-middle">تغيير كلمة المرور</span></span></a>--}}
                        {{--</li>--}}
                        {{--<li><a href="{{url('InnerPos/wared')}}"><span><span class="align-middle">صندوق الوارد</span></span></a>--}}
                        {{--</li>--}}
                        <li><a href="{{url('logout')}}"><span><span class="align-middle">تسجيل الخروج</span></span></a>
                        </li>
                    </ul>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.dropdown-card-profile -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-nav -->
</nav>