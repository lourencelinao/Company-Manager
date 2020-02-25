@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/employee/{{ $employee->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="firstname" class="col-md-4 col-form-label text-md-right">First name</label>
            <div class="col-md-6">
                <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') ?? $employee->firstname }}"  autocomplete="firstname" autofocus>
                @error('firstname')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label text-md-right">First name</label>
            <div class="col-md-6">
                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') ?? $employee->lastname }}"  autocomplete="lastname" autofocus>
                @error('lastname')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
            <div class="col-md-6">
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $employee->email }}"  autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
            <div class="col-md-6">
                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') ?? $employee->phone }}"  autocomplete="phone" autofocus>
                @error('phone')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" name='submit' class="btn btn-primary">
                    Update
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
