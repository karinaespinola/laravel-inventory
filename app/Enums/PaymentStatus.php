<?php

namespace App\Enums;

enum PaymentStatus: string
{
    case PENDING = 'pending';
    case PAID = 'paid';
    case FAILED = 'failed';
    case REFUNDED = 'refunded';

    /**
     * Get all enum values as an array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
