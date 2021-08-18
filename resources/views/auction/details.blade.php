@extends('layouts.layout')

@section('content')
    <h1 id="h1-red">{{ $auction->title }}</h1> <p class="card-text"><small class="text-muted"><span class="disable-select">Auction id: #</span>{{ $auction->id }}</small></p>
    <hr>

    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="card mb-3">
                <img src="{{ asset('images/' . $auction->img) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">{{ $auction->content }}</p>
                    <p class="card-text"><small class="text-muted">Last updated {{ $auction->updated_at }}</small></p>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-12">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3">
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('images/' . 'man.png') }}" style="max-width: 100px; margin-left: 20px; margin-top: 20px; margin-bottom: 20px" class="card-img-top" alt="...">
                            </div>
                            <div class="col-8">
                                <h4 id="h1-red" style="margin-top: 20px">{{ $auction->user->name }}</h4>
                                <p class="card-text"><small class="text-muted">Account created on {{ substr($auction->user->created_at, 0, 10) }}</small></p>
                                <img id="phone-call" style="margin-top: -5px" src="{{ asset('images/' . 'phone-call.png') }}" alt="phone"/>
                                <h5 id="h5-tel" style="margin-top: -5px">
                                    {{ substr($auction->user->phone, 0, 3) }} {{ substr($auction->user->phone, 3, 3) }} {{ substr($auction->user->phone, 6, 3) }}
                                </h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6" style="padding-left: 20px">
                                <p class="card-text"><small class="text-muted">Price</small></p>
                                <h5 id="h5-price">{{ $auction->price }} zł</h5>
                            </div>
                            <div class="col-6 border-start">
                                <p class="card-text" ><small class="text-muted">City</small></p>
                                <h5 id="h5-price">{{ $auction->city }}</h5>
                            </div>
                            <div class="col-6" style="padding-left: 20px">
                                <p class="card-text" ><small class="text-muted">Category</small></p>
                                <h5 id="h5-price">{{ $auction->category->name }}</h5>
                            </div>
                            <div class="col-6 border-start" style="padding-left: 20px">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
