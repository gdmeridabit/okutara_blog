<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'likes';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'posts_id'];

    /**
     * Get the user that owns the post.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function posts()
    {
        return $this->belongsTo('App\Posts');
    }
}
