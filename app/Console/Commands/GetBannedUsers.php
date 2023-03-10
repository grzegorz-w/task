<?php

namespace App\Console\Commands;

use App\Service\BannedUsers;
use App\Service\BannedUsersFileWriter;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as CommandAlias;

class GetBannedUsers extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'banned-users:get {save-to?} {--active-users-only} {--with-trashed} {--trashed-only} {--no-admin} {--admin-only} {--sort-by=email} {--with-headers}';

    /**
     * The console command description.
     */
    protected $description = 'Get banned users';

    /**
     * Execute the console command.
     */
    public function handle(BannedUsers $bannedUser, BannedUsersFileWriter $bannedUsersFileWriter)
    {

        $bannedUser->getBannedUsers($this->option());
        $output = $bannedUser->getFormatData();
        echo($output);
        if ($this->argument('save-to')) {
            $bannedUsersFileWriter->savefile($output, $this->argument('save-to'));
        }

        return CommandAlias::SUCCESS;
    }
}
