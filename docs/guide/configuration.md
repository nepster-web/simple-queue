PHP Simple Queue Usage basics
=============================

An example of using this library.


## :book: Guide

* [Guide](./README.md)
* [Install](./install.md)
* [Store](./store.md)
* **[Configuration](./configuration.md)**
* [Producer (Send message)](./producer.md)
* [Consuming](./consuming.md)
* [Example](./example.md)
* [Cookbook](./cookbook.md)

<br>

## :page_facing_up: Configuration

**Create config:**

You need to use the same config for producer and consumer, for example:

```php
$config = \Simple\Queue\Config::getDefault()
    ->changeRedeliveryTimeInSeconds(100)
    ->changeNumberOfAttemptsBeforeFailure(3)
    ->registerJob(MyJob::class, new MyJob())
    ->registerProcessor('my_queue', static function(\Simple\Queue\Message $message, \Simple\Queue\Producer $producer): string {
   
        // Your message handling logic
        
        return \Simple\Queue\Consumer::STATUS_ACK;
    });
```

