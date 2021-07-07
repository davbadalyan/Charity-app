<?php

namespace App\Models;

use App\Services\ImageService;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

//@property \App\Services\ImageService $imageService

/**
 * App\Models\Event
 *
 * @property \App\Services\ImageService $imageService
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
 * @property string $description
 * @property int $event_id
 * @property-read string|null $image_url
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereEventId($value)
 * @property-read \App\Models\Event|null $event
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property-read \App\Models\PostTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PostTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Post listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Post notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Post translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Post translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Post whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Post withTranslation()
 */

class Post extends Model implements HasMedia, TranslatableContract
{
    use HasFactory, InteractsWithMedia, Translatable;

    protected $translatedAttributes = ['title', 'short_description', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'event_id',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function scopeRelevant(Builder $query)
    {
        return $query->latest()->limit(50)->get()->random(3);
    }
}
