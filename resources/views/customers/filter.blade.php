<div class="form-body" style="padding: 10px; display: none;" id="myDIV" >
    <div class="row" style="position: relative">
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label col-md-3">بحث بالاسم</label>
                <div class="col-md-12">
                    <input type="text" id="name" name="name" class="form-control searchable" placeholder="الاسم">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label col-md-3">بحث بالهوية</label>
                <div class="col-md-12">
                    <input type="text" id="card_no" name="card_no" class="form-control searchable" placeholder="الهوية">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label col-md-3">بحث برقم الملف</label>
                <div class="col-md-12">
                    <input type="text" id="file_no" name="file_no" class="form-control searchable"
                           placeholder="رقم الملف">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label col-md-3">التقييم</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" id="total" name="total" class="form-control searchable" placeholder="من">
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="total_to" name="total_to" class="form-control searchable"
                               placeholder="الى">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label col-md-3">عدد افراد الاسرة</label>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" id="child_no" name="child_no" class="form-control searchable"
                               placeholder="من">
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="child_no_to" name="child_no_to" class="form-control searchable"
                               placeholder="الى">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label col-md-3">عدد الأبناء في الجامعة أكبر من</label>
                <div class="row">
                    <input type="number" id="child_university" name="child_university" class="form-control searchable"
                           placeholder="عدد الأبناء في الجامعة">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label col-md-3"> عدد الأطفال ذوي الاحتياجات الخاصة أكبر من</label>
                <div class="row">
                    <input type="number" id="child_special" name="child_special" class="form-control searchable"
                           placeholder="عدد الأطفال ذوي الاحتياجات الخاصة">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label class="control-label col-md-3"> معدل الدخل الشهري أقل من</label>
                <div class="row">
                    <input type="number" id="work_day_no" name="work_day_no" class="form-control searchable"
                           placeholder=" معدل الدخل الشهري">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group selectbs-wlbl">
                <span class="lblselect"> عدد مرات الاستفادة </span>
                <div class="row">

                    <div class="col-md-6">
                        <input type="text" id="beneficiary_count" name="beneficiary_count"
                               class="form-control searchable"
                               placeholder="من">
                    </div>
                    <div class="col-md-6">
                        <input type="text" id="beneficiary_count_to" name="beneficiary_count_to"
                               class="form-control searchable"
                               placeholder="الى">
                    </div>


                </div>
            </div>
        </div>
        <div class="row" style="position: relative">
            @if(!isset($type))
                <div class="col-md-3">
                    <div class="form-group selectbs-wlbl">
                        <span class="lblselect"> نوع الحالة </span>
                        <select data-column="1" name="type" id="type" class="bs-select form-control searchableList">
                            <option value="">اختر نوع الحالة</option>

                            <option value="1">حالة فقر</option>
                            <option value="2">كفالة ايتام</option>

                        </select>
                    </div>
                </div>
            @endif


            <div class="col-md-3">
                <div class="form-group selectbs-wlbl">
                    <span class="lblselect"> المحافظة </span>
                    <select data-column="1" name="state" id="state" class="bs-select form-control searchableList"
                            onChange="getState();">
                        <option value="">اختر المحافظة</option>
                        @foreach($States as $state)
                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group selectbs-wlbl">
                    <span class="lblselect"> المنطقة </span>
                    <select data-column="1" name="region" id="region" class="bs-select form-control searchableList">
                        <option value="">اختر المنطقة</option>
                        @foreach($Regions as $region)
                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group selectbs-wlbl">
                    <span class="lblselect"> نوع المسكن </span>
                    <select data-column="1" name="housetype" id="housetype"
                            class="bs-select form-control searchableList">
                        <option value="">اختر نوع المسكن</option>
                        @foreach($HouseType as $ht)
                            <option value="{{ $ht->id }}">{{ $ht->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group selectbs-wlbl">
                    <span class="lblselect"> مادة بناء السقف </span>
                    <select data-column="1" name="material" id="material" class="bs-select form-control searchableList">
                        <option value="">اختر مادة البناء</option>
                        @foreach($HouseMaterial as $mt)
                            <option value="{{ $mt->id }}">{{ $mt->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label col-md-3">المواطنة</label>
                    <div class="col-md-9">
                        <select name="citizin" id="citizin" class="form-control" required>
                            <option value=""> -- اختر مواطن/لاجىء --</option>
                            @foreach($Citizens as $citz)
                                <option value="{{$citz->id}}">{{$citz->name}}</option>
                            @endforeach
                        </select>
                        <span class="citizin" style="color: darkred"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label col-md-3">نوع المنطقة السكنية</label>
                    <div class="col-md-9">
                        <select name="region_type" id="region_type" class="form-control">
                            <option value=""> -- نوع المنطقة السكنية --</option>

                            @foreach($RegionTypes as $regiontype)
                                <option value="{{$regiontype->id}}">{{$regiontype->name}}</option>
                            @endforeach
                        </select>
                        <span class="region_type" style="color: darkred"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label col-md-3">السبب الرئيسي للاحتياج </label>
                    <div class="col-md-9">
                        <select name="main_reason" id="main_reason" class="form-control">
                            <option value=""> -- السبب الرئيسي للاحتياج --</option>

                            @foreach($MainReasons as $reason)
                                <option value="{{$reason->id}}">{{$reason->name}}</option>
                            @endforeach
                        </select>
                        <span class="main_reason" style="color: darkred"></span>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label col-md-3">المستوى التعليمي </label>
                    <div class="col-md-9">
                        <select name="education" id="education" class="form-control" required>
                            <option value=""> -- اختر المستوى التعليمي --</option>
                            @foreach($Educations as $edu)
                                <option value="{{$edu->id}}">{{$edu->name}}</option>
                            @endforeach
                        </select>
                        <span class="education" style="color: darkred"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label col-md-3">حالة العمل </label>
                    <div class="col-md-9">
                        <select name="work" id="work" class="form-control" required>
                            <option value=""> -- اختر حالة العمل --</option>
                            @foreach($Works as $work)
                                <option value="{{$work->id}}">{{$work->name}}</option>
                            @endforeach
                        </select>
                        <span class="work" style="color: darkred"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label col-md-3">قطاع العمل</label>
                    <div class="col-md-9">
                        <select name="work_region" id="work_region" class="form-control" required>
                            <option value=""> -- اختر قطاع العمل --</option>
                            @foreach($WorkRegion as $wregion)
                                <option value="{{$wregion->id}}">{{$wregion->name}}</option>
                            @endforeach
                        </select>
                        <span class="work_region" style="color: darkred"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label class="control-label col-md-3">حالة المستفيد</label>
                    <div class="col-md-9">
                        <select name="rejection" id="rejection" class="form-control" required>
                            <option value="">الكل</option>
                            <option value="reject">مرفوض</option>
                            <option value="recovery">مستفيد</option>
                        </select>
                        <span class="work_region" style="color: darkred"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-actions">
        <div class="col-md-12 clearfix ">
            <div class="btn-search-reset pull-right">
                <button type="button"
                        class="btn green btn-submit-search">بحث
                </button>
                <button type="button"
                        class="btn default btn-reset">تفريغ
                </button>
            </div>
        </div>
    </div>
</div>
