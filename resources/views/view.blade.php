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
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <hr>
                <nav>
                    <ul class="pager">
                        @if(@$links['prev'])
                            <li>
                                <a href="{{ url($links['prev']->param) }}">
                                    {{ $links['prev']->getTitle() }}
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="{{ url('/') }}">
                                Index
                            </a>
                        </li>
                        @if(@$links['next'])
                            <li>
                                <a href="{{ url($links['next']->param) }}">
                                    {{ $links['next']->getTitle() }}
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </div>

@endsection
