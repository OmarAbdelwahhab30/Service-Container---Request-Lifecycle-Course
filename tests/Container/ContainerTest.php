<?php

namespace Tests\Container;

use App\Core\Container;
use App\Database\First;
use App\Database\Second;
use App\Database\Third;
use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{

//
//    public function test_has_method_is_working(){
//        $container = new Container();
//
//        $container->register("first",First::class);
//
//        $this->assertTrue($container->has("first"));
//
//        $this->assertFalse($container->has("sdkgsjkfngskj"));
//    }
//
//    public function test_resolve(){
//
//
//        $container = new Container();
//
//        $container->register(First::class);
//
//        $container->get(First::class);
//    }

//    public function test_service_can_be_retrieved_form_caontainer(){
//
//        $container = new Container();
//
//        $container->register("first",First::class);
//
//        $this->assertInstanceOf(First::class,$container->get("first"));
//
//    }


    public function test_dependency_between_classess_is_good(){

        $container = new Container();

        $firstObj = $container->get(First::class);

        $secondObj = $firstObj->getDependency();

        $this->assertInstanceOf(Second::class,$secondObj);

        $this->assertInstanceOf(Third::class,$secondObj->getDependency());

    }
}