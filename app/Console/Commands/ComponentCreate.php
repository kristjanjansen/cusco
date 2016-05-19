<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Storage;

class ComponentCreate extends Command
{

    protected $signature = 'component:create';


    public function handle()
    {
        $dirs = Storage::disk('resources')->allDirectories('views/components');

        $this->line($dirs);

    }
}
