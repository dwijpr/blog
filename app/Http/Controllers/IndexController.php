<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Note;
use File, DateTime;

class IndexController extends Controller
{
    public function index() {
        $objects = Note::all();
        return view('index', ['objects' => $objects]);
    }

    public function view($key) {
        $object = Note::get($key);
        return view('view', ['object' => $object]);
    }

    public function backend() {
        $objects = Note::all();
        return view('backend', ['objects' => $objects]);
    }

    public function destroy() {
        Note::get(request()->input('key'))->delete();
        return redirect('backend');
    }

    public function store() {
        extract(request()->all());
        $format = 'm/d/Y H:i:s';
        $this->validate(request(), [
            'datetime' => 'required|date_format:'.$format,
            'title' => 'required',
        ]);
        $datetime = DateTime::createFromFormat(
            $format, $datetime
        );
        $path = base_path('resources/notes');
        $path .= '/'.$datetime->format('Y/m/d');
        File::makeDirectory($path, 0755, true, true);
        $path .= '/'.to_ascii($title);
        File::put($path.'.json', json_encode([
            'title' => $title,
            'time' => $datetime->format('H:i:s'),
        ], JSON_PRETTY_PRINT));
        File::put($path.'.md', view('template', [
            'title' => $title,
            'separator' => x('=', strlen($title)),
        ])->render());
        return redirect('backend');
    }
}
