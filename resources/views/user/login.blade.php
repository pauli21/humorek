@extends('layout.app')
@section('title', 'humorek.pl')
@section('content')
<!--przekazujemy do widoku na stronę formularz do logowania-->
<div class="section layout_padding">
    <div class="container">
    <!--jeżeli e-mail niepoprawny wyświetl alert bootstrapa-->
    @error('email')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
        <form action="/login" method="post" class="center">
        @csrf
            <fieldset>
                <!--Utworzenie okna na wpisanie e-maila oraz opcja zapamiętania e-maila-->
                <div class="field">
                    <label for="html" class="col-sm-12 col-form-label">E-mail</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" required="" value="{{old("email")}}"/>
                    </div>
                </div>
                <!--Utworzenie okna na wpisanie hasła do konta-->
                <div class="field">
                    <label for="html" class="col-sm-12 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" name="password" required="" />
                    </div>
                </div>
                <div class="field">
                    <div class="center">
                        <button class="reply_bt">Login</button>
                    </div>
                </div>
            </fieldset>
         </form>
    </div>
</div>
@endsection
