<?php

declare(strict_types=1);

namespace App\Model\Table;

use App\Model\Entity\Pasta;
use ArrayObject;
use Cake\Event\EventInterface;
use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Utility\Text;
use Cake\Validation\Validator;

/**
 * Pastas Model
 *
 * @property \App\Model\Table\PotsTable&\Cake\ORM\Association\BelongsTo $Pots
 * @property \App\Model\Table\SaucesTable&\Cake\ORM\Association\HasMany $Sauces
 *
 * @method \App\Model\Entity\Pasta newEmptyEntity()
 * @method \App\Model\Entity\Pasta newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Pasta> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pasta get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Pasta findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Pasta patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Pasta> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pasta|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Pasta saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Pasta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pasta>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pasta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pasta> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pasta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pasta>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Pasta>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Pasta> deleteManyOrFail(iterable $entities, array $options = [])
 */
class PastasTable extends Table
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

        $this->setTable('pastas');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasOne('Sauces', [
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
            ->nonNegativeInteger('pot_id')
            ->allowEmptyString('pot_id');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->allowEmptyString('name');

        return $validator;
    }

    /**
     * before find function
     *
     * @param \Cake\Event\EventInterface $event event
     * @param \Cake\ORM\Query\SelectQuery $query query
     * @param \ArrayObject $options options
     * @return void
     */
    public function beforeFind(EventInterface $event, SelectQuery $query, ArrayObject $options): void
    {
        $query
            ->matching('Sauces')
            ->contain(['Sauces']);
    }

    public function beforeSave(EventInterface $event, Pasta $entity, ArrayObject $options): void
    {
        if (!$entity->isNew()) return;

        $sauce = $this->Sauces->newEmptyEntity();

        $entity->sauce = $sauce;

        $entity->sauce->name = 'Ketchup';
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
        //$rules->add($rules->existsIn(['pot_id'], 'Pots'), ['errorField' => 'pot_id']);

        return $rules;
    }
}
