<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateEntries extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('entries');
        $table->addColumn('user_id','integer',[
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('collect_id','integer',[
            'limit' => 10,
            'null' => false,
        ]);
        $table->addColumn('status','boolean',[
            'null' => false,
            'default' => false,
        ]);
        $table->addColumn('content','text',[
            'limit' => 255,
            'null' => false,
        ]);
        $table->create();
    }
}
