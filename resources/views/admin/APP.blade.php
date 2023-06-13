@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <app-report-component :data="{{ $data }}" ></app-report-component>
</div>

@section('js')
@include('script.APP')
@endsection
@endsection