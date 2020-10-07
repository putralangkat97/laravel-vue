<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
{
    use SoftDeletes;

    protected $guarded = [];
    protected $dates = ['deleted_at'];

    protected static function boot() {
        parent::boot();
        static::deleting(function ($tickets) {
            foreach ($tickets->transactions()->get() as $transaction) {
                $transaction->delete();
            }
        });
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function transactions() {
        return $this->hasMany('App\Transaction', 'ticket_id', 'id');
    }
}
