<?php

namespace App\Models;

use Illuminate\Support\Facades\File;

class Blog
{
    public static function all()
    {
        $blogs = [];
        $files = File::files(resource_path('/blogs'));
        foreach ($files as $file) {
            $blogs[] = $file->getContents();
        }
        return $blogs;
    }

    public static function find($filename)
    {
        $path = resource_path('/blogs/' . $filename . '.html');
        if (!file_exists($path)) {
            abort(404);
        }
        $fileContent = cache()->remember($filename, 30, function () use ($path) {
            return file_get_contents($path); //string
        });
        return $fileContent; //problem
    }
}
