<?php
namespace App\Test\TestCase\Controller;

use App\Controller\FinancialYearsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\FinancialYearsController Test Case
 */
class FinancialYearsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.financial_years',
        'app.companies',
        'app.states',
        'app.users',
        'app.accounting_groups',
        'app.nature_of_groups',
        'app.ledgers',
        'app.accounting_entries',
        'app.customers',
        'app.suppliers'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
