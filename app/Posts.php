<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
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
}
