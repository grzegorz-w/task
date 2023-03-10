<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class BannedUsersFileWriter
{
    private string $formattedDataForCsv = '';

    /**
     * @param $banedUsers
     * @return bool
     */
    public function savefile(string $banedUsers, string $absolutePath): bool
    {
        return file_put_contents(__DIR__.$absolutePath, $banedUsers) !== false;
    }
}
