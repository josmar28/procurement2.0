@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <business-category-component :data="{{ $data }}" ></business-category-component>
</div>

@section('js')
@endsection
@endsection

