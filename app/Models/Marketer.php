<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketer extends Model
{
    use HasFactory;

    public function scopeFilter($query, array $filters)
    {
        if ($filters['searchSerialNo'] ?? false) {
            $query->where('serial_number', 'like', '%' . request('searchSerialNo') . '%');
        }

        if (request('filterBy') === "Referrals Only" ?? false) {
            $query->whereHas('client', function ($q) {
                $q->havingRaw('COUNT(*) > 0');
            });
        }

        if (request('filterBy') === "No Referrals Only" ?? false) {
            $query->whereHas('client', function ($q) {
                $q->havingRaw('COUNT(*) = 0');
            });
        }

        if (request('filterBy') === "Unpaid Referrals") {
            $query->whereHas('client', function ($q) {
                $q->havingRaw('COUNT(*) > 0');
            })->whereRaw('unpaid_amount > 0');
        }

        if (request('filterBy') === "Paid Referrals") {
            $query->whereHas('client', function ($q) {
                $q->havingRaw('COUNT(*) > 0');
            })->whereRaw('unpaid_amount =  0');
        }
    }

    public function client()
    {
        return $this->hasMany(Client::class, 'referred_by');
    }
}
