@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Centers</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('centerabout.update', $centerabout->id ) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <label for="centerfilter_id">Topic and Region</label>
                            <select name="centerfilter_id" id="centerfilter_id" class="form-control">
                                @foreach ($centerfilter as $centerfilter)
                                <option @if($centerfilter->id == $centerabout->centerfilter_id) selected @endif value="{{ $centerfilter->id }}">{{ $centerfilter->tropic_en }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('centerfilter_id'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('centerfilter_id') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label for="title_uz">Title [Uzbek]</label>
                            <input type="text" id="title_uz" value="{{ $centerabout->title_uz }}" class="form-control" name="title_uz">
                            @if($errors->has('title_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('title_uz') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label for="title_ru">Title [Russian]</label>
                            <input type="text" id="title_ru" value="{{ $centerabout->title_ru }}" class="form-control" name="title_ru">
                            @if($errors->has('title_ru'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('title_ru') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-3">
                            <label for="title_en">Title [English]</label>
                            <input type="text" id="title_en" value="{{ $centerabout->title_en }}" class="form-control" name="title_en">
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

                     <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="description_uz">Content [Uzbek]</label>
                            <textarea name="description_uz" class="my-editor" id="description_uz" cols="30" rows="10">{{ $centerabout->description_uz }}</textarea>
                            @if($errors->has('description_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('description_uz') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="description_ru">Content [Russian]</label>
                            <textarea name="description_ru" class="my-editor" id="description_ru" cols="30" rows="10">{{ $centerabout->description_ru }}</textarea>
                            @if($errors->has('description_ru'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('description_ru') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="description_en">Content [English]</label>
                            <textarea name="description_en" class="my-editor" id="description_en" cols="30" rows="10">{{ $centerabout->description_en }}</textarea>
                            @if($errors->has('description_en'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('description_en') }}
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
                        <div class="col-md-6">
                            <img src="{{ asset($centerabout->image) }}" width="150" height="150" alt="">
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

