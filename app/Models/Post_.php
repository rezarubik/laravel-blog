<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    // use HasFactory;

    // note: Property static
    private static $blog_posts = [
        [
            'title' => 'Title 1',
            'slug' => 'title-1',
            'author' => 'Muhammad Reza Pahlevi Y',
            'body' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cumque in laudantium saepe alias voluptatum vero quas, modi iste nam? Enim quasi repellendus cupiditate quod non fuga quam eveniet ea placeat.'
        ],
        [
            'title' => 'Title 2',
            'slug' => 'title-2',
            'author' => 'Nadiah Tsamara Pratiwi',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro velit perferendis ab, ex quod facere esse. Laudantium perferendis officiis saepe. Blanditiis voluptate rem deserunt totam et? Vitae magnam labore a nisi error officiis quae dolores, ab, eveniet fugit, dicta voluptatem repellat iste consequatur hic culpa impedit tempore debitis sequi doloremque repudiandae. Corrupti porro beatae maxime hic illo quaerat iure perspiciatis rerum sit incidunt deserunt sapiente laudantium earum adipisci, quibusdam quae enim, eveniet mollitia quas, dolore dicta? Magni maxime deserunt corrupti.'
        ],
    ];

    // note: Method static
    public static function all()
    {
        // note: karena property static, maka menggunakan self
        // return self::$blog_posts;
        // note: dibungkus
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        // note: static untuk function
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
