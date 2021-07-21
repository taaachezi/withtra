<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Purposes Model
 *
 * @property \App\Model\Table\CollectsTable&\Cake\ORM\Association\HasMany $Collects
 *
 * @method \App\Model\Entity\Purpose newEmptyEntity()
 * @method \App\Model\Entity\Purpose newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Purpose[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Purpose get($primaryKey, $options = [])
 * @method \App\Model\Entity\Purpose findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Purpose patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Purpose[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Purpose|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Purpose saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Purpose[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Purpose[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Purpose[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Purpose[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class PurposesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('purposes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Collects', [
            'foreignKey' => 'purpose_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('content')
            ->maxLength('content', 64)
            ->requirePresence('content', 'create')
            ->notEmptyString('content');

        return $validator;
    }
}
