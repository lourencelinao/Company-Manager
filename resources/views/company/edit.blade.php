@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/company/{{$company->id}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Company name</label>
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $company->name }}"  autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="address" class="col-md-4 col-form-label text-md-right">Company address</label>
            <div class="col-md-6">
                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') ?? $company->address }}"  autocomplete="address" autofocus>
                @error('address')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Company email</label>
            <div class="col-md-6">
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $company->email }}"  autocomplete="email" autofocus>
                @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="website" class="col-md-4 col-form-label text-md-right">Company website</label>
            <div class="col-md-6">
                <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ old('website') ?? $company->website }}"  autocomplete="website" autofocus>
                @error('website')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="image" class="col-md-4 col-form-label text-md-right">Company image</label>
            <div class="col-md-6">
                <input id="image" type="file" class="form-control-file" name="image" value="{{ old('image') ?? $company->image }}"  autocomplete="image" autofocus>
                @error('image')
                <strong>{{ $message }}</strong>
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
