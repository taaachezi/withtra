<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on table method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('users');
        $table->addColumn('gym_id','integer',[
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('name','string',[
            'limit' => 32,
            'null' => false,
        ]);
        $table->addColumn('password','string',[
            'limit' => 64,
            'null' => false,
        ]);
        $table->addColumn('mail','string',[
            'limit' => 64,
            'null' => false,
        ]);
        $table->addColumn('years','integer',[
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('prefecture_id','integer',[
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('profile_img','string',[
            'limit' => 64,
            'null' => false,
        ]);
        $table->create();
    }
}
