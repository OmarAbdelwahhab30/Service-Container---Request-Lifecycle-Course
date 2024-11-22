<?php

namespace App\Core;

class Container
{

    public array $services = [];

    public function register($id, string|object $concrete = null)
    {

        if ($concrete == null) {
            if (!class_exists($id)) {
                throw new \Exception("the class is not found");
            }

            $concrete = $id;
        }
        $this->services[$id] = $concrete;
    }

    public function get(string $id)
    {
        if (!$this->has($id)) {
            if (!class_exists($id)) {
                throw new \Exception("The class is not found");
            }
            $this->register($id);
        }


        // reflection
        $object = $this->resolve($this->services[$id]);
        return $object;
    }


    public function resolve($class)
    {
        // 1. Instantiate a Reflection class (dump and check)
        $reflectionClass = new \ReflectionClass($class);

        // 2. Use Reflection to try to obtain a class constructor
        $constructor = $reflectionClass->getConstructor();

        // 3. If there is no constructor, simply instantiate
        if (null == $constructor) {
            return $reflectionClass->newInstance();
        }

        // 4. Get the constructor parameters
        $constructorParams = $constructor->getParameters();


        // 5. Obtain dependencies
        $classDependencies = $this->resolveClassDependencies($constructorParams);

        // 6. Instantiate with dependencies
        $service = $reflectionClass->newInstanceArgs($classDependencies);

        // 7. Return the object

        return $service;
    }

    public function has(string $id)
    {
        return array_key_exists($id, $this->services);
    }

    private function resolveClassDependencies(array $reflectionParameters): array
    {
        // 1. Initialize empty dependencies array (required by newInstanceArgs)
        $classDependencies = [];

        // 2. Try to locate and instantiate each parameter

        foreach ($reflectionParameters as $parameter) {
            // Get the parameter's ReflectionNamedType as $serviceType (Only class name)

            $serviceType = $parameter->getType();

            // Try to instantiate using $serviceType's name (class name with namespace)


            //recursion
            $service = $this->get($serviceType->getName());

            // Add the service to the classDependencies array

            $classDependencies[] = $service;
        }
        // 3. Return the classDependencies array

        return $classDependencies;
    }
}