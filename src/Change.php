<?php

    class Change
    {
        private $bills;
        private $quarter;
        private $dime;
        private $nickel;
        private $penny;

        function __construct()
        {
            $this->bills = 0;
            $this->quarter = 0;
            $this->dime = 0;
            $this->nickel = 0;
            $this->penny = 0;
        }

        function getBills()
        {
            return $this->bills;
        }

        function setBills($new_bills){
            $this->bills = $new_bills;
        }

        function getQuarter()
        {
            return $this->quarter;
        }

        function setQuarter($new_quarter){
            $this->quarter = $new_quarter;
        }

        function getDime()
        {
            return $this->dime;
        }

        function setDime($new_dime){
            $this->dime = $new_dime;
        }


        function getNickel()
        {
            return $this->nickel;
        }

        function setNickel($new_nickel){
            $this->nickel = $new_nickel;
        }


        function getPenny()
        {
            return $this->penny;
        }

        function setPenny($new_penny){
            $this->penny = $new_penny;
        }

        function save(){
            $_SESSION['list_of_coins'] = $this;
        }

        function makeChange($user_coin) //given 1.24 125
        {
            $user_coin = intval($user_coin);

            if($user_coin > 0){
                if($user_coin / 25 >= 1){
                    $this->quarter = floor($user_coin / 25);
                    $this->makeChange($user_coin % 25);

                    //use Quarter
                }else if($user_coin / 10 >= 1){
                    $this->dime = floor($user_coin / 10); //2
                    $this->makeChange($user_coin % 10); //4

                    //user dime
                }else if($user_coin / 5 >= 1){
                    $this->nickel = floor($user_coin / 5);
                    $this->makeChange($user_coin % 5);
                    //use nickel
                }else {
                    //use penny
                    $this->penny = $user_coin;
                }
            }
        }

    }
