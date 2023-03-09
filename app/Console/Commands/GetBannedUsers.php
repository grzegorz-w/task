<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Service\BannedUser;
use Illuminate\Console\Command;

class GetBannedUsers extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'banned-users:get {save-to?} {--active-users-only} {--with-trashed} {--trashed-only} {--no-admin} {--admin-only} {sort-by=email} {--with-headers}';

    /**
     * The console command description.
     */
    protected $description = 'Get banned users';

    /**
     * Execute the console command.
     */
    public function handle(BannedUser $bannedUser)
    {
        $uu = $bannedUser->getBannedUsers($this->option());
        echo ($uu);
        if($this->argument('save-to')) {
            file_put_contents(explode('=',$this->argument('save-to'))[1],$uu);
        }
    }
}
