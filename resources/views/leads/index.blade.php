@extends('layouts.master')
@section('heading')
    {{__('All Supplies')}}
@stop

@section('content')
    <dynamictable dateFormat="{{frontendDate()}}"></dynamictable>
@stop

