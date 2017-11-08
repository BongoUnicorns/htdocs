echo hello! this is the script

Token=$1
String=$2
String=${String//'"'/}

echo $Token
echo $String
screen -S $Token -X select . ; Result=$?

echo $Result

if [[ $Result == 1 ]]; then
	echo creating screen
	screen -dmS $Token bash
	screen -S $Token -p 0 -X stuff "$String
	"


	screen -r $Token

	else echo Found screen!;
	screen -S $Token -p 0 -X stuff "$String
	"
	screen -r $Token

fi
