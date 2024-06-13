<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_admin', function (Blueprint $table) {
            $table->primary(['admin_id', 'role_id']);
            $table->foreignId('admin_id')->constrained()->onDelete('cascade');
            $table->foreignId('role_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('admins')->insert([
            'username' => 'admin',
            'name' => 'SuperAdmin',
            'created_at' => NOW()
        ]);

        $admin = App\Admin::where('username', 'admin')->first();
        $admin->password = '1234';
        $admin->save();

        DB::table('roles')->insert([
            'name' => 'SuperAdmin',
            'slug' => 'SuperAdmin',
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
        DB::table('role_admin')->insert([
            'admin_id' => $admin->id,
            'role_id' => 1,
            'created_at' => NOW(),
            'updated_at' => NOW()
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_admin');
    }
}
