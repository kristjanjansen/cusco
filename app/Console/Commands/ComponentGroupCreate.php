<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class ComponentGroupCreate extends Command
{

    protected $signature = 'make:componentgroup { name }';

    public function handle()
    {

        $name = $this->argument('name');
        $dir = "app/Http/ComponentGroups"; 
        
        $php = [
            "<?php",
            "namespace App\Http\ComponentGroups;",
            "use Request;",
            "class $name {",
            "    public function render(Request \$request, \$content)\n    {",
            "        return component('Placeholder')\n            ->with('title', \$content->title);",
            "    }",
            "}"
        ];

        Storage::disk('root')->put("$dir/$name.php", implode("\n\n", $php));

        $this->line("$dir/$name.php created");

    }

}







