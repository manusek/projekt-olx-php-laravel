<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwanie dla: {{$query}} </title>
    <style>
        .center{
            text-align:center;
        }
        body {
            background-image: url('storage/img/background.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body> 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="{{ route('search') }}" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Szukaj ogłoszeń..." name="query">
                    <button class="btn btn-outline-secondary" type="submit">Szukaj</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="container">
<h1 class="center">Wyniki wyszukiwania:</h1>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Wyniki wyszukiwania dla: <b>{{$query}} </b>
                </div>
                <div class="card-body">
                    @if(count($advertisements) > 0)
                        <ul class="list-group">
                            @foreach($advertisements as $advertisement)
                                <li class="list-group-item">
                                    <h5><b>{{ $advertisement->title }}</b></h5>
                                    Zdjęcie: <br>@if($advertisement->image)
                                <img src="{{ asset('images/' . $advertisement->image) }}" alt="Zdjęcie ogłoszenia" style="max-width: 100px; height: auto;"><br><br>
                                @else
                                    <p>Brak zdjęcia</p>
                                @endif
                                    <p>{{ $advertisement->content }}</p>
                                    <p>Lokalizacja: {{ $advertisement->location }}</p>
                                    <p>Cena: {{ $advertisement->price }}</p>
                                    @if($advertisement->user)
                                            <p>Dodane przez użytkownika: {{ $advertisement->user->name }}</p>
                                    @endif
                                    <p>Numer telefonu: {{ $advertisement->number }}</p>
                                </li>
                                <br>
                            @endforeach
                        </ul>
                    @else
                        <p>Brak ogłoszeń w tej kategorii.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 


</html>
</body>