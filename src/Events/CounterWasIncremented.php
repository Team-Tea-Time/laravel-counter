<?php

namespace TeamTeaTime\Counter\Events;

use Illuminate\Queue\SerializesModels;
use TeamTeaTime\Counter\Count;

class CounterWasIncremented
{
    use SerializesModels;

    /**
     * @var \Illuminate\Session\Store
     */
    public $session;

    /**
     * @var string
     */
    public $modelName;

    /**
     * @var int
     */
    public $modelID;

    /**
     * @var Count
     */
    public $count;

    /**
     * Create a new event instance.
     *
     * @param  string  $modelName
     * @param  int  $modelID
     * @param  Count  $count
     * @return void
     */
    public function __construct($modelName, $modelID, Count $count)
    {
        $this->session = request()->session();
        $this->modelName = $modelName;
        $this->modelID = $modelID;
        $this->count = $count;
    }
}
