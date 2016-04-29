#Slackbot - Incoming and OutGoing Webhooks - Boilerplate

Basic webhook code for Slack. (written in .php) I've kept this as simple and as barebones as possible. It's a starting point for people to use to get started with webhooks. Techincally the outgoing webhook is a slash command, but the methods are practically the same.

	incoming webhook attachment example - bot-push-1.php
	outgoing slash command example - fromslack.php


## Set Up

Rename config.example.php to config.php and then edit it to add you own hooks:

define('WEBHOOK_URL','**[YOUR URL HERE]**'); //This is the URL provided to you by slack - it will look something like this: https://hooks.slack.com/services/xxxx/xxxxx
define('SLASH_TOKEN','**[YOUR TOKEN HERE]**');
define('REMOTE_HOST','**[URL WHERE YOURE HOSTING THESE SCRIPTS]**'); 


