<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateCollects extends AbstractMigration
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
        $table = $this->table('collects');
        $table->addColumn('user_id','integer',[
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('gym_id','integer',[
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('part_id','integer',[
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('purpose_id','integer',[
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('prefecture_id','integer',[
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('title', 'string',[
            'limit' => 20,
            'null'=>false,
        ]);
        $table->addColumn('city','string',[
            'limit' => 32,
            'null' => false,
        ]);
        $table->addColumn('limit','integer',[
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('time','date',[
            'null' => false,
        ]);
        $table->addColumn('content','text',[
            'limit' => 255,
            'null' => true,
        ]);
        $table->addColumn('created','datetime',[
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ]);
        $table->addColumn('modified','datetime',[
            'default' => 'CURRENT_TIMESTAMP',
            'null' => false,
        ]);
        $table->create();
    }
}
