@extends('layouts.admin')

@section('content')
<div class="page-content-wrapper ">

    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">All Experts</h4>
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
                            <th>Events</th>
                            <th>Name [Uzbek]</th>
                            <th>Name [Russian]</th>
                            <th>Name [English]</th>
                            <th colspan="2" style="width: 2%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($expertpersons as $expertperson)
                        <tr>
                            <td>{{ $expertperson->id }}</td>
                            <td>
                                <img src="{{ asset($expertperson->image) }}" alt="" width="35" height="35">
                            </td>
                            <td>{{ $expertperson->centerabout->title_en ?? "" }}</td>
                            <td>{{ $expertperson->title_uz }}</td>
                            <td>{{ $expertperson->title_ru }}</td>
                            <td>{{ $expertperson->title_en }}</td>
                            <td>
                                <a href="{{ route('expertpeople.edit', $expertperson->id) }}" class="btn btn-info btn-icon">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('expertpeople.destroy', $expertperson->id) }}" method="POST">
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
                {!! $expertpersons->links() !!}
            </div>
        </div>
    </div>
</div>
@endsection
