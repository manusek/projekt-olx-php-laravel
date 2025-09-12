<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Moje ogłoszenia</title>
    <style>
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
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h2>Moje ogłoszenia:</h2>
            @if($ogloszenia->isEmpty())
            <h4>Nie masz dodanych żadnych ogłoszeń. <a href="{{ route('add.adv') }}"> Kliknij </a> żeby dodać ogłoszenie.</h4>

            @else
                @foreach($ogloszenia as $ogloszenie)
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                Tytuł: <b>{{ $ogloszenie->title }}</b>
                            </div>
                            <div>
                                <a href="{{ route('ogloszenia.usun', ['id' => $ogloszenie->id]) }}" class="btn btn-danger delete-btn">Usuń</a>
                                <a href="{{ route('ogloszenia.edycja', ['id' => $ogloszenie->id]) }}" class="btn btn-primary edit-btn">Edytuj</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <p>Opis: <br>{{ $ogloszenie->content }}</p>
                            <div class="expanded-section" style="display: none;">
                                <!-- Dodatkowe informacje dotyczące ogłoszenia -->
                                Zdjęcie: <br>@if($ogloszenie->image)
                                <img src="{{ asset('images/' . $ogloszenie->image) }}" alt="Zdjęcie ogłoszenia" style="max-width: 100px; height: auto;"><br><br>
                                @else
                                    <p>Brak zdjęcia</p>
                                @endif
                                <p>Lokalizacja: {{ $ogloszenie->location }}</p>
                                <p>Cena: {{ $ogloszenie->price }}</p>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary expand-btn" style="background-color: #A6ACAF; border-color: #A6ACAF;">Rozwiń</button>
                        </div>
                    </div>
                    <br>
                @endforeach
            @endif
        </div>
    </div>
</div>
<script>
    document.querySelectorAll('.expand-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const expandedSection = btn.closest('.card').querySelector('.expanded-section');
            if (expandedSection.style.display === 'none') {
                expandedSection.style.display = 'block';
                btn.textContent = 'Zwiń';
            } else {
                expandedSection.style.display = 'none';
                btn.textContent = 'Rozwiń';
            }
        });
    });
</script>
@endsection


</body>

</html>