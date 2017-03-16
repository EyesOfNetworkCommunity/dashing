<?php

## fichier query_host_down
# GET hosts
# Stats: state = 1

## fichier query_service_alert
# GET services
# Stats: state = 1
# Stats: state = 2

# Variables :
$api_dashing = "http://DASHING_IP_ADDRESS:DASHING_PORT/widgets/nagios-prod" ;
$unixcat_path = "/srv/eyesofnetwork/mk-livestatus/bin/unixcat";
$query_host_down_path = "/srv/eyesofnetwork/dashing/query_host_down" ;
$query_service_alert_path = "/srv/eyesofnetwork/dashing/query_service_alert" ;
$nagios_rw_live_path = "/srv/eyesofnetwork/nagios/var/log/rw/live" ;
$dashing_token = "DASHING_AUTH_TOKEN" ;

# Commandes :
$Hosts=`$unixcat_path < $query_host_down_path $nagios_rw_live_path`;
$Services=`$unixcat_path < $query_service_alert_path $nagios_rw_live_path`;
$Split_Services= explode(";", $Services);
$Warning= $Split_Services[0];
$Critical= $Hosts + $Split_Services[1];

`curl -d '{ "auth_token": "$dashing_token", "warnings": $Warning ,"criticals": $Critical }' $api_dashing`;

?>
