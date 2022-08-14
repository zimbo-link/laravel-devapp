<?php

namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class People extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "surnname",
        "national_id",
        "birth_date",
        "language",
        "mobile_number",
        "email"
    ];

    protected $hidden = [
        "deleted_at",
    ];

    /**
     * Get the comments for the blog post.
     */
    public function interests()
    {
        

        return $this->belongsToMany(Interest::class, 'people_interest', 
        'people_id', 'interest_id');
    }
}
