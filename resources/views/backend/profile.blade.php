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
                                <strong class="card-title">Profile</strong>
                                <p>Short description ABOUT YOUR SELF</p>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" method="POSt" action="{{route('save.profile')}}" novalidate>
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="example-textarea">Text area</label>
                                        <textarea class="form-control" name="desc" id="example-textarea" rows="4"></textarea>
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