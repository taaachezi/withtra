<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property int $gym_id
 * @property string $name
 * @property string $password
 * @property string $mail
 * @property int $years
 * @property int $prefecture_id
 * @property string $profile_img
 *
 * @property \App\Model\Entity\Gym $gym
 * @property \App\Model\Entity\Prefecture $prefecture
 * @property \App\Model\Entity\Collect[] $collects
 * @property \App\Model\Entity\Entry[] $entries
 */
class User extends Entity
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
        'gym_id' => true,
        'name' => true,
        'password' => true,
        'mail' => true,
        'years' => true,
        'prefecture_id' => true,
        'profile_img' => true,
        'gym' => true,
        'prefecture' => true,
        'collects' => true,
        'entries' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];

    // パスワードハッシュ化
    protected function _setPassword($password)
    {
        if(strlen($password) > 0){
            return (new DefaultPasswordHasher)->hash($password);
        }
    }
}
