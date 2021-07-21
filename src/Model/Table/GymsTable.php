<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gyms Model
 *
 * @property \App\Model\Table\CollectsTable&\Cake\ORM\Association\HasMany $Collects
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Gym newEmptyEntity()
 * @method \App\Model\Entity\Gym newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Gym[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gym get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gym findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Gym patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gym[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gym|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gym saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gym[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Gym[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Gym[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Gym[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class GymsTable extends Table
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

        $this->setTable('gyms');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Collects', [
            'foreignKey' => 'gym_id',
        ]);
        $this->hasMany('Users', [
            'foreignKey' => 'gym_id',
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
            ->scalar('name')
            ->maxLength('name', 64)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('url')
            ->maxLength('url', 128)
            ->requirePresence('url', 'create')
            ->notEmptyString('url');

        return $validator;
    }
}
