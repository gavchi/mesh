<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::buildTree([
            ['title' => 'root', 'children' => [
                ['title' => 'TV & Home Theather'],
                ['title' => 'Tablets & E-Readers'],
                ['title' => 'Computers', 'children' => [
                    ['title' => 'Laptops', 'children' => [
                        ['title' => 'PC Laptops'],
                        ['title' => 'Macbooks (Air/Pro)']
                    ]],
                    ['title' => 'Desktops'],
                    ['title' => 'Monitors']
                ]],
                ['title' => 'Cell Phones']
            ]]
        ]);
    }
}
