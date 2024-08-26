<?php

use Illuminate\Validation\Rules\Enum;

final class RoleEnum extends Enum
{
    const Admin = 'admin';
    const Agency = 'agency';
    // Add other roles as necessary
}