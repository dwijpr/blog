@extends('layouts.app')


@section('styles')

    <style>
        .note-list a {
            display: block;
            margin: 6px 12px;
        }

        .search-title {
            margin: 64px;
            margin-bottom: 12px;
        }

        .list li{
            display: inline-block;
        }

        ul.list, ul.list li {
            margin: 0;
            padding: 0;
        }
    </style>

@endsection


@section('content')

    <div class="container" id="note-index">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="search-title">
                    <input
                        type="text"
                        class="form-control search"
                        autofocus
                    >
                </div>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center note-list">
                <ul class="list">
                    @foreach ($objects as $o)
                        <li>
                            <a
                                href="{{ url($o->param) }}"
                                class="title"
                            >
                                <ins>{{ $o->getTitle() }}</ins>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

    <script>
        var options = {
          valueNames: [ 'title' ],
          item: '<a class="title"></a>',
        };
        var userList = new List('note-index', options);
    </script>

@endsection