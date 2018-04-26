<?php

class Event{

    public $name;
    public $starts_at;
    public $duration;
    public $attendees = [];
    
    function __construct($name = '', $starts_at = '', $duration = '')
    {
        $this->name = $name;
        $this->starts_at = $starts_at;
        $this->duration = $duration;
    }
    
    public function addAttendee($attendee)
    {
        $this->attendees[] = $attendee;
    }
}
