# devops-test

Simple php and mysql **todo list** app, auto deploy

## Installation

1. Clone this repository
2. `cd` to `devops-test` folder
3. Run `vagrant up`

## Test

* For database test run
```sh
curl localhost:8080/test.php
```
* For test load balancer run same command twice, `HOSTNAME` will change on every request

## How to use

Open web browser, navigate to `http://localhost:8080`

---
