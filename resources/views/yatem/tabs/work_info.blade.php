<form action="{{route('yatem.workInfo',$orphan->id)}}" method="post" id="work-info">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <th>مصدر الدخل</th>
                <th>الجهة</th>
                <th>القيمة الشهرية</th>
                <th width="80px"></th>
                </thead>
                <tbody>
                @foreach($orphan->incomes as $income)
                    <tr>
                        <td><input type="text" name="income_source[]" readonly value="{{$income->income_source}}"  class="form-control" ></td>
                        <td><input type="text" name="income_side[]" readonly value="{{$income->income_side}}"  class="form-control" ></td>
                        <td><input type="number" name="income_amount[]" readonly value="{{$income->income_amount}}"   class="form-control income_amount" ></td>
                        <td>
                            <a href="javascript:;" class="delete-income btn btn-danger btn-sm" ><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach


                <tr class="form-add-work">
                    <td><input type="text" id="income_source" class="form-control"></td>
                    <td><input type="text" id="income_side" class="form-control"></td>
                    <td><input type="number" id="income_amount" class="form-control"></td>
                    <td>
                        <a href="javascript:;" class="add-new-work btn btn-success btn-sm"><i
                                    class="fa fa-plus"></i></a>
                    </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                    <td colspan="2">مجموع الدخل الشهري</td>
                    <td id="total_income" colspan="2">{{$orphan->income_sum}} شيكل</td>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</form>