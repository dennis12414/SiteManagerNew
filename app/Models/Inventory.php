<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventory extends Model
{
    use HasFactory;
    use CascadeSoftDeletes;
    protected $table = 'inventory';
    protected $primaryKey = 'inventoryId';


    protected $fillable = [
        'inventoryId',
        'projectId',
        'item',
        'description',
        'stock',

    ];
    public function project()
    {
        return $this->belongsTo(Project::class, 'projectId', 'projectId');
    }
}
