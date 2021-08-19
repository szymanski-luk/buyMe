@extends('layouts.layout')

@section('content')
    <h1 id="h1-red">{{ $auction->title }}</h1>
    <p class="card-text">
        <small class="text-muted"><span class="disable-select">Auction id: #</span>{{ $auction->id }}</small>
    </p>
    <hr>

    @auth
        @if(Auth::user()->id == $auction->user_id || Auth::user()->type == 'admin')
            <div class="modal" tabindex="-1" id="editingModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form class="row m-3" method="POST" action="{{ route('edit_auction') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $auction->id }}">
                            <div class="col-11">
                                <label for="name">Item name</label>
                                <input type="text" style="width: 100%" class="form-control @error('name') is-invalid @enderror" placeholder="Item name" aria-label="Username" id="name" name="name" value="{{$auction->title}}" aria-describedby="basic-addon1">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-1">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="col-lg-4 col-sm-12 my-2">
                                <label for="price">Price</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="Price" value="{{ $auction->price }}" name="price" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-3 col-sm-12 my-2">
                                <label for="city">City</label>
                                <input type="text" class="form-control @error('city') is-invalid @enderror" value="{{ $auction->city }}" placeholder="City" id="city" name="city">

                                @error('city')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-sm-12 my-2">
                                <label for="category">Category</label>
                                <select class="form-select" id="category" name="category">
                                    @foreach($categories as $category)
                                        @if(($loop->index + 1) == $auction->category->id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-11 my-2">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Description" maxlength="2800" rows="15" aria-label="Description">{{ $auction->content }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-11 my-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal" id="deletingModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Deleting</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want delete your advertisment?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <form method="post" action="{{ route('delete_auction') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $auction->id }}">
                                <button type="submit" class="btn btn-danger">Yes, delete this</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>


        @endif
    @endauth

    <div class="row">
        <div class="col-lg-8 col-sm-12">
            <div class="card mb-3">
                <img src="{{ asset('images/' . $auction->img) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <p class="card-text">{!! nl2br(e($auction->content)) !!}</p>
                    <p class="card-text"><small class="text-muted">Last updated {{ $auction->updated_at }}</small></p>
                    @auth
                        @if(Auth::user()->id == $auction->user_id || Auth::user()->type == 'admin')
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editingModal">
                                Edit
                            </button>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletingModal">
                                Delete
                            </button>
                        @endif
                    @endauth
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
