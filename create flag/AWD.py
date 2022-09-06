import random
import requests
flags = []
number = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'q', 'w', 'e', 'r', 't', 'y', 'u', '@', 'p', '*', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm']
for x in range(0, 20):
    rd = random.randint(0, 34)
    #print(rd)
    flags.append(str(number[rd]))
xxx = "".join(flags)
nbflag = "flag{"+xxx+"}"
print(nbflag)
file = '316flag.txt'
with open(file, "w") as files:
    files.write("flag{"+xxx+"}")
url = "http://www.awdd.com/inputflag.php"
inputflag= {
    'attack': '316实验室测试',
    "flag": nbflag}
html = requests.post(url, data=inputflag)
#print(html.text)

