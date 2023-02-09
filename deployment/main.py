from flask import Flask, request, Response
import subprocess
import os

app = Flask(__name__)

@app.route('/webhook', methods=['POST'])
def respond():
    print(request.json)
    if request.json['secret'] == os.environ["PYTHON_SECRET"]:
        os.chdir("./app")
        subprocess.run("composer", "migrate")
        subprocess.run("composer", "install")
    return Response(status=200)
