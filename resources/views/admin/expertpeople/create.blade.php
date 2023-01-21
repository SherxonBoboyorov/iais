@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Add Experts</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <!-- end page title end breadcrumb -->
        <form action="{{ route('expertpeople.store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="card">
                <div class="card-body">
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-3">
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
                        <div class="col-md-3">
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
                        <div class="col-md-3">
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
                        <div class="col-md-3">
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
                            <label for="content_uz">Content [Uzbek]</label>
                            <textarea name="content_uz" class="my-editor" id="content_uz" cols="30" rows="10"></textarea>
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
                            <textarea name="content_ru" class="my-editor" id="content_ru" cols="30" rows="10"></textarea>
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
                            <textarea name="content_en" class="my-editor" id="content_en" cols="30" rows="10"></textarea>
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

                     <h1 style="color: color: #123654;"><hr> Biography</h1>

                     <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="biography_uz">Biography [Uzbek]</label>
                            <textarea name="biography_uz" class="my-editor" id="biography_uz" cols="30" rows="10"></textarea>
                            @if($errors->has('biography_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('biography_uz') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="biography_ru">Biography [Russian]</label>
                            <textarea name="biography_ru" class="my-editor" id="biography_ru" cols="30" rows="10"></textarea>
                            @if($errors->has('biography_ru'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('biography_ru') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="biography_en">Biography [English]</label>
                            <textarea name="biography_en" class="my-editor" id="biography_en" cols="30" rows="10"></textarea>
                            @if($errors->has('biography_en'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('biography_en') }}
                            </div>
                            @endif
                        </div>
                    </div><br>

                    <h1 style="color: #123654;"><hr>Publications</h1>


                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="publication_uz">Publications [Uzbek]</label>
                            <textarea name="publication_uz" class="my-editor" id="publication_uz" cols="30" rows="10"></textarea>
                            @if($errors->has('publication_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('publication_uz') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="publication_ru">Publications [Russian]</label>
                            <textarea name="publication_ru" class="my-editor" id="publication_ru" cols="30" rows="10"></textarea>
                            @if($errors->has('publication_ru'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('publication_ru') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="publication_en">Publications [English]</label>
                            <textarea name="publication_en" class="my-editor" id="publication_en" cols="30" rows="10"></textarea>
                            @if($errors->has('publication_en'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('publication_en') }}
                            </div>
                            @endif
                        </div>
                    </div><br>


                    <h1 style="color: #123654;"><hr>Contact</h1>


                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="contact_uz">Contact [Uzbek]</label>
                            <textarea name="contact_uz" class="my-editor" id="contact_uz" cols="30" rows="10"></textarea>
                            @if($errors->has('contact_uz'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('contact_uz') }}
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="contact_ru">Contact [Russian]</label>
                            <textarea name="contact_ru" class="my-editor" id="contact_ru" cols="30" rows="10"></textarea>
                            @if($errors->has('contact_ru'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('contact_ru') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="row" style="margin-top: 15px">
                        <div class="col-md-12">
                            <label for="contact_en">Contact [English]</label>
                            <textarea name="contact_en" class="my-editor" id="contact_en" cols="30" rows="10"></textarea>
                            @if($errors->has('contact_en'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                {{ $errors->first('contact_en') }}
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

