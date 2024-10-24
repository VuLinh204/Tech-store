<?php

declare(strict_types=1);

use Phinx\Seed\AbstractSeed;

class Role extends AbstractSeed
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
            [
                'name' => 'Quản trị viên tối cao'
            ]
        ];
        $this->table('role')->insert($data)->saveData();
    }
}
