<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Chats Model
 *
 * @property \App\Model\Table\SendUsersTable&\Cake\ORM\Association\BelongsTo $SendUsers
 * @property \App\Model\Table\RecieveUsersTable&\Cake\ORM\Association\BelongsTo $RecieveUsers
 * @property \App\Model\Table\MessagesTable&\Cake\ORM\Association\HasMany $Messages
 *
 * @method \App\Model\Entity\Chat newEmptyEntity()
 * @method \App\Model\Entity\Chat newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Chat[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Chat get($primaryKey, $options = [])
 * @method \App\Model\Entity\Chat findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Chat patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Chat[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Chat|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chat saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Chat[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chat[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chat[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Chat[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class ChatsTable extends Table
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

        $this->setTable('chats');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('SendUsers', [
            'foreignKey' => 'send_user_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('RecieveUsers', [
            'foreignKey' => 'recieve_user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Messages', [
            'foreignKey' => 'chat_id',
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
        $rules->add($rules->existsIn(['send_user_id'], 'SendUsers'), ['errorField' => 'send_user_id']);
        $rules->add($rules->existsIn(['recieve_user_id'], 'RecieveUsers'), ['errorField' => 'recieve_user_id']);

        return $rules;
    }
}
