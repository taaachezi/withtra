<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PrefecturesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PrefecturesTable Test Case
 */
class PrefecturesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PrefecturesTable
     */
    protected $Prefectures;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Prefectures',
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
        $config = $this->getTableLocator()->exists('Prefectures') ? [] : ['className' => PrefecturesTable::class];
        $this->Prefectures = $this->getTableLocator()->get('Prefectures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Prefectures);

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
