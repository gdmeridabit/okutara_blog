<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class PostCategorize extends Pivot
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'post_categorize';
    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id';
}
