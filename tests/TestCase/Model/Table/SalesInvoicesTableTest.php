<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SalesInvoicesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SalesInvoicesTable Test Case
 */
class SalesInvoicesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SalesInvoicesTable
     */
    public $SalesInvoices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sales_invoices',
        'app.party_ledgers',
        'app.sale_ledgers',
        'app.sales_invoice_rows'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('SalesInvoices') ? [] : ['className' => SalesInvoicesTable::class];
        $this->SalesInvoices = TableRegistry::get('SalesInvoices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->SalesInvoices);

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
