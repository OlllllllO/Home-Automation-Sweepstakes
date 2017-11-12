import mraa
import time
print (mraa.getVersion())

button = mraa.Gpio(29)
button.dir(mraa.DIR_IN)

i=0

while True:
	touchButton = int(button.read())
	
	if(touchButton == 1):
	    i=0 
	    print i, " : ", touchButton
	else:
	    i = i+1
	    print i, " : ", touchButton
