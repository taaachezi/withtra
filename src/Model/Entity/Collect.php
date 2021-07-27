<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Collect Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $gym_id
 * @property int $part_id
 * @property int $purpose_id
 * @property int $prefecture_id
 * @property string $city
 * @property int $limit
 * @property \Cake\I18n\FrozenDate $time
 * @property string|null $content
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Gym $gym
 * @property \App\Model\Entity\Part $part
 * @property \App\Model\Entity\Purpose $purpose
 * @property \App\Model\Entity\Prefecture $prefecture
 * @property \App\Model\Entity\Entry[] $entries
 */
class Collect extends Entity
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
        'user_id' => true,
        'gym_id' => true,
        'part_id' => true,
        'purpose_id' => true,
        'prefecture_id' => true,
        'city' => true,
        'limit' => true,
        'time' => true,
        'content' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'gym' => true,
        'part' => true,
        'purpose' => true,
        'prefecture' => true,
        'entries' => true,
        'title' => true,
    ];
}
