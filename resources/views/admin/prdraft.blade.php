@extends('layouts.app')

@section('content')
<div id="app">
        <draftpr-component :data="{{ $data }}" ></draftpr-component>
</div>

@section('js')
@include('script.prdraft')
@endsection
@endsection
