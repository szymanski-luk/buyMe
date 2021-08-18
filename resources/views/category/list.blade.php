@extends('layouts.layout')

@section('content')
    <h1 id="h1-red">Categories</h1>
    <hr>
    @foreach($categories as $category)

    <div class="container-fluid">
        <a href="{{ route('categories_details', ['id' => $category->id]) }}" style="text-decoration-line: none;" >
        <div class="card mb-3" id="card-category" style="max-width: 1000px; margin-left: auto; margin-right: auto">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('images/' . $category->img) }}" style="max-width: 240px; max-height: 240px; padding-left: 20px" class="img-fluid rounded-start" alt="{{ $category->name }}">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h2 class="card-title" >{{ $category->name }}</h2>
                        <p class="card-text"><small class="text-muted">Click the card to show items in this category</small></p>
                    </div>
                </div>
            </div>
        </div>
        </a>
    </div>
    @endforeach
@endsection

@section('footer')
    <div>Icons made by <a href="https://www.freepik.com" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div>
@endsection
