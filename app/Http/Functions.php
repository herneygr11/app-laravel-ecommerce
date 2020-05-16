<?php

/**
 * @param int $id Identificador del rol
 * @return rol
 */
function getRoleUser(int $id)
{
    $roles = [
        '0' => 'Usuario',
        '1' => 'admin'
    ];

    return $roles[$id];
}
/**
 * @param int $id Identificador del status
 * @return status
 */
function getStatusUser(int $id)
{
    $status = [
        '0'     => 'Registrado',
        '1'     => 'Verificado',
        '100'   => 'Baneado'
    ];
    return $status[$id];
}
