<form action="{{route('yatem.personal',$orphan->id)}}" id="personalForm">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-right col-md-3">رقم الهوية</label>
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="number" value="{{$orphan->card_no}}" name="card_no" class="form-control " required>
                    </div>
                    <span class="card_no" style="color: darkred"></span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-right col-md-3"> اسم اليتيم رباعي </label>
                <div class="col-md-8">
                    <input type="text" name="name" value="{{$orphan->name??''}}" class="form-control" required>
                    <span class="name" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-right col-md-3"> اسم الوصي رباعي </label>
                <div class="col-md-8">
                    <input type="text" name="guardian_name"
                           value="{{$orphan->guardian_name??''}}" class="form-control" required>
                    <span class="guardian_name" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-right col-md-3">المحافظة</label>
                <div class="col-md-8">
                    <select name="state_id" id="state_id" class="form-control" onchange="getState();" required>
                        <option value=""> -- اختر المحافظة --</option>
                        @foreach($States as $state)
                            <option {{($orphan->state_id??0)==$state->id?"selected":""}} value="{{$state->id}}">{{$state->name}}</option>
                        @endforeach
                    </select>
                    <span class="state_id" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-right col-md-3">المنطقة</label>
                <div class="col-md-8">
                    <select name="region_id" id="region_id" class="form-control" required>
                        <option value=""> -- اختر المنطقة --</option>
                        @foreach($Regions as $region)
                            <option {{($orphan->region_id??0)==$region->id?"selected":""}} value="{{$region->id}}">{{$region->name}}</option>
                        @endforeach
                    </select>
                    <span class="region_id" style="color: darkred"></span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="text-right col-md-2">العنوان بالتفصيل</label>
                <div class="col-md-9">
                    <textarea name="address" placeholder="العنوان" class="form-control">
                        {{$orphan->address??''}}
                    </textarea>
                    <span class="address" style="color: darkred"></span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-right col-md-3">رقم التواصل</label>
                <div class="col-md-8">
                    <input type="number"
                           oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                           maxlength="11" name="mobile" value="{{$orphan->mobile??''}}" required placeholder="الجوال"
                           class="form-control">
                    <span class="mobile" style="color: darkred"></span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class="text-right col-md-3">رقم جوال بديل</label>
                <div class="col-md-8">
                    <input type="number"
                           oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                           maxlength="11" name="mobile2" value="{{$orphan->mobile2??''}}" placeholder="جوال بديل"
                           class="form-control">
                    <span class="mobile2" style="color: darkred"></span>
                </div>
            </div>
        </div>

    </div>
</form>