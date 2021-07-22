<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Purposes seed.
 */
class PurposesSeed extends AbstractSeed
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
            ['content' => 'ダイエット'],
            ['content' => '健康維持'],
            ['content' => '筋肉を付けたい'],
            ['content' => '筋トレ教えて欲しい'],
            ['content' => 'ベストボディ志望'],
            ['content' => 'フィジーカー志望'],
            ['content' => 'ボディビルダー志望'],
            ['content' => '筋トレ仲間を増やしたい'],
            ['content' => '女性限定'],
        ];

        $table = $this->table('purposes');
        $table->insert($data)->save();
    }
}
