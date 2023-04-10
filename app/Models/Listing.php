<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Listing extends Model
{
    use HasFactory;

    // protected $fillable = ['title','company','location','email','website','tags','description'];
    public function scopefilter($query, array $filters){
       // dd($filters);
        if($filters['tags'] ?? false){
            $query->where('tags','like', '%'. $filters['tags'] . '%');
        }
        if($filters['search'] ?? false){
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                   ->orwhere('tags', 'like', '%' . $filters['search'] . '%')
                   ->orwhere('description', 'like', '%' . $filters['search'] . '%')
                   ->orwhere('company', 'like', '%' . $filters['search'] . '%')
                   ->orwhere('location', 'like', '%' . $filters['search'] . '%');
        }
    }


}
