<form action="{{route('yatem.orphan_guarantees',$orphan->id)}}" id="guaranteesForm">
<?php
        $sponsers = [];
        foreach ($orphan->projects as $x)
            array_push($sponsers,$x->sponser_id);
?>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">
                <label class="col-md-2">اسم الممول (الكفيل)</label>
                <div class="col-md-10">
                    <div class="row">
                        @foreach($ProjectSponser as $projectSponser)
                            <div class="col-md-4">
                                <input type="checkbox"
                                name="projectSponser[]" id="projectSponser-{{$projectSponser->id}}"
                                       value="{{$projectSponser->id}}" {{in_array($projectSponser->id,$sponsers)?"checked":""}}>
                                <label
                                        for="projectSponser-{{$projectSponser->id}}">{{$projectSponser->name}}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label col-md-3">ملاحظة </label>
                <div class="col-md-9">
                    <input type="text" name="note" class="form-control" placeholder="ملاحظات" value="@if(count($orphan->projects)>0){{$orphan->projects->first()->note}} @endif" >
                    <span class="note" style="color: darkred"></span>
                </div>
            </div>
        </div>
    </div>

</form>