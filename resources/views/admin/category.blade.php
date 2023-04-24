@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <category-component :data="{{ $data }}" ></category-component>
</div>

@section('js')
@endsection
@endsection

