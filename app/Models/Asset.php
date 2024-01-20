<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'asset_number',
        'name',
        'device_id',
        'rack_id',
        'software_id',
        'category_statuses_id',
        'conditions_id',
        'approval_status',
        'explanation',
        'create_user_id',
        'approval_user_id',
    ];

    public function device()
    {
        return $this->belongsTo(Device::class, 'device_id');
    }

    public function rack()
    {
        return $this->belongsTo(Rack::class);
    }

    public function software()
    {
        return $this->belongsTo(Software::class);
    }

    public function categorystatus()
    {
        return $this->belongsTo(CategoryStatus::class, 'category_statuses_id');
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class, 'conditions_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'asset_number', 'id');
    }
}
