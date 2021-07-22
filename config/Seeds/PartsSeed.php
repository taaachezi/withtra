<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Parts seed.
 */
class PartsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => '胸'],
            ['name' => '肩'],
            ['name' => '腕'],
            ['name' => '背中'],
            ['name' => '腹筋'],
            ['name' => '臀部'],
            ['name' => '脚'],
            ['name' => '脚(前)'],
            ['name' => '脚(後)'],
            ['name' => '上半身'],
            ['name' => '下半身'],
            ['name' => '指定なし'],
        ];

        $table = $this->table('parts');
        $table->insert($data)->save();
    }
}
