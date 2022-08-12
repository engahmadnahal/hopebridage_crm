@extends('layouts.master')
@section('heading')
    {{ __('Create Electroniv Voucher') }}
    {{-- <span class="small">{{ $client ? '(' . $client->company_name . ')' : '' }}</span> --}}
@stop

@section('content')
    <div class="row">
        <form action="{{ route('vouchers.store') }}" method="POST" id="createTaskForm">
            <div class="col-sm-8">
                <div class="tablet">
                    <div class="tablet__body">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="item_code" class="control-label thin-weight">@lang('Item Code')</label>
                                    <input type="text" name="item_code" id="item_code" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="unit" class="control-label thin-weight">@lang('Unit')</label>
                                    <input type="text" name="unit" id="unit" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="quantity" class="control-label thin-weight">@lang('Quantity')</label>
                                    <input type="text" name="quantity" id="quantity" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="notes" class="control-label thin-weight">@lang('Notes')</label>
                                    <input type="text" name="notes" id="notes" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="submit" class="btn btn-md btn-brand movedown" id="createTask"
                                value="{{ __('Create Voucher') }}">
                        </div>
                    </div>


                    {{-- <div class="form-group">
                            <label for="description" class="control-label thin-weight">@lang('Description')</label>
                            <textarea name="description" id="description" cols="50" rows="10"
                                class="form-control"></textarea>
                        </div> --}}
                </div>
            </div>
    </div>
    {{-- <div class="col-sm-4">
                <div class="tablet">
                    <div class="tablet__body">

                        <div class="form-group">
                            <label for="user_assigned_id" class="control-label thin-weight">@lang('Assign user')</label>
                            <select name="user_assigned_id" id="user_assigned_id" class="form-control">
                                @foreach ($users as $user => $userK)
                                    <option value="{{ $user }}">{{ $userK }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @if (Request::get('client') != '' || $client)
                                <input type="hidden" name="client_external_id" value="{!! Request::get('client') ?: $client->external_id !!}">
                            @else
                                <label for="client_external_id" class="control-label thin-weight">@lang('Assign
                                    client')</label>
                                <select name="client_external_id" id="client_external_id" data-container="body"
                                    data-live-search="true" data-style-base="form-control" data-style="" data-width="100%">
                                    @if ($clients->isEmpty())
                                        <option value="" default></option>
                                        <option value="new_client">+ @lang('Create New Client')</option>
                                    @endif
                                    @foreach ($clients as $client => $clientK)
                                        <option value="{{ $client }}">{{ $clientK }}</option>
                                    @endforeach
                                </select>
                            @endif

                        </div>
                        <div class="form-inline">
                            <div class="form-group col-sm-7" style="padding-left: 0px;">
                                <label for="deadline" class="control-label thin-weight">@lang('Deadline')</label>
                                <input type="text" id="deadline" name="deadline" data-value="{{ now()->addDays(3) }}"
                                    class="form-control">
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="contact_time" class="control-label thin-weight">@lang("O'clock")</label>
                                <input type="text" id="contact_time" name="contact_time"
                                    value="{{ \Carbon\Carbon::today()->setTime(15, 00)->format(carbonTime()) }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deadline" class="control-label thin-weight">@lang('Status')</label>
                            <select name="status_id" id="status" class="form-control">
                                @foreach ($statuses as $status => $statusK)
                                    <option value="{{ $status }}">{{ $statusK }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" style="padding-left: 0px;">
                            <label for="purchase" class="control-label thin-weight">@lang('Purchase Method')</label>
                            <input type="text" id="purchase" name="purchase_method" class="form-control"
                                placeholder="Please! Insert Your Purchase Method">
                        </div>
                        <div class="form-inline">
                            <div class="form-group col-sm-12" style="padding-left: 0px;">
                                <label for="payment_date" class="control-label thin-weight">@lang('Expiration Date')</label>
                                <input type="date" id="payment_date" name="payment_date" value="#"
                                    class="form-control">
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="contact_time" class="control-label thin-weight">@lang("O'clock")</label>
                                <input type="text" id="contact_time" name="contact_time"
                                    value="{{ \Carbon\Carbon::today()->setTime(15, 00)->format(carbonTime()) }}"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="form-group" style="padding-left: 0px;">
                            <label for="budget" class="control-label thin-weight">@lang('Budget')</label>
                            <input type="text" id="budget" name="budget" class="form-control"
                                placeholder="Please! Insert Your Excpected Budget By Dollar $">
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="submit" class="btn btn-md btn-brand movedown" id="createTask"
                                value="{{ __('Create Supply') }}">
                        </div>
                    </div>
                </div>
            </div> --}}
    </form>
    </div>
@stop
@push('style')
    <style>
        .picker,
        .picker__holder {
            width: 128%;
        }

        .picker--time .picker__holder {
            width: 30%;
        }

        .picker--time {
            min-width: 0px;
            max-width: 0px;
        }

    </style>
@endpush
@push('scripts')
    <script>
        $('#client_external_id').selectpicker()
        $('#client_external_id').on('changed.bs.select', function(e, clickedIndex, isSelected, previousValue) {
            var value = $("#client_external_id").val();
            if (value == "new_client") {
                window.location.href = "/clients/create"
            }
        });
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
        $('#deadline').pickadate({
            hiddenName: true,
            format: "{{ frontendDate() }}",
            formatSubmit: 'yyyy/mm/dd',
            closeOnClear: false,
        });
        $('#contact_time').pickatime({
            format: '{{ frontendTime() }}',
            formatSubmit: 'HH:i',
            hiddenName: true
        })
    </script>
@endpush
