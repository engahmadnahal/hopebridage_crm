<form action="{{route('yatem.information_guardian',$orphan->id)}}" method="post" id="information_guardian">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <label class=" text-right col-md-3">اسم الوصي </label>
                <div class="col-md-8">
                    <input type="text" name="guardians_name" value="{{$orphan->guardians_name}}" class="form-control"
                           required>
                    <span class="guardians_name" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label class=" text-right col-md-3"> العمر </label>
                <div class="col-md-8">
                    <input type="number" name="guardians_age" value="{{$orphan->guardians_age}}" class="form-control"
                           required>
                    <span class="guardians_age" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label class="text-right col-md-3">رقم الهوية</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="number" value="{{$orphan->guardians_card_no}}" name="guardians_card_no"
                               class="form-control " required>
                    </div>
                    <span class="guardians_card_no" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-right col-md-3">صلة القرابة</label>
                <div class="col-md-8">
                    <input type="text" name="guardians_relative_relation"
                           value="{{$orphan->guardians_relative_relation}}" class="form-control" required>
                    <span class="guardians_relative_relation" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-right col-md-3">المؤهل العلمي</label>
                <div class="col-md-8">
                    <input type="text" name="guardians_qualification" value="{{$orphan->guardians_qualification}}"
                           class="form-control" required>
                    <span class="guardians_qualification" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-right col-md-3">مهنة الوصي</label>
                <div class="col-md-8">
                    <input type="text" name="guardians_profession" value="{{$orphan->guardians_profession}}"
                           class="form-control" required>
                    <span class="guardians_profession" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-right col-md-3">الدخل</label>
                <div class="col-md-8">
                    <input type="number" name="guardians_income" value="{{$orphan->guardians_income}}"
                           class="form-control" required>
                    <span class="guardians_income" style="color: darkred"></span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="text-right col-md-3">حالة الأم الاجتماعية حاليا</label>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="mother_current_marital_status"
                                       {{$orphan->mother_current_marital_status==1?"checked":""}}
                                       id="mother_current_marital_status_1"
                                       value="1">
                                <label for="mother_current_marital_status_1"
                                       style="padding-left:0px !important;">أرملة</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="mother_current_marital_status"
                                       {{$orphan->mother_current_marital_status==2?"checked":""}}
                                       id="mother_current_marital_status_2"
                                       value="2">
                                <label for="mother_current_marital_status_2"
                                       style="padding-left:0px !important;">مطلقة</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="mother_current_marital_status"
                                       {{$orphan->mother_current_marital_status==3?"checked":""}}
                                       id="mother_current_marital_status_3"
                                       value="3">
                                <label for="mother_current_marital_status_3"
                                       style="padding-left:0px !important;">متزوجة</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="text-right col-md-4">هل يعيش الأطفال مع أمهم</label>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="do_children_live_with_their_mother"
                                       {{$orphan->do_children_live_with_their_mother==1?"checked":""}}
                                       id="do_children_live_with_their_mother_1"
                                       value="1">
                                <label for="do_children_live_with_their_mother_1" style="padding-left:0px !important;">نعم</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="do_children_live_with_their_mother"
                                       {{$orphan->do_children_live_with_their_mother==2?"checked":""}}
                                       id="do_children_live_with_their_mother_2"
                                       value="2">
                                <label for="do_children_live_with_their_mother_2" style="padding-left:0px !important;">لا</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                            <label class="text-right col-md-3">السبب</label>
                            <div class="col-md-8">
                                <input type="text" name="do_children_live_with_their_mother_reason"
                                       value="{{$orphan->do_children_live_with_their_mother_reason}}" class="form-control">
                                <span class="do_children_live_with_their_mother_reason" style="color: darkred"></span>
                            </div>
                        </div>
            </div>
        </div>


    </div>
</form>