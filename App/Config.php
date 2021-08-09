<?php

/**
 * Application configuration
 */

namespace App;


class Config
{
    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'httpserviceapi';

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     * @var string
     */
    const DB_PASSWORD = '';

    /**
     * Show or hide error messages on screen
     * @var boolean
     *
     */
    const SHOW_ERRORS = true;
    const PROTOKOL = 'http://';
    //public $secretKey = bin2hex(openssl_random_pseudo_bytes(64, 'True'));



}