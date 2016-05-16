<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Note;
use File, DateTime;

class IndexController extends Controller
{
    private $datetimeFormat = 'Y-m-d H:i:s';
    public function index() {
        $objects = Note::all();
        return view('index', ['objects' => $objects]);
    }

    public function view($key) {
        $object = Note::get($key);
        $objects = Note::all();
        $index = false;
        foreach ($objects as $i => $o) {
            if ($object->param === $o->param) {
                $index = $i;
                break;
            }
        }
        if ($index !== false) {
            $links['next'] = $index>0?$objects[$index-1]:false;
            $links['prev'] = $index+1<count($objects)?$objects[$index+1]:false;
            view()->share('links', $links);
        }
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

    private function change() {
        extract(request()->all());
        $format = $this->datetimeFormat;
        $this->validate(request(), [
            'datetime' => 'required|date_format:'.$format,
            'title' => 'required',
        ]);
        $datetime = DateTime::createFromFormat(
            $format, $datetime
        );
        return [
            'title' => $title,
            'datetime' => $datetime,
            'key' => @$key,
        ];
    }

    public function store() {
        extract($this->change());
        Note::create($datetime, $title, $key);
        return redirect('backend');
    }
}
