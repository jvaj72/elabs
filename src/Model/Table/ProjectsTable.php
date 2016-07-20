<?php

namespace App\Model\Table;

use App\Model\Entity\Project;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Projects Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Licenses
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany $ProjectUsers
 */
class ProjectsTable extends Table
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

        $this->table('projects');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->addBehavior('CounterCache', [
            'Users' => ['project_count' => ['conditions' => ['status' => 1]]],
            'Licenses' => ['project_count' => ['conditions' => ['status' => 1]]],
            'Languages' => ['project_count' => ['conditions' => ['status' => 1]]],
        ]);

        $this->belongsTo('Licenses', [
            'foreignKey' => 'license_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Languages', [
            'foreignKey' => 'language_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ProjectUsers', [
            'foreignKey' => 'project_id'
        ]);
        $this->hasMany('Acts', [
            'foreignKey' => 'fkid',
            'conditions' => ['Acts.model' => 'Projects']
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
                ->add('id', 'valid', ['rule' => 'uuid'])
                ->allowEmpty('id', 'create');

        $validator
                ->requirePresence('name', 'create')
                ->notEmpty('name');

        $validator
                ->allowEmpty('short_description');

        $validator
                ->allowEmpty('description');

        $validator
                ->add('sfw', 'valid', ['rule' => 'boolean'])
                ->requirePresence('sfw', 'create')
                ->notEmpty('sfw');

        $validator
                ->allowEmpty('mainurl');

        $validator
                ->add('status', 'valid', ['rule' => 'numeric'])
                ->requirePresence('status', 'create')
                ->notEmpty('status');

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
        $rules->add($rules->existsIn(['license_id'], 'Licenses'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
