<aside class="site-sidebar scrollbar-enabled" data-suppress-scroll-x="true">
    <!-- User Details -->
    <!-- /.side-user -->
    <!-- Call to Action -->
    <!-- Sidebar Menu -->
    <nav class="sidebar-nav">
        <ul class="nav in side-menu">
        @if(in_array(27,$allowedActions))
                <li class="@if (preg_match_all('/(home|home)/',url()->current())) active  @endif">
                    <a href="{{url('home')}}"><i class="list-icon feather feather-home"></i> <span
                                class="hide-menu"> الرئيسية </span></a>
                 </li>
            @endif

            @if(in_array(27,$allowedActions))
                <li class="menu-item-has-children  @if (preg_match_all('/(Customer|ammar)/',url()->current())) active  @endif">
                    <a href="javascript:void(0);"><i class="list-icon feather feather-briefcase"></i> <span
                                class="hide-menu"> المستفيدين </span></a>
                    <ul class="list-unstyled sub-menu">
                        @if(in_array(28,$allowedActions))
                            <li><a href="{{url('Customer/v1/create')}}"> اضافة جديد</a>
                            </li>
                            <li><a href="{{url('Customer/create')}}"> اضافة نظام قديم</a>
                            </li>

                        @endif
                        @if(in_array(27,$allowedActions))
                            <li><a href="{{url('Customer')}}">عرض المستفيدين</a>
                            </li>@endif
                    </ul>
                </li>
            @endif

            @if(in_array(35,$allowedActions))
                    <li class="menu-item-has-children  @if (preg_match_all('/(Orphan|OrphanSearch)/',url()->current())) active  @endif">
                        <a href="javascript:void(0);"><i class="list-icon feather feather-briefcase"></i> <span
                                    class="hide-menu"> الأيتام  </span></a>
                        <ul class="list-unstyled sub-menu">
                            @if(in_array(28,$allowedActions))
                                <li><a href="{{url('Orphan/v1/create')}}"> اضافة جديد</a></li>
                            @endif

                            <li>
                                <a href="{{url('Orphan')}}">
                                    <i class="icon-home"></i> عرض الايتام </a>
                            </li>
                            @if(in_array(36,$allowedActions))
                                <li>
                                    <a href="{{url('OrphanSearch')}}">
                                        <i class="icon-home"></i> استخراج كشف ايتام </a>
                                </li>
                            @endif
                            @if(in_array(36,$allowedActions))
                                <li>
                                    <a href="{{url('OrphanSalary')}}">
                                        <i class="icon-home"></i> تسجيل الكفالات الشهرية </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

            @if(in_array(27,$allowedActions))
                <li class="menu-item-has-children  @if (preg_match_all('/(Widowed|ammar)/',url()->current())) active  @endif">
                    <a href="javascript:void(0);"><i class="list-icon feather feather-briefcase"></i> <span
                                class="hide-menu"> السيدات الارامل </span></a>
                    <ul class="list-unstyled sub-menu">
                        @if(in_array(28,$allowedActions))
                            <li><a href="{{url('Widowed/v1/create')}}"> اضافة جديد</a></li>

                        @endif
                        @if(in_array(27,$allowedActions))
                            <li><a href="{{url('Widowed')}}">عرض السيدات الارامل</a>
                            </li>@endif
                    </ul>
                </li>
            @endif

            @if(in_array(10,$allowedActions))
                <li class="menu-item-has-children  @if (preg_match_all('/(ProjectSponser|Project)/',url()->current())) active  @endif">
                    <a href="javascript:void(0);"><i class="list-icon feather feather-briefcase"></i> <span
                                class="hide-menu"> المشاريع  </span></a>
                    <ul class="list-unstyled sub-menu">
                        <li>
                            <a href="{{url('ProjectSponser')}}">
                                <i class="icon-home"></i> الممولين </a>
                        </li>
                        <li>
                            <a href="{{url('Project')}}">
                                <i class="icon-home"></i> المشاريع </a>
                        </li>
                    </ul>
                </li>
            @endif

            @if(in_array(31,$allowedActions))
                <li class="menu-item-has-children @if (preg_match_all('/(Report|Search)/',url()->current())) active  @endif">
                    <a href="javascript:void(0);"><i class="list-icon feather feather-printer">
                        </i> <span class="hide-menu">التقارير</span></a>
                    <ul class="list-unstyled sub-menu">
                        @if(in_array(32,$allowedActions))
                            <li>
                                <a href="{{url('Report/NeedCustomer')}}">
                                    <i class="icon-home"></i> استخراج كشف مستفيدين جدد </a>
                            </li>
                        @endif
                        @if(in_array(33,$allowedActions))
                            <li>
                                <a href="{{url('recieveHelpReport')}}">
                                    كشف من استلم مساعدة </a>
                            </li>
                        @endif
                        @if(in_array(34,$allowedActions))
                            <li>

                                <a href="{{url('printReport')}}">
                                    طباعة كشوفات التسليم</a>
                            </li>
                        @endif

                        @if(in_array(33,$allowedActions))
                            <li>
                                <a href="{{url('Report/NoNeedCustomer')}}">
                                    <i class="icon-home"></i>كشف لمن لم يستفد من مشاريع اخرى </a>
                            </li>
                        @endif

                    </ul>
                </li>
            @endif

            @if(in_array(1,$allowedActions) || in_array(6,$allowedActions))
                <li class="menu-item-has-children  @if (preg_match_all('/(User|Roles)/',url()->current())) active  @endif">
                    <a href="javascript:void(0);"><i class="list-icon feather feather-users"></i> <span
                                class="hide-menu"> المستخدمين </span></a>
                    <ul class="list-unstyled sub-menu">
                        @if(in_array(6,$allowedActions))
                            <li>
                                <a href="{{url("User")}}"> المستخدمين </a>
                            </li>
                        @endif
                        @if(in_array(1,$allowedActions))
                            <li>
                                <a href="{{url('Roles/list')}}"> الصلاحيات </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            @if(in_array(14,$allowedActions) || in_array(86,$allowedActions))
                <li class="menu-item-has-children @if (preg_match_all('/(setting|Qualification|State|Region|MainReason|Education|House|Work|FoodGaz|Opinion|Shower|SocialStatus|outcomes)/',url()->current())) active  @endif">
                    <a href="javascript:;"><i class="list-icon feather feather-settings"></i> <span
                                class="hide-menu">{{trans('ar.sittings')}}</span></a>
                    <ul class="list-unstyled sub-menu ">

                        @if(in_array(86,$allowedActions))
                            <li>
                                <a href="{{url('setting')}}">
                                    <i class="icon-clock"></i> بيانات المؤسسة </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{url('State')}}">
                                <i class="icon-basket"></i> ادارة المحافظات </a>
                        </li>
                        <li>
                            <a href="{{url('SocialStatus')}}">
                                <i class="icon-basket"></i> الحالة الاجتماعية </a>
                        </li>
                        <li>
                            <a href="{{url('Qualification')}}">
                                <i class="icon-basket"></i>المؤهل العلمي</a>
                        </li>

                        <li>
                            <a href="{{url('outcomes')}}">
                                <i class="icon-basket"></i>المصروفات</a>
                        </li>
                        <li>
                            <a href="{{url('Region')}}">
                                <i class="icon-basket"></i> ادارة المناطق </a>
                        </li>
                        <li>
                            <a href="{{url('RegionType')}}">
                                <i class="icon-basket"></i> انواع المناطق السكنية </a>
                        </li>
                        <li>
                            <a href="{{url('MainReason')}}">
                                <i class="icon-basket"></i> اسباب الاحتياج </a>
                        </li>
                        <li>
                            <a href="{{url('Education')}}">
                                <i class="icon-basket"></i> المستوى التعليمي </a>
                        </li>
                        <li>
                            <a href="{{url('Work')}}">
                                <i class="icon-basket"></i> حالة العمل </a>
                        </li>
                        <li>
                            <a href="{{url('WorkRegion')}}">
                                <i class="icon-basket"></i> قطاع العمل </a>
                        </li>
                        <li>
                            <a href="{{url('HelpType')}}">
                                <i class="icon-basket"></i> انواع المساعدات </a>
                        </li>
                        <li>
                            <a href="{{url('HouseOwner')}}">
                                <i class="icon-basket"></i> نوع ملكية السكن </a>
                        </li>
                        <li>
                            <a href="{{url('HouseMaterial')}}">
                                <i class="icon-basket"></i> مواد بناء السقف </a>
                        </li>
                        <li>
                            <a href="{{url('HouseType')}}">
                                <i class="icon-basket"></i> نوع السكن </a>
                        </li>
                        <li>
                            <a href="{{url('HouseRoom')}}">
                                <i class="icon-basket"></i> عدد الغرف </a>
                        </li>
                        <li>
                            <a href="{{url('HouseWall')}}">
                                <i class="icon-basket"></i> مواد بناء الجدران </a>
                        </li>
                        <li>
                            <a href="{{url('FoodGaz')}}">
                                <i class="icon-basket"></i> مصادر غاز الطهي </a>
                        </li>
                        <li>
                            <a href="{{url('Furniture')}}">
                                <i class="icon-basket"></i> الاثاث الثابت </a>
                        </li>
                        <li>
                            <a href="{{url('UserOpinion')}}">
                                <i class="icon-basket"></i> رأي الباحثين </a>
                        </li>
                        <li>
                            <a href="{{url('HouseShower')}}">
                                <i class="icon-basket"></i> يتوفر حمام </a>
                        </li>
                    </ul>
                </li>
            @endif
            {{--<li class="menu-item-has-children">--}}
            {{--<a href="javascript:;">--}}
            {{--<i class="list-icon feather feather-feather"></i> <span class="hide-menu">أخرى <span class="badge bg-info"></span></span></a>--}}
            {{--<ul class="list-unstyled sub-menu">--}}
            {{--<li><a href="#">أخرى 1</a>--}}
            {{--</li>--}}
            {{--<li><a href="#">أخرى 2</a>--}}
            {{--</li>--}}
            {{----}}
            {{----}}
            {{--</ul>--}}
            {{--</li>--}}

        </ul>

        <!-- /.side-menu -->
    </nav>
</aside>
