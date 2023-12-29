import os
from flask import Flask, flash, request, redirect, url_for, jsonify, render_template
from werkzeug.utils import secure_filename
import easyocr
from autocorrect import Speller
from difflib import SequenceMatcher

reader = easyocr.Reader(['en'], True)
spell = Speller()

f = open("answer.txt", "w+")

ansscript = open("answerscript.txt", "r")
script = ansscript.read()

ALLOWED_EXTENSIONS = {'png', 'jpg', 'jpeg', 'gif'}
FILE_DIR = 'files'

app = Flask(__name__)
app.secret_key = "super secret key"

if not os.path.exists(FILE_DIR):
    os.makedirs(FILE_DIR)

def allowed_file(filename):
    return '.' in filename and \
           filename.rsplit('.', 1)[1].lower() in ALLOWED_EXTENSIONS

def similar(a, b):
    return SequenceMatcher(None, a, b).ratio()

@app.route('/', methods=['GET', 'POST'])
def upload_file():
    if request.method == 'POST':
        # check if the post request has the file part
        if 'file' not in request.files:
            flash('No file part')
            return redirect(request.url)
        file = request.files['file']
        # if user does not select file, browser also
        # submit an empty part without filename
        if file.filename == '':
            flash('No selected file')
            return redirect(request.url)
        if file and allowed_file(file.filename):
            filename = FILE_DIR + '/' + secure_filename(file.filename)
            file.save(filename)
            parsed = reader.readtext(filename)
            text = '<br/>\n'.join(map(lambda x: x[1], parsed))
            txt = '\n'.join(map(lambda x: x[1], parsed))
            f.write(spell(txt))
            # handle file upload
            a = round(similar(spell(text),script),2)
            mark = a*100

            #return ("Your marks are: " + str(mark+3))
            return render_template('res.html', variable=mark)
            
    return '''
    <!doctype html>
    <title>Upload new File</title>

    <h1>Upload new File</h1>
    <form method=post enctype=multipart/form-data>
      <input type=file name=file>
      <input type=submit value=Upload>
    </form>
    '''