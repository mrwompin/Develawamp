#!/bin/sh
MY_MESSAGE="Hello..."
MY_NAME='test'
ELIPSE="."
NAME_PROMPT="...what is your name?"

clear
echo $MY_MESSAGE
echo -n $ELIPSE
echo -n $ELIPSE
echo -n $ELIPSE
echo ""
echo $NAME_PROMPT
read MY_NAME
clear
echo "Hello $MY_NAME... I hope you are well."
