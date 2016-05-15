<?php

namespace App;

use Carbon\Carbon;
use File, Parsedown;
use Symfony\Component\Finder\SplFileInfo as FileInfo;

class Note
{
    private $info, $data, $carbon;

    public function __construct(FileInfo $fileInfo) {
        $this->info = $fileInfo;
        $this->data = json_decode(File::get($fileInfo->getPathname()));
        $this->carbon = Carbon::createFromFormat(
            'Y/m/d H:i:s'
            , $fileInfo->getRelativePath().' '.(@$this->data->time?:'00:00:00')
        );
        $this->param = strip_ext($fileInfo->getRelativePathname());
    }

    public function getDateTime() {
        return $this->carbon;
    }

    public function getTitle() {
        return @$this->data->title;
    }

    public function getMd() {
        return File::get(
            base_path(config('app.notes_path'))
            .'/'.$this->param.'.md'
        );
    }

    public function getContent() {
        view()->addLocation(base_path(config('app.notes_path')));
        view()->addNamespace('note', base_path(config('app.notes_path')));
        view()->addExtension('md', 'blade');
        $view = view('note::'.$this->param)->render();
        return (new Parsedown)->text($view);
    }

    public function delete() {
        $path = base_path('resources/notes');
        $pathname = $path.'/'.$this->param;
        $fileExts = [ 'json', 'md'];
        foreach ($fileExts as $ext) {
            File::delete($pathname.'.'.$ext);
        }
    }

    public static function create($datetime, $title, $key = false) {
        if ($key) {
            $note = Note::get($key);
        }
        $path = base_path(config('app.notes_path'));
        $path .= '/'.$datetime->format('Y/m/d');
        File::makeDirectory($path, 0755, true, true);
        $path .= '/'.to_ascii($title);
        File::put($path.'.json', json_encode([
            'title' => $title,
            'time' => $datetime->format('H:i:s'),
        ], JSON_PRETTY_PRINT));
        $md = view('template', [
            'title' => $title,
            'separator' => x('=', strlen($title)),
        ])->render();
        if ($key) {
            $md .= "\n".remove_line($note->getMd(), 2);
        }
        File::put($path.'.md', $md);
        $newKey = $datetime->format('Y/m/d/').$title;
        if ($key and $note->param !== $newKey) {
            $note->delete();
        }
    }

    public static function get($key) {
        return head(Note::fetch($key));
    }

    public static function all() {
        return Note::fetch();
    }

    private static function fetch($key = false) {
        $notes = [];
        $path = base_path(config('app.notes_path'));
        if ($key) {
            $keys = to_segments($key);
            $key = array_pop($keys);
            $jsonFile = '/'.$key.'.json';
            $aPath = $path.to_path($keys).$jsonFile;
            $rPath = to_path($keys, false);
            $rPathname = $rPath.$jsonFile;
            if (!file_exists($aPath)) {
                abort(404);
            }
            $files = [new FileInfo($aPath, $rPath, $rPathname)];
        } else {
            $files = File::allFiles($path);
        }
        $infos = array_filter($files, function($file) {
            return $file->getExtension() === 'json';
        });
        foreach ($infos as $info) {
            $notes[] = new Note($info);
        }
        usort($notes, function($a, $b) {
            return $a->carbon < $b->carbon;
        });
        return $notes;
    }
}
