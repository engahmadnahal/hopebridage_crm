<div class="portlet light bordered">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-key"></i>الصلاحيات
        </div>
        <div class="tools">
            <a href="javascript:;" data-check-name="تحديل الكل"
               data-uncheck-name="الغاء التحديد" class="uncheck-all">تحديد الكل</a>
        </div>
    </div>
    <div class="portlet-body form">
        <div class="horizontal-form">
            <div class="form-body">
                <div class="row permissions-row {{ isset($isRole)?"permissions-role":"" }}">
                    @foreach($actions as $action)
                        <div class="col-md-3">
                            <div class="portlet box box-permissions purple-soft">
                                <div class="portlet-title">
                                    <div class="caption caption-wcheckbox">
                                        {{--class="checkbox-inline parent-check"--}}
                                        <label >
                                            <input type="checkbox" class="mycheckbox pcheckbox" value="0"/>
                                            {{--<span class="checkbox-style"><i class="fa fa-check"></i></span>--}}
                                            <i class="fa fa-user"></i><span
                                                    class="label-checkbox marginR5">{{ $action->group_name }}</span>
                                        </label>
                                    </div>
                                    <div class="tools">
                                        <a href="javascript:;" class="collapse mycollapse"></a>
                                    </div>
                                </div>
                                <div class="portlet-body collapse-body form">
                                    <div class="horizontal-form">
                                        <div class="form-body">
                                            <div class="permissions-checks">
                                                <ul>
                                                    <li>
                                                        <label class="checkbox-inline parent-check {{ isset($roleActionsDefault)?getRoleClass($action->id,$roleActions,$roleActionsDefault):"" }}">
                                                            <input type="checkbox" name="action[]"
                                                                   value="{{ $action->id }}"
                                                                   class="mycheckbox ccheckbox"
                                                                   data-parent="parent{{ $action->id }}"
                                                                    {{ in_array($action->id,$roleActions)?"checked":"" }}>
                                                            {{--<span class="checkbox-style"><i class="fa fa-check"></i></span>--}}
                                                            <span class="label-checkbox">{{ $action->name }}</span>
                                                        </label>
                                                    </li>
                                                    @foreach($action->actions as $subAction)
                                                        <li>
                                                            <label class="checkbox-inline parent-check {{ isset($roleActionsDefault)?getRoleClass($subAction->id,$roleActions,$roleActionsDefault):"" }}">
                                                                <input type="checkbox" name="action[]"
                                                                       value="{{ $subAction->id }}"
                                                                       class="mycheckbox ccheckbox"
                                                                       data-child="parent{{ $action->id }}"
                                                                        {{ in_array($subAction->id,$roleActions)?"checked":"" }}>
                                                                {{--<span class="checkbox-style"><i class="fa fa-check"></i></span>--}}
                                                                <span class="label-checkbox">{{ $subAction->name }}</span>
                                                            </label>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
