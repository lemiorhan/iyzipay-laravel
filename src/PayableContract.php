<?php


namespace Iyzico\IyzipayLaravel;

use Iyzico\IyzipayLaravel\Models\CreditCard;
use Iyzico\IyzipayLaravel\Models\Transaction;
use Iyzico\IyzipayLaravel\StorableClasses\Plan;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

interface PayableContract
{

    public function getKey();

    public function creditCards(): HasMany;

    public function transactions(): HasMany;

    public function subscriptions(): HasMany;

    public function addCreditCard(array $attributes = []): CreditCard;

    public function removeCreditCard(CreditCard $creditCard): bool;

    public function pay(Collection $products, $currency = 'TRY', $installment = 1): Transaction;

    public function isBillable(): bool;

    public function subscribe(Plan $plan): void;

    public function isSubscribeTo(Plan $plan): bool;
}
