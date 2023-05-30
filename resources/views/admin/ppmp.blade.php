@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <ppmp-component :data="{{ $data }}" ></ppmp-component>
</div>

@section('js')
@include('script.ppmp')
@endsection
@endsection

