<?php

namespace Modules\Baholash\Entities;

use App\Models\BaseModel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Mavzular\Entities\Mavzu;

class EmployeeRates extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'employee_rates';

    protected $fillable = ['employee_id', 'manager_id', 'theme_id', 'k1', 'k2', 'k3', 'k4'];


    /**
     * @return BelongsTo
     */
    public function employee(): BelongsTo
    {
        return $this->belongsTo(User::class, 'employee_id');
    }


    /**
     * @return BelongsTo
     */
    public function manager(): BelongsTo
    {
        return $this->belongsTo(User::class, 'manager_id');
    }

    /**
     * @return BelongsTo
     */
    public function theme(): BelongsTo
    {
        return $this->belongsTo(Mavzu::class, 'theme_id');
    }
}
