<?php

/**
 * Class Cvv2Model
 */
class Cvv2Model extends BaseModel
{
    /**
     * @return null|string
     */
    public function validate()
    {
        if (empty($this->value)) {
            return $this->required() ? $this->getError('require') : null;
        }

        if (!is_numeric($this->value)) {
            return $this->getError('number');
        }

        return strlen($this->value) !== 3 ? $this->getError('validation') : null;
    }
}