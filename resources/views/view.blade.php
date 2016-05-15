@extends('layouts.app')


@section('styles')

    <style>
        code, kbd, pre, samp {
            font-family: monospace;
            font-size: .815em;
        }
    </style>

@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div>
                    {!! $object->getContent() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
