<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 *
 * @method \App\Model\Entity\Company[] paginate($object = null, array $settings = [])
 */
class CompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['States']
        ];
        $companies = $this->paginate($this->Companies);

        $this->set(compact('companies'));
        $this->set('_serialize', ['companies']);
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => ['States']
        ]);

        $this->set('company', $company);
        $this->set('_serialize', ['company']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
		$IsCompany = $this->Companies->exists(['user_id' => $this->Auth->User('id')]);
		if($IsCompany){
			return $this->redirect(['controller' => 'Users','action' => 'Dashboard']);
		}
		
		$this->viewBuilder()->layout('index_layout');
        $company = $this->Companies->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
			$company->user_id=$this->Auth->User('id');
            if ($this->Companies->save($company)) {
				
				$StatutoryInfos=[
					['nature_of_group_id'=>2, 'name'=>'Branch / Divisions', 'parent_id'=>NULL],
					['nature_of_group_id'=>2, 'name'=>'Capital Account', 'parent_id'=>NULL],
					['nature_of_group_id'=>1, 'name'=>'Current Assets', 'parent_id'=>NULL],
					['nature_of_group_id'=>2, 'name'=>'Current Liabilities', 'parent_id'=>NULL],
					['nature_of_group_id'=>4, 'name'=>'Direct Expenses', 'parent_id'=>NULL],
					['nature_of_group_id'=>3, 'name'=>'Direct Incomes', 'parent_id'=>NULL],
					['nature_of_group_id'=>1, 'name'=>'Fixed Assets', 'parent_id'=>NULL],
					['nature_of_group_id'=>4, 'name'=>'Indirect Expenses', 'parent_id'=>NULL],
					['nature_of_group_id'=>3, 'name'=>'Indirect Incomes', 'parent_id'=>NULL],
					['nature_of_group_id'=>1, 'name'=>'Investments', 'parent_id'=>NULL],
					['nature_of_group_id'=>2, 'name'=>'Loans (Liability)', 'parent_id'=>NULL],
					['nature_of_group_id'=>1, 'name'=>'Misc. Expenses (ASSET)', 'parent_id'=>NULL],
					['nature_of_group_id'=>4, 'name'=>'Purchase Accounts', 'parent_id'=>NULL],
					['nature_of_group_id'=>3, 'name'=>'Sales Accounts', 'parent_id'=>NULL],
					['nature_of_group_id'=>2, 'name'=>'Suspense A/c', 'parent_id'=>NULL]
				];
				
				//Statutory Info//
				foreach($StatutoryInfos as $StatutoryInfo){
					$accountingGroup = $this->Companies->AccountingGroups->newEntity();
					$accountingGroup->nature_of_group_id=$StatutoryInfo['nature_of_group_id'];
					$accountingGroup->name=$StatutoryInfo['name'];
					$accountingGroup->parent_id=$StatutoryInfo['parent_id'];
					$accountingGroup->company_id=$company->id;
					$this->Companies->AccountingGroups->save($accountingGroup);
				}
				
				$accountingParentGroup=$this->Companies->AccountingGroups->find()->where(['name'=>'Capital Account','company_id'=>$company->id])->first();
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Reserves & Surplus';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingParentGroup=$this->Companies->AccountingGroups->find()->where(['name'=>'Current Assets','company_id'=>$company->id])->first();
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Bank Accounts';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Cash-in-hand';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Deposits (Asset)';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Loans & Advances (Asset)';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Stock-in-hand';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Sundry Debtors';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->customer=1;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingParentGroup=$this->Companies->AccountingGroups->find()->where(['name'=>'Current Liabilities','company_id'=>$company->id])->first();
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Duties & Taxes';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Provisions';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Sundry Creditors';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->supplier=1;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingParentGroup=$this->Companies->AccountingGroups->find()->where(['name'=>'Loans (Liability)','company_id'=>$company->id])->first();
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Bank OD A/c';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Secured Loans';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Unsecured Loans';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingParentGroup=$this->Companies->AccountingGroups->find()->where(['name'=>'Duties & Taxes','company_id'=>$company->id])->first();
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Input GST';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				$accountingGroup = $this->Companies->AccountingGroups->newEntity();
				$accountingGroup->nature_of_group_id=NULL;
				$accountingGroup->name='Output GST';
				$accountingGroup->parent_id=$accountingParentGroup->id;
				$accountingGroup->company_id=$company->id;
				$this->Companies->AccountingGroups->save($accountingGroup);
				
				
				//Financial year entry//
				$financialY=date('Y', strtotime($company->financial_year_begins_from));
				$financialY=$financialY+1;
				$FYendDate=$financialY.'-3-31';
				
				$financialYear = $this->Companies->FinancialYears->newEntity();
				$financialYear->fy_from=date('Y-m-d',strtotime($company->books_beginning_from));
				$financialYear->fy_to=$FYendDate;
				$financialYear->status='open';
				$financialYear->company_id=$company->id;
				$this->Companies->FinancialYears->save($financialYear);
				
				
				//set session//
				$user=$this->Companies->Users->get($this->Auth->User('id'), [
					'contain' =>['Companies'=>
									['FinancialYears'=>function($q){
										return $q->where(['FinancialYears.status'=>'open'])->order(['FinancialYears.fy_from'=>'ASC']);
									}]
								]
				]);
				$fyValidFrom=$user->company->financial_years[0]->fy_from;
				foreach($user->company->financial_years as $financial_year){
					$fyValidTo=$financial_year->fy_to;
				}
				$user->fyValidFrom=$fyValidFrom;
				$user->fyValidTo=$fyValidTo;
				unset($user->company->financial_years);
				$this->Auth->setUser($user);
				
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['controller' => 'Users','action' => 'Dashboard']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $states = $this->Companies->States->find('list', ['limit' => 200]);
        $this->set(compact('company', 'states'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $states = $this->Companies->States->find('list', ['limit' => 200]);
        $this->set(compact('company', 'states'));
        $this->set('_serialize', ['company']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Companies->get($id);
        if ($this->Companies->delete($company)) {
            $this->Flash->success(__('The company has been deleted.'));
        } else {
            $this->Flash->error(__('The company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
