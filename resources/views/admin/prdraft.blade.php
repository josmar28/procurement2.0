@extends('layouts.app')

@section('content')
<div id="app">
        <draftpr-component :data="{{ $data }}" ></draftpr-component>
</div>

@include('modal.createpr')
@section('js')
@include('script.createpr')
@endsection
@endsection
