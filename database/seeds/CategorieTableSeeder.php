<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tblCategorie')->truncate();

        foreach (['MySQL', 'PHP', 'Linux', 'Laravel', 'LAN'] as $value) 
          {

            DB::table('tblCategorie')->insert([
                'nome' => $value,
                'created_at' =>  Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' =>  Carbon\Carbon::now()->toDateTimeString()
            ]);
          
          }


    }
}
