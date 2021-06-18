<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EventTranslation
 *
 * @property int $id
 * @property string $title
 * @property string $short_description
 * @property string $locale
 * @property int $event_id
 * @method static \Illuminate\Database\Eloquent\Builder|EventTranslation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventTranslation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EventTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|EventTranslation whereEventId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTranslation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTranslation whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTranslation whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EventTranslation whereTitle($value)
 * @mixin \Eloquent
 */
class EventTranslation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;
}
