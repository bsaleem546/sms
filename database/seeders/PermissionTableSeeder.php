<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
//            'role-list',
//            'role-create',
//            'role-edit',
//            'role-delete',
//            'department-list',
//            'department-create',
//            'department-edit',
//            'department-delete',
//            'user-list',
//            'user-create',
//            'user-edit',
//            'user-delete',
//                'section-list',
//                'section-create',
//                'section-edit',
//                'section-delete',
//            'class-list',
//            'class-create',
//            'class-edit',
//            'class-delete',
//            'student-list',
//            'student-create',
//            'student-edit',
//            'student-delete',
//                'student-view-my-account',
//            'no-user'
//            'transport-list',
//            'transport-create',
//            'transport-edit',
//            'transport-delete',
//            'troute-list',
//            'troute-create',
//            'troute-edit',
//            'troute-delete',
//            'session-list',
//            'session-create',
//            'session-edit',
//            'session-delete',
//            'reg-list',
//            'reg-status-change',
//            'admission-confirm',
//            'admission-list',
//            'admission-create',
//            'admission-edit',
//            'admission-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
