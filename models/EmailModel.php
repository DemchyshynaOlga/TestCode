<?php

/**
 * Class EmailModel
 */
class EmailModel extends BaseModel
{

    /**
     * @return null|string
     */
    public function validate()
    {
        if (empty($this->value)) {
            return $this->required() ? $this->getError('require') : null;
        }

        return !filter_var($this->value, FILTER_VALIDATE_EMAIL) ? $this->getError('validation') : null;
    }
}