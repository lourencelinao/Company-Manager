@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href='/{{$company->id}}/employee/create' type="submit" class="btn btn-primary">
                        Add Employee
                    </a>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">Companies List</div>
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">Website</th>
                                                <th scope="col">Email</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>{{$company->name}}</td>
                                                        <td>{{$company->address}}</td>
                                                        <td>{{$company->website}}</td>
                                                        <td>{{$company->email}}</td>
                                                        <td><a class='btn btn-primary btn-sm' href="/company/{{ $company->id }}/edit">Edit</a><br>
                                                            <form action="/company/{{$company->id}}" method='POST'>
                                                                 @csrf
                                                                @method('DELETE')
                                                                <button class='btn btn-secondary btn-sm'>Delete</button>
                                                                </form>
                                                        </td>
                                                    </tr> 
                                            </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">Employees List</div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">First Name</th>
                                                    <th scope="col">Last Name</th>
                                                    <th scope="col">Phone</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                 @if(!empty($employees))
                                                    @foreach($employees as $employees)
                                                    <tr>
                                                        <td>{{$employees->firstname}}</td>
                                                        <td>{{$employees->lastname}}</td>
                                                        <td>{{$employees->phone}}</td>
                                                        <td>{{$employees->email}}</td>
                                                        <td><a class='btn btn-primary btn-sm' href="/employee/{{ $employees->id }}/edit">Edit</a><br>
                                                            <form action="/employee/{{$employees->id}}" method='POST'>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class='btn btn-secondary btn-sm'>Delete</button>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                 @endif
                                                </tbody>
                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
