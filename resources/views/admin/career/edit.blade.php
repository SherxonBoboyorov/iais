@extends('layouts.admin')

@section('content')

<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Careers and Internships</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('career.update', $career->id ) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-4">
                            <label for="document_title_uz">Title [Uzbek]</label>
                            <input type="text" id="document_title_uz" value="{{ $career->document_title_uz }}" class="form-control" name="document_title_uz">
                            @if($errors->has('document_title_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('document_title_uz') }}
                            </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <label for="document_title_ru">Title [Russian]</label>
                            <input type="text" id="document_title_ru" value="{{ $career->document_title_ru }}" class="form-control" name="document_title_ru">
                            @if($errors->has('document_title_ru'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('document_title_ru') }}
                            </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <label for="document_title_en">Title [English]</label>
                            <input type="text" id="document_title_en" value="{{ $career->document_title_en }}" class="form-control" name="document_title_en">
                            @if($errors->has('document_title_en'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('document_title_en') }}
                            </div>
                            @endif
                        </div>
                    </div><br>


                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="content_uz">Content [Uzbek]</label>
                            <textarea name="content_uz" class="my-editor" id="content_uz" cols="30" rows="10">{{ $career->content_uz }}</textarea>
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
                            <textarea name="content_ru" class="my-editor" id="content_ru" cols="30" rows="10">{{ $career->content_ru }}</textarea>
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
                            <textarea name="content_en" class="my-editor" id="content_en" cols="30" rows="10">{{ $career->content_en }}</textarea>
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
                            <label for="image">File</label>
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
                            {{ asset($career->image) }}
                        </div>
                    </div>
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
