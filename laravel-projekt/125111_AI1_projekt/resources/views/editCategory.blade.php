@extends('layouts.app')
<style>
    body {
            background-image: url('{{ asset('storage/img/background.jpg') }}'); 
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
</style>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edytuj kategorię</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('categories.update', ['categoryId' => $category->id]) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Nazwa kategorii:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                            
                                <!-- <div class="form-group">
    <label for="image">Nowe zdjęcie:</label>
    <input type="file" class="form-control-file" id="image" name="image">
</div> -->

                            </div><br>

                            <button type="submit" class="btn btn-primary">Zapisz zmiany</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
