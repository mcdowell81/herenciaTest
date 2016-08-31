<?php
namespace App\Controller;

use App\Controller\AppController;
//use Cake\ORM\TableRegistry;

/**
 * Members Controller
 *
 * @property \App\Model\Table\MembersTable $Members
 */
class MembersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $members = $this->paginate($this->Members);

        $this->set(compact('members'));
        $this->set('_serialize', ['members']);
    }

    /**
     * View method
     *
     * @param string|null $id Member id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => []
        ]);

        $childrens = $this->Members->getChildrens($id);
        $firstBorn = $this->Members->getFirstBorn($id);

        $this->loadModel('Holdings');
        $holdings = $this->Holdings->getMemberHoldings($id);

        $this->set(compact('member', 'childrens', 'holdings', 'firstBorn'));
        $this->set('_serialize', ['member']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $member = $this->Members->newEntity();
        if ($this->request->is('post')) {
            $member = $this->Members->patchEntity($member, $this->request->data);
            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The member could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('member'));
        $this->set('_serialize', ['member']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Member id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $member = $this->Members->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $member = $this->Members->patchEntity($member, $this->request->data);
            if ($this->Members->save($member)) {
                $this->Flash->success(__('The member has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The member could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('member'));
        $this->set('_serialize', ['member']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Member id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $member = $this->Members->get($id);
        if ($this->Members->delete($member)) {
            $this->Flash->success(__('The member has been deleted.'));
        } else {
            $this->Flash->error(__('The member could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function grant($id = null)
    {
        $member = $this->Members->get($id);

        $this->loadModel('Holdings');

        $memberHoldings = $this->Holdings->getMemberHoldings($id);
        $childrens = $this->Members->getChildrens($id);

        foreach ($memberHoldings as $holding) {
            if ( $this->makeGrant([
                    'holdingType' => $holding->holdingType, 
                    'holdingUnits' => $holding->units, 
                    'memberId' => $member->id, 
                    'childrens' => $childrens]) ){
                $this->Holdings->delete($holding);
                $this->Flash->success(__('Grant success.'));
            } else {
                $this->Flash->error(__('Grant error.'));
            }
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * PRIVATE FUNCTIONS
     */

    /**
     * @param array $options must ( holdingType | holdingUnits | member | childrens )
     */
    private function makeGrant($options)
    {
        switch ($options['holdingType']) {
            case MONEYHOLDING:
                return $this->makeMoneyGrant([
                    'holdingUnits' => $options['holdingUnits'],
                    'childrens' => $options['childrens']
                ]);
                break;

            case GROUNDHOLDING:
                return $this->makeGroundGrant([
                    'holdingUnits' => $options['holdingUnits'],
                    'memberId' => $options['memberId']
                ]);
                break;

            case PROPERTYHOLDING:
                return $this->makePropertyGrant([
                    'holdingUnits' => $options['holdingUnits'],
                    'childrens' => $options['childrens']
                ]);
                break;
            
            default:
                return $this->makeMoneyGrant([
                    'holdingUnits' => $options['holdingUnits'],
                    'childrens' => $options['childrens']
                ]);
                break;
        }

    }

    /**
     * @param array $options must ( holdingUnits | childrens )
     */
    private function makeMoneyGrant($options)
    {
        $childrens = $options['childrens'];

        if ( is_null($childrens) ) {
            return false;
        }

        $this->loadModel('Holdings');

        $childrenGrantPartition = (int) $options['holdingUnits'] / $childrens->count();

        foreach ($childrens as $children) {
            $childrenChildrens = $this->Members->getChildrens($children->id);

            if ( $childrenChildrens->count() > 0 ) {
                
                $this->Holdings->toInherit([
                    'idMember' => $children->id, 
                    'units' => (int) $childrenGrantPartition / 2,
                    'holdingType' => MONEYHOLDING
                ]);
                
                $this->makeMoneyGrant([
                    'holdingUnits' => (int) $childrenGrantPartition / 2,
                    'childrens' => $childrenChildrens
                ]);
            } else {
                $this->Holdings->toInherit([
                    'idMember' => $children->id, 
                    'units' => (int) $childrenGrantPartition,
                    'holdingType' => MONEYHOLDING
                ]);
            }
        }

        return true;
    }

    /**
     * @param array $options must ( holdingUnits | memberId )
     */
    private function makeGroundGrant($options)
    {
        $this->loadModel('Holdings');

        $firstBorn = $this->Members->getFirstBorn($options['memberId']);
        if ( ! empty($firstBorn) ) {
            $this->Holdings->toInherit([
                'idMember' => $firstBorn->id, 
                'units' => $options['holdingUnits'],
                'holdingType' => GROUNDHOLDING
            ]);

            return true;

        } else {

            return false;

        }

    }

    /**
     * @param array $options must ( holdingUnits | childrens )
     */
    private function makePropertyGrant($options)
    {
        $childrens = $options['childrens']->toArray();

        if ( is_null($childrens) ) {
            return false;
        }

        $this->loadModel('Holdings');

        $childrensArrayPos = 0;
        $childernsArrayCount = count($childrens);
        for ($i=0; $i < $options['holdingUnits']; $i++) { 
            $this->Holdings->toInherit([
                'idMember' => $childrens[$childrensArrayPos]['id'], 
                'units' => 1,
                'holdingType' => PROPERTYHOLDING
            ]);

            $childrensArrayPos++;
            if ( $childrensArrayPos == $childernsArrayCount ){
                $childrensArrayPos = 0;
            }
        }

        return true;

    }
}
