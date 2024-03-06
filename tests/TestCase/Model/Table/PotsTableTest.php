<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PotsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PotsTable Test Case
 */
class PotsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PotsTable
     */
    protected $Pots;

    /**
     * Fixtures
     *
     * @var array<string>
     */
    protected array $fixtures = [
        'app.Pots',
        'app.Pastas',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pots') ? [] : ['className' => PotsTable::class];
        $this->Pots = $this->getTableLocator()->get('Pots', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    protected function tearDown(): void
    {
        unset($this->Pots);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\PotsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
