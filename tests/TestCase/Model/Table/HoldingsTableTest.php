<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HoldingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HoldingsTable Test Case
 */
class HoldingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HoldingsTable
     */
    public $Holdings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.holdings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Holdings') ? [] : ['className' => 'App\Model\Table\HoldingsTable'];
        $this->Holdings = TableRegistry::get('Holdings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Holdings);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
