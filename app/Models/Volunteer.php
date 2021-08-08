<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
 * App\Models\Volunteer
 *
 * @property int $id
 * @property string $full_name
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\VolunteerFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 */
class Volunteer extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'message'
    ];
}
