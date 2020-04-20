<?php

use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('article_categories')->insert([
            'name' => 'Travel'
        ]);
        DB::table('article_categories')->insert([
            'name' => 'Technology'
        ]);
    }
}
