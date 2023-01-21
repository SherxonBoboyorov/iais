@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Our contact</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('ourcontact.update', $ourcontact->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <label for="phone_number">Phone number:</label>
                            <input type="text" id="phone_number" value="{{ $ourcontact->phone_number }}" class="form-control" name="phone_number">
                            @if($errors->has('phone_number'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('phone_number') }}
                            </div>
                            @endif
                        </div>
                    </div><br>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <label for="fax">Fax:</label>
                            <input type="text" id="fax" value="{{ $ourcontact->fax }}" class="form-control" name="fax">
                            @if($errors->has('fax'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('fax') }}
                            </div>
                            @endif
                        </div>
                    </div><br>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <label for="email">Email:</label>
                            <input type="text" id="email" value="{{ $ourcontact->email }}" class="form-control" name="email">
                            @if($errors->has('email'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('email') }}
                            </div>
                            @endif
                        </div>
                    </div><br>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-4">
                            <label for="landmarks_uz">Landmarks: [Uzbek]</label>
                            <input type="text" id="landmarks_uz" value="{{ $ourcontact->landmarks_uz }}" class="form-control" name="landmarks_uz">
                            @if($errors->has('landmarks_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('landmarks_uz') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="landmarks_ru">Landmarks: [Russian]</label>
                            <input type="text" id="landmarks_ru" value="{{ $ourcontact->landmarks_ru }}" class="form-control" name="landmarks_ru">
                            @if($errors->has('landmarks_ru'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('landmarks_ru') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="landmarks_en">Landmarks: [English]</label>
                            <input type="text" id="landmarks_en" value="{{ $ourcontact->landmarks_en }}" class="form-control" name="landmarks_en">
                            @if($errors->has('landmarks_en'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('landmarks_en') }}
                            </div>
                            @endif
                        </div>
                      </div><br>

                      <div class="row" style="margin-top: 15px">
                        <div class="col-md-4">
                            <label for="adsress_uz">Address: [Uzbek]</label>
                            <input type="text" id="adsress_uz" value="{{ $ourcontact->adsress_uz }}" class="form-control" name="adsress_uz">
                            @if($errors->has('adsress_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('adsress_uz') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="adsress_ru">Address: [Russian]</label>
                            <input type="text" id="adsress_ru" value="{{ $ourcontact->adsress_ru }}" class="form-control" name="adsress_ru">
                            @if($errors->has('adsress_ru'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('adsress_ru') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="adsress_en">Address: [English]</label>
                            <input type="text" id="adsress_en" value="{{ $ourcontact->adsress_en }}" class="form-control" name="adsress_en">
                            @if($errors->has('adsress_en'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('adsress_en') }}
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
@section('custom_js')
@component('admin.utils.tinymce')@endcomponent
@endsection

