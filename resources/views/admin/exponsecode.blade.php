@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <expensecode-component :data="{{ $data }}" ></expensecode-component>
</div>

@section('js') 
@include('script.expensecode')
@endsection
@endsection

