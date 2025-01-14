<?php

namespace VendorName\Skeleton\Commands;

use Illuminate\Console\Command;

class InstallSkeletonCommand extends Command
{
    public $signature = 'skeleton:install';

    public $description = 'To load configuration of skeleton module';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
