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
	echo Creating Screen
	screen -dmS $Token bash
	>/tmp/fifoout
	mkfifo /tmp/fifoout
	screen -S $Token -p 0 -X stuff "cd
	"
	screen -S $Token -p 0 -X stuff "$String >/tmp/fifoout
	"
<<<<<<< HEAD
	sleep .01
=======
	sleep .1
>>>>>>> b9ba9baf5683d4150445d0e6bcc0d4ed8c1a25b7
	cat /tmp/fifoout

	#screen -r $Token

else echo Attaching Screen;
	>/tmp/fifoout
	screen -S $Token -p 0 -X stuff "$String >/tmp/fifoout
	"
<<<<<<< HEAD
	sleep .01
=======
	sleep .1
>>>>>>> b9ba9baf5683d4150445d0e6bcc0d4ed8c1a25b7
	cat /tmp/fifoout

	#screen -r $Token
fi
