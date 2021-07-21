<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\GymsTable&\Cake\ORM\Association\BelongsTo $Gyms
 * @property \App\Model\Table\PrefecturesTable&\Cake\ORM\Association\BelongsTo $Prefectures
 * @property \App\Model\Table\CollectsTable&\Cake\ORM\Association\HasMany $Collects
 * @property \App\Model\Table\EntriesTable&\Cake\ORM\Association\HasMany $Entries
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Gyms', [
            'foreignKey' => 'gym_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Prefectures', [
            'foreignKey' => 'prefecture_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Collects', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('Entries', [
            'foreignKey' => 'user_id',
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
            ->notEmptyString('id', null, 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 32)
            ->requirePresence('name', 'create')
            ->notEmptyString('name');

        $validator
            ->scalar('password')
            ->maxLength('password', 64)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->email('mail')
            ->scalar('mail')
            ->maxLength('mail', 64)
            ->requirePresence('mail', 'create')
            ->notEmptyString('mail');

        $validator
            ->integer('years')
            ->requirePresence('years', 'create')
            ->notEmptyString('years');

        $validator
            ->scalar('profile_img')
            ->maxLength('profile_img', 64)
            ->requirePresence('profile_img', false)
            ->allowEmptystring('profile_img');
        
        $validator
            ->integer('gym_id')
            ->notEmptyString('gym_id');

        $validator
            ->integer('prefecture_id')
            ->notEmptyString('prefecture_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['gym_id'], 'Gyms'), ['errorField' => 'gym_id']);
        $rules->add($rules->existsIn(['prefecture_id'], 'Prefectures'), ['errorField' => 'prefecture_id']);

        return $rules;
    }
}
