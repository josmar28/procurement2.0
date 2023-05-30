@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <fund-year-component :data="{{ $data }}" ></fund-year-component>
</div>

@section('js')
@include('script.fundyear')
@endsection
@endsection

