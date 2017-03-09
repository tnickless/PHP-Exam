<?php

namespace interfaces;

interface ILoyaltyCustomer extends ICustomer
{
    /**
     * @param $percentage
     * @return float
     */
    public function setDiscount($percentage);

}