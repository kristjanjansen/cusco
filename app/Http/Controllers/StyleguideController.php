<?php

namespace App\Http\Controllers;

use Symfony\Component\Yaml\Yaml;
use Storage;

class StyleguideController extends Controller {

    public function index() {

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
            ->map(function($component) {
                $with = collect($component->with ?? [])
                    ->map(function($value) {
                        if (is_array($value) && array_key_exists('component', $value)) {
                            $value = component($value['component'], [$value['with']])
                                ->is($value['is'] ?? null);
                        }
                        return $value;
                    });
               $component->with = $with;
               return $component;
            });
        
        return view('pages.styleguide', [
            'components' => $components
        ]);

    }

}
