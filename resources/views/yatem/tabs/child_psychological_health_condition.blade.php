<form action="{{route('yatem.childPsychologicalHealthCondition',$orphan->id)}}" method="post" id="child-psychological-health-condition">
    <div class="row">
        <div class="col-md-12">
                <div class="form-group row">
                    <label class="text-right col-md-3">الحالة الصحية للطفل</label>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="child_health_condition"
                                       {{$orphan->child_health_condition==1?"checked":""}}
                                       id="child_health_condition_1"
                                       value="1">
                                <label for="child_health_condition_1"
                                       style="padding-left:0px !important;">جيدة</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="child_health_condition"
                                       {{$orphan->child_health_condition==2?"checked":""}}
                                       id="child_health_condition_2"
                                       value="2">
                                <label for="child_health_condition_2"
                                       style="padding-left:0px !important;">متوسطة</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="child_health_condition"
                                       {{$orphan->child_health_condition==3?"checked":""}}
                                       id="child_health_condition_3"
                                       value="3">
                                <label for="child_health_condition_3"
                                       style="padding-left:0px !important;">يتلقى علاج</label>
                            </div>
                            <div class="col-md-3">
                                <input type="radio" required
                                       name="child_health_condition"
                                       {{$orphan->child_health_condition==4?"checked":""}}
                                       id="child_health_condition_4"
                                       value="4">
                                <label for="child_health_condition_4"
                                       style="padding-left:0px !important;">بحاجة إلي رعاية طبية دائمة</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="row">
        <div class="col-md-12">
                <div class="form-group row">
                    <label class="text-right col-md-3">الحالة النفسية و السلوكية للطفل</label>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="child_psychological_behavioral_state"
                                       {{$orphan->child_psychological_behavioral_state==1?"checked":""}}
                                       id="child_psychological_behavioral_state_1"
                                       value="1">
                                <label for="child_psychological_behavioral_state_1"
                                       style="padding-left:0px !important;">جيدة</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="child_psychological_behavioral_state"
                                       {{$orphan->child_psychological_behavioral_state==2?"checked":""}}
                                       id="child_psychological_behavioral_state_2"
                                       value="2">
                                <label for="child_psychological_behavioral_state_2"
                                       style="padding-left:0px !important;">متوسطة</label>
                            </div>
                            <div class="col-md-2">
                                <input type="radio" required
                                       name="child_psychological_behavioral_state"
                                       {{$orphan->child_psychological_behavioral_state==3?"checked":""}}
                                       id="child_psychological_behavioral_state_3"
                                       value="3">
                                <label for="child_psychological_behavioral_state_3"
                                       style="padding-left:0px !important;">يتلقى علاج</label>
                            </div>
                            <div class="col-md-3">
                                <input type="radio" required
                                       name="child_psychological_behavioral_state"
                                       {{$orphan->child_psychological_behavioral_state==4?"checked":""}}
                                       id="child_psychological_behavioral_state_4"
                                       value="4">
                                <label for="child_psychological_behavioral_state_4"
                                       style="padding-left:0px !important;">بحاجة إلي رعاية طبية دائمة</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</form>