<?php

/**
 * @param int $id Identificador del rol
 * @return rol
 */
function getRoleUser(int $id = null)
{
    $roles = [
        '0' => 'Usuario',
        '1' => 'admin'
    ];

    if ( is_null( $id ) ) {
        return $roles;
    }

    return $roles[$id];
}
/**
 * @param int $id Identificador del status
 * @return status
 */
function getStatusUser( int $id = null )
{
    $status = [
        '0'     => 'Registrado',
        '1'     => 'Verificado',
        '100'   => 'Baneado'
    ];

    if ( is_null( $id ) ) {
        return $status;
    }

    return $status[$id];
}
