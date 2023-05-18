@extends('homepage.master')
@section('title', 'dashboard')
@section('ondashboard','active')
@section('content')

@if($message = Session::get('success'))

<div class="alert alert-success">
	{{ $message }}
</div>

@endif
@endsection