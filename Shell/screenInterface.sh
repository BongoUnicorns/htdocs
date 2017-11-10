Token=$1
String=$2
String=${String//'"'/}
screen -S $Token -X select . ; Result=$?

if [[ $String == "sDestroy" ]]; then
	screen -S $Token -p 0 -X kill
	echo Destroyed Screen
fi

if [[ $String == "sDestroy" ]]; then
	screen -S $Token -p 0 -X kill
fi

if [[ $Result == 1 ]]; then
	//echo Creating Screen
	screen -dmS $Token bash
	mkfifo /tmp/fifoout
	screen -S $Token -p 0 -X stuff "cd
	"
	screen -S $Token -p 0 -X stuff "$String >/tmp/fifoout
	"
	sleep .05

	cat /tmp/fifoout

	>/tmp/fifoout

	#screen -r $Token

else //echo Attaching Screen;
	screen -S $Token -p 0 -X stuff "$String >/tmp/fifoout
	"
	sleep .05

	cat /tmp/fifoout

	>/tmp/fifoout

	#screen -r $Token
fi
