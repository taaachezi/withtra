<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Collects Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\GymsTable&\Cake\ORM\Association\BelongsTo $Gyms
 * @property \App\Model\Table\PartsTable&\Cake\ORM\Association\BelongsTo $Parts
 * @property \App\Model\Table\PurposesTable&\Cake\ORM\Association\BelongsTo $Purposes
 * @property \App\Model\Table\PrefecturesTable&\Cake\ORM\Association\BelongsTo $Prefectures
 * @property \App\Model\Table\EntriesTable&\Cake\ORM\Association\HasMany $Entries
 *
 * @method \App\Model\Entity\Collect newEmptyEntity()
 * @method \App\Model\Entity\Collect newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Collect[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Collect get($primaryKey, $options = [])
 * @method \App\Model\Entity\Collect findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Collect patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Collect[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Collect|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Collect saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Collect[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Collect[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Collect[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Collect[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CollectsTable extends Table
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

        $this->setTable('collects');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Gyms', [
            'foreignKey' => 'gym_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Parts', [
            'foreignKey' => 'part_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Purposes', [
            'foreignKey' => 'purpose_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Prefectures', [
            'foreignKey' => 'prefecture_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Entries', [
            'foreignKey' => 'collect_id',
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
            ->scalar('city')
            ->maxLength('city', 32)
            ->requirePresence('city', 'create')
            ->notEmptyString('city');

        $validator
            ->integer('limit')
            ->requirePresence('limit', 'create')
            ->greaterThan(2)
            ->notEmptyString('limit');

        $validator
            ->date('time')
            ->requirePresence('time', 'create')
            ->notEmptyDate('time');

        $validator
            ->scalar('content')
            ->maxLength('content', 255)
            ->allowEmptyString('content');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['gym_id'], 'Gyms'), ['errorField' => 'gym_id']);
        $rules->add($rules->existsIn(['part_id'], 'Parts'), ['errorField' => 'part_id']);
        $rules->add($rules->existsIn(['purpose_id'], 'Purposes'), ['errorField' => 'purpose_id']);
        $rules->add($rules->existsIn(['prefecture_id'], 'Prefectures'), ['errorField' => 'prefecture_id']);

        return $rules;
    }
}
