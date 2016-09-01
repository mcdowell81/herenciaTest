<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Holdings Model
 *
 * @method \App\Model\Entity\Holding get($primaryKey, $options = [])
 * @method \App\Model\Entity\Holding newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Holding[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Holding|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Holding patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Holding[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Holding findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class HoldingsTable extends Table
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

        $this->table('holdings');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Members', [
            'foreignKey' => 'idMember'
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
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->uuid('idMember')
            ->requirePresence('idMember', 'create')
            ->notEmpty('idMember');

        $validator
            ->integer('units')
            ->requirePresence('units', 'create')
            ->notEmpty('units');

        $validator
            ->integer('unitValue')
            ->requirePresence('unitValue', 'create')
            ->notEmpty('unitValue');

        $validator
            ->integer('holdingType')
            ->requirePresence('holdingType', 'create')
            ->notEmpty('holdingType');

        $validator
            ->boolean('divisible')
            ->requirePresence('divisible', 'create')
            ->notEmpty('divisible');

        return $validator;
    }

    public function getMemberHoldings($idMember)
    {
        $holdings = $this->find()
            ->where(['idMember' => $idMember]);

        return $holdings;
    }

    /**
     * @param array $options must ( idMember | units | holding )
     */
    public function toInherit($options)
    {
        $holding = $this->newEntity();

        $holding->idMember = $options['idMember'];
        $holding->units = $options['units'];
        $holding->holdingType = $options['holdingType'];
        $holding->unitValue = $this->getUnitValueByType($options['holdingType']);
        $holding->divisible = $this->isDivisibleType($options['holdingType']);

        return ( $this->save($holding) ) ? true : false;

    }

    private function getUnitValueByType($holdingType)
    {
        switch ($holdingType) {
            case MONEYHOLDING:
                return 1;
                break;

            case GROUNDHOLDING:
                return 300;
                break;

            case PROPERTYHOLDING:
                return 1000000;
                break;
            
            default:
                return 1;
                break;
        }
    }

    private function isDivisibleType($holdingType)
    {
        switch ($holdingType) {
            case MONEYHOLDING:
                return true;
                break;

            case GROUNDHOLDING:
                return false;
                break;

            case PROPERTYHOLDING:
                return false;
                break;
            
            default:
                return true;
                break;
        }
    }
}
