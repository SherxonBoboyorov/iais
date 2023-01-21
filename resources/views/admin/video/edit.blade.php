@extends('layouts.admin')

@section('content')
    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Edit Videos</h4>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>

            <form action="{{ route('video.update', $video->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="title_uz">Title [Uzbek]</label>
                                <input type="text" id="title_uz" value="{{ $video->title_uz }}" class="form-control" name="title_uz">
                                @if($errors->has('title_uz'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('title_uz') }}

                                    </div>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <label for="title_ru">Title [Russian]</label>
                                <input type="text" id="title_ru" value="{{ $video->title_ru }}" class="form-control" name="title_ru">
                                @if($errors->has('title_ru'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('title_ru') }}
                                    </div>
                                @endif
                            </div>

                            <div class="col-md-4">
                                <label for="title_en">Title [English]</label>
                                <input type="text" id="title_en" value="{{ $video->title_en }}" class="form-control" name="title_en">
                                @if($errors->has('title_en'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        {{ $errors->first('title_en') }}
                                    </div>
                                @endif
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="frame">Link Youtube</label>
                                <input type="text" id="frame" value="{{ $video->frame }}" class="form-control" name="frame">
                                @if($errors->has('frame'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('frame') }}
                                </div>
                                @endif
                            </div>
                        </div><br><br>


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
                            <div class="col-md-6">
                                <img src="{{ asset($video->image) }}" width="150" height="150" alt="">
                            </div>
                        </div><br><br>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-success btn-block">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

