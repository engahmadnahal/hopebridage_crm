@extends('layouts.master')
@section('heading')
    {{ __('Budget') }}
@stop

@section('content')
    <div class="row">
        <form action="{{ route('budget.store') }}" method="POST" id="createTaskForm">
            <div class="col-sm-8">
                <div class="tablet">
                    <div class="tablet__body">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="item_line" class="control-label thin-weight">@lang('Item Line')</label>
                                    <input type="text" name="item_line" id="item_line" class="form-control">
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
                                    <label for="num_units" class="control-label thin-weight">@lang('Number of units')</label>
                                    <input type="number" name="number_unit" id="number_unit" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="form-group">
                                    <label for="notes" class="control-label thin-weight">@lang('unit Price')</label>
                                    <input type="number" name="unit_price" id="unit_price" class="form-control">
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="submit" class="btn btn-md btn-brand movedown" id="createTask"
                                   value="{{ __('Create budget') }}">
                        </div>
 </div>

</div>
 </div>

</form>


        <div class="col-sm-8">
            <div class="tablet">
                <div class="tablet__body">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <table>
                                <tr>
                                    <th colspan="2">Exchange rates </th>

                                    <th colspan="2">Euro -> USD </th>

                                    <th>1.2 </th>
                                    <th colspan="2">Admin Cost rate </th>
                                    <th>18% </th>
                                    <th></th>


                                </tr>
                                <tr>
                                    <td  class="dd"># </td>
                                    <td  class="dd">Item line </td>
                                    <td  class="dd">Unit </td>
                                    <td  class="dd">Num. units </td>
                                    <td  class="dd">Unit price (Euro) </td>
                                    <td  class="dd">Total (Euro) </td>
                                    <td  class="dd">Total (USD) </td>
                                    <td  class="dd">Admin cost (USD) </td>
                                    <td   class="dd">Remaining

                                        USD </td>
                                    <td   class="dd">Pdf</td>
                                </tr>
@php
$i = 0;
                                @endphp
                            @foreach($budgets as $budget)
                                <tr>
                                    <td>{{++$i}}</td>

                                    <td>{{$budget->item_line}} </td>

                                    <td>{{$budget->unit}}</td>
                                    <td>{{$budget->number_unit}}</td>
                                    <td>{{$budget->unit_price}}</td>

                                    <td> {{  $budget->number_unit*$budget->unit_price }}</td>
                                    <td> {{  ($budget->number_unit*$converted) *$budget->unit_price }} </td>
                                    <td>{{   (($budget->number_unit*$converted) *$budget->unit_price)*(18/100) }}</td>
                                    <td> {{    (($budget->number_unit*$converted) *$budget->unit_price - (($budget->number_unit*$converted) *$budget->unit_price)*(18/100) ) }}  </td>
                                    <td> </td>
                                    @endforeach
                                </tr>
                            </table>


                        </div>
                    </div>
                </div>
            </div>
        </div>

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
        table,tr, th, td {
            border: 2px black solid;
        }
        th, tr,td {
margin: auto
        ;font-size: 15px;
            padding-left: 6px;
            height: 20px;
        }
        .dd{
            font-size: 17px;
            font-weight: bolder;
        }

        table {
            margin: auto;

            width:700px;
            height: 300px;
            border-collapse: collapse;
        }

        .picker--time {
            min-width: 0px;
            max-width: 0px;
        }
        @media screen and (min-width:321px) and (max-width:770px ) {
            table,tr, th, td {
                border: 3px black solid;
            }
            th, tr,td {
            font-size: 10px;
                padding-left: 2px;
                width: 50px;
                height: 50px;
            }

            table {
                width:400px;
                height: 160px;
                border-collapse: collapse;
            }

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
