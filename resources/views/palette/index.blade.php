@extends('layouts.main')

@section('content')

<div class="text-center">
    <br>
    <h1>Your palettes</h1>
    <br>
    @auth
        <a href="{{ route('palette.create') }}" class="btn btn-outline-info">Create a palette</a>
    @endauth
    <br>
</div>

<div class="container">
    <br>
    <table class="table table-hover" style="width: 100%">
        <thead>
            <tr>
                <th style="width: 40%"></th>
                <th style="width: 20%"></th>
                <th style="width: 20%"></th>
                <th style="width: 20%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($palettes as $item)
                <tr>
                    <td>{{ $item->name }}</td>
                    <td><a href="{{ route('palette.show', ['palette' => $item]) }}" class="btn btn-outline-secondary">See Palette</a></td>
                    <td><a href="{{ route('palette.edit', ['palette' => $item]) }}" class="btn btn-outline-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('palette.delete', ['palette' => $item]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" class="btn btn-outline-danger">
                        </form>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>

@endsection