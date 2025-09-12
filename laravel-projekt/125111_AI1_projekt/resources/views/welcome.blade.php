<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Tablica ogłoszeń</title>
    <style>
        .center {
            text-align: center;
        }
        .card {
            max-width: 300px; 
        }

        .card-img-top {
            max-height: 200px; 
            object-fit: cover; 
        }

        body {
            background-image: url('storage/img/background.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .category-img {
        width: 100%; 
        height: auto; 
        max-height: 200px; 
        object-fit: contain; 
        }
        .button-container {
    display: flex;
    gap: 10px;
    margin: 20px; /* margines na zewnątrz */
        }

.button-delete,
.button-edit {
    padding: 10px;
    border: none;
    border-radius: 8px; /* zaokrąglone rogi */
    color: white;
    cursor: pointer;
}

.button-delete {
    background-color: red;
    margin-right: 5px; /* margines na zewnątrz dla prawego przycisku */
}

.button-edit {
    background-color: blue;
    margin-right: 5px; /* margines na zewnątrz dla prawego przycisku */
}

.button-delete:hover,
.button-edit:hover {
    opacity: 0.8; /* efekt przy najechaniu */
}

</style>

</head>
<body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
    @include('home')
    
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
        <!-- </form> -->
    <h1 class="center">Lista kategorii:</h1>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach($categories as $category)
            <div class="col">
                <div class="card">
                    <img src="{{ asset('storage/img/' . $category->img) }}" class="card-img-top category-img">
                    <div class="card-body">
                        <h4 class="card-title">{{$category->name}}</h4>
                        <a href="{{ route('category.ads', ['category_id' => $category->id]) }}" class="btn btn-primary">Wyświetl wszystkie...</a>
                    </div>
                    @if(auth()->check() && auth()->user()->id == 1)
    <div class="button-container">
        <form action="{{ route('categories.delete', ['id' => $category->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="button-delete">Usuń</button>
        </form>
        <form action="{{ route('categories.edit', ['categoryId' => $category->id]) }}" method="get">
            @csrf
            <button type="submit" class="button-edit">Edytuj</button>
        </form>
    </div>
@endif


                </div>
            </div>
            @endforeach
        </div>
    </div>
    <br>
</body>
@include('shared.footer')
</html>