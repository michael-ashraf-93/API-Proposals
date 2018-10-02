<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = [
        'user_id',
        'proposal_type',
        'technical_approval',
        'proposal_number',
        'client_source',
        'sales_agent',
        'client_name',
        'proposal_date',
        'proposal_value',
        'proposal_code',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
