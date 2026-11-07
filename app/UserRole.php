<?php

namespace App;

enum UserRole: string
{
    case Reporter = 'reporter';
    case SecurityOfficer = 'security_officer';
    case Administrator = 'administrator';
}
