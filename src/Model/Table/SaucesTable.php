<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sauces Model
 *
 * @property \App\Model\Table\PastasTable&\Cake\ORM\Association\BelongsTo $Pastas
 *
 * @method \App\Model\Entity\Sauce newEmptyEntity()
 * @method \App\Model\Entity\Sauce newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Sauce> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sauce get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Sauce findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Sauce patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Sauce> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sauce|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Sauce saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Sauce>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sauce>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sauce>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sauce> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sauce>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sauce>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Sauce>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Sauce> deleteManyOrFail(iterable $entities, array $options = [])
 */
class SaucesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('sauces');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Pastas', [
            'foreignKey' => 'pasta_id',
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
            ->nonNegativeInteger('pasta_id')
            ->allowEmptyString('pasta_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

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
        $rules->add($rules->existsIn(['pasta_id'], 'Pastas'));

        return $rules;
    }
}
