<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GymsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GymsTable Test Case
 */
class GymsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GymsTable
     */
    protected $Gyms;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Gyms',
        'app.Collects',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Gyms') ? [] : ['className' => GymsTable::class];
        $this->Gyms = $this->getTableLocator()->get('Gyms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Gyms);

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
