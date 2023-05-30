@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <proctype-component :data="{{ $data }}" ></proctype-component>
</div>

@section('js') proctype
@include('script.proctype')
@endsection
@endsection

