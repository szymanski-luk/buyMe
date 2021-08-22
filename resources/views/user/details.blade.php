@extends('layouts.layout')

@section('content')
    <h1 id="h1-red">{{ $user->name }}</h1>
    <hr>

    <div class="row">
        <div class="col-lg-8 col-sm-12">
            @if(count($auctions) > 0)
                @foreach($auctions as $auction)
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

                @endforeach
                    <div class="d-flex justify-content-center">
                        {!! $auctions->links() !!}
                    </div>
            @else
                <div class="row">

                    <img src="{{ asset('images/' . 'oops.png') }}" style="max-width: 300px; margin-left: auto; margin-right: auto" alt="Oops">

                    <h2 style="text-align: center; margin-top: 15px">This user has no sale announcements.</h2>

                </div>

            @endif
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
                                <h4 id="h1-red" style="margin-top: 20px">{{ $user->name }}</h4>
                                <p class="card-text" style="margin-top: -10px"><small class="text-muted">Account created on {{ substr($user->created_at, 0, 10) }}</small></p>
                                <div style="margin-top: 25px">
                                    <img id="phone-call" style="margin-top: -5px" src="{{ asset('images/' . 'phone-call.png') }}" alt="phone"/>
                                    <h5 id="h5-tel">
                                        {{ substr($user->phone, 0, 3) }} {{ substr($user->phone, 3, 3) }} {{ substr($user->phone, 6, 3) }}
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
