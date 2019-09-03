<?php
namespace App;

use App\Shareable;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use Shareable;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the likes for the blog post.
     */
    public function likes()
    {
        return $this->hasMany('App\Likes');
    }

    /**
     * Get the categories for the blog post.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Categories', 'post_categorize', 'post_id','category_id');
    }

    protected static function boot() {
        parent::boot();

        static::deleting(function($post) {
            $post->likes()->delete();
            $post->categories()->sync([]);
        });
    }

    protected $shareOptions = [
        'columns' => [
            'title' => 'database_title_column'
        ],
        'url' => 'url'
    ];

    public function getUrlAttribute()
    {
        return url()->full();
    }
}
