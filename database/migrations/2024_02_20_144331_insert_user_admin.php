<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class InsertUserAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('Ps1co@!'),
            // Adicione outros campos, se necessário
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('therapist')->insert([
            'usuario' => 'admin',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Se você precisar reverter essa migration, você pode adicionar a lógica aqui.
    }
}
