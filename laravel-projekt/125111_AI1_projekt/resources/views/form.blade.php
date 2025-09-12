<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Dodaj ogłoszenie</title>
    <style>
        body {
            background-image: url('storage/img/background.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        
        form {
            background-color: #E5E7E9; 
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .custom-btn {
            background-color: #FF5733;
            border-color: #FF5733;
            color: white;
            transition: background-color 0.5s ease, border-color 0.5s ease;
        }
        .custom-btn:hover {
            background-color: #E04A29;
            border-color: #E04A29;
        }

    </style>
</head>
<body>

    @include('home')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title text-center">Dodaj ogłoszenie</h3>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="formularz" method="POST" enctype="multipart/form-data" style="#BDC3C7">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Tytuł</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Kategoria</label>
                            <select class="form-select" id="category" name="category">
                                <option selected disabled hidden>Wybierz kategorie</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Opis</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
                        </div>
                        <div class="mb-3"> 
                            <label for="image">Wybierz zdjęcie:</label>
                            <input type="file" name="image" class="form-control-file" id="image">
                        </div>
                        <div class="mb-3">
                            <label for="location" class="form-label">Lokalizacja</label>
                            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Cena</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Numer telefonu</label>
                            <input type="text" class="form-control" id="number" name="number" value="{{ old('number') }}">
                        </div>
                        <button type="submit" class="btn custom-btn" style="background-color: #A6ACAF; border-color: #A6ACAF;">Dodaj ogłoszenie</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>    
</body>


@include('shared.footer')
</html>