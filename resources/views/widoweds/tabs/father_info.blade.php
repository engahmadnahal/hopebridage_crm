<form action="{{route('customers.fatherInfo',$customer->id)}}" method="post" id="father-info">
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
</form>