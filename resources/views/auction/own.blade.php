@extends('layouts.layout')

@section('content')

    <h1 id="h1-red">My advertisments</h1>
    <hr>
    @if(count($auctions) > 0)
        @foreach($auctions as $auction)
        <div class="container-fluid">
            <a href="{{ route('advert_details', ['id' => $auction->id]) }}" style="text-decoration-line: none;" >
                <div class="card mb-3" id="card-category" style="max-width: 1000px; margin-left: auto; margin-right: auto">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('images/' . $auction->img) }}" style="object-fit: cover; height: 100%" class="img-fluid rounded-start" alt="{{ $auction->title }}">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h2 class="card-title" >{{ $auction->title }}</h2>
                                <p class="card-text"><small class="text-muted">{{ substr($auction->content, 0, 135) }}...</small></p>
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
        @endforeach
    @else
        <div class="row">

                <img src="{{ asset('images/' . 'oops.png') }}" style="max-width: 300px; margin-left: auto; margin-right: auto" alt="Oops">

                <h2 style="text-align: center">Oops! You don't have any advertisment.  Create one here: </h2>

            <div class="col-12 my-2" style="text-align: center">
                <a href="{{ route('new_auction') }}" class="btn btn-outline-danger btn-lg " tabindex="-1" role="button" aria-disabled="true">New advertisment</a>
            </div>
        </div>

    @endif
@endsection
