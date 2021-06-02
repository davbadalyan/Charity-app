<?php

namespace App\Models;

use App\Services\ImageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

//@property \App\Services\ImageService $imageService

/**
 * App\Models\Event
 * @property \App\Services\ImageService $imageService
 * 
 *
 * @property int $id
 * @property string $title
 * @property string $short_description
 * @property string $promo_code
 * @property string $start_date
 * @property string|null $image
 * @property string $raised_amount
 * @property string $goal_amount
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\EventFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Query\Builder|Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereGoalAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePromoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereRaisedAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Event withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Event withoutTrashed()
 * @mixin \Eloquent
 */
class Event extends Model
{
    use HasFactory, SoftDeletes;

    private $imageService;

    public function __construct()
    {
        parent::__construct();

        $this->imageService = new ImageService('event_images');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'short_description',
        'promo_code',
        'start_date',
        'raised_amount',
        'goal_amount',
        'image',
        // 'deleted_at',
    ];

    public function getImageUrlAttribute(): string
    {
        return $this->imageService->getImageUrl($this->image);
    }


    
}
