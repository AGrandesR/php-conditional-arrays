<?php declare(strict_types=1);

use Agrandesr\ConditionArray;
use PHPUnit\Framework\TestCase;

final class ConditionArrayTest extends TestCase
{
    public function testControl(): void
    {
        $this->assertEquals(
            true,
            true
        );
    }
    
    public function testAfirmativeConditions(): void
    {
        $test=[];
        $test[] = [10,">","1"];
        $test[] = ["abc",">","abb"];
        $test[] = ["abc","==","abc"];
        $test[] = [1,"IN",[1,2,3,4]];

        foreach($test as $arrayTestCondition) {
            $this->assertEquals(true,ConditionArray::check($arrayTestCondition));
        }
    }

    public function testNegativeConditions(): void
    {
        $test=[];
        $test[] = [10,"<","1"];
        $test[] = ["abc","==","abb"];
        $test[] = ["abc","!==","abc"];
        $test[] = [7,"IN",[1,2,3,4]];

        foreach($test as $arrayTestCondition) {
            $this->assertEquals(false,ConditionArray::check($arrayTestCondition));
        }
    }

    public function testComplexAfirmativeConditions(): void
    {
        $test=[];
        $test[] = [10,">",["1","<","0"]];
        $test[] = [["a","==","a"],"&&",[1000,">",100]];
        $test[] = [["a","==","b"],"||",[1000,">",100]];;
        $test[] = [[10,"==",10],"&&",[1,"IN",[1,2,3,4]]];

        foreach($test as $arrayTestCondition) {
            $this->assertEquals(true,ConditionArray::check($arrayTestCondition));
        }
    }

    public function testComplexNegativeConditions(): void
    {
        $test=[];
        $test[] = [10,"<","1"];
        $test[] = ["abc","==","abb"];
        $test[] = ["abc","!==","abc"];
        $test[] = [7,"IN",[1,2,3,4]];

        foreach($test as $arrayTestCondition) {
            $this->assertEquals(false,ConditionArray::check($arrayTestCondition));
        }
    }
}