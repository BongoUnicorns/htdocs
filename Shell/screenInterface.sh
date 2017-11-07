echo hello! this is the script

Token=$1
String=$2

echo $Token
echo $String

screen -S $Token -X select . ; Result=$?

echo $Result

if [[ $Result == 1 ]]; then
	echo creating screen
	screen -S $Token
	eval $String
else echo Found screen!;
	screen -r $Token
fi
