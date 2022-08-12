<form action="{{route('customers.familyComposition',$customer->id)}}" method="post" id="family-composition">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group row">
                <label class=" text-left col-md-4"> عدد أفراد الاسرة </label>
                <div class="col-md-8">
                    <input type="number" name="family_count" value="{{$customer->family_count}}" class="form-control" required>
                    <span class="family_count" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group row">
                <label class=" text-left col-md-4"> عدد الأبناء الذكور </label>
                <div class="col-md-8">
                    <input type="number" name="male_count" value="{{$customer->male_count}}" class="form-control" required>
                    <span class="male_count" style="color: darkred"></span>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group row">
                <label class=" text-left col-md-4"> عدد الأبناء الاناث </label>
                <div class="col-md-8">
                    <input type="number" name="female_count" value="{{$customer->female_count}}" class="form-control" required>
                    <span class="female_count" style="color: darkred"></span>
                </div>
            </div>
        </div>


        <div class="col-md-12">
            <div class="form-group row">
                <label class=" text-left col-md-2"> هل يوجد افراد اخرين احل البيت</label>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-3">
                            <input type="radio" {{$customer->other_member=="1"?"checked":""}}
                                   name="other_member" class="other_member" id="home-yes"
                                   value="1">
                            <label for="home-yes">نعم</label>
                        </div>
                        <div class="col-md-3">
                            <input type="radio" class="other_member" {{$customer->other_member=="0"?"checked":""}}
                            name="other_member" id="home-no"
                                   value="0">
                            <label for="home-no">لا</label>
                        </div>
                        <div class="col-md-5 default-hide" id="other_relation"
                             style="display: none;">
                            <div class="form-group row">
                                <label class="text-left col-md-2">صلة القرابة</label>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" name="other_relation" value="{{$customer->other_relation}}" class="form-control"
                                               required>
                                    </div>
                                    <span class="card_no" style="color: darkred"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group row">
                <label class=" text-left col-md-2"> عدد افراد الاسرة الاجمالي </label>
                <div class="col-md-10">
                    <input type="number" name="family_count_total"  value="{{$customer->family_count_total}}" class="form-control" required>
                    <span class="cus_name" style="color: darkred"></span>
                </div>
            </div>
        </div>
        <div class="row col-12">
            <div class="col-md">
                <div class="form-group">
                    <label> عدد افراد الاسرة فوق 18 ويعملون</label>
                    <div>
                        <input type="number" name="child_working"  value="{{$customer->child_working}}" class="form-control" required>
                        <span class="cus_name" style="color: darkred"></span>
                    </div>
                </div>
            </div>


            <div class="col-md">
                <div class="form-group">
                    <label> عدد افراد الاسرة فوق 18 ولا يعملون</label>
                    <div>
                        <input type="number" name="child_not_working"  value="{{$customer->child_not_working}}" class="form-control" required>
                        <span class="cus_name" style="color: darkred"></span>
                    </div>
                </div>
            </div>


            <div class="col-md">
                <div class="form-group">
                    <label>عدد الأبناء في المدارس</label>
                    <div>
                        <input type="number" name="child_school"  value="{{$customer->child_school}}" class="form-control" required>
                        <span class="cus_name" style="color: darkred"></span>
                    </div>
                </div>
            </div>


            <div class="col-md">
                <div class="form-group">
                    <label>عدد الأبناء في الجامعات</label>
                    <div>
                        <input type="number" name="child_university"   value="{{$customer->child_university}}" class="form-control" required>
                        <span class="cus_name" style="color: darkred"></span>
                    </div>
                </div>
            </div>

            <div class="col-md">
                <div class="form-group">
                    <label>عدد الأطفال ذوي الاحتيجات الخاصة</label>
                    <div>
                        <input type="number" name="child_special"   value="{{$customer->child_special}}" class="form-control" required>
                        <span class="cus_name" style="color: darkred"></span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</form>