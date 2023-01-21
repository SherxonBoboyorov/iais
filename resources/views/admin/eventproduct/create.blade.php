@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Event product</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('eventproduct.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-4">
                            <label>Events</label>
                            <select name="eventcategory_id" id="eventcategory_id" class="form-control">
                                @foreach ($eventcategories as $eventcategory)
                                    <option value="{{ $eventcategory->id }}">{{ $eventcategory->title_en }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('eventcategory_id'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('eventcategory_id') }}
                            </div>
                            @endif
                        </div>

                        <div class="col-md-4">
                            <label>Centers</label>
                            <select name="centerabout_id" id="centerabout_id" class="form-control">
                                @foreach ($centerabouts as $centerabout)
                                    <option value="{{ $centerabout->id }}">{{ $centerabout->title_ru }}</option>
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
                            <label for="title_uz">Title [Uzbek]</label>
                            <input type="text" id="title_uz" class="form-control" name="title_uz">
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
                            <input type="text" id="title_ru" class="form-control" name="title_ru">
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
                            <input type="text" id="title_en" class="form-control" name="title_en">
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
                            <label for="description_uz">Video content [Uzbek]</label>
                            <textarea name="description_uz" class="my-editor" id="description_uz" cols="30" rows="10"></textarea>
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
                            <label for="description_ru">Video content [Russian]</label>
                            <textarea name="description_ru" class="my-editor" id="description_ru" cols="30" rows="10"></textarea>
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
                            <label for="description_en">Video content [English]</label>
                            <textarea name="description_en" class="my-editor" id="description_en" cols="30" rows="10"></textarea>
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
                            <div class="col-md-12">
                                <label for="ongoing_content_uz">Content [Uzbek]</label>
                                <textarea name="ongoing_content_uz" class="my-editor" id="ongoing_content_uz" cols="30" rows="10"></textarea>
                                @if($errors->has('ongoing_content_uz'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('ongoing_content_uz') }}
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <label for="ongoing_content_ru">Content [Russian]</label>
                                <textarea name="ongoing_content_ru" class="my-editor" id="ongoing_content_ru" cols="30" rows="10"></textarea>
                                @if($errors->has('ongoing_content_ru'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('ongoing_content_ru') }}
                                </div>
                                @endif
                            </div>
                        </div>

                        <div class="row" style="margin-top: 15px">
                            <div class="col-md-12">
                                <label for="ongoing_content_en">Content [English]</label>
                                <textarea name="ongoing_content_en" class="my-editor" id="ongoing_content_en" cols="30" rows="10"></textarea>
                                @if($errors->has('ongoing_content_en'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    {{ $errors->first('ongoing_content_en') }}
                                </div>
                                @endif
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-12">
                                <label for="frame">Link Youtube</label>
                                <input type="text" id="frame" class="form-control" name="frame">
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
                        </div><br>


                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-success btn-block">Save</button>
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


