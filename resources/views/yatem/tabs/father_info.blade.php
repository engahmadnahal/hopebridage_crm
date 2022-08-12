<form action="{{route('yatem.fatherInfo',$orphan->id)}}" method="post" id="father-info">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-right col-md-3"> اسم الأب رباعي </label>
                <div class="col-md-8">
                    <input type="text" name="father_name" value="{{$orphan->father_name}}" class="form-control"
                           required>
                    <span class="father_name" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-right col-md-3"> تاريخ الوفاة </label>
                <div class="col-md-8">
                    <input name="father_date_death" type="text"
                           class="form-control birthday datepicker" autocomplete="off"
                           value="{{$orphan->father_date_death?$orphan->father_date_death->format('Y-m-d'):''}}"
                           data-date-format="yyyy-mm-dd" required
                           data-plugin-options='{"autoclose": true}'>
                    <span class="father_date_death" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-right col-md-3"> سبب الوفاة </label>
                <div class="col-md-8">
                    <input type="text" name="father_death_reason"
                           value="{{$orphan->father_death_reason??''}}" class="form-control">
                    <span class="father_death_reason" style="color: darkred"></span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-right col-md-3"> المهنة سابقا </label>
                <div class="col-md-8">
                    <input type="text" name="father_previous_profession"
                           value="{{$orphan->father_previous_profession??''}}" class="form-control">
                    <span class="father_previous_profession" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-right col-md-3"> الدخل سابقا </label>
                <div class="col-md-8">
                    <input type="text" name="father_previous_income"
                           value="{{$orphan->father_previous_income??''}}" class="form-control">
                    <span class="father_previous_income" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-right col-md-3"> الإرث أو المعاش أو الادخار </label>
                <div class="col-md-8">
                    <input type="text" name="father_savings"
                           value="{{$orphan->father_savings??''}}" class="form-control">
                    <span class="father_savings" style="color: darkred"></span>
                </div>
            </div>
        </div>
    </div>
</form>