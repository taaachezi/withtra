<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePurposes extends AbstractMigration
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
        $table = $this->table('purposes');
        $table->addColumn('content','string',[
            'limit' => 64,
            'null' => false,
        ]);
        $table->create();
    }
}
