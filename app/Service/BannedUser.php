<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class BannedUser
{
public function getBannedUsers($params){
    $query = null;

    if($params['with-trashed']) {
        $query = User::withTrashed();
    } else if ($params['trashed-only']) {
        $query = User::onlyTrashed();
    } else {
        $query = User::withoutTrashed();
    }

    $query = $query->whereNotNull('banned_at');

    if($params['active-users-only']) {
        $query = $query->whereNull('activated_at');
    }

    if($params['no-admin']) {
        $query = $query->whereHas('roles', function (Builder $builder) {
            $builder->where('name', '<>', 'ADMIN');
        });
    }

    if($params['admin-only']) {
        $query = $query->whereHas('roles', function (Builder $builder) { $builder->where('name', 'admin'); });
    }

    $o = [];
    /** @var User $user */
    foreach($query->get() as $user) {
        $o[] = [
            'email' => $user->email,
            'banned_at' => $user->banned_at,
            'id' => $user->id,
        ];
    }
    $uu = '';
    foreach ($o as $u) {
        $uu .= $u['id']. ';'.$u['email'] . ";" . $u['banned_at'].PHP_EOL;
    }
    if($params['with-headers']) {
        echo 'id;email;banned_at';
    }
    return $uu;
}
}
