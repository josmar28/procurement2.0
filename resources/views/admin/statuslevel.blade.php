@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <status-level-component :data="{{ $data }}" ></status-level-component>
</div>

@section('js')
@endsection
@endsection

