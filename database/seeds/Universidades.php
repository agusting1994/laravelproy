<?php

use Illuminate\Database\Seeder;

class Universidades extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universidades')->insert([
        	'nombre'=>'Universidad Nacional de Córdoba',
        	'created_at'=>'2018-02-08 17:31:54',
        	'updated_at'=>'2018-02-08 17:31:54',
        ]);
        DB::table('universidades')->insert([
        	'nombre'=>'Universidad Católica de Córdoba',
        	'created_at'=>'2018-02-08 17:31:54',
        	'updated_at'=>'2018-02-08 17:31:54',
        ]);

        DB::table('universidades')->insert([
        	'nombre'=>'Universidad Empresarial Siglo 21',
        	'created_at'=>'2018-02-08 17:31:54',
        	'updated_at'=>'2018-02-08 17:31:54',
        ]);
    }
}
