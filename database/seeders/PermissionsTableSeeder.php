<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id' => 1,
                'title' => 'user_management_access',
            ],
            [
                'id' => 2,
                'title' => 'permission_create',
            ],
            [
                'id' => 3,
                'title' => 'permission_edit',
            ],
            [
                'id' => 4,
                'title' => 'permission_show',
            ],
            [
                'id' => 5,
                'title' => 'permission_delete',
            ],
            [
                'id' => 6,
                'title' => 'permission_access',
            ],
            [
                'id' => 7,
                'title' => 'role_create',
            ],
            [
                'id' => 8,
                'title' => 'role_edit',
            ],
            [
                'id' => 9,
                'title' => 'role_show',
            ],
            [
                'id' => 10,
                'title' => 'role_delete',
            ],
            [
                'id' => 11,
                'title' => 'role_access',
            ],
            [
                'id' => 12,
                'title' => 'user_create',
            ],
            [
                'id' => 13,
                'title' => 'user_edit',
            ],
            [
                'id' => 14,
                'title' => 'user_show',
            ],
            [
                'id' => 15,
                'title' => 'user_delete',
            ],
            [
                'id' => 16,
                'title' => 'user_access',
            ],
            [
                'id' => 17,
                'title' => 'category_create',
            ],
            [
                'id' => 18,
                'title' => 'category_edit',
            ],
            [
                'id' => 19,
                'title' => 'category_show',
            ],
            [
                'id' => 20,
                'title' => 'category_delete',
            ],
            [
                'id' => 21,
                'title' => 'category_access',
            ],
            [
                'id' => 22,
                'title' => 'product_create',
            ],
            [
                'id' => 23,
                'title' => 'product_edit',
            ],
            [
                'id' => 24,
                'title' => 'product_delete',
            ],
            [
                'id' => 25,
                'title' => 'product_access',
            ],
            [
                'id' => 26,
                'title' => 'setting_create',
            ],
            [
                'id' => 27,
                'title' => 'setting_edit',
            ],
            [
                'id' => 28,
                'title' => 'setting_show',
            ],
            [
                'id' => 29,
                'title' => 'setting_delete',
            ],
            [
                'id' => 30,
                'title' => 'setting_access',
            ],
            [
                'id' => 31,
                'title' => 'event_create',
            ],
            [
                'id' => 32,
                'title' => 'event_edit',
            ],
            [
                'id' => 33,
                'title' => 'event_show',
            ],
            [
                'id' => 34,
                'title' => 'event_delete',
            ],
            [
                'id' => 35,
                'title' => 'event_access',
            ],
            [
                'id' => 36,
                'title' => 'newsletter_access',
            ],
            [
                'id' => 37,
                'title' => 'order_edit',
            ],
            [
                'id' => 38,
                'title' => 'order_show',
            ],
            [
                'id' => 39,
                'title' => 'order_access',
            ],
            [
                'id' => 40,
                'title' => 'order_item_edit',
            ],
            [
                'id' => 41,
                'title' => 'order_item_show',
            ],
            [
                'id' => 42,
                'title' => 'order_item_access',
            ],
            [
                'id' => 43,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
