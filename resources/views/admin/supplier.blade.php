@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <supplier-component :data="{{ $data }}" ></supplier-component>
</div>

@section('js')
@include('script.supplier')
@endsection
@endsection

