<?php
namespace App\Test\TestCase\Controller;

use App\Controller\PurchaseInvoicesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\PurchaseInvoicesController Test Case
 */
class PurchaseInvoicesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.purchase_invoices',
        'app.party_ledgers',
        'app.purchase_ledgers',
        'app.companies',
        'app.states',
        'app.users',
        'app.accounting_groups',
        'app.nature_of_groups',
        'app.ledgers',
        'app.accounting_entries',
        'app.customers',
        'app.suppliers',
        'app.financial_years',
        'app.purchase_invoice_rows'
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
