<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PurchaseInvoiceRows Model
 *
 * @property \App\Model\Table\PurchaseInvoicesTable|\Cake\ORM\Association\BelongsTo $PurchaseInvoices
 * @property \App\Model\Table\ItemsTable|\Cake\ORM\Association\BelongsTo $Items
 *
 * @method \App\Model\Entity\PurchaseInvoiceRow get($primaryKey, $options = [])
 * @method \App\Model\Entity\PurchaseInvoiceRow newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PurchaseInvoiceRow[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseInvoiceRow|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PurchaseInvoiceRow patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseInvoiceRow[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PurchaseInvoiceRow findOrCreate($search, callable $callback = null, $options = [])
 */
class PurchaseInvoiceRowsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('purchase_invoice_rows');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('PurchaseInvoices', [
            'foreignKey' => 'purchase_invoice_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Items', [
            'foreignKey' => 'item_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->decimal('quantity')
            ->requirePresence('quantity', 'create')
            ->notEmpty('quantity');

        $validator
            ->decimal('rate')
            ->requirePresence('rate', 'create')
            ->notEmpty('rate');

        $validator
            ->decimal('amount')
            ->requirePresence('amount', 'create')
            ->notEmpty('amount');

        $validator
            ->decimal('discount_percentage')
            ->allowEmpty('discount_percentage');

        $validator
            ->decimal('discount_amount')
            ->allowEmpty('discount_amount');

        $validator
            ->decimal('pnf_percentage')
            ->allowEmpty('pnf_percentage');

        $validator
            ->decimal('pnf_amount')
            ->allowEmpty('pnf_amount');

        $validator
            ->decimal('taxable_value')
            ->allowEmpty('taxable_value');

        $validator
            ->decimal('cgst_percentage')
            ->allowEmpty('cgst_percentage');

        $validator
            ->decimal('cgst_amount')
            ->allowEmpty('cgst_amount');

        $validator
            ->decimal('sgst_percentage')
            ->allowEmpty('sgst_percentage');

        $validator
            ->decimal('sgst_amount')
            ->allowEmpty('sgst_amount');

        $validator
            ->decimal('igst_percentage')
            ->allowEmpty('igst_percentage');

        $validator
            ->decimal('igst_amount')
            ->allowEmpty('igst_amount');

        $validator
            ->decimal('total')
            ->requirePresence('total', 'create')
            ->notEmpty('total');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['purchase_invoice_id'], 'PurchaseInvoices'));
        $rules->add($rules->existsIn(['item_id'], 'Items'));

        return $rules;
    }
}
