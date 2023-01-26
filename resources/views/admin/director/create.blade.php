@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Director of Center</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('director.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-6">
                            <label>Centers  </label>
                            <select name="centerabout_id" id="centerabout_id" class="form-control">
                                @foreach ($centerabouts as $centerabout)
                                    <option value="{{ $centerabout->id }}">{{ $centerabout->title_en }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('centerabout_id'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('centerabout_id') }}
                            </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <label>Experts</label>
                            <select name="expertpeople_id" id="expertpeople_id" class="form-control">
                                @foreach ($expertpeoples as $expertpeople)
                                    <option value="{{ $expertpeople->id }}">{{ $expertpeople->title_en }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('expertpeople_id'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('expertpeople_id') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">

                        <div class="col-md-4">
                            <label for="director_name_uz">Director name [Uzbek]</label>
                            <input type="text" id="director_name_uz" class="form-control" name="director_name_uz">
                            @if($errors->has('director_name_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('director_name_uz') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="director_name_ru">Director name [Russian]</label>
                            <input type="text" id="director_name_ru" class="form-control" name="director_name_ru">
                            @if($errors->has('director_name_ru'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('director_name_ru') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label for="director_name_en">Director name [English]</label>
                            <input type="text" id="director_name_en" class="form-control" name="director_name_en">
                            @if($errors->has('director_name_en'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('director_name_en') }}
                            </div>
                            @endif
                        </div>
                     </div><br>


                        <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <label for="job_title_uz">Job title: [Uzbek]</label>
                            <input type="text" id="job_title_uz" class="form-control" name="job_title_uz">
                            @if($errors->has('job_title_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('job_title_uz') }}
                            </div>
                            @endif
                        </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-3">
                                <label for="job_title_ru">Job title: [Russian]</label>
                                <input type="text" id="job_title_ru" class="form-control" name="job_title_ru">
                                @if($errors->has('job_title_ru'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('job_title_ru') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-3">
                                <label for="job_title_en">Job title: [English]</label>
                                <input type="text" id="job_title_en" class="form-control" name="job_title_en">
                                @if($errors->has('job_title_en'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('job_title_en') }}
                                </div>
                                @endif
                            </div>
                        </div><br>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-3">
                                <label for="phone_number">Phone number:</label>
                                <input type="text" id="phone_number" class="form-control" name="phone_number">
                                @if($errors->has('phone_number'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('phone_number') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <br>



                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-3">
                            <label for="reception_days_uz">Reception days: [Uzbek]</label>
                            <input type="text" id="reception_days_uz" class="form-control" name="reception_days_uz">
                            @if($errors->has('reception_days_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('reception_days_uz') }}
                            </div>
                            @endif
                        </div>
                      </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-3">
                                <label for="reception_days_ru">Reception days: [Russian]</label>
                                <input type="text" id="reception_days_ru" class="form-control" name="reception_days_ru">
                                @if($errors->has('reception_days_ru'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('reception_days_ru') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-3">
                                <label for="reception_days_en">Reception days: [English]</label>
                                <input type="text" id="reception_days_en" class="form-control" name="reception_days_en">
                                @if($errors->has('reception_days_en'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('reception_days_en') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <br>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-3">
                                <label for="email">Email:</label>
                                <input type="text" id="email" class="form-control" name="email">
                                @if($errors->has('email'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('email') }}
                                </div>
                                @endif
                            </div>
                        </div><br><br>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <label for="center_for_sustianable_uz">CENTER FOR SUSTAINABLE [Uzbek]</label>
                                <textarea name="center_for_sustianable_uz" class="my-editor" id="center_for_sustianable_uz" cols="30" rows="10"></textarea>
                                @if($errors->has('center_for_sustianable_uz'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('center_for_sustianable_uz') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <label for="center_for_sustianable_ru">CENTER FOR SUSTAINABLE [Russian]</label>
                                <textarea name="center_for_sustianable_ru" class="my-editor" id="center_for_sustianable_ru" cols="30" rows="10"></textarea>
                                @if($errors->has('center_for_sustianable_ru'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('center_for_sustianable_ru') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <label for="center_for_sustianable_en">CENTER FOR SUSTAINABLE [English]</label>
                                <textarea name="center_for_sustianable_en" class="my-editor" id="center_for_sustianable_en" cols="30" rows="10"></textarea>
                                @if($errors->has('center_for_sustianable_en'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('center_for_sustianable_en') }}
                                </div>
                                @endif
                            </div>
                        </div><br><br>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <label for="development_uz">DEVELOPMENT [Uzbek]</label>
                                <textarea name="development_uz" class="my-editor" id="development_uz" cols="30" rows="10"></textarea>
                                @if($errors->has('development_uz'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('development_uz') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <label for="development_ru">DEVELOPMENT [Russian]</label>
                                <textarea name="development_ru" class="my-editor" id="development_ru" cols="30" rows="10"></textarea>
                                @if($errors->has('development_ru'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('development_ru') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <label for="development_en">DEVELOPMENT [English]</label>
                                <textarea name="development_en" class="my-editor" id="development_en" cols="30" rows="10"></textarea>
                                @if($errors->has('development_en'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('development_en') }}
                                </div>
                                @endif
                            </div>
                        </div><br>

                      <div class="row" style="margin-top: 15px">
                        <div class="col-md-6">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control-file">
                            @if($errors->has('image'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('image') }}
                                </div>
                            @endif
                        </div>
                    </div><br>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-block">Seve</button>
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

