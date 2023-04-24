@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <signatories-component :data="{{ $data }}" ></signatories-component>
</div>

@section('js')
@endsection
@endsection

