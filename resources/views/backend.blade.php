
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('form')

            </div>
        </div>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                @include('table')
                
            </div>
        </div>
    </div>

@endsection
