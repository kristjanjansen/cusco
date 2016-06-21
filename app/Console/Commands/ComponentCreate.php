<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class ComponentCreate extends Command
{

    protected $signature = 'make:component { name } {--vue}';

    public function handle()
    {

        $name = $this->argument('name');
        $dir = "resources/views/components/$name"; 
        
        Storage::disk('root')->makeDirectory($dir);

        $element = 'title';

        $yaml = [
            "with:",
            "    $element: I am $name",
        ];

        Storage::disk('root')->put("$dir/$name.yaml", implode("\n", $yaml));

        $css = [
            "@import \"variables\";",
            ".$name {",
            "}",
            "    .$name"."__"."$element {",
            "    }"
        ];

        Storage::disk('root')->put("$dir/$name.css", implode("\n\n", $css));

        $vue = [
            "<template>",
            "    <div class=\"$name {{ isclasses }}\">",
            "        <div class=\"$name"."__"."$element\">",
            "            {{ vars.title }} {{ message }}",
            "        </div>",
            "    </div>",
            "</template>",
            "<script>",
            "    import Component from '../Component';",
            "    export default Component.extend({",
            "        data() {",
            "            return {", 
            "                message: 'from Vue'",
            "            }",
            "        }",
            "    })",
            "</script>"
        ];

        $blade = [
            "<div class=\"$name {{ \$isclasses }}\">",
            "    <div class=\"$name"."__"."$element\">",
            "        {{ \$title }}",
            "    </div>",
            "</div>"
        ];

        if ($this->option('vue')) {

            Storage::disk('root')->put("$dir/$name.vue", implode("\n\n", $vue));
            $this->info("\nVue component $dir created");
            $this->line("\nYour next steps:");
            $this->line("\n    1. Edit resources/views/main.js to import your new component");
            $this->line("    2. Run gulp\n");

        } else {

            Storage::disk('root')->put("$dir/$name.blade.php", implode("\n\n", $blade));
            $this->info("\nBlade component $dir created\n");

        }


    }

}
