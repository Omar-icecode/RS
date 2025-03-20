<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function marketer() {
        return $this->belongsTo(Marketer::class, 'serial_number');
    }

    public function marketer_id() {
        return $this->belongsTo(Marketer::class, 'id');
    }
}
