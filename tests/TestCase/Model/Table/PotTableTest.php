<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PotTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PotTable Test Case
 */
class PotTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PotTable
     */
    protected $Pot;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Pot',
        'app.Pasta',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pot') ? [] : ['className' => PotTable::class];
        $this->Pot = $this->getTableLocator()->get('Pot', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Pot);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PotTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
