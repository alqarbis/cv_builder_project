@extends('backend.dashboard')
@section('main')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">

                <div class="row">

                    <div class="col-md-8">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong class="card-title">Register Admin</strong>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" method="POSt" action="{{route('save.admin')}}" novalidate>
                                    @csrf

                                    <div class="form-group mb-3">
                                        <label for="address-wpalaceholder">Name</label>
                                        <input type="text" name="name" value="{{old('name')}}" id="address-wpalaceholder" class="form-control" placeholder="Enter your Name">
                                        @error('name')
                                        <span class="fs-6 text-danger">{{$message}}</span>

                                        @enderror



                                    </div>


                                    <div class="form-row">
                                        <div class="col-md-8 mb-3">
                                            <label for="exampleInputEmail2">Email address</label>
                                            <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp1" required>
                                            @error('email')
                                            <span class="fs-6 text-danger">{{$message}}</span>

                                            @enderror



                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <label for="custom-phone">Password</label>
                                            <input class="form-control input-phoneus" name="password" type="password" id="custom-phone" maxlength="14" required>
                                            @error('password')
                                            <span class="fs-6 text-danger">{{$message}}</span>

                                            @enderror




                                        </div>
                                    </div> <!-- /.form-row -->
                                    <div class="col-md-8 mb-3">
                                        <label for="address-wpalaceholder">confirm Password</label>
                                        <input type="password" name="confirm" id="address-wpalaceholder" class="form-control" placeholder="confirm Password">

                                    </div>





                                    <button class="btn btn-primary" type="submit">Save</button>
                                </form>
                            </div> <!-- /.card-body -->
                        </div> <!-- /.card -->
                    </div> <!-- /.col -->
                </div> <!-- end section -->
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

</main> <!-- main -->

@endsection