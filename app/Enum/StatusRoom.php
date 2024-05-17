<?php

namespace App\Enum;

enum StatusRoom:string
{
    case FREE = 'FREE';
    case RESERVE = 'RESERVE';
    case WAITING_CLEANING = 'WAITING_CLEANING';
    case CLEAN = 'CLEAN';
    case SET_SERVICE = 'SET_SERVICE';
}
