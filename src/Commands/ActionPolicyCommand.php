<?php

namespace Msr\ActionPolicy\Commands;

use Illuminate\Console\Command;

class ActionPolicyCommand extends Command
{
    public $signature = 'laravel-action-policy';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
