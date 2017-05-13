<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();
        $gropus = ['id' =>1,'name'=>'family','created_at'=>new DateTime(),'updated_at'=>new DateTime()];
        $gropus = ['id' =>2,'name'=>'friend','created_at'=>new DateTime(),'updated_at'=>new DateTime()];
        $gropus = ['id' =>3,'name'=>'personal','created_at'=>new DateTime(),'updated_at'=>new DateTime()];

        DB::table('groups') ->insert($gropus);
    }
}
