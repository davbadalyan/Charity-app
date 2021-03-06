<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;
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
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection|\Spatie\MediaLibrary\MediaCollections\Models\Media[] $media
 * @property-read int|null $media_count
 * @property bool $show_foundation_status
 * @property bool $show_button
 * @property-read \App\Models\Post|null $post
 * @property-read \App\Models\EventTranslation|null $translation
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\EventTranslation[] $translations
 * @property-read int|null $translations_count
 * @method static \Illuminate\Database\Eloquent\Builder|Event listsTranslations(string $translationField)
 * @method static \Illuminate\Database\Eloquent\Builder|Event notTranslatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Event orWhereTranslation(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Event orWhereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Event orderByTranslation(string $translationField, string $sortMethod = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|Event translated()
 * @method static \Illuminate\Database\Eloquent\Builder|Event translatedIn(?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereShowButton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereShowFoundationStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTranslation(string $translationField, $value, ?string $locale = null, string $method = 'whereHas', string $operator = '=')
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTranslationLike(string $translationField, $value, ?string $locale = null)
 * @method static \Illuminate\Database\Eloquent\Builder|Event withTranslation()
 * @property-read mixed $progress
 * @method static Builder|Event active(int $limit = 3)
 */
class Event extends Model implements HasMedia, TranslatableContract
{
    use HasFactory, SoftDeletes, InteractsWithMedia, Translatable;

    protected $translatedAttributes = ['title', 'short_description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'promo_code',
        'start_date',
        'raised_amount',
        'goal_amount',
        'show_foundation_status',
        'show_button',
    ];

    protected $casts = [
        'show_button' => 'bool',
        'show_foundation_status' => 'bool',
    ];

    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function getProgressAttribute()
    {
        return ($this->raised_amount / $this->goal_amount) * 100;
    }

    public function scopeActive(Builder $query, int $limit = 3)
    {
        return $query->latest()->limit($limit);
    }

    public function scopePromo(Builder $query, string $promo)
    {
        $promo = "#".Str::replace('#', '', $promo);
        return $query->where('promo_code', $promo);
    }
}
