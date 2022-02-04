<?php

namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
    public static function defaultPermissions()
    {
        return [
            // Users
            'view_users',
            'add_users',
            'edit_users',
            'delete_users',
        ];
    }
}
