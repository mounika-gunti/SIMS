<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMenus extends Model
{
    use HasFactory;

    protected $table = 'user_menus';

    protected $fillable = [
        'user_id',
        'menu_id',
        'is_alloted',
        'all',
        'add',
        'edit',
        'view',
        'delete',
    ];

    public function menu()
    {
        return $this->belongsTo(Menus::class, 'menu_id');
    }
}