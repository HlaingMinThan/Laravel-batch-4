<?php

namespace App\Models;

use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Blog
{

    public function __construct(public $title, public $slug, public $body)
    {
    }

    public static function all()
    {
        $files = collect(File::files(resource_path('/blogs'))); //collect([])->each()
        $blogs  = $files->map(function ($file) {
            $yamlObj = YamlFrontMatter::parse($file->getContents());
            $b = new Blog($yamlObj->title, $yamlObj->slug, $yamlObj->body());
            return $b;
        });
        return $blogs;
    }

    public static function find($slug)
    {
        return static::all()->firstWhere('slug', $slug);
    }

    public static function findOrFail($slug)
    {
        if (!$blogObj = static::find($slug)) {
            abort(404);
        }
        return $blogObj;
    }
}
