<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case CASH = 'cash';
    case CREDIT_CARD = 'credit_card';
    case DEBIT_CARD = 'debit_card';
    case BANK_TRANSFER = 'bank_transfer';
    case PAYPAL = 'paypal';
    case STRIPE = 'stripe';
    case CHECK = 'check';
    case WIRE_TRANSFER = 'wire_transfer';

    /**
     * Get all enum values as an array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
