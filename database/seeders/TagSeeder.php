<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                $data = [
            [
                'name' => 'UX/UI Design'
            ],
            [
                'name' => 'HTML'
            ],
            [
                'name' => 'CSS'
            ],
            [
                'name' => 'JavaScript'
            ],
            [
                'name' => 'PHP'
            ],
            [
                'name' => 'Laravel'
            ],
            [
                'name' => 'Python'
            ],
            [
                'name' => 'Django'
            ],
            [
                'name' => 'React'
            ],
            [
                'name' => 'Angular'
            ],
            [
                'name' => 'Vue.js'
            ],
            [
                'name' => 'Node.js'
            ],
            [
                'name' => 'SQL'
            ],
            [
                'name' => 'MySQL'
            ],
            [
                'name' => 'PostgreSQL'
            ],
            [
                'name' => 'MongoDB'
            ],
            [
                'name' => 'Git'
            ],
            [
                'name' => 'Docker'
            ]
        ];      

        foreach ($data as $record) {
            Tag::create($record);
        }
    }
}