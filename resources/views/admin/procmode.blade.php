@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <procmode-component :data="{{ $data }}" ></procmode-component>
</div>

@section('js')
@include('script.procmode')
@endsection
@endsection

