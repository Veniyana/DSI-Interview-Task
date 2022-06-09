@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 col-sm-12 offset-lg-2 offset-md-1 offset-sm-0">
            <div class="card mt-2">
                <div class="card-body">
                    <form action="{{route('user.store')}}" autocomplete="off" id="user_create" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="input-name"><span class="text-danger">*</span> First name</label>
                                    <input type="text" name="name" id="input-name" class="form-control"
                                           value="{{old('name')}}">
                                    <span id="name-error" class="error text-danger"
                                          for="input-name">{{ $errors->first('name') }}</span>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="input-surname"><span class="text-danger">*</span> Surname</label>
                                    <input type="text" name="surname" id="input-surname" class="form-control"
                                           value="{{old('surname')}}">
                                    <span id="surname-error" class="error text-danger"
                                          for="input-surname">{{ $errors->first('surname') }}</span>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="input-lastname"><span class="text-danger">*</span> Last name</label>
                                    <input type="text" name="lastname" id="input-lastname" class="form-control"
                                           value="{{old('lastname')}}">
                                    <span id="lastname-error" class="error text-danger"
                                          for="input-lastname">{{ $errors->first('lastname') }}</span>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="input-address"><span class="text-danger">*</span> Address</label>
                                    <input type="text" name="address" id="input-address" class="form-control"
                                           value="{{old('address')}}">
                                    <span id="address-error" class="error text-danger"
                                          for="input-address">{{ $errors->first('address') }}</span>

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="input-email"><span class="text-danger">*</span> Email</label>
                                    <input type="text" name="email" id="input-email" class="form-control"
                                           value="{{old('email')}}">
                                    <span id="email-error" class="error text-danger"
                                          for="input-email">{{ $errors->first('email') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="input-phone"><span class="text-danger">*</span> Phone</label>
                                    <input type="text" name="phone" id="input-phone" class="form-control"
                                           value="{{old('phone')}}">
                                    <span id="phone-error" class="error text-danger"
                                          for="input-phone">{{ $errors->first('phone') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="input-department"><span class="text-danger">*</span> Department</label>
                                    <input type="text" name="department" id="input-department" class="form-control"
                                           value="{{old('department')}}">
                                    <span id="department-error" class="error text-danger"
                                          for="input-department">{{ $errors->first('department') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="input-occupation"><span class="text-danger">*</span> Occupation</label>
                                    <input type="text" name="occupation" id="input-occupation" class="form-control"
                                           value="{{old('occupation')}}">
                                    <span id="occupation-error" class="error text-danger"
                                          for="input-occupation">{{ $errors->first('occupation') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="input-salary"><span class="text-danger">*</span> Salary</label>
                                    <input type="number" lang="en" step="0.01" name="salary" id="input-salary"
                                           class="form-control" value="{{old('salary')}}">
                                    <span id="salary-error" class="error text-danger"
                                          for="input-salary">{{ $errors->first('salary') }}</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="form-group">
                                    <label for="input-password"><span class="text-danger">*</span> Password</label>
                                    <input type="password" name="password" id="input-password" class="form-control"
                                           value="{{old('password')}}">
                                    <span id="password-error" class="error text-danger"
                                          for="input-password">{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <a class="btn btn-primary w-100" href="{{url()->previous()}}">Back</a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-success w-100">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>$(document).ready(function ($) {
            $('#user_create').validate({
                rules: {
                    name: 'required',
                    surname: 'required',
                    lastname: 'required',
                    email: {
                        required: true,
                        pattern: '^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\\.[a-zA-Z0-9-.]+$',
                    },
                    phone: {
                        required: true,
                        pattern: '^([0]{1})+([0-9]{9})*$',
                    },
                    address: 'required',
                    department: 'required',
                    occupation: 'required',
                    salary: 'required',
                    password: 'required',
                },
                messages: {
                    name: "This field is required",
                    surname: "This field is required",
                    lastname: "This field is required",
                    address: "This field is required",
                    department: "This field is required",
                    occupation: "This field is required",
                    salary: "This field is required",
                    password: "This field is required",
                    email: {
                        required: "This field is required",
                        pattern: 'Enter a valid email address'
                    },
                    phone: {
                        required: "This field is required",
                        pattern: 'This field accepts only numbers'
                    },
                },
                errorClass: "border-danger",
                validClass: "border-success",
                errorPlacement: function ($error, $element) {
                    var name = $element.attr("name");
                    document.getElementById(name + '-error').innerHTML = $error.text();
                },
                success: function (label, element) {
                }
            });
        });
    </script>
@endsection