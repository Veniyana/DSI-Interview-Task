@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 offset-lg-2 offset-md-1 offset-sm-0">
            <div class="row">
                <div class="col text-right">
                    <a  href="{{route('user.create')}}" class="btn btn-success w-25 text-white"><i class="fa-solid fa-user-plus"></i>&nbsp;Create user</a>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    @if($users)
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Last name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Department</th>
                                    <th>Occupation</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->lastname}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>{{$user->department}}</td>
                                        <td>{{$user->occupation}}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{route('user.edit',['user'=>$user])}}"><i
                                                        class="fa-solid fa-user-pen"></i></a>
                                            <a class="btn btn-danger"><i class="fa-solid fa-user-minus"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection