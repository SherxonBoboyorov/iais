@extends('layouts.admin')

@section('title', 'Admin')

@section('content')

<div class="page-content-wrapper ">

    <div class="topbar">
        <nav class="navbar-custom">
            <ul class="list-inline float-right mb-0">

                <li class="list-inline-item dropdown notification-list">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('admin/dist/img/avatar-1.jpg') }}" style="width: 40px; height: 40px;" alt="user" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <a class="dropdown-item" href="{{ route('logout') }}"><i class="mdi mdi-logout m-r-5 text-muted"></i>Logout</a>
                    </div>
                </li>
            </ul>
            <div class="clearfix" style="background-color: #007bff; height: 57.5px;"></div>
        </nav>
    </div>

            <div class="row">
                <style>
                    .row {
                        display: flex;
                        margin-left: 7.5px;
                        flex-wrap: wrap;
                        counter-reset: unset
                    }
                </style>
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group float-right">
                            <ol class="breadcrumb hide-phone p-0 m-2">
                                <li class="breadcrumb-item"><a>Iais</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                        <style>
                            .page-title {
                                margin-left: 15px;
                                margin-top: 15px;
                            }
                        </style>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="col-3 align-self-center">
                                            <div class="round">
                                                <i class="mdi mdi-eye"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 align-self-center text-right">
                                            <div class="m-l-10">
                                                <h5 class="mt-0">18090</h5>
                                                <p class="mb-0 text-muted">Visits Today <span class="badge bg-soft-success"><i class="mdi mdi-arrow-up"></i>2.35%</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress mt-3" style="height:3px;">
                                        <div class="progress-bar  bg-success" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex flex-row">
                                        <div class="col-3 align-self-center">
                                            <div class="round">
                                                <i class="mdi mdi-account-multiple-plus"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 text-right align-self-center">
                                            <div class="m-l-10 ">
                                                <h5 class="mt-0">562</h5>
                                                <p class="mb-0 text-muted">New Users</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress mt-3" style="height:3px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 48%;" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="card">
                                <style>
                                    .card {
                                        margin-right: 15px;
                                    }
                                    </style>
                                <div class="card-body">
                                    <div class="search-type-arrow"></div>
                                    <div class="d-flex flex-row">
                                        <div class="col-3 align-self-center">
                                            <div class="round ">
                                                <i class="mdi mdi-cart"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 align-self-center text-right">
                                            <div class="m-l-10 ">
                                                <h5 class="mt-0">7514</h5>
                                                <p class="mb-0 text-muted">New Orders</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progress mt-3" style="height:3px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <style>
            .dropdown-toggle::after{
                display: none;
            }
        </style>

    {{-- </div> --}}

@endsection
