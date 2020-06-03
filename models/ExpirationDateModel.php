<?php

/**
 * Class ExpirationDateModel
 */
class ExpirationDateModel extends BaseModel
{

    /*
     * @return null|string
     */
    public function validate()
    {
        if (empty($this->value)) {
            return $this->required() ? $this->getError('require') : null;
        }

        if (!$this->validateFormat($this->value, Config::getField('dateFormat'))) {
            return $this->getError('validation');
        }

        return !(strtotime($this->value) >= strtotime(date('m/y'))) ? $this->getError('expiration') : null;
    }

    /**
     * @param $date
     * @param string $format
     * @return bool
     */
    private function validateFormat($date, $format = 'm/y')
    {
        return DateTime::createFromFormat($format, $date)
            && DateTime::createFromFormat($format, $date)->format($format) == $date;
    }
}