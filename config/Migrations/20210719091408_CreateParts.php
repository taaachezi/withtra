<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateParts extends AbstractMigration
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
        $table = $this->table('parts');
        $table->addColumn('name','string',[
            'limit' => 32,
            'null' => false,
        ]);
        $table->create();
    }
}
