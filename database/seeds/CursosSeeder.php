<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
        	'nombre'=>'Curso de ingreso a Ciencias Económicas',
        	'id_universidad'=>'25',
        	'created_at'=>'2018-02-08 17:31:54',
        	'updated_at'=>'2018-02-08 17:31:54',
        ]);

        DB::table('cursos')->insert([
        	'nombre'=>'Curso de ingreso a Medicina UNC',
        	'id_universidad'=>'25',
        	'created_at'=>'2018-02-08 17:31:54',
        	'updated_at'=>'2018-02-08 17:31:54',
        ]);

        DB::table('cursos')->insert([
        	'nombre'=>'Curso de ingreso a Medicina UCC',
        	'id_universidad'=>'25',
        	'created_at'=>'2018-02-08 17:31:54',
        	'updated_at'=>'2018-02-08 17:31:54',
        ]);
    }
}
