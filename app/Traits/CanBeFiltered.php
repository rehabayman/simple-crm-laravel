<?php

namespace App\Traits;

trait CanBeFiltered {

    public function scopeFilterStatus ($query, $filter) {
        if (in_array($filter, self::STATUS)) {
            return $query->where('status', $filter);
        }

        return $query;
    }
}