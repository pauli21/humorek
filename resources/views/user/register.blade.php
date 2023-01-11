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
                <!--Utworzenie okna na wpisanie e-maila z zapamiętaniem-->
                <div class="field">
                    <label for="html" class="col-sm-12 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" required="" value="{{old("email")}}" />
                    </div>
                </div>
                <!--Utworzenie okna na wpisanie nicku użytkownika-->
                <div class="field">
                    <label for="html" class="col-sm-12 col-form-label">Nick</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" required="" value="{{old("name")}}"/>
                    </div>
                </div>
                <!--Utworzenie okna na wpisanie hasła-->
                <div class="field">
                    <label for="html" class="col-sm-12 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" required="" />
                    </div>
                </div>
                <!--Utworzenie okna na wpisanie powtórnie hasła-->
                <div class="field">
                    <label for="html" class="col-sm-12 col-form-label">Confirmation password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password_confirmation" required="" />
                    </div>
                </div>
                <div class="field">
                    <div class="center">
                        <button class="reply_bt">Register</button>
                    </div>
                </div>
            </fieldset>
         </form>
    </div>
</div>
@endsection
