<form action="{{route('customers.researcher',$customer->id)}}" method="post" id="researcher">
    <div class="row">

        <div class="col-md-12">
            <div class="form-group row">
                <label class=" text-left col-md-2">راي الباحث</label>
                <div class="col-md-10">
                <textarea  required name="researcher_opinion"  class="form-control">{{$customer->researcher_opinion}}</textarea>

                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label class=" text-left col-md-2">تقيم الباحث</label>
                <div class="col-md-10">
                    <input required name="researcher_rate" type="number" value="{{$customer->researcher_rate}}" min="0" max="25" class="form-control"/>
                </div>
            </div>
        </div>
    </div>

</form>