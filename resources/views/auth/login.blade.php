@extends('layout.guest')

@section('title', 'Login')

@section('content')
<div class="card card-login p-4" style="width: 100%; max-width: 400px;">
    <div class="logo-arei">AREI OUTDOOR GEAR</div>

    <!-- Error messages -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" class="form-control" placeholder="email" required autofocus>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="********" required>
        </div>

        <button type="submit" class="btn btn-arei w-100">Login</button>
    </form>
</div>
@endsection
