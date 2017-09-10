<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchaseInvoiceRow Entity
 *
 * @property int $id
 * @property int $purchase_invoice_id
 * @property int $item_id
 * @property float $quantity
 * @property float $rate
 * @property float $amount
 * @property float $discount_percentage
 * @property float $discount_amount
 * @property float $pnf_percentage
 * @property float $pnf_amount
 * @property float $taxable_value
 * @property float $cgst_percentage
 * @property float $cgst_amount
 * @property float $sgst_percentage
 * @property float $sgst_amount
 * @property float $igst_percentage
 * @property float $igst_amount
 * @property float $total
 *
 * @property \App\Model\Entity\PurchaseInvoice $purchase_invoice
 * @property \App\Model\Entity\Item $item
 */
class PurchaseInvoiceRow extends Entity
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
