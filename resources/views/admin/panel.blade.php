@extends('layouts.layout')

@section('content')
    <h1 id="h1-red">Admin panel</h1>
    <hr>

    <table class="table">
        <thead class="table-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Created</th>
            <th scope="col">Type</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                @if($user->type == 'admin')
                    <td><b>{{ $user->type }}</b></td>
                @else
                    <td>{{ $user->type }}</td>
                @endif

                @if($user->type == 'admin')
                    <td>
                        <form method="post" action="{{ route('revoke_admin_rights') }}">
                            @csrf
                            <input type="hidden" value="{{ $user->id }}" name="id">
                            <button type="submit" class="btn btn-warning">Set as normal user</button>
                        </form>
                    </td>
                @else
                    <td>
                        <form method="post" action="{{ route('give_admin_rights') }}">
                            @csrf
                            <input type="hidden" value="{{ $user->id }}" name="id">
                            <button type="submit" class="btn btn-danger">Set as admin</button>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
