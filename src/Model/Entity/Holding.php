<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Holding Entity
 *
 * @property string $id
 * @property string $idMember
 * @property int $units
 * @property int $unitValue
 * @property int $holdingType
 * @property bool $divisible
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Holding extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
