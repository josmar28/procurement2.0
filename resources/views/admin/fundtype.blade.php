@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <fund-type-component :data="{{ $data }}" ></fund-type-component>
</div>

@section('js')
@include('script.fundtype')
@endsection
@endsection

