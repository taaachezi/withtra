<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Collects seed.
 */
class CollectsSeed extends AbstractSeed
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
            [
                'user_id' => 1,
                'gym_id' => 1,
                'part_id' => 1,
                'purpose_id' => 1,
                'prefecture_id' => 1,
                'city' => '渋谷区' ,
                'limit' => 2,
                'time' => '2021/07/23',
                'content' => '詳細',
                'title' => "渋谷募集します"
            ],
            [
                'user_id' => 1,
                'gym_id' => 2,
                'part_id' => 2,
                'purpose_id' => 2,
                'prefecture_id' => 2,
                'city' => '江東区' ,
                'limit' => 2,
                'time' => '2021/07/24',
                'content' => '詳細',
                'title' => "江東区募集します"
            ],
            [
                'user_id' => 1,
                'gym_id' => 3,
                'part_id' => 3,
                'purpose_id' => 3,
                'prefecture_id' => 3,
                'city' => '台東区' ,
                'limit' => 2,
                'time' => '2021/07/24',
                'content' => '詳細',
                'title' => "台東区募集します"
            ],
            [
                'user_id' => 2,
                'gym_id' => 4,
                'part_id' => 4,
                'purpose_id' => 4,
                'prefecture_id' => 4,
                'city' => '川崎市' ,
                'limit' => 2,
                'time' => '2021/07/23',
                'content' => '詳細',
                'title' => "川崎募集します"
            ],
            [
                'user_id' => 2,
                'gym_id' => 5,
                'part_id' => 5,
                'purpose_id' => 5,
                'prefecture_id' => 5,
                'city' => '都筑区' ,
                'limit' => 2,
                'time' => '2021/07/25',
                'content' => '詳細',
                'title' => "都筑区募集します"
            ],
            [
                'user_id' => 2,
                'gym_id' => 5,
                'part_id' => 5,
                'purpose_id' => 5,
                'prefecture_id' => 5,
                'city' => '新宿区' ,
                'limit' => 2,
                'time' => '2021/07/25',
                'content' => '詳細',
                'title' => "新宿募集します"
            ],

        ];

        $table = $this->table('collects');
        $table->insert($data)->save();
    }
}
