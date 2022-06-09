@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 offset-lg-2 offset-md-1 offset-sm-0">
            <div class="row">
                <div class="col text-right">
                    @if(request()->segment(2) == 'deactivated')
                        <a href="{{route('user.index')}}" class="btn btn-primary w-25 text-white"><i
                                    class="fas fa-user-check"></i>&nbsp;Active users</a>
                    @else
                        <a href="{{route('users.deactivated')}}" class="btn btn-danger w-25 text-white"><i
                                    class="fa-solid fa-history"></i>&nbsp;Deactivated users</a>
                    @endif
                    <a href="{{route('user.create')}}" class="btn btn-success w-25 text-white"><i
                                class="fa-solid fa-user-plus"></i>&nbsp;Create user</a>
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


                                            @if(request()->segment(2) == 'deactivated')
                                                <a data-id="{{$user->id}}" class="btn btn-success btn-activate"><i
                                                            class="fa-solid fa-user-plus"></i></a>
                                            @else
                                                <a class="btn btn-primary"
                                                    href="{{route('user.edit',['user'=>$user])}}"><i
                                                        class="fa-solid fa-user-pen"></i></a>
                                                <a data-id="{{$user->id}}" class="btn btn-danger btn-deactivate"><i
                                                            class="fa-solid fa-user-minus"></i></a>
                                            @endif
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

@section('scripts')
    <script>
        $(document).ready(function () {
            $('.btn-deactivate').on('click', function () {
                let user_id = $(this).data('id');
                if (confirm('Are you sure you want to deactivate this user?')) {
                    $.ajax({
                        url: '/users/' + user_id + '/deactivate',
                        method: 'post',
                        data: {
                            '_token': '{{csrf_token()}}',
                        }, success: function () {
                            window.location.reload();
                        }
                    })
                }
            })

            $('.btn-activate').on('click', function () {
                let user_id = $(this).data('id');
                if (confirm('Are you sure you want to activate this user?')) {
                    $.ajax({
                        url: '/users/' + user_id + '/activate',
                        method: 'post',
                        data: {
                            '_token': '{{csrf_token()}}',
                        }, success: function () {
                            window.location.reload();
                        }
                    })
                }
            })
        })
    </script>
@endsection