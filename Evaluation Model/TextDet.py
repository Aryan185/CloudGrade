import cv2
import numpy as np

net = cv2.dnn.readNet("Weights/yolov4-obj_2000.weights", "yolov4-obj.cfg")

classes = []
with open("obj.names","r") as f:
    read = f.readlines()
for i in range(len(read)):
    classes.append(read[i].strip("\n"))

layer_names = net.getLayerNames()
output_layers = []
for i in net.getUnconnectedOutLayers():
    output_layers.append(layer_names[i - 1])

#cam = cv2.VideoCapture(0)
#img = cam.read()[1]
img = cv2.imread("Test_Images/test5.JPG")
height, width, channels = img.shape

blob = cv2.dnn.blobFromImage(img, 1/255, (416, 416), (0, 0, 0), True, crop=False)

net.setInput(blob)
outs = net.forward(output_layers)

class_ids = []
thresholds = []
boxes = []
for output in outs:
    for detection in output:
        scores = detection[5:]
        class_id = np.argmax(scores)
        threshold = scores[class_id]

        if threshold > 0.2:
            center_x = int(detection[0] * width)
            center_y = int(detection[1] * height)
            w = int(detection[2] * width)
            h = int(detection[3] * height)

            x = int(center_x - w / 2)
            y = int(center_y - h / 2)

            boxes.append([x, y, w, h])
            thresholds.append(float(threshold))
            class_ids.append(class_id)
            cr_im = img[y:y + h, x:x + w]
            cv2.imwrite("cr_im.jpg", cr_im)

indexes = cv2.dnn.NMSBoxes(boxes, thresholds, 0.3, 0.4)

for i in range(len(boxes)):
    if i in indexes:
        x, y, w, h = boxes[i]
        label = classes[class_ids[i]]
        cv2.rectangle(img, (x, y), (x + w, y + h), (0, 0, 0), 2)
        #cv2.rectangle(img, (x-1, y), (x+w+1, y-25), (185, 185, 0), -1)
        cv2.putText(img, label, (x, y-8), cv2.FONT_HERSHEY_SIMPLEX, 0.5, (0, 0, 0), 2)
        #print(label)

cv2.imshow("Text detection with YOLO V4",img)

cv2.waitKey(0)
cv2.destroyAllWindows()