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
        $dir = "resources/views/components/$name"; 
        
        Storage::disk('root')->makeDirectory($dir);

        $element = 'title';

        $yaml = [
            "data:",
            "    $element: $name",
        ];

        Storage::disk('root')->put("$dir/$name.yaml", implode("\n", $yaml));

        $blade = [
            "<div class=\"$name {{ \$is }}\">",
            "    {{ \$title }}",
            "</div>"
        ];

        Storage::disk('root')->put("$dir/$name.blade.php", implode("\n\n", $blade));

        $css = [
            "@import \"variables\";",
            ".$name {",
            "}",
            "    .$name"."__"."$element {",
            "    }"
        ];

        Storage::disk('root')->put("$dir/$name.css", implode("\n\n", $css));

        $this->line("$dir created");

    }

}
