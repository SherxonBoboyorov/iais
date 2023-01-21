@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">All Centers</h4>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="card">
            <div class="card-body">

                @if(session('message'))

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    {{ session('message') }}
                </div>

                @endif

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 2%;">#</th>
                            <th>Image</th>
                            <th>Centers</th>
                            <th>Title [Uzbek]</th>
                            <th>Title [Russian]</th>
                            <th>Title [English]</th>
                            <th colspan="2" style="width: 2%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($centerabouts as $centerabout)
                        <tr>
                            <td>{{ $centerabout->id }}</td>
                            <td>
                                <img src="{{ asset($centerabout->image) }}" alt="" width="35" height="35">
                            </td>
                            <td>{{ $centerabout->centerfilter->tropic_en ?? "" }}</td>
                            <td>{{ $centerabout->title_uz }}</td>
                            <td>{{ $centerabout->title_ru }}</td>
                            <td>{{ $centerabout->title_en }}</td>
                            <td>
                                <a href="{{ route('centerabout.edit', $centerabout->id) }}" class="btn btn-info btn-icon">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('centerabout.destroy', $centerabout->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-icon">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {!! $centerabouts->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
