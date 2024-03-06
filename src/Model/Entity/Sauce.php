<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sauce Entity
 *
 * @property int $id
 * @property int $pasta_id
 * @property string|null $name
 *
 * @property \App\Model\Entity\Pasta $pasta
 */
class Sauce extends Entity
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
        'pasta_id' => true,
        'name' => true,
        'pasta' => true,
    ];
}
