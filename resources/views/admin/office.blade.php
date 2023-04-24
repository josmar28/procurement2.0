@extends('layouts.app')

@section('content')
<style>
</style>
<div id="app">
        <offices-component :data="{{ $data }}" ></offices-component>
</div>

@section('js')
@endsection
@endsection

