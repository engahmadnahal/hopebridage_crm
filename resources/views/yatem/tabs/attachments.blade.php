<form action="{{route('yatem.attachments',$orphan->id)}}" method="post" id="attachments"
      enctype="multipart/form-data">
    {{csrf_field()}}

    <?php
    $papers = array
    (
        'صورة شخصيه لليتيم المسجل مقاس 6*9 خلفيه بيضا ء',
        'صوره عن شهادة ميلاد الطفل',
        'صوره عن شهادة الوفاة',
        'صوره لهويه الوصي على الطفل',
        'صوره عن حجة الوصايه والولايه',
        'صورة عن التقارير الطبيه والاوراق الثبوتيه الاخرى'
    );
    ?>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <th>الاسم</th>
                <th>تحميل</th>
                <th></th>
                </thead>
                <tbody id="attachments-table">
                @foreach($papers as $paper)
                    <tr>
                        <td><input type="text" name="title[]" id="addAttachment_title" class="form-control" value="{{$paper}}"></td>
                        <td><input type="file" name="name[]" id="addAttachment_name" class="form-control"></td>
                        <td id="attachments-action"><a href="javascript:;" class="btn btn-success" id="addAttachment"><i
                                        class="fa fa-plus"></i></a></td>

                    </tr>
                @endforeach
                @foreach($orphan->attachments as $attachment)
                    <tr>
                        <input type="hidden" name="ids[]" value="{{$attachment->id}}">
                        <td>{{$attachment->title}}</td>
                        <td>
                        @if($attachment->name)
                                <a href="{{route('download')}}?id={{$attachment->name}}">تحميل</a>
                        @else
                            <input type="file" name="attachment[{{$attachment->id}}]" id="addAttachment_name" class="form-control">
                        @endif
                        </td>
                        <td><a href="javascript:;" class="delete-child btn btn-danger"><i
                                            class="fa fa-times"></i></a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td><input type="text" name="title[]" id="addAttachment_title" class="form-control"></td>
                    <td><input type="file" name="name[]" id="addAttachment_name" class="form-control"></td>
                    <td id="attachments-action"><a href="javascript:;" class="btn btn-success" id="addAttachment"><i
                                    class="fa fa-plus"></i></a></td>

                </tr>
                </tbody>
            </table>


        </div>

    </div>
</form>