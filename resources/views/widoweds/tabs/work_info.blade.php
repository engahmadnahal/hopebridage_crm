<form action="{{route('customers.workInfo',$customer->id)}}" method="post" id="work-info">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-left col-md-4">مهنة رب الاسرة الأساسي</label>
                <div class="col-md-8">
                    <input type="text" name="job_name" value="{{$customer->job_name}}" class="form-control" required>
                    <span class="cus_name" style="color: darkred"></span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group row">
                <label class=" text-left col-md-4">متوسط الدخل الشهري بالشيكل</label>
                <div class="col-md-8">
                    <input type="number" name="income" value="{{intval($customer->income)}}" class="form-control" required>
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
                <th width="80px"></th>
                </thead>
                <tbody>
                @foreach($customer->incomes as $income)
                    <tr>
                        <td><input type="text" name="income_source[]" readonly value="{{$income->income_source}}"  class="form-control" ></td>
                        <td><input type="text" name="income_type[]" readonly value="{{$income->income_type}}"  class="form-control" ></td>
                        <td><input type="number" name="income_amount[]" readonly value="{{$income->income_amount}}"   class="form-control income_amount" ></td>
                        <td><input type="text" name="income_side[]" readonly value="{{$income->income_side}}"  class="form-control" ></td>
                        <td>
                            <a href="javascript:;" class="delete-income btn btn-danger btn-sm" ><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach


                <tr class="form-add">
                    <td><input type="text" id="income_source" class="form-control"></td>
                    <td><input type="text" id="income_type" class="form-control"></td>
                    <td><input type="number" id="income_amount" class="form-control"></td>
                    <td><input type="text" id="income_side" class="form-control"></td>
                    <td>
                        <a href="javascript:;" class="add-new btn btn-success btn-sm"><i
                                    class="fa fa-plus"></i></a>
                        {{--                                                <a href="javascript:;" class="add btn btn-danger btn-sm" ><i class="fa fa-times"></i></a>--}}
                    </td>
                </tr>
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
                        <td><input type="number" id="outcome_rent" name="outcome[{{$outcome->id}}]" value="{{$customer->outcomes->where('id',$outcome->id)->first()->pivot->amount??''}}"
                                   class="form-control outcome_price"></td>
                    </tr>
                @endforeach

                {{--            <tr>--}}
                {{--                <td>كهرباء ومياه</td>--}}
                {{--                <td><input type="number" id="outcome_water"--}}
                {{--                           class="form-control outcome_price"></td>--}}
                {{--            </tr>--}}


                {{--            <tr>--}}
                {{--                <td>العلاج (الأمراض المزمنة)</td>--}}
                {{--                <td><input type="number" id="outcome_treatment"--}}
                {{--                           class="form-control outcome_price"></td>--}}
                {{--            </tr>--}}


                {{--            <tr>--}}
                {{--                <td>غذاء شامل (لحوم وخضار)</td>--}}
                {{--                <td><input type="number" id="outcome_food"--}}
                {{--                           class="form-control outcome_price"></td>--}}
                {{--            </tr>--}}
                {{--            <tr>--}}
                {{--                <td>مستلزمات البقالة</td>--}}
                {{--                <td><input type="number" id="outcome_primary"--}}
                {{--                           class="form-control outcome_price"></td>--}}
                {{--            </tr>--}}


                {{--            <tr>--}}
                {{--                <td>رسوم دراسية تشمل رياض الأطفال والمدارس</td>--}}
                {{--                <td><input type="number" id="outcome_study"--}}
                {{--                           class="form-control outcome_price"></td>--}}
                {{--            </tr>--}}

                {{--            <tr>--}}
                {{--                <td>رسوم دراسية جامعية</td>--}}
                {{--                <td><input type="number" id="outcome_rent"--}}
                {{--                           class="form-control outcome_price"></td>--}}
                {{--            </tr>--}}


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
</form>