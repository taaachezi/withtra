<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateMessages extends AbstractMigration
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
       $table = $this->table('messages');
       $table->addColumn('chat_id','integer',[
            'limit' => 10,
            'null' => false,
        ]);
       $table->addColumn('send_user_id','integer',[
            'limit' => 10,
            'null' => false,
        ]);
       $table->addColumn('content','text',[
            'limit' => 255,
            'null' => false,
        ]);
        $table->create();
    }
}
