<?php
namespace App\Models;

use App\Observers\ElasticSearchObserver;
use App\Services\Comment\Commentable;
use App\Traits\DeadlineTrait;
use App\Traits\SearchableTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

/**
 * @property string title
 * @property string external_id
 * @property integer user_assigned_id
 * @property Status status
 * @property Client client
 * @property integer invoice_id
 * @property integer status_id
 * @property Invoice invoice
 */
class Need extends Model
{
    use SearchableTrait, SoftDeletes, DeadlineTrait;

    protected $searchableFields = ['title'];

    const NEED_STATUS_CLOSED = 'closed';

    protected $fillable = [
        'external_id',
        'title',
        'description',
        'status_id',
        'user_assigned_id',
        'user_created_id',
        'client_id',
        'deadline',
    ];
    protected $dates = ['deadline'];

    protected $hidden = ['remember_token'];

    public static function boot()
    {
        parent::boot();

        // This makes it easy to toggle the search feature flag
        // on and off. This is going to prove useful later on
        // when deploy the new search engine to a live app.
        //if (config('services.search.enabled')) {
        static::observe(ElasticSearchObserver::class);
        //}
    }

    public function getRouteKeyName()
    {
        return 'external_id';
    }

    public function displayValue()
    {
        return $this->title;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_assigned_id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_created_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function getAssignedUserAttribute()
    {
        return User::findOrFail($this->user_assigned_id);
    }

    public function isClosed()
    {
        return $this->status == self::NEED_STATUS_CLOSED;
    }

    /**
     * @return array
     */
    public function getSearchableFields(): array
    {
        return $this->searchableFields;
    }
}
