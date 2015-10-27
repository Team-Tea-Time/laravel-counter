<?php

namespace TeamTeaTime\Counter;

use TeamTeaTime\Counter\Count;

trait HasCounters
{
    public function counts()
    {
        return $this->morphMany('TeamTeaTime\Counter\Count', 'model');
    }

    /**
     * Increment a counter using the given key and options.
     *
     * @param  string  $key
     * @param  array  $options
     * @return Count
     */
    public function incrementCount($key, array $options = [])
    {
        // Merge in default options
        $options += [
            'amount'    => 1,
            'user_id'   => 'callback'
        ];

        if ($options['user_id'] == 'callback') {
            $userIDCallback = config('counter.user.id');
            $userID = $userIDCallback();
        } else {
            $userID = $options['user_id'];
        }

        // Create/update and save the count
        $count = Count::firstOrNew([
            'user_id'   => $userID,
            'model_id'  => $this->id,
            'key'       => $key
        ]);
        $count->count = $count->count + $options['amount'];
        $count->save();

        // Save the current model to the attachment
        $this->counts()->save($count);

        return $count;
    }
}
