<?php
namespace App\Utils;

class Constants {

    /**
     * ROLES
     */
    const ADMIN = 1;
    const REGULAR = 0;


    /**
     * Conditions
     */
    const REQUIRED          = 'Required field;';
    const EXISTS            = 'There is no record with the informed identifier;';
    const UNIQUE            = 'Duplicate registration;';
    const MIN_LENGTH        = 'Mandatory minimum size;';
    const MAX_LENGTH        = 'Maximum exceeded size;';

    /**
     * Types
     */
    const UUID              = 'Must be Uuid (xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx);';
    const STRING            = 'Must be text;';
    const NUMERIC           = 'It must be numerical;';
    const DATE              = 'Must be a date (yyyy-mm-dd hh:ii:ss);';
    const EMAIL             = 'Must be a valid email (example@domain.foo);';

    /**
     * Misc
     */

    //  Success
    const SAVE_SUCCESS      = 'Saved record!';
    const DELETE_SUCCESS    = 'Registration removed!';

    //  Fail
    const SAVE_FAIL         = 'Record not saved!';
    const DELETE_FAIL       = 'This item does not exist or is not valid!';
    const LOGIN_FAIL        = 'It was not possible to login. Check the data!';
}
