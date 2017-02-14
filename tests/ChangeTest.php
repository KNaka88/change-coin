<?php


    require_once "src/Change.php";

    class ChangeTest extends PHPUnit_Framework_TestCase
    {

        function test_checkAnagram_partial()
        {
            //Arrange
            $user_coin = "60";
            $test_makeChange = new Change();

            //Act
            $result = $test_makeChange->makeChange($user_coin);

            //Assert
            $this->assertEquals("2100", $result);
        }

    }
