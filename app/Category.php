<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    protected static function boot() {
        parent::boot();
        static::deleting(function ($categories) {
            foreach ($categories->tickets()->get() as $ticket) {
                $ticket->delete();
            }
        });
    }

    public function tickets() {
        return $this->hasMany('App\Ticket', 'category_id', 'id');
    }
}
