#TRACE DEBUG

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/PedroTroller/TraceDebug/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/PedroTroller/TraceDebug/?branch=master)

##What is it ?

A simple library and a Symfony bundle. With it, you will be able to captule stacktraces and display them into the debug toolbar.

##Installation (Symfony Bundle)

```php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            // ...
            $bundles[] = new PedroTroller\TraceDebug\Bundle\TraceDebugBundle();
        }

        return $bundles;
    }
}
```

##Usage

This library will add a new function : `trace()`. You just have to call this function and a stacktrace will be captured.

```php
class SomeClass
{
    public function someFunction() {
        // ...
        trace();
        // ...
    }
}
```

And thats all, now, you will see a new button into the toolbar named `Trace()` with the number on stacktrace captured.

##Capture multiple stacktrace from multiple places

If you want to capture stacktrace from differents places, it will be dificult to know which trace come from which place... So, you just have to give a name to the capture.

```php
class SomeClass
{
    public function someFunction() {
        // ...
        trace('capture1');
        // ...
    }

    public function someOtherFunction() {
        // ...
        trace('capture2');
        // ...
    }
}
```

And so, the display will sort traces from the name of the capture.
