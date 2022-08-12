@extends('layouts.master')
@section('heading')
    {{ __('Edit Donor :client' , ['client' => '(' . $client->name. ')']) }}
@stop

@section('content')
    {!! Form::model($client, [
            'method' => 'PATCH',
            'route' => ['donors.update', $client->external_id],
            ]) !!}
    @include('clients.form', ['submitButtonText' => __('Update client')])

    {!! Form::close() !!}

@stop