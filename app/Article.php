<?php

namespace App;

use App\Scopes\DraftScope;
use App\Tools\Markdowner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use CyrildeWit\EloquentViewable\Viewable;

use Overtrue\LaravelFollow\Traits\CanBeLiked;
use Overtrue\LaravelFollow\Traits\CanBeFavorited;
use Overtrue\LaravelFollow\Traits\CanBeBookmarked;
use App\Traits\CanBeVoted;

class Article extends Model
{
    use SoftDeletes;
    use Viewable;
    use CanBeLiked, CanBeFavorited, CanBeVoted, CanBeBookmarked;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['published_at', 'created_at', 'deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'last_user_id',
        'type',
        'category_id',
        'title',
        'subtitle',
        'slug',
        'page_image',
        'content',
        'meta_description',
        'is_draft',
        'is_original',
        'published_at',
    ];

    protected $casts = [
        'content' => 'array'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new DraftScope());
    }

    /**
     * Get the user for the blog article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the category for the blog article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the tags for the blog article.
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphToMany
     */
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * Get the comments for the discussion.
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     */
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    /**
     * Get the config for the configuration.
     *
     * @return \Illuminate\Database\Eloquent\Relations\morphMany
     */
    public function config()
    {
        return $this->morphMany(Configuration::class, 'configuration');
    }

    /**
     * Get the created at attribute.
     *
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value)->diffForHumans();
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

    public function setIsVotedAttribute($value)
    {
        $this->attributes['is_voted'] = strtolower($value);
    }

    public function getIsVotedAttribute($value)
    {
        return ucfirst($value);
    }

    public function setIsUpVotedAttribute($value)
    {
        $this->attributes['is_up_voted'] = strtolower($value);
    }

    public function getIsUpVotedAttribute($value)
    {
        return ucfirst($value);
    }

    public function setIsDownVotedAttribute($value)
    {
        $this->attributes['is_down_voted'] = strtolower($value);
    }

    public function getIsDownVotedAttribute($value)
    {
        return ucfirst($value);
    }

    public function setVoteCountAttribute($value)
    {
        $this->attributes['vote_count'] = strtolower($value);
    }
    
    public function getVoteCountAttribute($value)
    {
        return ucfirst($value);
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
