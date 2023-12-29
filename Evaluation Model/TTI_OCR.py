import easyocr
import cv2
from autocorrect import Speller

spell = Speller()
img = cv2.imread("Test_Images/test5.jpg")
#img = cv2.imread("cr_im.jpg")

f = open("answer.txt", "w+")
reader = easyocr.Reader(['en'])
result = reader.readtext(img)
for detection in result:
    text = detection[1]
    f.write(spell(text))