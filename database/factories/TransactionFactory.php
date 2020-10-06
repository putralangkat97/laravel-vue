<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Ticket;
use App\Transaction;
use Faker\Generator as Faker;

$factory->define(Transaction::class, function (Faker $faker) {
    return [
        'ticket_id' => function () {
            return Ticket::all()->random();
        },
        'qty'       => rand(1, 30),
        'status'    => rand(0, 1),
    ];
});
