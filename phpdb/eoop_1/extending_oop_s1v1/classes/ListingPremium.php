<?php

class ListingPremium extends ListingBasic
{
    private $description;
    protected $allowed_tags = "<br><p><b><strong><m><u><ol><ul><li>";

    /**
     * Gets the local property $description
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Cleans up and sets the local property $description
     * @param string $value to set property
     */
    public function setDescription($value)
    {
        $this->description = trim(strip_tags($value, $this->allowed_tags));
    }
}