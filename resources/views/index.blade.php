@extends('layouts.app')


@section('styles')

    <style>
        .note-list .btn{
            margin: 4px;
        }
    </style>

@endsection


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1 text-center note-list">
                @foreach ($objects as $o)
                    <a
                        href="{{ url($o->param) }}"
                        class="btn btn-default"
                    >
                        {{ $o->getTitle() }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>

@endsection
