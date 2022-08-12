<form action="{{route('customers.housingData',$customer->id)}}" method="post" id="housing-data">
    <div class="row">

        <div class="col-md-12">
            <div class="form-group row">
                <label class="text-left col-md-2">بيانات السكن</label>
                <div class="col-md-10">
                    <div class="row">
                        @foreach($HouseOwner as $house_o)
                            <div class="col-md-2">
                                <input type="radio"
                                       name="house_owner" id="house_o-{{$house_o->id}}" {{$house_o->id==$customer->house_owner?"checked":""}}
                                       value="{{$house_o->id}}">
                                <label for="house_o-{{$house_o->id}}">{{$house_o->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr class="col-12">

        <div class="col-md-12">
            <div class="form-group row">
                <label class="text-left col-md-2">نوع المسكن</label>
                <div class="col-md-10">
                    <div class="row">
                        @foreach($HouseType as $house_ty)
                            <div class="col-md-2">
                                <input type="radio" {{$house_ty->id==$customer->house_type?"checked":""}}
                                       name="house_type" id="house_ty-{{$house_ty->id}}"
                                       value="{{$house_ty->id}}">
                                <label
                                        for="house_ty-{{$house_ty->id}}">{{$house_ty->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <hr class="col-12">

        <div class="col-md-12">
            <div class="form-group row">
                <label class="text-left col-md-2">بتاء السقف</label>
                <div class="col-md-10">
                    <div class="row">
                        @foreach($HouseMaterial as $material)
                            <div class="col-md-2">
                                <input type="radio" {{$material->id==$customer->house_material?"checked":""}}
                                       name="house_material" id="material-{{$material->id}}"
                                       value="{{$material->id}}">
                                <label
                                        for="material-{{$material->id}}">{{$material->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <hr class="col-12">


        <div class="col-md-12">
            <h3>
                وصف محتويات المنزل
            </h3>
            <table class="table table-strip">
                <thead>
                <th>البيان</th>
                <th>العدد</th>
                <th>التقيم</th>
                </thead>
                <tbody>
                @foreach($Furnitures as $Furniture)
                    <tr>
                        <td>{{$Furniture->name}}</td>
                        <td><input type="number" id="Furniture-{{$Furniture->id}}"
                                   name="furnitures[{{$Furniture->id}}]" value="{{$customer->furnitures->where('id',$Furniture->id)->first()->pivot->count??''}}"
                                   class="form-control "></td>
                        <td><input type="number" min="0" dir="ltr" step=".5" max="{{$Furniture->values/10}}" id="Furniture-rate-{{$Furniture->id}}"
                                   name="furnitures_rate[{{$Furniture->id}}]" value="{{$customer->furnitures->where('id',$Furniture->id)->first()->pivot->rate??''}}"
                                   class="form-control "></td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>

        <div class="col-md-12">
            <h3 class="text-muted">طبيعة الاحتياج</h3>
            <table class="table table-striped">
                <thead>
                <th>الاختياج</th>
                <th>طبيعة الاحتياح</th>
                <th>العدد</th>
                <th width="80px"></th>
                </thead>
                <tbody>
                @foreach($customer->needs as $need)
                    <tr>
                        <td><input type="text" name="need[]" readonly value="{{$need->need}}"  class="form-control" ></td>
                        <td><input type="text" name="description[]" readonly value="{{$need->description}}"  class="form-control" ></td>
                        <td><input type="number" name="count[]" readonly value="{{$need->count}}"   class="form-control" ></td>
                        <td>
                            <a href="javascript:;" class="delete-income btn btn-danger btn-sm" ><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach


                <tr class="form-add-need">
                    <td><input type="text" id="need" class="form-control"></td>
                    <td><input type="text" id="description" class="form-control"></td>
                    <td><input type="number" id="count" class="form-control"></td>
                    <td>
                        <a href="javascript:;" class="add-new-need btn btn-success btn-sm"><i
                                    class="fa fa-plus"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

</form>
