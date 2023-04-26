<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $title = '';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = ' in ' . $category->name;
        }
        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = ' by ' . $author->name;
        }
        return view('posts', [
            'title' => 'All Posts' . $title,
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(7)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', ['post' => $post]);
    }
}

// Post::create([
//     'title' => 'Judul Ke Tiga',
//     'category_id' => 3,
//     'slug' => 'judul-ketiga',
//     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit ketiga.',
//     'body' => "
//     <p>
//         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita delectus porro reiciendis cumque, voluptatem ipsum totam dolor facilis earum dolore corrupti nemo similique placeat voluptatibus officia consectetur provident voluptates dolorum odit deleniti! Quaerat neque iure facilis itaque expedita nesciunt quae, rerum, magni amet ad assumenda sapiente labore eius, ullam non! Veniam, maxime repellat. Aut voluptas reprehenderit illo distinctio voluptatibus excepturi sed. Accusamus quasi, ullam sunt nobis quia ut, odit iste animi illum iure blanditiis, similique vitae qui perferendis nam nemo omnis deserunt fugit eos distinctio dolore ex tenetur dignissimos unde. Assumenda eaque veniam ad alias enim nemo distinctio dolorum totam.
//     </p>
//     <p>
//         Lorem ipsum dolor sit amet consectetur, adipisicing elit. Perferendis delectus ullam deleniti porro, consectetur eius, enim tenetur alias voluptatem illum tempora necessitatibus nobis, sint numquam! Nemo enim molestias ipsa fuga eius aspernatur? Voluptatum, repellat quisquam deleniti aspernatur perferendis expedita ut quaerat est recusandae ullam dolore perspiciatis facilis dicta eaque magni consectetur nobis labore officiis totam deserunt nihil voluptatem culpa facere. Minus nobis quis voluptas odit doloremque. At voluptatem nihil illo cupiditate accusamus a ipsam quasi dolorem eaque, accusantium maiores, animi fuga, ipsum numquam est vitae? Autem perspiciatis quod doloremque fuga, omnis officiis non, vitae corporis, architecto voluptate vero alias? Libero dignissimos, tempora quidem assumenda quis possimus nihil sequi voluptate neque pariatur praesentium quasi consectetur corporis, laboriosam doloremque enim ipsum dicta? Pariatur recusandae, aperiam sunt earum quam quaerat impedit sint fugiat repudiandae repellat ad nemo fugit laborum maxime cupiditate, magni neque corrupti quibusdam odio quidem numquam dolore! Atque harum delectus pariatur laborum voluptatum unde molestias eum illo ipsam, natus voluptas? Sit molestiae laudantium nesciunt, quas tempora, veritatis doloremque iusto pariatur recusandae quia rerum fugiat, illo porro! At odit fugiat inventore sint unde dolore nobis harum distinctio amet officiis facilis ab adipisci doloremque tempora, ipsam nisi vero provident suscipit voluptate fugit voluptatum.
//     </p>
//     <p>
//         Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita delectus porro reiciendis cumque, voluptatem ipsum totam dolor facilis earum dolore corrupti nemo similique placeat voluptatibus officia consectetur provident voluptates dolorum odit deleniti! Quaerat neque iure facilis itaque expedita nesciunt quae, rerum, magni amet ad assumenda sapiente labore eius, ullam non! Veniam, maxime repellat. Aut voluptas reprehenderit illo distinctio voluptatibus excepturi sed. Accusamus quasi, ullam sunt nobis quia ut, odit iste animi illum iure blanditiis, similique vitae qui perferendis nam nemo omnis deserunt fugit eos distinctio dolore ex tenetur dignissimos unde. Assumenda eaque veniam ad alias enim nemo distinctio dolorum totam.
//     </p>
//     "
// ]);

// Category::create(
//     [
//         'name' => 'Personal',
//         'slug' => 'personal'
//     ],
// );
