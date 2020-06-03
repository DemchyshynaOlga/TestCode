<?php

/**
 * Class CardModel
 */
class CardModel extends BaseModel
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

        $luhn = new LuhnAlgorithm($this->value);
        
        return !$luhn->getAlgorithm() ? $this->getError('validation') : null;
    }
}