@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Edit Outputs</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('outputnew.update', $outputnew->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-4">
                            <label>Outputs category</label>
                            <select name="outputcategory_id" id="outputcategory_id" class="form-control">
                                @foreach ($outputcategory as $outputcategory)
                                <option @if($outputcategory->id == $outputnew->outputcategory_id) selected @endif value="{{ $outputcategory->id }}">{{ $outputcategory->title_en }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('outputcategory_id'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('outputcategory_id') }}
                            </div>
                            @endif
                        </div>
                        <div class="col-md-4">
                            <label>Experts</label>
                            <select name="expertpeople_id" id="expertpeople_id" class="form-control">
                                @foreach ($expertperson as $expertperson)
                                <option @if($expertperson->id == $outputnew->expertpeople_id) selected @endif value="{{ $expertperson->id }}">{{ $expertperson->title_en }}</option>
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

                        <div class="col-md-4">
                            <label>Centers</label>
                            <select name="centerabout_id" id="centerabout_id" class="form-control">
                                @foreach ($centerabout as $centerabout)
                                <option @if($centerabout->id == $outputnew->centerabout_id) selected @endif value="{{ $centerabout->id }}">{{ $centerabout->title_en }}</option>
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
                    </div>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
                            <label for="title_uz">Title [Uzbek]</label>
                            <input type="text" id="title_uz" value="{{ $outputnew->title_uz }}" class="form-control" name="title_uz">
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
                            <input type="text" id="title_ru" value="{{ $outputnew->title_ru }}" class="form-control" name="title_ru">
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
                            <input type="text" id="title_en" value="{{ $outputnew->title_en }}" class="form-control" name="title_en">
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
                                <label for="content_uz">Content [Uzbek]</label>
                                <textarea name="content_uz" class="my-editor" id="content_uz" cols="30" rows="10">{{ $outputnew->content_uz }}</textarea>
                                @if($errors->has('content_uz'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('content_uz') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <label for="content_ru">Content [Russian]</label>
                                <textarea name="content_ru" class="my-editor" id="content_ru" cols="30" rows="10">{{ $outputnew->content_ru }}</textarea>
                                @if($errors->has('content_ru'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('content_ru') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <label for="content_en">Content [English]</label>
                                <textarea name="content_en" class="my-editor" id="content_en" cols="30" rows="10">{{ $outputnew->content_en }}</textarea>
                                @if($errors->has('content_en'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('content_en') }}
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
                                <img src="{{ asset($outputnew->image) }}" width="150" height="150" alt="">
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


