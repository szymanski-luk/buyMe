@extends('layouts.index')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
@section('content')
    <div class="container-fluid text-light p-5" id="m_jumbotron" style="background-image: url('{{ asset('images/' . 'bcground5.jpg') }}')">
        <div class="container p-5">
            <h1 id="h1-red-shadow">Find something you want</h1>
            <br>
            <form method="GET" action="{{ route('searching') }}">
                <div class="input-group input-group-lg">
                    <input type="text" class="form-control text-dark bg-light" name="searchTerm" placeholder="Search for your favorite things!" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg">
                    <button type="submit" class="btn-lg btn-danger">Search</button>
                </div>
            </form>
            <hr>
        </div>
    </div>

    <div class="container p-5">
        <h1 id="h1-red">Latest offers</h1>
        <hr>

        <div class="row">
            @foreach($auctions as $auction)
            <div class="col-lg-6 col-sm-12 px-0 mx-0">
                <div class="container-fluid">
                    <a href="{{ route('advert_details', ['id' => $auction->id]) }}" style="text-decoration-line: none;" >
                        <div class="card mb-3" id="card-category" style="max-width: 1000px; margin-left: auto; margin-right: auto">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="{{ asset('images/' . $auction->img) }}" style="object-fit: cover; height: 100%" class="img-fluid rounded-start" alt="{{ $auction->title }}">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h3 class="card-title" >{{ $auction->title }}</h3>
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="card-text"><small class="text-muted">Price</small></p>
                                                <h5 id="h5-price">{{ $auction->price }} zł</h5>
                                            </div>
                                            <div class="col-6 border-start">
                                                <p class="card-text"><small class="text-muted">City</small></p>
                                                <h5 id="h5-price">{{ $auction->city }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

    </div>

@endsection

@section('footer')
    © 2020 Copyright: Łukasz Szymański - <a class="text-dark" target="_blank" href="https://github.com/szymanski-luk">GitHub</a>
@endsection
