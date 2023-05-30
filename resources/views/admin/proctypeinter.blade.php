@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <proctype-inter-component :data="{{ $data }}" ></proctype-inter-component>
</div>

@section('js')
@include('script.proctypeinter')
@endsection
@endsection

