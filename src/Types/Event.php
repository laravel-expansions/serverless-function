<?php

namespace LaravelExpansions\Function\Types;

class Event
{
    /** Stream meta */

    public ?string $from;// DEBUG INFO: stream put app name
    public ?string $channel;// using stream event filter
    public ?array $channels;// using stream event filter
    
    /** Function params */
    
    public string $functionName;// REQUIRED: Function class name
    public $payload;// mixed type request payload
    // public mixed $payload;// PHP ^8.x

    public function __construct($event)
    {
        foreach ($event as $key => $val) {
            $this->$key = $val;
        }
    }

    public function dispatch()
    {
        switch ($this->functionName) {
            case 'dump':
                dump(collect($this)->toJson());
                break;
            default:
                $class = '\App\Functions\\'.$this->functionName;
                return (new $class)->handler($this);
        }
    }
}
