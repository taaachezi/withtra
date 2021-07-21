<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Gyms seed.
 */
class GymsSeed extends AbstractSeed
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
            ['name' => 'エニタイムフィットネス','url'=>'https://www.anytimefitness.co.jp/'],
            ['name' => 'JOY FIT', 'url' => 'https://joyfit.jp/akajoy/'],
            ['name' => 'ファストジム24', 'url' => 'https://fastgym24.jp/'],
            ['name' => 'スマートフィット100', 'url' => 'https://smartfit100.com/'],
            ['name' => 'ルネサンス24', 'url' => 'https://www.s-re.jp/24hours/'],
            ['name' => '快活クラブFit24', 'url' => 'https://www.fit24.jp/'],
            ['name' => 'ワールドプラスジム', 'url' => 'https://www.worldplus-gym.com/'],
            ['name' => 'FORBES 24h fitness', 'url' => 'https://www.forbes-24hfitness.com/'],
            ['name' => 'ラフィットネス', 'url' => 'https://mirafitness.jp/'],
            ['name' => 'セントラルスポーツジム24h', 'url' => 'https://www.central.co.jp/lp/24h/'],
            ['name' => 'Fit&GO ', 'url' => 'https://fitgo.jp/'],
            ['name' => 'FIT EASY', 'url' => 'https://fiteasy.jp/'],
            ['name' => 'ゴールドジム', 'url' => 'https://www.goldsgym.jp/']
        ];

        $table = $this->table('gyms');

        $table->insert($data)->save();
    }
}
