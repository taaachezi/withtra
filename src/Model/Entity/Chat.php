<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chat Entity
 *
 * @property int $id
 * @property int $send_user_id
 * @property int $recieve_user_id
 *
 * @property \App\Model\Entity\SendUser $send_user
 * @property \App\Model\Entity\RecieveUser $recieve_user
 * @property \App\Model\Entity\Message[] $messages
 */
class Chat extends Entity
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
        'send_user_id' => true,
        'recieve_user_id' => true,
        'send_user' => true,
        'recieve_user' => true,
        'messages' => true,
    ];
}
