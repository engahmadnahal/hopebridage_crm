<form action="{{route('yatem.familyEducationalStatus',$orphan->id)}}" method="post" id="family-educational-status">
    <div class="row">
        <div class="col-md-12">
                <div class="form-group row">
                    <label class="text-right col-md-3">طلاب المراحل المدرسية</label>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="school_stage_students"
                                       {{$orphan->school_stage_students==1?"checked":""}}
                                       id="school_stage_students_1"
                                       value="1">
                                <label for="school_stage_students_1"
                                       style="padding-left:0px !important;">لا يوجد</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="school_stage_students"
                                       {{$orphan->school_stage_students==2?"checked":""}}
                                       id="school_stage_students_2"
                                       value="2">
                                <label for="school_stage_students_2"
                                       style="padding-left:0px !important;">من 1-2 طلاب</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="school_stage_students"
                                       {{$orphan->school_stage_students==3?"checked":""}}
                                       id="school_stage_students_3"
                                       value="3">
                                <label for="school_stage_students_3"
                                       style="padding-left:0px !important;">من 3 طلاب فأكثر</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="row">
        <div class="col-md-12">
                <div class="form-group row">
                    <label class="text-right col-md-3">طلاب المرحلة الجامعية</label>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="undergraduate_students"
                                       {{$orphan->undergraduate_students==1?"checked":""}}
                                       id="undergraduate_students_1"
                                       value="1">
                                <label for="undergraduate_students_1"
                                       style="padding-left:0px !important;">لا يوجد</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="undergraduate_students"
                                       {{$orphan->undergraduate_students==2?"checked":""}}
                                       id="undergraduate_students_2"
                                       value="2">
                                <label for="undergraduate_students_2"
                                       style="padding-left:0px !important;">من 1-2 طلاب</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="undergraduate_students"
                                       {{$orphan->undergraduate_students==3?"checked":""}}
                                       id="undergraduate_students_3"
                                       value="3">
                                <label for="undergraduate_students_3"
                                       style="padding-left:0px !important;">من 3 طلاب فأكثر</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</form>