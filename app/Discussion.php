<?php

namespace App;

use App\Scopes\StatusScope;
use App\Tools\Markdowner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\Viewable;

class Discussion extends Model
{
    use SoftDeletes;
    use Viewable;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'last_user_id',
        'title',
        'meta_description',
        'content',
        'status'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new StatusScope());
    }

    /**
     * Get the user for the discussion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments for the discussion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get the tags for the discussion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Set the title and the readable slug.
     *
     * @param string $value
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if (!config('services.youdao.appKey') || !config('services.youdao.appSecret')) {
            $this->setUniqueSlug($value, str_random(5));
        } else {
            $this->setUniqueSlug(translug($value), '');
        }
    }

    /**
     * Get the unique slug.
     *
     * @return param $extra
     */

    public function getUniqueSlug()
    {
        return $this->slug;
    }

    /**
     * Set the unique slug.
     *
     * @param $value
     * @param $extra
     */
    public function setUniqueSlug($value, $extra)
    {
        $slug = str_slug($value . '-' . $extra);

        if (static::whereSlug($slug)->exists()) {
            $this->setUniqueSlug($slug, (int)$extra + 1);
            return;
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * Set the content attribute.
     *
     * @param $value
     */
    public function setContentAttribute($value)
    {
        $data = [
            'raw' => $value,
            'html' => (new Markdowner)->convertMarkdownToHtml($value)
        ];

        $this->attributes['content'] = json_encode($data);
    }

}
