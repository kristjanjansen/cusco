<?php

namespace App\Http\Controllers;

use Symfony\Component\Yaml\Yaml;
use Storage;

class StyleguideController extends Controller {

    public function index() {

        $icons = collect(Storage::disk('root')->files('resources/svg'))
            ->map(function($filename) {
                return pathinfo($filename, PATHINFO_FILENAME);
            })
            ->toArray();

        $components = collect(Storage::disk('root')->allDirectories('resources/views/components'))
            ->map(function($directory) {
                return Storage::disk('root')->files($directory);
            })
            ->collapse()
            ->filter(function($filepath) {
                return pathinfo($filepath, PATHINFO_EXTENSION) == 'yaml';
            })
            ->map(function($filepath) {
                $component = (object) Yaml::parse(trim(Storage::disk('root')->get($filepath)));
                $component->name = pathinfo($filepath, PATHINFO_FILENAME);
                return $component;
            })
            ->map(function($component) {
                $component->is = $component->is ?? [];
                return $component;
            })
            ->map(function($component) use ($icons) {
                if ($component->name == 'Icons') {
                    $component->data['icons'] = $icons;
                }
                return $component;
            });
        
        return view('pages.styleguide', [
            'components' => $components
        ]);

    }

}
