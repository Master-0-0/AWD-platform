import schedule
import time
import random
import requests

flags = []
number = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 'q', 'w', 'e', 'r', 't', 'y', 'u', '@', 'p', '*', 's', 'd', 'f', 'g', 'h', 'j', 'k', 'l', 'z', 'x', 'c', 'v', 'b', 'n', 'm']


def job():    
    for x in range(0, 20):
        rd = random.randint(0, 34)
        #print(rd)
        flags.append(str(number[rd]))        
    nbflag = "flag{"+"".join(flags)+"}"
    flags.clear() #清空列表
    #print(nbflag)
    
    
    file = '316flag.txt'
    with open(file, "w") as files:
        files.write(nbflag)
 
    url = "http://www.awd.com/inputflag.php"
    inputflag= {
        'attack': '316实验室测试',
        "flag": nbflag}
    html = requests.post(url, data=inputflag)           
    #print(html.text)

#每隔5分钟执行job函数
schedule.every(5).minutes.do(job)

while True:
    #定时任务
    schedule.run_pending()
    time.sleep(1)
