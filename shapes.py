import numpy as np
import cv2


# Constants
DEVICE_NUMBER = 0
FONT_FACES = [
    cv2.FONT_HERSHEY_SIMPLEX,
    cv2.FONT_HERSHEY_PLAIN,
    cv2.FONT_HERSHEY_DUPLEX,
    cv2.FONT_HERSHEY_COMPLEX,
    cv2.FONT_HERSHEY_TRIPLEX,
    cv2.FONT_HERSHEY_COMPLEX_SMALL,
    cv2.FONT_HERSHEY_SCRIPT_SIMPLEX,
    cv2.FONT_HERSHEY_SCRIPT_COMPLEX
]
# Init webcam
# http://docs.opencv.org/2.4/modules/highgui/doc/reading_and_writing_images_and_video.html#videocapture-videocapture
vc = cv2.VideoCapture(DEVICE_NUMBER)

# Check if the webcam init was successful
# http://docs.opencv.org/2.4/modules/highgui/doc/reading_and_writing_images_and_video.html#videocapture-isopened
if vc.isOpened(): # try to get the first frame
    # http://docs.opencv.org/2.4/modules/highgui/doc/reading_and_writing_images_and_video.html#videocapture-read
    retval, img = vc.read()
else:
    sys.exit(1)

while retval:
    gray = cv2.cvtColor(img, cv2.COLOR_BGR2GRAY)

    ret,thresh = cv2.threshold(gray,127,255,1)

    contours,h = cv2.findContours(thresh,1,2)

    for cnt in contours:
        approx = cv2.approxPolyDP(cnt,0.01*cv2.arcLength(cnt,True),True)
        print len(approx)
        if len(approx)==4:
            print "square"
            cv2.drawContours(img,[cnt],0,(0,0,255),-1)
        
    cv2.imshow('img',img)
    cv2.waitKey(0)
    cv2.destroyAllWindows()
    