@extends('layout.app')
@section('title', 'humorek.pl')
@section('content')
    <!--przekazywanie obrazków do stony głównej-->
    @foreach($images as $image)
        <!--przekazujemy model $image do widoku include.image-->
        @include('include.image', ['image'=> $image])
    @endforeach
    <div class="section layout_padding">
    {{ $images->links() }}
    </div>
@endsection
