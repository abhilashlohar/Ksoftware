<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalesInvoiceRowsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalesInvoiceRowsTable Test Case
 */
class SalesInvoiceRowsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SalesInvoiceRowsTable
     */
    public $SalesInvoiceRows;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sales_invoice_rows',
        'app.sales_invoices',
        'app.party_ledgers',
        'app.sale_ledgers',
        'app.items',
        'app.units',
        'app.stock_groups',
        'app.companies',
        'app.states',
        'app.users',
        'app.accounting_groups',
        'app.nature_of_groups',
        'app.ledgers',
        'app.accounting_entries',
        'app.customers',
        'app.suppliers',
        'app.financial_years'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SalesInvoiceRows') ? [] : ['className' => SalesInvoiceRowsTable::class];
        $this->SalesInvoiceRows = TableRegistry::get('SalesInvoiceRows', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SalesInvoiceRows);

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
