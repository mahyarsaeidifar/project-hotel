<?php

namespace App\Enum;

enum AmenityGroup:string
{
    case COOLING_HEATING = 'COOLING_HEATING';
    case RECREATIONAL    = 'RECREATIONAL';
    case WELFARE  = 'WELFARE';
    case SAFETY   = 'SAFETY';
    case CATERING = 'CATERING';
}
