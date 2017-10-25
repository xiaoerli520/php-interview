# Linux 压缩操作

## tar

```
tar -cvf like.tar like

tar -xvf like.tar
```

## BZ2

```
tar -cjvf like.tar.bz2 like

tar -xjvf like.tar.bz2

xz

xz like.tar
 
unxz like.tar.xz 
```

## GZIP

```
tar -czvf like.tar.gz like

tar -xzvf like.tar.gz

tgz

gzip like.tar

gunzip like.tar.gz
```
## Z

```
compress like.tar

uncompress like.tar.Z
``` 

## 7z

```
7z a like.7z ./like
7z x like.7z
```
