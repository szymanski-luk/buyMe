@extends('layouts.layout')

@section('content')
    <h1 id="h1-red">Categories</h1>
    <hr>
    @auth
        @if(Auth::user()->type == 'admin')
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#newModal">
                New category
            </button>
        @endif
    @endauth
    <div class="row">
    @foreach($categories as $category)
        @auth
            @if(Auth::user()->type == 'admin')
                <div class="modal" tabindex="-1" id="editModal">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form class="row m-3" method="POST" action="{{ route('edit_category') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="col-11">
                                    <input type="hidden" name="id" value="{{ $category->id }}">
                                    <label for="name">Category name</label>
                                    <input type="text" style="width: 100%" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}" placeholder="Item name" aria-label="Username" id="name" name="name" aria-describedby="basic-addon1">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                             <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-11">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label @error('image') is-invalid @enderror">Image</label>
                                        <input class="form-control" name="image" type="file" id="formFile">
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                                 <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-11 my-2">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-warning">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
        @endauth

        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="container-fluid" id="categoryList">
                <a href="{{ route('categories_details', ['id' => $category->id]) }}" style="text-decoration-line: none;" >
                    <div class="card mb-3" id="card-category" style="max-width: 1000px; margin-left: auto; margin-right: auto">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('images/' . $category->img) }}" style="max-width: 200px; max-height: 200px; padding-left: 20px" class="img-fluid rounded-start" alt="{{ $category->name }}">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body" name="searchDiv">
                                    <h2 class="card-title" >{{ $category->name }}</h2>
                                    <p class="card-text"><small class="text-muted">Click the card to show items in this category</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
                @auth
                    @if(Auth::user()->type == 'admin')
                        <div style="text-align: center; margin-bottom: 60px;">
                            <button  type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#editModal">
                                ^^ Edit category ^^
                            </button>
                        </div>

                    @endif
                @endauth
            </div>
        </div>


    @endforeach
    </div>
    @auth
        @if(Auth::user()->type == 'admin')
            <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#newModal">
                New category
            </button>
        @endif
    @endauth


    @auth
        @if(Auth::user()->type == 'admin')
            <div class="modal" tabindex="-1" id="newModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <form class="row m-3" method="POST" action="{{ route('new_category') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="col-11">
                                <label for="name">Category name</label>
                                <input type="text" style="width: 100%" class="form-control @error('name') is-invalid @enderror" placeholder="Item name" aria-label="Username" id="name" name="name" aria-describedby="basic-addon1">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                     <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-11">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label @error('image') is-invalid @enderror">Image</label>
                                    <input class="form-control" name="image" type="file" id="formFile">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-11 my-2">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-warning">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        @endif
    @endauth

@endsection

