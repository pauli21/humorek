@extends('layout.app')
@section('title', 'humorek.pl')
@section('content')
<!--przekazujemy model $image do widoku include.image-->
@include('include.image', ['image'=> $image])
@endsection
