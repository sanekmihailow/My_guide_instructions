### livecd
```nginx
e2fsck -ff /dev/mapper/vg_name-lv_var
```
```  
  Pass 1: Checking inodes, blocks, and sizes
  Pass 2: Checking directory structure
  Pass 3: Checking directory connectivity
  Pass 4: Checking reference counts
  Pass 5: Checking group summary information/dev/mapper/vg_d620-lv_example: 11448/1966080 files (1.5% non-contiguous), 4658570/7864320 blocks
```
```nginx
resize2fs /dev/mapper/vg_name-lv_var 29G
```
```
  resize2fs 1.34 (25-Jul-2003)
  Resizing the filesystem on /dev/mapper/vg_name-lv_var to 40000 (4k) blocks.
  The filesystem on /dev/mapper/vg_name-lv_var is now 40000 blocks long.
```
```nginx
lvreduce -L 29G /dev/mapper/vg_name-lv_var
```
```
  lvreduce -- WARNING: reducing active logical volume to 3 GB
  lvreduce -- THIS MAY DESTROY YOUR DATA (filesystem etc.)
  lvreduce -- do you really want to reduce "/dev/volgroup/logicalvol"? [y/n]: y
  lvreduce -- doing automatic backup of volume group "volgroup"
  lvreduce -- logical volume "/dev/volgroup/logicalvol" successfully reduced
```
```nginx
resize2fs /dev/mapper/vg_name-lv_var
e2fsck -f /dev/mapper/vg_name-lv_var
lvs
lvdisplay vg_name
lvscan
```

