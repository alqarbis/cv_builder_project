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
                                <strong class="card-title">Image</strong>
                            </div>
                            <div class="card-body">
                                <form class="needs-validation" method="POSt" enctype="multipart/form-data" action="{{route('update.image')}}" novalidate>
                                    @csrf
                                    <input type="hidden" name="id" value="{{$image->id}}">
                                    <input type="hidden" name="Old_img" value="{{$image->img}}">
                                    <div class="form-group mb-3">
                                        <img src="{{asset($image->img)}}" style="width: 100px; height:100px;" alt="">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="example-fileinput">Cv Image</label>
                                        <input type="file" name="img" id="example-fileinput" class="form-control-file">
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