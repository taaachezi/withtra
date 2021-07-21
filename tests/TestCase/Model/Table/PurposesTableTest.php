<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurposesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurposesTable Test Case
 */
class PurposesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PurposesTable
     */
    protected $Purposes;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Purposes',
        'app.Collects',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Purposes') ? [] : ['className' => PurposesTable::class];
        $this->Purposes = $this->getTableLocator()->get('Purposes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Purposes);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
