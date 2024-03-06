<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pasta Entity
 *
 * @property int $id
 * @property string $model
 * @property int $foreign_key
 * @property string|null $name
 *
 * @property \App\Model\Entity\Pot $pot
 * @property \App\Model\Entity\Sauce $sauces
 */
class Pasta extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'model' => true,
        'foreign_key' => true,
        'name' => true,
        'pot' => true,
        'sauce' => true,
    ];
}
