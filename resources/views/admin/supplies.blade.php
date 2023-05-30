@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <supplies-component :data="{{ $data }}" ></supplies-component>
</div>

@section('js')
@include('script.supplies')
@endsection
@endsection

