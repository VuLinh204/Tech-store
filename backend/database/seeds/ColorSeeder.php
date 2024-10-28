<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class ColorSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Đen'],
            ['name' => 'Trắng'],
            ['name' => 'Xám'],
            ['name' => 'Đỏ'],
            ['name' => 'Xanh'],
        ];

        $this->table('colors')->insert($data)->saveData();
    }
}
