<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseInvoice Entity
 *
 * @property int $id
 * @property int $voucher_no
 * @property \Cake\I18n\FrozenDate $transaction_date
 * @property string $reference_no
 * @property int $party_ledger_id
 * @property int $purchase_ledger_id
 * @property string $purchase_type
 * @property int $company_id
 *
 * @property \App\Model\Entity\Ledger $PartyLedgers
 * @property \App\Model\Entity\Ledger $PurchaseLedgers
 * @property \App\Model\Entity\Company $company
 * @property \App\Model\Entity\PurchaseInvoiceRow[] $purchase_invoice_rows
 */
class PurchaseInvoice extends Entity
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
