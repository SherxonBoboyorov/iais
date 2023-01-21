@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Centers topic and region</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('centerfilter.update', $centerfilter->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-4">
                            <label for="tropic_uz">Title [Uzbek]</label>
                            <input type="text" id="tropic_uz" value="{{ $centerfilter->tropic_uz }}" class="form-control" name="tropic_uz">
                            @if($errors->has('tropic_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('tropic_uz') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="tropic_ru">Title [Russian]</label>
                            <input type="text" id="tropic_ru" value="{{ $centerfilter->tropic_ru }}" class="form-control" name="tropic_ru">
                            @if($errors->has('tropic_ru'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('tropic_ru') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="tropic_en">Title [English]</label>
                            <input type="text" id="tropic_en" value="{{ $centerfilter->tropic_en }}" class="form-control" name="tropic_en">
                            @if($errors->has('tropic_en'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('tropic_en') }}
                            </div>
                            @endif
                        </div>
                     </div><br>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div><!-- container -->

</div>
@endsection

