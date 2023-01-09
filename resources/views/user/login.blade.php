@extends('layout.app')
@section('title', 'humorek.pl')
@section('content')
<!--przekazujemy model $image do widoku include.image-->
<div class="section layout_padding">
    <div class="container">
    @error('email')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
        <form action="/login" method="post" class="center">
        @csrf
            <fieldset>
                <div class="field">
                    <input type="email" name="email" placeholder="email" required="" value="{{old("email")}}"/>
                </div>
                <div class="field">
                    <input type="password" name="password" placeholder="hasło" required="" />
                </div>
                <div class="field">
                    <div class="center">
                        <button class="reply_bt">Zaloguj</button>
                    </div>
                </div>
            </fieldset>
         </form>
    </div>
</div>
@endsection
