<?php

class Events
{
    public $eventsItems;

    /**
     * Tours constructor.
     */
    public function __construct()
    {
        $this->eventItems = $this->getEvents();
    }

    /**
     * @param $id
     * @return array|mixed
     */
    public function getEventById($id)
    {
        $eventItem = [];

        if (array_key_exists($id, $this->eventItems))
        {
            $eventItem = $this->eventItems[$id];
        }

        return $eventItem;
    }

    /**
     * @return array
     */
    private function getEvents()
    {
        $eventItems = [];

        $result = Database::$db->query('SELECT * FROM events');
        while ($row = $result->fetch_assoc()) {
            $eventItems[$row['id']] = $row;
        }

        return $eventItems;
    }
}