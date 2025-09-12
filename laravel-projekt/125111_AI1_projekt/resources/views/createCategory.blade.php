<!-- resources/views/categories/create.blade.php -->

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
                <div class="card-header">Dodaj kategorię</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('categories.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nazwa kategorii:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="img">Wybierz zdjęcie:</label>
                            <input type="file" name="img" class="form-control-file" id="img">
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Dodaj kategorię</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
