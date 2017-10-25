# 防火墙 IPTABLES

```
iptables -L -n // 查看本机iptables执行情况

terminal Output
---------------------------------------------------
Chain INPUT (policy ACCEPT)
target     prot opt source               destination         
ACCEPT     all  --  0.0.0.0/0            0.0.0.0/0           
ACCEPT     all  --  0.0.0.0/0            0.0.0.0/0           state RELATED,ESTABLISHED 
ACCEPT     tcp  --  0.0.0.0/0            0.0.0.0/0           tcp dpt:22 
ACCEPT     tcp  --  0.0.0.0/0            0.0.0.0/0           tcp dpt:80 
ACCEPT     tcp  --  0.0.0.0/0            0.0.0.0/0           tcp dpt:443 
ACCEPT     tcp  --  0.0.0.0/0            0.0.0.0/0           tcp dpt:3306 
ACCEPT     icmp --  0.0.0.0/0            0.0.0.0/0           icmp type 8 

Chain FORWARD (policy ACCEPT)
target     prot opt source               destination         

Chain OUTPUT (policy ACCEPT)
target     prot opt source               destination       
---------------------------------------------------

iptables -F 清除预设表中所有规则
iptables -X 清除所有使用者自定义规则

// 这些执行完毕之后执行
/etc/init.d/iptables save
service iptables restart

```
## 规则的增删改查

```
iptables -A INPUT -p tcp --dport 22 -j ACCEPT
iptables -A OUTPUT -p tcp --sport 22 -j ACCEPT
# Web Server
iptables -A OUTPUT -p tcp --sport 80 -j ACCEPT
# Mail SERVER
25SMtP 110 POP3 53 DNS
## ALLOW PING
iptables -A OUTPUT -p icmp -j ACCEPT
iptables -A INPUT -p icmp -j ACCEPT

防止外网用内网IP欺骗
iptables -t nat -A PREROUTING -i eth0 -s 10.0.0.0/8 -j DROP
iptables -t nat -A PREROUTING -i eth0 -s 172.16.0.0/12 -j DROP
iptables -t nat -A PREROUTING -i eth0 -s 192.168.0.0/16 -j DROP

DORP 非法链接

iptables -A INPUT -m state --state INVALID -j DROP
iptables -A OUTPUT -m state --state INVALID -j DROP
iptables-A FORWARD -m state --state INVALID -j DROP


[待续]
```
