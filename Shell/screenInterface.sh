Token=$1
String=$2
String=${String//'"'/}
screen -S $Token -X select . ; Result=$?

if [[ $String == "sDestroy" ]]; then
	screen -S $Token -p 0 -X kill
	echo Destroyed Screen
fi

if [[ $Result == 1 ]]; then
	echo Creating Screen
	screen -dmS $Token bash
	screen -S $Token -p 0 -X stuff "cd
	"
	screen -S $Token -p 0 -X stuff "$String
	"


	screen -r $Token

else echo Attaching Screen;
	screen -S $Token -p 0 -X stuff "$String
	"
	screen -r $Token
fi
