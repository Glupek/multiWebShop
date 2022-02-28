@extends('dashboards.admins.layouts.admin-dash-layout')
@section('title', 'Dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                
                <div class="card-header">{{ __('Dashboard') }}</div>
                <h2>Admin: {{ Auth::user()->name }}</h2>
                <hr>
                DAShBOARD
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Je bent aangemeld!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection