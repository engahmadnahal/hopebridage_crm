@extends('layouts.index')

@section('content')


    <section class="content">
        @if(!isset($stage))
            <div class="widget-list row">
                <div class="widget-holder widget-sm col-md-3 widget-full-height">
                    <div class="widget-bg">
                        <div class="widget-body">
                            <a href="#">
                                <div class="counter-w-info media">
                                    <div class="media-body">
                                        <p class="text-muted mr-b-5">رقم الملف</p><span
                                                class="counter-title color-primary"><span
                                                    class="counter">{{$customer->file_no}}</span> </span>
                                        <!-- /.counter-title --> <span class="counter-difference text-success"> </span>
                                        <div class="mr-t-20"><span data-toggle="sparklines" data-height="15"
                                                                   data-width="70"
                                                                   data-line-color="#1976d2" data-line-width="3"
                                                                   data-spot-radius="1" data-fill-color="rgba(0,0,0,0)"
                                                                   data-spot-color="undefined"
                                                                   data-min-spot-color="undefined"
                                                                   data-max-spot-color="undefined"
                                                                   data-highlight-line-color="undefined"><!-- 10,5,7,8,3,0,4,12,10,8,12 --></span>
                                        </div>
                                    </div>
                                    <!-- /.media-body -->
                                    <div class="pull-right align-self-center"><i
                                                class="list-icon feather feather-user-plus bg-primary"></i>
                                    </div>
                                </div>
                            </a>
                            <!-- /.counter-w-info -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>
                <!-- /.widget-holder -->
                <div class="widget-holder widget-sm col-md-3 widget-full-height">
                    <div class="widget-bg">
                        <div class="widget-body">
                            <a href="#">
                                <div class="counter-w-info media">
                                    <div class="media-body">
                                        <p class="text-muted mr-b-5">التقييم</p><span
                                                class="counter-title color-info"><span
                                                    class="counter points">{{$customer->total}}</span></span>
                                        <!-- /.counter-title --> <span class="counter-difference text-danger"></span>
                                        <div class="progress" style="width: 70%; position: relative; top: 25px">
                                            <div class="progress-bar bg-info" style="width: 66%"
                                                 role="progressbar"><span
                                                        class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.media-body -->
                                    <div class="pull-right align-self-center"><i
                                                class="list-icon feather feather-award bg-info"></i>
                                    </div>
                                </div>
                            </a>
                            <!-- /.counter-w-info -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>

                <div class="widget-holder widget-sm col-md-3 widget-full-height">
                    <div class="widget-bg">
                        <div class="widget-body">
                            <a href="#project_model" id="project_count" data-toggle="modal">
                                <div class="counter-w-info media">
                                    <div class="media-body">
                                        <p class="text-muted mr-b-5">عدد مرات الاستفادة</p><span
                                                class="counter-title color-info"><span
                                                    class="counter">{{$help_count}}</span></span>
                                        <!-- /.counter-title --> <span class="counter-difference text-danger"></span>
                                        <div class="progress" style="width: 70%; position: relative; top: 25px">
                                            <div class="progress-bar bg-info" style="width: 66%"
                                                 role="progressbar"><span
                                                        class="sr-only">20% Complete</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.media-body -->
                                    <div class="pull-right align-self-center"><i
                                                class="list-icon feather feather-watch bg-pink"></i>
                                    </div>
                                </div>
                            </a>
                            <!-- /.counter-w-info -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>


                <div class="widget-holder widget-sm col-md-3 widget-full-height">
                    <div class="widget-bg">
                        <div class="widget-body">
                            <div class="counter-w-warning media">
                                <div class="media-body">
                                    <p class="text-muted mr-b-5">أخر تحديث</p><span
                                            class="counter-title color-info"><span
                                                style="direction: ltr">{{$customer->updated_at}}</span></span>
                                    <!-- /.counter-title --> <span class="counter-difference text-danger"></span>
                                    <div class="progress" style="width: 70%; position: relative; top: 25px">
                                        <div class="progress-bar bg-info" style="width: 66%" role="progressbar"><span
                                                    class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.media-body -->
                                <div class="pull-right align-self-center"><i
                                            class="list-icon feather feather-watch bg-pink"></i>
                                </div>
                            </div>

                            <!-- /.counter-w-info -->
                        </div>
                        <!-- /.widget-body -->
                    </div>
                    <!-- /.widget-bg -->
                </div>


            </div>
        @endif

        <div class="card">
            <div class="card-header">
                {{!isset($stage)?"عرض بيانات ".$customer->name:'مستفيد جديد'}}
            </div>
            <div class="card-body" style="position: relative">

                <div id="rootwizard">

                    <div class="tab-content">
                        @include('customers.tabs.personal')
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class=" text-left col-md-4"> الاسم رباعي </label>
                                    <div class="col-md-8">
                                        <input type="text" name="father_name" value="{{$customer->father_name}}" class="form-control" required>
                                        <span class="father_name" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class=" text-left col-md-2"> تاريخ الميلاد </label>
                                    <div class="col-md-10">
                                        <input name="birthday" type="text"
                                               class="form-control datepicker" autocomplete="off"  value="{{$customer->birthday?$customer->birthday->format('Y-m-d'):''}}"
                                               data-date-format="yyyy-mm-dd" required
                                               data-plugin-options='{"autoclose": true}'>
                                        <span class="cus_name" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="text-left col-md-4">رقم الهوية</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="number"  value="{{$customer->card_no}}" name="card_no" class="form-control " required>
                                        </div>
                                        <span class="card_no" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="text-left col-md-2">هوية الزوج/ة</label>
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <input type="text" name="card_no_wife" style="width:100%"  value="{{$customer->card_no_wife}}" class="form-control" >
                                        </div>
                                        <span class="card_no_wife" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="text-left col-md-2">الحالة الاجتماعية</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            @foreach($SocialStatus as $social)
                                                <div class="col-md-2">
                                                    <input type="radio" required {{$social->id==$customer->social_id?"checked":""}}
                                                    name="social_id" id="social-{{$social->id}}"
                                                           value="{{$social->id}}">
                                                    <label for="social-{{$social->id}}">{{$social->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="text-left col-md-2">الحالة الصحية</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            @foreach($Healths as $health)
                                                <div class="col-md-2">
                                                    <input type="radio"  required {{$health->id==$customer->health_id?"checked":""}}
                                                    name="health_id" id="health-{{$health->id}}"
                                                           value="{{$health->id}}">
                                                    <label for="health-{{$health->id}}">{{$health->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 default-hide" id="handicap" style="display: none;">
                                <div class="form-group row">
                                    <label class="text-left col-md-2">نوع الاعاقة</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" name="Handicap_type" class="form-control"
                                                   value="{{$customer->Handicap_type}}"
                                                   required>
                                        </div>
                                        <span class="card_no" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12 default-hide" id="disease" style="display: none;">
                                <div class="form-group row">
                                    <label class="text-left col-md-2">حدد المرض</label>
                                    <div class="col-md-8">
                                        <div class="input-group">
                                            <input type="text" name="disease"  value="{{$customer->disease}}" class="form-control" required>
                                        </div>
                                        <span class="card_no" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="text-left col-md-2">المؤهل العلمي</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            @foreach($Qualifications as $Qualification)
                                                <div class="col-md-2">
                                                    <input type="radio" required
                                                           name="qualification_id" {{$customer->qualification_id==$Qualification->id?"checked":""}}
                                                           id="Qualification-{{$Qualification->id}}"
                                                           value="{{$Qualification->id}}">
                                                    <label
                                                            for="Qualification-{{$Qualification->id}}">{{$Qualification->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        @include('customers.tabs.family_composition')
                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class=" text-left col-md-4">مهنة رب الاسرة الأساسي</label>
                                    <div class="col-md-8">
                                        <input type="text" name="job_name" value="{{$customer->job_name}}"
                                               class="form-control" required>
                                        <span class="cus_name" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class=" text-left col-md-4">متوسط الدخل الشهري بالشيكل</label>
                                    <div class="col-md-8">
                                        <input type="number" name="income" value="{{intval($customer->income)}}"
                                               class="form-control" required>
                                        <span class="income" style="color: darkred"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h3 class="text-muted">بيانات دخل الاسرة</h3>
                                <table class="table table-striped">
                                    <thead>
                                    <th>المصدر</th>
                                    <th>نوع المساعدة</th>
                                    <th>الدخل النقدي</th>
                                    <th>الجهة</th>
                                    </thead>
                                    <tbody>
                                    @foreach($customer->incomes as $income)
                                        <tr>
                                            <td><input type="text" name="income_source[]" readonly
                                                       value="{{$income->income_source}}" class="form-control"></td>
                                            <td><input type="text" name="income_type[]" readonly
                                                       value="{{$income->income_type}}" class="form-control"></td>
                                            <td><input type="number" name="income_amount[]" readonly
                                                       value="{{$income->income_amount}}"
                                                       class="form-control income_amount"></td>
                                            <td><input type="text" name="income_side[]" readonly
                                                       value="{{$income->income_side}}" class="form-control"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="2">الاجمالي من الدخل</td>
                                        <td id="total_income" colspan="2">{{$customer->income_sum}} شيكل</td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="col-md-12">

                                <h3>تفاصيل المصروفات الشهرية بالشيكل</h3>
                                <table class="table table-striped">
                                    <thead>
                                    <th>المصروف</th>
                                    <th>التفاصيل</th>
                                    </thead>
                                    <tbody>
                                    @foreach($outcomes as $outcome)
                                        <tr>
                                            <td>{{$outcome->name}}</td>
                                            <td><input type="number" id="outcome_rent" name="outcome[{{$outcome->id}}]"
                                                       value="{{$customer->outcomes->where('id',$outcome->id)->first()->pivot->amount??''}}"
                                                       class="form-control outcome_price"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                    <tfoot>
                                    <tr>
                                        <td>اجمالي مصروفات الاسرة الشهرية</td>
                                        <td id="total_outcome">{{$customer->outcome_sum}}</td>
                                    </tr>

                                    <tr>
                                        <td>اجمالي الدخل</td>
                                        <td id="total_income_2">{{$customer->income_sum}}</td>
                                    </tr>

                                    <tr>
                                        <td>المتبقي من الدخل</td>
                                        <td id="remain_income">{{$customer->income_sum-$customer->outcome_sum}}</td>
                                    </tr>
                                    </tfoot>

                                </table>
                            </div>


                        </div>
                        <hr>
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="text-left col-md-2">بيانات السكن</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            @foreach($HouseOwner as $house_o)
                                                <div class="col-md-2">
                                                    <input type="radio"
                                                           name="house_owner" id="house_o-{{$house_o->id}}"
                                                           {{$house_o->id==$customer->house_owner?"checked":""}}
                                                           value="{{$house_o->id}}">
                                                    <label for="house_o-{{$house_o->id}}">{{$house_o->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="col-12">

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="text-left col-md-2">نوع المسكن</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            @foreach($HouseType as $house_ty)
                                                <div class="col-md-2">
                                                    <input type="radio"
                                                           {{$house_ty->id==$customer->house_type?"checked":""}}
                                                           name="house_type" id="house_ty-{{$house_ty->id}}"
                                                           value="{{$house_ty->id}}">
                                                    <label
                                                            for="house_ty-{{$house_ty->id}}">{{$house_ty->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="col-12">

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="text-left col-md-2">بتاء السقف</label>
                                    <div class="col-md-10">
                                        <div class="row">
                                            @foreach($HouseMaterial as $material)
                                                <div class="col-md-2">
                                                    <input type="radio"
                                                           {{$material->id==$customer->house_material?"checked":""}}
                                                           name="house_material" id="material-{{$material->id}}"
                                                           value="{{$material->id}}">
                                                    <label
                                                            for="material-{{$material->id}}">{{$material->name}}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="col-12">


                            <div class="col-md-12">
                                <h3>
                                    وصف محتويات المنزل
                                </h3>
                                <table class="table table-strip">
                                    <thead>
                                    <th>البيان</th>
                                    <th>العدد</th>
                                    <th>التقيم</th>
                                    </thead>
                                    <tbody>
                                    @foreach($Furnitures as $Furniture)
                                        <tr>
                                            <td>{{$Furniture->name}}</td>
                                            <td><input type="number" id="Furniture-{{$Furniture->id}}"
                                                       name="furnitures[{{$Furniture->id}}]"
                                                       value="{{$customer->furnitures->where('id',$Furniture->id)->first()->pivot->count??''}}"
                                                       class="form-control "></td>
                                            <td><input type="number" min="0" dir="ltr" step=".5"
                                                       max="{{$Furniture->values/10}}"
                                                       id="Furniture-rate-{{$Furniture->id}}"
                                                       name="furnitures_rate[{{$Furniture->id}}]"
                                                       value="{{$customer->furnitures->where('id',$Furniture->id)->first()->pivot->rate??''}}"
                                                       class="form-control "></td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-12">
                                <h3 class="text-muted">طبيعة الاحتياج</h3>
                                <table class="table table-striped">
                                    <thead>
                                    <th>الاختياج</th>
                                    <th>طبيعة الاحتياح</th>
                                    <th>العدد</th>
                                    </thead>
                                    <tbody>
                                    @foreach($customer->needs as $need)
                                        <tr>
                                            <td><input type="text" name="need[]" readonly value="{{$need->need}}"
                                                       class="form-control"></td>
                                            <td><input type="text" name="description[]" readonly
                                                       value="{{$need->description}}" class="form-control"></td>
                                            <td><input type="number" name="count[]" readonly value="{{$need->count}}"
                                                       class="form-control"></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <hr>
                        @include('customers.tabs.social_researcher')

                        <hr>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <th width="20px">#</th>
                                    <th width="150px">الاسم</th>
                                    <th width="150px">سنة الميلاد</th>
                                    <th width="100px">الجنس</th>
                                    <th width="170px">رقم الهوية</th>
                                    <th width="130px">صلة القرابة</th>
                                    <th width="130px">المستوى التعليمي</th>
                                    <th width="130px">الحالة الاجتماعية</th>
                                    <th width="130px">الحالة الصحية</th>
                                    <th width="130px">النشاط التجاري</th>
                                    <th width="130px">الراتب</th>
                                    </thead>
                                    <tbody id="children">
                                    @forelse($customer->childs as $key=> $child)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td><input type="text" name="child_name[]" value="{{$child->name}}"
                                                       class="form-control"></td>
                                            <td><input type="text" name="child_dob[]"
                                                       value="{{$child->dob->format('Y')}}"
                                                       class="form-control"></td>
                                            <td>
                                                <select class="form-control" name="child_jender[]">
                                                    @foreach($Jenders as $jender)

                                                        <option
                                                                {{$child->jender_id == $jender->id?"selected":""}}
                                                                value="{{$jender->id}}">{{$jender->name}}</option>
                                                    @endforeach
                                                </select>

                                            </td>
                                            <td><input type="text" name="child_card_no[]" value="{{$child->card_no}}"
                                                       class="form-control"></td>
                                            <td>
                                                <select class="form-control" name="child_relation[]">
                                                    @foreach($Relation as $rell)
                                                        <option
                                                                {{$child->relation==$rell->id?"selected":""}}
                                                                value="{{$rell->id}}">{{$rell->name}}</option>
                                                    @endforeach
                                                </select>

                                            </td>
                                            <td>
                                                <select name="child_qualification[]" class="form-control">
                                                    @foreach($Qualifications as $Qualification)
                                                        <option {{$child->qualification_id ==$Qualification->id?"selected":""}}
                                                                value="{{$Qualification->id}}">{{$Qualification->name}}</option>
                                                    @endforeach
                                                </select>


                                            <td>
                                                <select name="child_social[]" class="form-control">
                                                    @foreach($SocialStatus as $social)
                                                        <option {{$child->social_id ==$social->id?"selected":""}}
                                                                value="{{$social->id}}">{{$social->name}}</option>
                                                    @endforeach
                                                </select>
                                            <td>
                                                <select class="form-control" name="child_health[]">
                                                    @foreach($Healths as $helth)
                                                        <option {{$child->health_id ==$helth->id?"selected":""}}
                                                                value="{{$helth->id}}">{{$helth->name}}</option>
                                                    @endforeach
                                                </select>
                                            <td><input type="text" name="child_job[]" value="{{$child->job}}"
                                                       class="form-control"></td>
                                            <td><input type="text" name="child_salary[]"
                                                       value="{{intval($child->salary)}}"
                                                       class="form-control"></td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="11" id="no-data">لا يوجد بيانات</td>
                                        </tr>

                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-striped">
                                    <thead>
                                    <th style="text-align: right">الاسم</th>
                                    <th style="text-align: right">تحميل</th>
                                    </thead>
                                    <tbody id="attachments-table">
                                    @foreach($customer->attachments as $attachment)

                                        <tr>
                                            <input type="hidden" name="ids[]" value="{{$attachment->id}}">
                                            <td>{{$attachment->title}}</td>
                                            <td>
                                                @if($attachment->name)
                                                    <a href="{{route('download')}}?id={{$attachment->name}}">تحميل</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>

                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <table class="table table-striped text-center">
                                    <tr>
                                        <td>رقم الملف</td>
                                        <td><p id="file_no">{{$customer->file_no}}</p></td>
                                    </tr>
                                    <tr>
                                        <td>التقيم</td>
                                        <td><p class="points">{{$customer->total}}</p></td>
                                    </tr>
                                    <tr>
                                        <td>اسم مدخل الطلب</td>
                                        <td><p id="file_no">{{$customer->user->name}}</p></td>
                                    </tr>
                                    <tr>
                                        <td>اسم الباحث</td>
                                        <td><p id="file_no">{{$customer->researcher_name}}</p></td>
                                    </tr>
                                    <tr>
                                        <td>تاريخ الاضافة</td>
                                        <td><p id="file_no">{{$customer->created_at->format('Y-m-d')??''}}</p></td>
                                    </tr>
                                    @if($customer->userUpdated)
                                        <tr>
                                            <td>عدل بواسطة</td>
                                            <td><p id="file_no">{{$customer->userUpdated->name}}</p></td>
                                        </tr>

                                    @endif
                                    <tr>
                                        <td>تاريخ التعديل</td>
                                        <td><p id="file_no">{{$customer->updated_at->format('Y-m-d')}}</p></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade" id="project_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document" style="width: 900px;">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="portlet-title">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span1
                                    aria-hidden="true">&times;
                            </span1>
                        </button>
                        <span class="caption-subject font-purple-soft bold uppercase">المشاريع التي استفاد منها</span>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table id="project_tb" dir="rtl" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th> م</th>
                                <th>المشروع</th>
                                <th> التاريخ</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" dir="rtl">
                    <a type="reset" data-dismiss="modal" class="btn   btn-default  " style="width: 100px;"> اغلاق <i
                                class="fa fa-close"></i> </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        #rootwizard {
            margin-top: 20px;
        }

        table th {
            background-color: #eee !important;
            border: none;
            text-align: center;
        }

        #rootwizard .navbar {
            background: none;
            width: auto;
            position: relative;
            height: 50px;
            display: block;
        }

        #rootwizard .progress {
            height: 20px;
            position: absolute;
            top: 0;
            display: block;
            width: 100%;
            right: 0;
        }

        #rootwizard .navbar li a.active {
            color: #fff;
            background-color: #428bca;
        }

        #rootwizard .navbar li {
            text-align: center;
        }

        table.table-view {
            border-color: #000;;
        }

        table.table-view th {
            background-color: #eee;
        }

        table.table-view .label-th {
            line-height: 34px !important;
            padding-top: 20px;
            text-align: left;
        }

        #rootwizard select.form-control {
            height: 34px;
        }

        .select2 {
            width: 100%;
            background-color: #fff;
        }

        .table-bordered {
            border-color: #000;
        }

        table.table-view {
            border-collapse: separate;
            border-top: 1px solid;
        }

        table.table-view th:first-child {
            border-right: 1px solid;
        }

        table.table-view th {
            border-left: 1px solid;
            border-bottom: 1px solid;
        }

        label {
            color: black !important;
            padding-left: 20px;
            padding-top: 5px;

        }

        input[type="radio"] {
            display: none;
        }

        input[type="radio"] + label {
            background-color: #f8f9fa;
            cursor: pointer;
            display: block;
            height: 40px;
            width: 200px;
            text-align: center;
            line-height: 25px;
        }

        input[type="radio"]:checked + label {
            box-shadow: 0px 0px 5px 0px #00b92a;
            background-color: #53f142;
            color: #fff;
        }

        label.error {
            color: red !important;
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }


        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
    <link rel="stylesheet" href="/plugins/fonts/style.css">
@endsection

@push('js')
    <script src="/plugins/jquery.bootstrap.wizard.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"
            integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/localization/messages_ar.js"
            integrity="sha256-elHFveOU5L4Pc/wo3WlEQPlbMrH6AlOyo79KeMCVo6U=" crossorigin="anonymous"></script>

    <script src="{{url('')}}/assets/tags/bootstrap-tagsinput.js"></script>
    <link href="{{url('')}}/assets/tags/bootstrap-tagsinput.css">

    <script>
        $('input').attr('disabled', true);
        $('select').attr('disabled', true);
        $('radio').attr('disabled', true);
        $('checkbox').attr('disabled', true);
        $('form#familyCompositionDetails').hide();
    </script>

@endpush

