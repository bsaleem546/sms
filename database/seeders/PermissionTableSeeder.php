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
//            'section-list',
//            'section-create',
//            'section-edit',
//            'section-delete',
//            'class-list',
//            'class-create',
//            'class-edit',
//            'class-delete',
//            'student-list',
//            'student-create',
//            'student-edit',
//            'student-delete',
//            'student-view-my-account',
//            'no-user',
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
//            'transfer-list',
//            'transfer-create',
//            'transfer-edit',
//            'transfer-delete',
//            'teacher-list',
//            'teacher-create',
//            'teacher-edit',
//            'teacher-delete',
//            'staff-list',
//            'staff-create',
//            'staff-edit',
//            'staff-delete',
//            'subject-list',
//            'subject-create',
//            'subject-edit',
//            'subject-delete',
//            'fee-list',
//            'fee-create',
//            'fee-edit',
//            'fee-delete',
//            's_att-list',
//            's_att-create',
//            's_att-edit',
//            's_att-delete',
//            'st_atd-list',
//            'st_atd-create',
//            'st_atd-edit',
//            'st_atd-delete',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
