<?php

namespace VendorName\Skeleton\Commands;

use Illuminate\Console\Command;

class UnInstallSkeletonCommand extends Command
{
    public $signature = 'skeleton:uninstall';

    public $description = 'To remove configuration of skeleton module';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
