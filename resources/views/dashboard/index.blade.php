@extends('layouts.app')

@section('title')
My Expenses
@stop

@section('breadcrumbs')
Dashboard
@stop

@section('content')
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-6">
            @include('dashboard.includes.expense-info')
        </div>
        <div class="col-md-6">
            @include('dashboard.includes.chart')
        </div>
    </div>
@stop