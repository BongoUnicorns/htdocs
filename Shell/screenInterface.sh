echo hello! this is the script

Token=$1
String=$2

echo $Token
echo $String

screen -S $Token -X select . ; Result=$?

echo $Result

if [[ $Result == 1 ]]; then
	echo creating screen
	screen -dmS $Token bash
	screen -S $Token -p 0 -X exec $String
	screen -r $Token

	else echo Found screen!;
	screen -r $Token
	screen -S $Token -p 0 -X exec $String
	screen -r $Token
fi
