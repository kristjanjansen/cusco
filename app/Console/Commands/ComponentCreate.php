<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class ComponentCreate extends Command
{

    protected $signature = 'make:component { name }';

    public function handle()
    {

        $name = $this->argument('name');
        $dir = "views/components/$name"; 
        
        Storage::disk('resources')->makeDirectory($dir);

        $element = 'title';
        $modifiers = '--alternate';

        $yaml = [
            "data:",
            "    $element: $name",
            "modifiers:",
            "    - $modifiers"
        ];

        Storage::disk('resources')->put("$dir/$name.yaml", implode("\n", $yaml));

        $blade = [
            "<div class=\"$name {{ \$modifiers }} \">",
            "    {{ \$title }}",
            "</div>"
        ];

        Storage::disk('resources')->put("$dir/$name.blade.php", implode("\n\n", $blade));

        $css = [
            "@import \"variables\"",
            ".$name {",
            "}",
            ".$name$modifiers {",
            "}",
            "    .$name"."__"."$element {",
            "    }"
        ];

        Storage::disk('resources')->put("$dir/$name.css", implode("\n\n", $css));

        $this->line("$dir created");

    }

}
