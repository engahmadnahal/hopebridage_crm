@extends('layouts.master')
@section('heading')
    {{ __('Create project') }} <span class="small">{{ $client ? '(' . $client->company_name . ')' : '' }}</span>
@stop

@section('content')

    <div class="row">
        <form action="{{ route('projects.store') }}" method="POST" id="createProjectForm">
            <div class="col-sm-8">
                <div class="tablet">
                    <div class="tablet__body">
                        <div class="form-group">
                            <label for="title" class="control-label thin-weight">@lang('Name')</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description" class="control-label thin-weight">@lang('Description')</label>
                            <textarea name="description" id="description" cols="50" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="tablet">
                    <div class="tablet__body">
                       
                        <div class="form-group">
                            @if (Request::get('client') != '' || $client)
                                <input type="hidden" name="client_external_id" value="{!! Request::get('client') ?: $client->external_id !!}">
                            @else
                                <label for="client_external_id" class="control-label thin-weight">@lang('Donor')</label>
                                <select name="client_external_id" id="client_external_id" data-container="body"
                                    data-live-search="true" data-style-base="form-control" data-style="" data-width="100%">
                                    @if ($clients->isEmpty())
                                        <option value="" default></option>
                                        <option value="new_client">+ @lang('Create New Donor')</option>
                                    @endif
                                    @foreach ($clients as $client => $clientK)
                                        <option value="{{ $client }}">{{ $clientK }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="startDate" class="control-label thin-weight">@lang('Start Date')</label>
                            <input type="text" id="startDate" name="startDate" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="endDate" class="control-label thin-weight">@lang('End Date')</label>
                            <input type="text" id="endDate" name="endDate" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="status_id" class="control-label thin-weight">@lang('Status')</label>
                            <select name="status_id" id="status" class="form-control">
                                @foreach ($statuses as $status => $statusK)
                                    <option value="{{ $status }}">{{ $statusK }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="submit" class="btn btn-md btn-brand movedown" id="createProject"
                                value="{{ __('Create project') }}">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="alert alert-danger title-alert" style="display: none;">
        {{ __('Name is required') }}
    </div>
    <div class="alert alert-danger client-alert" style="display: none;">
        {{ __('Donor is required') }}
    </div>

@stop

@push('scripts')
    <script>
        Dropzone.autoDiscover = false;
        $(document).ready(function() {
            $('#client_external_id').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
                var value = $("#client_external_id").val();
                if (value == "new_client") {
                    window.location.href = "/clients/create"
                }
            });

            $('#client_external_id').selectpicker()
            $('#description').summernote({
                toolbar: [
                    ['fontsize', ['fontsize']],
                    ['font', ['bold', 'italic', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ol', 'ul', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link']],
                    ['view', ['fullscreen']]
                ],
                height: 300,
                disableDragAndDrop: true

            });
            $('#startDate').pickadate({
                hiddenName: true,
                format: "{{ frontendDate() }}",
                formatSubmit: 'yyyy/mm/dd',
                closeOnClear: false,
            });

            $('#endDate').pickadate({
                hiddenName: true,
                format: "{{ frontendDate() }}",
                formatSubmit: 'yyyy/mm/dd',
                closeOnClear: false,
            });
            myDropzone = null;
            @if (Entrust::can('project-upload-files') && $filesystem_integration)
                var myDropzone = new Dropzone("#createProjectForm", {
                autoProcessQueue: false,
                uploadMultiple: true,
                parallelUploads: 5,
                maxFiles: 50,
                addRemoveLinks: true,
                previewsContainer: "#dropzone-images",
                clickable:'#dropzone-images',
                paramName: 'images',
                acceptedFiles: "image/*,application/pdf, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,
                application/vnd.openxmlformats-officedocument.spreadsheetml.template,
                application/vnd.openxmlformats-officedocument.presentationml.template,
                application/vnd.openxmlformats-officedocument.presentationml.slideshow,
                application/vnd.openxmlformats-officedocument.presentationml.presentation,
                application/vnd.openxmlformats-officedocument.presentationml.slide,
                application/vnd.openxmlformats-officedocument.wordprocessingml.document,
                application/vnd.openxmlformats-officedocument.wordprocessingml.template,
                application/vnd.ms-excel.addin.macroEnabled.12,
                application/vnd.ms-excel.sheet.binary.macroEnabled.12,text/rtf,text/plain,audio/*,video/*,.csv,.doc,.xls,.ppt,application/vnd.ms-powerpoint,.pptx",

                });

                myDropzone.on("success", function(file, response) {
                window.location.href = ("/projects/"+response.project_external_id)
                });

                myDropzone.on("processing", function(file, response) {
                $('input[type="submit"]').attr("disabled", true);
                });
                myDropzone.on("error", function(file, response) {
                $('input[type="submit"]').attr("disabled", false);
                });
            @endif

            // -------- End IF Can upload File -------

            $('input[type="submit"]').on("click", function(e) {
                e.preventDefault();
                e.stopPropagation();
                if (myDropzone != null && myDropzone.getQueuedFiles().length > 0) {
                    myDropzone.processQueue();

                } else {
                    console.log($("#createProjectForm").serialize());
                    $.ajax({
                        type: 'post',
                        url: '{{ route('projects.store') }}',
                        header : {'Content-Type' : 'application/json'},
                        data: $("#createProjectForm").serialize(),
                        success: function(response) {

                            window.location.href = ("/projects/" + response.project_external_id)
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            if (jqXHR.responseJSON.errors.title != undefined) {
                                $('.title-alert').show();
                            } else {
                                $('.title-alert').hide();
                            }
                            if (jqXHR.responseJSON.errors.description != undefined) {
                                $('.description-alert').show();
                            } else {
                                $('.description-alert').hide();
                            }
                            if (jqXHR.responseJSON.errors.client_external_id != undefined) {
                                $('.client-alert').show();
                            } else {
                                $('.client-alert').hide();
                            }

                        }
                    });
                }

            });



        });
    </script>
@endpush