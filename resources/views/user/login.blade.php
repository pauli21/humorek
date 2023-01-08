@extends('layout.app')
@section('title', 'humorek.pl')
@section('content')
<!--przekazujemy model $image do widoku include.image-->
    <form action="/login" method="post">
        <fieldset>
            <div class="field">
                <input type="email" name="email" placeholder="email" required="" />
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
@endsection
