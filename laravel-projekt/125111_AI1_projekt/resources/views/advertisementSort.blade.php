<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category->name }}</title>
    <style>
        body {
            background-image: url('{{ asset('storage/img/background.jpg') }}'); 
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
</div>
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Ogłoszenia w kategorii: <b>{{ $category->name }}</b>
                </div>
                <div class="card-body">
                    @if(count($advertisements) > 0)
                        <ul class="list-group">
                            @foreach($advertisements as $advertisement)
                            <li class="list-group-item position-relative">
                                <div class="admin-buttons position-absolute top-0 end-0 mt-2">
                                    @if(Auth::check() && Auth::user()->id == 1)
                                        <a href="{{ route('ogloszenia.usun', ['id' => $advertisement->id]) }}" class="btn btn-danger delete-btn">Usuń</a>
                                        <a href="{{ route('ogloszenia.edycja', ['id' => $advertisement->id]) }}" class="btn btn-primary edit-btn">Edytuj</a>
                                    @endif
                                </div>
                                <h5>Tytuł: <b>{{ $advertisement->title }}</b></h5>
                                @if($advertisement->image)
                                    <img src="{{ asset('images/' . $advertisement->image) }}" alt="Advertisement Image" style="max-width: 150px; height: auto;">
                                @else
                                    <p>Brak zdjęcia</p>
                                @endif
                                <p>Opis: {{ $advertisement->content }}</p>
                                <div class="expanded-section" style="display: none;">
                                    <p>Lokalizacja: {{ $advertisement->location }}</p>
                                    <p>Cena: {{ $advertisement->price }}</p>
                                    @if($advertisement->user)
                                        <p>Dodane przez użytkownika: {{ $advertisement->user->name }}</p>
                                    @endif
                                    <p>Numer telefonu: {{ $advertisement->number }}</p>
                                </div>
                                <button class="btn btn-primary expand-btn" style="background-color: #A6ACAF; border-color: #A6ACAF;">Rozwiń</button>
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
<script>
    document.querySelectorAll('.expand-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const expandedSection = btn.closest('.list-group-item').querySelector('.expanded-section');
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
