@extends('layouts.layout')

@section('content')
    <h1 id="h1-red" >New advertisement</h1>
    <hr>
    <div class="container" style="max-width: 1000px">
    <form method="POST" action="{{ route('save_auction') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Item name" aria-label="Username" id="name" name="name" aria-describedby="basic-addon1">
            <label for="name">Item name</label>

            @error('name')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Price" name="price" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <span class="input-group-text" id="basic-addon2">zł</span>

            @error('price')
            <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control @error('city') is-invalid @enderror" placeholder="City" id="city" name="city" >
            <label for="city">City</label>

            @error('city')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formFile" class="form-label @error('image') is-invalid @enderror">Image</label>
            <input class="form-control" name="image" type="file" id="formFile">
            @error('image')
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="input-group mb-3">
            <span class="input-group-text">Description</span>
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" maxlength="2800" rows="10" aria-label="Description"></textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-group mb-3">
            <select class="form-select" name="category">
                @foreach($categories as $category)
                    @if($loop->index == 0)
                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button style="margin-bottom: 80px;" type="submit" class="btn btn-danger">{{ __('Save') }}</button>


    </form>
    </div>
@endsection
