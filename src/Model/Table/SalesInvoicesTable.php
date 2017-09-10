<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use ArrayObject;

/**
 * SalesInvoices Model
 *
 * @property \App\Model\Table\PartyLedgersTable|\Cake\ORM\Association\BelongsTo $PartyLedgers
 * @property \App\Model\Table\SaleLedgersTable|\Cake\ORM\Association\BelongsTo $SaleLedgers
 * @property \App\Model\Table\SalesInvoiceRowsTable|\Cake\ORM\Association\HasMany $SalesInvoiceRows
 *
 * @method \App\Model\Entity\SalesInvoice get($primaryKey, $options = [])
 * @method \App\Model\Entity\SalesInvoice newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\SalesInvoice[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\SalesInvoice|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\SalesInvoice patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\SalesInvoice[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\SalesInvoice findOrCreate($search, callable $callback = null, $options = [])
 */
class SalesInvoicesTable extends Table
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

        $this->setTable('sales_invoices');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        
		$this->belongsTo('PartyLedgers', [
			'className' => 'Ledgers',
			'foreignKey' => 'party_ledger_id',
			'propertyName' => 'PartyLedgers',
		]);
		$this->belongsTo('SalesLedgers', [
			'className' => 'Ledgers',
			'foreignKey' => 'sales_ledger_id',
			'propertyName' => 'SalesLedgers',
		]);
        $this->hasMany('SalesInvoiceRows', [
            'foreignKey' => 'sales_invoice_id'
        ]);
    }

	public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options)
	{
		$data['transaction_date'] = date('Y-m-d',strtotime($data['transaction_date']));
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
            ->integer('voucher_no')
            ->requirePresence('voucher_no', 'create')
            ->notEmpty('voucher_no');

        $validator
            ->date('transaction_date')
            ->requirePresence('transaction_date', 'create')
            ->notEmpty('transaction_date');


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
        $rules->add($rules->existsIn(['party_ledger_id'], 'PartyLedgers'));
        $rules->add($rules->existsIn(['sales_ledger_id'], 'SalesLedgers'));

        return $rules;
    }
}
