<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Libraries\WarmUp as LibrariesWarmUp;

class WarmUp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'survey:warmup {cachename=all} {--reset=0} {--keepoldcache=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Warmup the survey, 1st build the cache data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info(LibrariesWarmUp::getInstance()->handle($this->input->getArguments(), $this->input->getOptions()));
    }
}
