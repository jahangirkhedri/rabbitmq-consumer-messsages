## About Project

This is a test project that consume some messages from Rabbitmq and send them by sms,email or other drivers.

---

## usage
- `docker-compose up -d`
- `docker run --rm -v $(pwd):/app composer update`
- `docker-compose exec app php artisan migrate`
- use this command for publish some messages on rabbitmq :
 `docker-compose exec app  php artisan publish:message` some messages are invalid to fail our Job
- consume messages with this command :
 `docker-compose exec app php artisan rabbitmq:consume`
- run tests with this command :
  `docker-compose exec app php artisan test`

---
## codes
I develop a module in **messages** folder

There are 7 folder in our module :
- **commands** is a folder for our commands
- **database** is a folder for our migrations
- **Jobs** is a folder for our Jobs
- **Log** is a folder for Log system
- **msgSender** is a folder for send message system
- **test** is a folder for our test
- **validation** is a folder for our validations

In **send message sender system**  we have different  driver to send message (sms,email)
You can add other driver to this system

In **log system** we can define different driver to save logs.



