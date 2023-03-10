<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class BannedUsers
{
    /**
     * @var Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Query\Builder[]|\Illuminate\Support\Collection
     */
    private \Illuminate\Support\Collection|array|\Illuminate\Database\Eloquent\Collection $filteredUsers;

    public function getBannedUsers($params): void
    {
        $query = User::withoutTrashed();

        if ($params['with-trashed']) {
            $query = User::withTrashed();
        }
        if ($params['trashed-only']) {
            $query = User::onlyTrashed();
        }
        if ($params['active-users-only']) {
            $query = $query->whereNotNull('activated_at');
        }
        if ($params['no-admin']) {
            $query = $query->whereHas('roles', function (Builder $builder) {
                $builder->where('name', '<>', 'admin');
            });
        }
        if ($params['admin-only']) {
            $query = $query->whereHas('roles', function (Builder $builder) {
                $builder->where('name', '=', 'admin');
            });
        }
        if ($params['sort-by']) {
            $query = $query->orderBy($params['sort-by']);
        }

        $query->select(['email', 'id', 'banned_at'])
            ->whereNotNull('banned_at');

        $this->filteredUsers = $query->get();
    }

    public function getFormatData(bool $headers = false): string
    {
        $formattedData = '';
        if ($headers) {
            $formattedData .= 'id;email;banned_at' . PHP_EOL;
        }
        /** @var User $user */
        foreach ($this->filteredUsers as $user) {
            //maybe use implode for this or store it as CSV with ; delimiter?
            $formattedData .= $user->id . ';' . $user->email . ";" . $user->banned_at . PHP_EOL;
        }

        return $formattedData;
    }
}
