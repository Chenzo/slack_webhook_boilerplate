<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Fake Slack Output</title>
    </head>
    <body>

        <p>Fake Outgoing Page For Testing...</p>

        <form action="fromslack.php?v=123456&r=y" method="post">
            <label for="name">Slash Command Parameters: </label>
            <input type="text" id="test" name="text" />

            <input type="hidden" name="token" value="<?= SLASH_TOKEN; ?>" />
            <input type="hidden" name="team_id" value="T0001" />
            <input type="hidden" name="team_domain" value="example" />
            <input type="hidden" name="channel_id" value="C2147483705" />
            <input type="hidden" name="channel_name" value="test" />
            <input type="hidden" name="user_id" value="U2147483697" />
            <input type="hidden" name="user_name" value="Steve" />
            <input type="hidden" name="command" value="/tester" />
            <input type="hidden" name="response_url" value="https://hooks.slack.com/commands/1234/5678" />


            <button type="submit">Fake Slack Input</button>

        </form>



    </body>
</html>