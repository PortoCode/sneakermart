<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currentTimestamp = \DB::raw('CURRENT_TIMESTAMP');

        // Roles
        $roles = config('enums.roles');
        foreach($roles as $key => $role){
            $role[$key] = array_merge($role, ['created_at' => $currentTimestamp, 'updated_at' => $currentTimestamp]);
        }
        \DB::table('roles')->insert($roles);

        $users = [
            [
                'email' => 'admin@sneakermart.com',
                'password' => bcrypt('Sneakermart'),
                'name' => 'Admin',
                'cpf' => '111.111.111-11',
                'phone_number' => '(35) 11111-1111',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'email' => 'vendedor@sneakermart.com',
                'password' => bcrypt('Sneakermart'),
                'name' => 'Vendedor',
                'cpf' => '222.222.222-22',
                'phone_number' => '(35) 22222-2222',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ],
            [
                'email' => 'comprador@sneakermart.com',
                'password' => bcrypt('Sneakermart'),
                'name' => 'Comprador',
                'cpf' => '333.333.333-33',
                'phone_number' => '(35) 33333-3333',
                'created_at' => $currentTimestamp,
                'updated_at' => $currentTimestamp,
            ]
        ];
        \DB::table('users')->insert($users);

        // Insert roles into users
        \DB::table('model_has_roles')->insert(['role_id' => config('enums.roles.ADMIN.id'), 'model_type' => 'App\Models\User','model_id' => 1]);
        \DB::table('model_has_roles')->insert(['role_id' => config('enums.roles.USER.id'), 'model_type' => 'App\Models\User','model_id' => 2]);
        \DB::table('model_has_roles')->insert(['role_id' => config('enums.roles.USER.id'), 'model_type' => 'App\Models\User','model_id' => 3]);
    }
}
