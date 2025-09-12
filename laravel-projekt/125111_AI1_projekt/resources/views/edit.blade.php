<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj ogłoszenie</title>
    <style>
         body {
            background-image: url('{{ asset('storage/img/background.jpg') }}'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;

            form {
            background-color: #E5E7E9; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        }
    </style>
</head>
<body>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Edytuj ogłoszenie</h2>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('ogloszenia.aktualizuj', ['id' => $ogloszenie->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Tytuł:</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $ogloszenie->title) }}">
                </div>
                <div class="form-group">
                    <label for="content">Opis:</label>
                    <textarea class="form-control" id="content" name="content">{{ old('content', $ogloszenie->content) }}</textarea>
                </div>
                <!-- <div class="form-group">
                    <label for="image">Wybierz nowe zdjęcie:</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                </div> -->
                <div class="form-group">
                    <label for="location">Lokalizacja:</label>
                    <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $ogloszenie->location) }}">
                </div>
                <div class="form-group">
                    <label for="price">Cena:</label>
                    <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $ogloszenie->price) }}">
                </div>
                <div class="form-group">
                    <label for="number">Numer telefonu:</label>
                    <input type="text" class="form-control" id="number" name="number" value="{{ old('number', $ogloszenie->number) }}">
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Aktualizuj ogłoszenie</button>
            </form>
        </div>
    </div>
</div>
@endsection
</html>