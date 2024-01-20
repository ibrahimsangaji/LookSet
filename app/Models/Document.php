<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = [
        'document_number',
        'asset_number',
        'name',
        'device_id',
        'software_id',
        'category_statuses_id',
        'conditions_id',
        'approval_status',
        'explanation',
        'create_user_id',
        'approval_user_id',
    ];

    public function asset()
    {
        return $this->belongsTo(Asset::class, 'asset_number', 'asset_number');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'conditions_id');
    }

    public $timestamps = true;
}
