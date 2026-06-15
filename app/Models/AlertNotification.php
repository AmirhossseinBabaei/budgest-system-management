<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertNotification extends Model
{
    use HasFactory;

    protected $table = 'alert_notifications';

    protected $fillable = ['user_id', 'alert_id', 'name', 'is_seen'];
}
