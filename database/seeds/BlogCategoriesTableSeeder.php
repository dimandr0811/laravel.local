<?php

use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =[];

        $cName = 'Без категории';
        $categories[] = [
            'title'     => $cName,
            'slug'      => Str::slug($cName),
            'parent_id' => 0,
        ];

        for ($i=2; $i<=11; $i++)
        {
            $cName = 'Категория #' . $i;
            $parendId = ($i > 4) ? rand(1,4): 1 ;

            $categories[] = [
                'title' => $cName,
                'slug'  => str::slug ($cName),
                'parent_id' => $parendId,
            ];
        }

        \DB::table('blog_categories')->insert($categories);
    }
}
