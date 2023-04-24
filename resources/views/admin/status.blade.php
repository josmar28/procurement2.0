@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <status-component :data="{{ $data }}" ></status-component>
</div>

@section('js')
@endsection
@endsection

