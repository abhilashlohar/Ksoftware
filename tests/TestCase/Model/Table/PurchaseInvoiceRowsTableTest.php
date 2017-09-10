<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchaseInvoiceRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchaseInvoiceRowsTable Test Case
 */
class PurchaseInvoiceRowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchaseInvoiceRowsTable
     */
    public $PurchaseInvoiceRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.purchase_invoice_rows',
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
        'app.items',
        'app.units',
        'app.stock_groups'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PurchaseInvoiceRows') ? [] : ['className' => PurchaseInvoiceRowsTable::class];
        $this->PurchaseInvoiceRows = TableRegistry::get('PurchaseInvoiceRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PurchaseInvoiceRows);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
