<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Message Entity
 *
 * @property int $id
 * @property int $chat_id
 * @property int $send_user_id
 * @property string $content
 *
 * @property \App\Model\Entity\Chat $chat
 * @property \App\Model\Entity\SendUser $send_user
 */
class Message extends Entity
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
        'chat_id' => true,
        'send_user_id' => true,
        'content' => true,
        'chat' => true,
        'send_user' => true,
    ];
}
