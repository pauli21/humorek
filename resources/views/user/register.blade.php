@extends('layout.app')
@section('title', 'humorek.pl')
@section('content')
<!--wygląd ekranu logowania-->
<div class="section layout_padding">
    <div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
        <form action="/register" method="post" class="center">
        @csrf
            <fieldset>
                <div class="field">
                    <input type="email" name="email" placeholder="email" required="" value="{{old("email")}}" />
                </div>
                <div class="field">
                    <input type="text" name="name" placeholder="nick" required="" value="{{old("name")}}"/>
                </div>
                <div class="field">
                    <input type="password" name="password" placeholder="hasło" required="" />
                </div>
                <div class="field">
                    <input type="password" name="password_confirmation" placeholder="powtórz hasło" required="" />
                </div>
                <div class="field">
                    <div class="center">
                        <button class="reply_bt">Utwórz konto</button>
                    </div>
                </div>
            </fieldset>
         </form>
    </div>
</div>
@endsection
