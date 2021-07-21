<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CollectsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CollectsTable Test Case
 */
class CollectsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CollectsTable
     */
    protected $Collects;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Collects',
        'app.Users',
        'app.Gyms',
        'app.Parts',
        'app.Purposes',
        'app.Prefectures',
        'app.Entries',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Collects') ? [] : ['className' => CollectsTable::class];
        $this->Collects = $this->getTableLocator()->get('Collects', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Collects);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
