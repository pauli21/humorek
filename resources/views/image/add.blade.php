@extends('layout.app')
@section('title', 'humorek.pl')
@section('content')
<!--wygląd ekranu dodawania obrazka-->
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
        <form action="/image/add" method="post" enctype='multipart/form-data' class="center">
        @csrf
            <fieldset>
            <!--Utworzenie okna na wpisanie nazwy postu-->
                <div class="field">
                    <label for="name" class="col-sm-12 col-form-label">Name your post:</label>
                    <div class="col-sm-10">
                        <input type="string" id="name" name="name" placeholder="" value="{{old("name")}}"/>
                    </div>
                </div>
                <!--Utworzenie okna na wybranie zdjęcia-->
                <div class="custom-file">
                    <input type="file" name="file" accept="image/png, image/jpeg" class="custom-file-input" id="customFile" >
                    <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                </div>
                <div class="center">
                <div class="form-group row">
                    <button class="reply_bt">Add image</button>
                </div>
                </div>
            </fieldset>
         </form>
    </div>
</div>
@endsection
