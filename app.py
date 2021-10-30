from flask import Flask, request
from flask.templating import render_template, render_template_string
from waitress import serve
import html

app = Flask(__name__, template_folder = 'template/')
app.config.from_object(__name__)

@app.route('/', methods = ['GET', 'POST'])
def index():
    text = 'Hello'
    if request.method == 'POST':
        text = request.form['text']
        try:    
            return render_template_string(text)
        except Exception as e:
            return render_template('test.html', context=str(e))
    return render_template('test.html', context=html.unescape(text))


if __name__ == '__main__':
    serve(app, host = '0.0.0.0', port = 8080)
    