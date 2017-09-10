<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SalesInvoice Entity
 *
 * @property int $id
 * @property int $voucher_no
 * @property \Cake\I18n\FrozenDate $transaction_date
 * @property string $reference_no
 * @property int $party_ledger_id
 * @property int $sale_ledger_id
 *
 * @property \App\Model\Entity\PartyLedger $party_ledger
 * @property \App\Model\Entity\SaleLedger $sale_ledger
 * @property \App\Model\Entity\SalesInvoiceRow[] $sales_invoice_rows
 */
class SalesInvoice extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
