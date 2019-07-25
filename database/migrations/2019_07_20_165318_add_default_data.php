<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
use App\Role;

class AddDefaultData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $adminRole = Role::updateOrCreate([
            'display_name'      =>  'admin',
            'is_admin'          =>  true
        ]);
        $userRole = Role::updateOrCreate([
            'display_name'      =>  'user',
        ]);

        $user = User::updateOrCreate([
            'name'      =>  'arvin',
            'email'     =>  'vin.shelby@gmail.com',
            'password'  =>  bcrypt('password'),
            'role_id'   =>  $adminRole->id,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
