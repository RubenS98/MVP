@extends('layouts.main')

@section('content')
    <div style="height: 100%; width: 100%; position: fixed; background-size: cover">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container align-middle" style="width: 35%; margin-top: 50px;">
            <div class="">
                <div class="card-body">
                    <div class="text-center">
                        <h1>Create an account</h1>
                    </div>
                    <form action="{{ route('auth.do-register') }}" method="POST">
                        @csrf
                        <h5 class="card-title">Name</h5>
                        <input type="text" class="form-control" id="" name="name">
                        <br>
                        <h5 class="card-title">Email</h5>
                        <input type="text" class="form-control" id="" name="email">
                        <br>
                        <h5 class="card-title">Password</h5>
                        <input type="password" class="form-control" id="" name="password">
                        <br>
                        <h5 class="card-title">Confirm password</h5>
                        <input type="password" class="form-control" id="" name="password_confirmation">
                        <br>
                        <div class="text-center">
                            <input type="submit" value="Register" class="btn btn-outline-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
