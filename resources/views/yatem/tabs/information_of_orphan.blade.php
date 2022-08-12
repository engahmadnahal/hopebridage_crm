<form action="{{route('yatem.information_of_orphan',$orphan->id)}}" method="post" id="information_of_orphan">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-right col-md-3"> اسم اليتيم </label>
                <div class="col-md-8">
                    <input type="text" name="name" value="{{$orphan->name}}" class="form-control" required>
                    <span class="name" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-right col-md-3"> الجنس </label>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="radio" required
                                   name="gender" {{$orphan->gender==1?"checked":""}}
                                   id="gender_1"
                                   value="1">
                            <label for="gender_1" style="padding-left:0px !important;">ذكر</label>
                        </div>
                        <div class="col-md-2">
                            <input type="radio" required
                                   name="gender" {{$orphan->gender==2?"checked":""}}
                                   id="gender_2"
                                   value="2">
                            <label for="gender_2" style="padding-left:0px !important;">أنثى</label>
                        </div>
                    </div>
                    <span class="gender" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-right col-md-3"> تاريخ الميلاد </label>
                <div class="col-md-8">
                    <input name="birthday" type="text"
                           class="form-control birthday datepicker" autocomplete="off"
                           value="{{$orphan->birthday?$orphan->birthday->format('Y-m-d'):''}}"
                           data-date-format="yyyy-mm-dd" required
                           data-plugin-options='{"autoclose": true,"endDate": new Date(),"maxDate": new Date()}'>
                    <span class="cus_name" style="color: darkred"></span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-right col-md-3">اليتيم فاقد</label>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="radio" required
                                   name="orphan_missing" {{$orphan->orphan_missing==1?"checked":""}}
                                   id="orphan_missing_1"
                                   value="1">
                            <label for="orphan_missing_1" style="padding-left:0px !important;">الام</label>
                        </div>
                        <div class="col-md-2">
                            <input type="radio" required
                                   name="orphan_missing" {{$orphan->orphan_missing==2?"checked":""}}
                                   id="orphan_missing_2"
                                   value="2">
                            <label for="orphan_missing_2" style="padding-left:0px !important;">الاب</label>
                        </div>
                        <div class="col-md-4">
                            <input type="radio" required
                                   name="orphan_missing" {{$orphan->orphan_missing==3?"checked":""}}
                                   id="orphan_missing_3"
                                   value="3">
                            <label for="orphan_missing_3" style="padding-left:0px !important;">الام والاب معا</label>
                        </div>
                    </div>
                    <span class="orphan_missing" style="color: darkred"></span>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label class="text-right col-md-2">التحصيل الدراسي</label>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="radio" required
                                   name="academic_achievement" {{$orphan->academic_achievement==1?"checked":""}}
                                   id="academic_achievement_1"
                                   value="1">
                            <label for="academic_achievement_1" style="padding-left:0px !important;">ممتاز</label>
                        </div>
                        <div class="col-md-2">
                            <input type="radio" required
                                   name="academic_achievement" {{$orphan->academic_achievement==2?"checked":""}}
                                   id="academic_achievement_2"
                                   value="2">
                            <label for="academic_achievement_2" style="padding-left:0px !important;">جيد جدا</label>
                        </div>
                        <div class="col-md-2">
                            <input type="radio" required
                                   name="academic_achievement" {{$orphan->academic_achievement==3?"checked":""}}
                                   id="academic_achievement_3"
                                   value="3">
                            <label for="academic_achievement_3" style="padding-left:0px !important;">جيد</label>
                        </div>
                        <div class="col-md-2">
                            <input type="radio" required
                                   name="academic_achievement" {{$orphan->academic_achievement==4?"checked":""}}
                                   id="academic_achievement_4"
                                   value="4">
                            <label for="academic_achievement_4" style="padding-left:0px !important;">متوسط</label>
                        </div>
                        <div class="col-md-2">
                            <input type="radio" required
                                   name="academic_achievement" {{$orphan->academic_achievement==5?"checked":""}}
                                   id="academic_achievement_5"
                                   value="5">
                            <label for="academic_achievement_5" style="padding-left:0px !important;">ضعيف</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group row">
                <label class=" text-right col-md-3"> الصف الدراسي </label>
                <div class="col-md-8">
                    <input type="text" name="classroom" value="{{$orphan->classroom}}" class="form-control">
                    <span class="classroom" style="color: darkred"></span>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="form-group row">
                <label class=" text-right col-md-5"> الصف الدراسي المواد الدراسية التي تحتاج الي دعم </label>
                <div class="col-md-7">
                    <input type="text" name="classroom_subjects_need_support" value="{{$orphan->classroom_subjects_need_support}}" class="form-control" required>
                    <span class="classroom_subjects_need_support" style="color: darkred"></span>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label class="text-right col-md-2">مواهبه ان وجد</label>
                <div class="col-md-10">
                    <input type="text" name="talents" value="{{$orphan->talents}}" class="form-control">
                    <span class="talents" style="color: darkred"></span>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label class="text-right col-md-4">هل الطفل مكفول من جهة اخرى</label>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-2">
                            <input type="radio" required
                                   name="child_guaranteed" {{$orphan->child_guaranteed==1?"checked":""}}
                                   id="child_guaranteed_1"
                                   value="1">
                            <label for="child_guaranteed_1" style="padding-left:0px !important;">نعم</label>
                        </div>
                        <div class="col-md-2">
                            <input type="radio" required
                                   name="child_guaranteed" {{$orphan->child_guaranteed==2?"checked":""}}
                                   id="child_guaranteed_2"
                                   value="2">
                            <label for="child_guaranteed_2" style="padding-left:0px !important;">لا</label>
                        </div>
                    </div>
                    <span class="child_guaranteed" style="color: darkred"></span>
                </div>
            </div>
        </div>

        <div class="col-md-12 default-hide" id="child_guaranteed_list" style="display: none;">
            <table class="table table-striped" id="child_guaranteed_list_Table">
                <thead>
                <th>م</th>
                <th>جهة الكفالة</th>
                <th>قيمة الكفالة</th>
                <th>مدة الكفالة</th>
                <th width="80px"></th>
                </thead>
                <tbody>
                @foreach($orphan->guarantees as $k=>$guaranteed)
                    <tr>
                        <td>{{$k+1}}</td>
                        <td><input type="text" name="guaranteed_source[]" readonly value="{{$guaranteed->guaranteed_source}}"  class="form-control" ></td>
                        <td><input type="number" name="guaranteed_amount[]" readonly value="{{$guaranteed->guaranteed_amount}}"   class="form-control" ></td>
                        <td><input type="text" name="guaranteed_period[]" readonly value="{{$guaranteed->guaranteed_period}}"  class="form-control" ></td>
                        <td>
                            <a href="javascript:;" class="delete-guaranteed btn btn-danger btn-sm" ><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach


                <tr class="form-add">
                    <td>{{count($orphan->guarantees)+1}}</td>
                    <td><input type="text" id="guaranteed_source" class="form-control"></td>
                    <td><input type="number" id="guaranteed_amount" class="form-control"></td>
                    <td><input type="text" id="guaranteed_period" class="form-control"></td>
                    <td>
                        <a href="javascript:;" class="add-new btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</form>