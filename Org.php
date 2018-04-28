<?php

class Org
{
    protected $name;
    protected $address;
    protected $owner;
    protected $org_id;
    protected $events;
    private   $event_current = null;
    
    public function setName($name)
    {
         $this->name = $name;
    }

    public function setAddress($address)
    {
         $this->address = $address;
    }

    public function setOrgOwner($owner)
    {
         $this->owner = $owner;
    }

    public function setOrgId($org_id)
    {
        if($this->validateId($org_id))
            $this->org_id = $org_id;
        else die('Invalid Org Id!');
    }

    public function addEvent($event)
    {
         $this->events[] = $event;
    }

    public function printJson()
    {
        if ($this->event_current === null) {
        
            echo json_encode([
                'org_id'=>$this->org_id,
                'name'=>$this->name,
                'address'=>$this->address,
                'owner'=>$this->owner->getName(),
                'upcoming_events'=>$this->events
            ]);
            
        } else {
        
            $duration = $this->events[$this->event_current]->duration;
            $duration = strstr($duration, 'h') ? str_replace('h', '', $duration) * 360 : str_replace('m', '', $duration) * 60;

            $ends_at = date(
                'Y-m-d H:i:s', 
                strtotime($this->events[$this->event_current]->starts_at) + $duration
            );
            echo json_encode([
                'name'=>$this->events[$this->event_current]->name,
                'starts_at'=>$this->events[$this->event_current]->starts_at,
                'ends_at'=>$ends_at,
                'attendees'=>$this->events[$this->event_current]->attendees
            ]);
        }
    }
    
    public function getNextEvent()
    {
        $this->event_current = ++$this->event_current - 1;
        return $this;
    }
    
    private function validateId($id)
    {
        if (strlen($id) < 9 || strlen($id) > 10 ) return false;
        elseif (! ctype_alnum($id)) return false;
        elseif (! preg_match('/^[94|49]/', $id)) return false;
        elseif (! preg_match('/[A-Za-z]{2}$/', $id)) return false;
        else return true;
    }
}
