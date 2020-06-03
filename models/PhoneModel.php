<?php

/**
 * Class PhoneModel
 */
class PhoneModel extends BaseModel
{

    /**
     * @return null|string
     */
    public function validate()
    {
        if (empty($this->value)) {
            return $this->required() ? $this->getError('require') : null;
        }

        return strlen(preg_replace('/\D/', '', $this->value)) !== 12 ? $this->getError('validation') : null;
    }
}