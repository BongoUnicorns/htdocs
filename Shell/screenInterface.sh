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
	#echo Creating Screen
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

<<<<<<< HEAD
else #echo Attaching Screen;
=======
else //echo Attaching Screen;
>>>>>>> 058f25124ab84fd961aeb5ebce7c42e9d2f85da7
	screen -S $Token -p 0 -X stuff "$String >/tmp/fifoout
	"
	sleep .05

	cat /tmp/fifoout

	>/tmp/fifoout

	#screen -r $Token
fi
