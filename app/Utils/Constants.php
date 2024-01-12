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
    const REQUIRED          = ['message' => 'Required field;', 'code' => 701];
    const EXISTS            = ['message' => 'There is no record with the informed identifier;', 'code' => 702];
    const UNIQUE            = ['message' => 'Duplicate registration;', 'code' => 703];
    const MIN_LENGTH        = ['message' => 'Mandatory minimum size;', 'code' => 704];
    const MAX_LENGTH        = ['message' => 'Maximum exceeded size;', 'code' => 705];


    /**
     * Types
     */
    const UUID              = ['message' => 'Must be Uuid (xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx);', 'code' => 706];
    const STRING            = ['message' => 'Must be text;', 'code' => 707];
    const NUMERIC           = ['message' => 'It must be numerical;', 'code' => 708];
    const DATE              = ['message' => 'Must be a date (yyyy-mm-dd hh:ii:ss);', 'code' => 709];
    const EMAIL             = ['message' => 'Must be a valid email (example@domain.foo);', 'code' => 710];

    /**
     * Misc
     */

    //  Success
    const SAVE_SUCCESS      = ['message' => 'Saved record!', 'code' => 900];
    const DELETE_SUCCESS    = ['message' => 'Registration removed!', 'code' => 901];

    //  Fail
    const SAVE_FAIL         = ['message' => 'Record not saved!', 'code' => 902];
    const DELETE_FAIL       = ['message' => 'This item does not exist or is not valid!', 'code' => 903];
    const LOGIN_FAIL        = ['message' => 'It was not possible to login. Check the data!', 'code' => 904];
}
