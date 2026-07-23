@extends('layouts.main_layout')
@section('content')

@production
    <p>O APP_ENV = local | production</p>
    <p>Estou no ambiente de produção</p>        
    @else
        <p>Não estou em ambiente de produção</p>
@endproduction

@env(['local', 'production', 'development'])
    <p>Estou no ambiente => {{ env('APP_ENV')}}</p>
@endenv

@session('name')
    <h3>A sessão tem o valor {{ session('name') }}</h3>
@endsession
<div class='container mt-5'>
    <div class='row justify-content-center'>
        <div class='col-6'>
            <form action='{{ route('submit') }}' method="post">
                @csrf
                <div class='mb-3'>
                    <label for='username' class='form-label'>Username: </label>
                    <input type='text' name='username' class='form-control' value={{old('username')}}>

                    {{-- show error --}}
                    @error('username')
                        <div class='text-danger'> {{ $message }} </div>
                    @enderror
                </div>

                <div class='mb-3'>
                    <label for='senha' class='form-label'>Password: </label>
                    <input type='password' name='senha' class='form-control' value={{ old('senha') }}>
                    {{-- show error --}}
                    @error('senha')
                        <div class='text-danger'> {{ $message }} </div>
                    @enderror
                </div>

                <div class='mb-3'>
                    <button class='btn btn-primary'>Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection