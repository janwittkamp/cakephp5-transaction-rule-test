<?php

declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pots Model
 *
 * @property \App\Model\Table\PastasTable&\Cake\ORM\Association\HasMany $Pastas
 *
 * @method \App\Model\Entity\Pot newEmptyEntity()
 * @method \App\Model\Entity\Pot newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Pot> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pot get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Pot findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Pot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Pot> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pot|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Pot saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Pot>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pot>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pot>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pot> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pot>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pot>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pot>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pot> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PotsTable extends Table
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

        $this->setTable('pots');
        $this->setDisplayField('value');
        $this->setPrimaryKey('id');

        $this->hasMany('Pastas', [
            'foreignKey' => 'foreign_key',
            'conditions' => [
                'Pastas.model' => $this->getRegistryAlias(),
            ],
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
            ->scalar('value')
            ->maxLength('value', 255)
            ->requirePresence('value', 'create')
            ->notEmptyString('value');

        return $validator;
    }
}
