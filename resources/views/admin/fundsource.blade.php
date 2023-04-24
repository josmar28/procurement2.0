@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <fund-source-component :data="{{ $data }}" ></fund-source-component>
</div>

@section('js')
@endsection
@endsection

