## TOTOLINK路由器N200RE存在栈溢出点注入漏洞

# 固件获取与证明型号

在官网下载该N200RE V5_Firmware  V9.3.5u.6095_B20200916版本的固件

https://www.totolink.net/data/upload/20200924/6bb0fad48ff63e85b773fab4b88a19e2.zip



![image-20250329134247424](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291342587.png)





## 漏洞证明与分析

![image-20250329134333833](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291343969.png)

搜索ping

![image-20250329134351220](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291343329.png)

 

%s无限写入到v6，但是v6是有限的数组，会造成栈溢出

输入127.0.0.1  1条数抓包，点击发包

![image-20250329134417756](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291344866.png)

![image-20250329134425768](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291344834.png)

![image-20250329134432995](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291344113.png)
