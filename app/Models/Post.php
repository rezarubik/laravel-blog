<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'excerpt', 'body'];

    // note: jika gak mau satu persatu, jadi siapa yg mau dijagain, kebalikan dari $fillable
    protected $guarded = ['id']; //note: id gak boleh diisi, sisanya boleh

    protected $with = ['category', 'author']; //note: with in model, jadi di controller gak perlu lagi

    /**
     * NOTE: Relation to Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * NOTE: Relation to User
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
