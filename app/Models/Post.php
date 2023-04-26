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
     * NOTE: Local Scope for search
     */
    public function scopeFilter($query, array $filters)
    {
        // if (isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orWhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        // todo: use when
        $query->when($filters['search'] ?? false, function($query, $search) {
            return $query->where(function($query) use ($search) {
                 $query->where('title', 'like', '%' . $search . '%')
                             ->orWhere('body', 'like', '%' . $search . '%');
             });
         });
 

        // todo: when searchnya ada category, versi callback
        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        // todo: when searchnya ada author, versi arrow function
        $query->when($filters['author'] ?? false, fn($query, $author) => 
            $query->whereHas('author', fn($query) =>
                $query->where('username', $author)
            )
        );
    }

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
