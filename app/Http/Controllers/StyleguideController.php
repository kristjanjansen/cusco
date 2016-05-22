<?php

namespace App\Http\Controllers;

use Symfony\Component\Yaml\Yaml;
use Storage;

class StyleguideController extends Controller {

    public function index() {

        $components = collect(Storage::disk('resources')->allDirectories('views/components'))
            ->map(function($directory) {
                return Storage::disk('resources')->files($directory);
            })
            ->collapse()
            ->filter(function($filepath) {
                return pathinfo($filepath, PATHINFO_EXTENSION) == 'yaml';
            })
            ->map(function($filepath) {
                $component = (object) Yaml::parse(trim(Storage::disk('resources')->get($filepath)));
                $component->name = pathinfo($filepath, PATHINFO_FILENAME);
                return $component;
            })
            ->map(function($component) {
                $component->modifiers = collect(isset($component->modifiers) ? $component->modifiers : [])->prepend('');
                return $component;
            });
        
        return view('pages.styleguide', [
            'components' => $components
        ]);

    }

}
