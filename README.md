# Dashing implementation for EyesOfNetwork
![Dashing Logo](/images/dashing.png)

## Description
This script allow you to push to a dashing server information about your EyesOfNetwork supervision.
It returns :

* A green tile when all is ok
* An orange tile with a Warning message when there is warnings on your supervision
* A red tile with a Critical message when there is criticals on your supervision

## How to use
You must change these variables first on the PushEonToDashing.php file with the IP address, the port and the auth token of your dashing :

`$api_dashing = "http://DASHING_IP_ADDRESS:DASHING_PORT/widgets/nagios-prod"`

`$dashing_token = "DASHING_AUTH_TOKEN"`


After, simply execute the command.

`php /path/to/script/PushEonToDashing.php`
