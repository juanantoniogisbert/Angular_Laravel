@extends('layouts.master')
@section('page-title', 'Please login')
@section('page-content')
    <div class="row">
        <div class="col-md-7 col-md-offset-2">
            @include('partials.flash-messages')
        </div>
        <div class="col-md-9 col-md-offset-1">
            <ul>
                <li>
                    <a href="{{ action('AuthController@auth', ['provider' => 'github']) }}" class="btn btn-block btn-lg btn-social btn-github social-button">
                        <span class="fa fa-github"></span> login with GitHub
                    </a>
                </li>
            </ul>
        </div>
    </div>
@stop