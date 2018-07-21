This is an example of a Laravel application serving WebSockets using Ratchet and Broadcasting messages to it using ZMQ.

**Attention: Not yet working!**

## Tutorial

Install dependencies:

```bash
composer install
yarn && yarn dev
```

Run the WebSockets server an ZMQ receiver:

```bash
php artisan ratchet:serve --driver=WsServer -z
# Starting WsServer server on: 0.0.0.0:8080
# Starting ZMQ listener on: 127.0.0.1:5555
```

Run the Laravel application:

Copy the `.env.example` to `.env` and change this line:

```diff
- BROADCAST_DRIVER=log
+ BROADCAST_DRIVER=zmq

- DB_CONNECTION=mysql
+ DB_CONNECTION=sqlite
- DB_HOST=127.0.0.1
- DB_PORT=3306
- DB_DATABASE=homestead
- DB_USERNAME=homestead
- DB_PASSWORD=secret
```

Create the Sqlite database and migrate:

```bash
touch database/database.sqlite
php artisan migrate
```

Run the Artisan server:

```bash
php artisan serve
```

At this point you should be able to reach [http://localhost:8000](http://localhost:8000). Now, you can fake in some messages using the command:

```bash
php artisan app:messages
# Sending 2 messages
# Done!
```

You should see the updates in the frontend.
