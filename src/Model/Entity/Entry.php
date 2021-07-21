<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Entry Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $collect_id
 * @property bool $status
 * @property string $content
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Collect $collect
 */
class Entry extends Entity
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
        'collect_id' => true,
        'status' => true,
        'content' => true,
        'user' => true,
        'collect' => true,
    ];
}
