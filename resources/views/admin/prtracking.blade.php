@extends('layouts.app')

@section('content')
<div id="app">
       
        <prtracking-component :data="{{ $data }}" ></prtracking-component>
        
</div>

@section('js') 
@include('script.prtracking')
@endsection
@endsection
 
