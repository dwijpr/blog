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

    public function getContent() {
        return (new Parsedown)->text(
            File::get(replace_ext($this->info->getPathname(), 'md'))
        );
    }

    public function delete() {
        $path = base_path('resources/notes');
        $pathname = $path.'/'.$this->param;
        $fileExts = [ 'json', 'md'];
        foreach ($fileExts as $ext) {
            File::delete($pathname.'.'.$ext);
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
        $path = base_path('resources/notes');
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
        return $notes;
    }
}
