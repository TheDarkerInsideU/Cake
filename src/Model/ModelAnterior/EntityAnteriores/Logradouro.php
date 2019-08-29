<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Logradouro Entity
 *
 * @property int $id
 * @property string $estado
 * @property string $uf
 * @property string $cep
 * @property string|null $complemento
 * @property string|null $bairro
 * @property string $cidade
 * @property int|null $user_id
 *
 * @property \App\Model\Entity\User $user
 */
class Logradouro extends Entity
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
        'estado' => true,
        'uf' => true,
        'cep' => true,
        'complemento' => true,
        'bairro' => true,
        'cidade' => true,
        'user_id' => true,
        'user' => true
    ];
}
