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

    public function backend($key = false) {
        if ($key) {
            $object = Note::get($key);
            view()->share('object', $object);
        }
        $objects = Note::all();
        return view('backend', ['objects' => $objects]);
    }

    public function destroy() {
        Note::get(request()->input('key'))->delete();
        return redirect('backend');
    }

    public function update() {
        $key = request()->input('key');
        $format = 'Y-m-d H:i:s';
        $this->validate(request(), [
            'datetime' => 'required|date_format:'.$format,
            'title' => 'required',
        ]);
        return redirect('backend');
    }

    public function store() {
        extract(request()->all());
        $format = 'Y-m-d H:i:s';
        $this->validate(request(), [
            'datetime' => 'required|date_format:'.$format,
            'title' => 'required',
        ]);
        $datetime = DateTime::createFromFormat(
            $format, $datetime
        );
        Note::create($datetime, $title);
        return redirect('backend');
    }
}
