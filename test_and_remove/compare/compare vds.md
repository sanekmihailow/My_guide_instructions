<table>
<tr>
    <td> ipserver hdd </td> 
    <td> ipserver ssd </td> 
    <td> timeweb nvme </td>
    <td> 62yun nvme </td>
</tr>
<tr>
    <td>

```
CPU node - Intel Xeon E5-2630 v4
CPU - 4
RAM - 10
hdd - 560 GB
RAID - no
```

 </td>
    <td>

```
CPU node -  Intel Xeon E5-2650 v4
CPU - 3
RAM - 4
ssd - 80 GB
RAID - no
```

 </td>
    <td>

```
CPU node - QEMU Virtual version
CPU - 2
RAM - 2
nvme - 40 GB
RAID - no
```

 </td>
 <td>
    
```
CPU node - Intel Xeon E5-2667 v2
CPU - 4
RAM - 6
nvme - 100 GB
RAID - no
```

 </td>
</tr>
<tr>
<td colspan=3> 1 поток(thread)<br/>
Команды:<br/>

```nginx
#----------- диск ---------#
#>>> fio
fio --randrepeat=1 --ioengine=libaio --direct=1 --gtod_reduce=1 --name=fiotest --filename=testfio --bs=4k --iodepth=64 --size=8G --readwrite=randrw --rwmixread=75 --max-jobs=1

#>>> sysbench
sysbench --num-threads=1 --test=fileio --file-total-size=3G --file-test-mode=rndrw prepare
sysbench --num-threads=1 --test=fileio --file-total-size=3G --file-test-mode=rndrw run
sysbench --num-threads=1 --test=fileio --file-total-size=3G --file-test-mode=rndrw cleanup

#----------- RAM ---------#
#>>> sysbench
sysbench --threads=1 --events=10000 --test=memory --memory-block-size=8K --memory-total-size=100G --memory-access-mode=seq run

#----------- CPU ---------#
#>>> sysbench
sysbench --test=cpu --cpu-max-prime=20000 --num-threads=1 run
```

<td>
</tr>
<tr>
 <td>

### DISK

> fio -----------------

Starting 1 process
Jobs: 1 (f=1): [m(1)][100.0%][r=217MiB/s,w=71.6MiB/s][r=55.7k,w=18.3k IOPS][eta 00m:00s]
fiotest: (groupid=0, jobs=1): err= 0: pid=755: Thu Oct 13 20:32:24 2022

 <table>
    <tr>
      <td>
        <span style="color:#ff6961"> <strong> read: IOPS=1001  </strong> </span>, BW=4006KiB/s (4102kB/s)(6141MiB/1569853msec)
      </td>
    </tr>
    <tr>
      <td>
        bw (  KiB/s): min=    7, max=46728, per=100.00%, avg=4193.77, stdev=4461.85, samples=2995
      </td>
    </tr>
    <tr>
      <td>
        <span style="color:#6495ed"> <strong> iops        : min=    1, max=11682, avg=1048.41, </strong> </span> stdev=1115.46, samples=2995
      </td>
    </tr>
    <tr>
    </tr>
    <tr>
      <td>
        <span style="color:#ff6961"> <strong> write: IOPS=334 </strong> </span>, BW=1338KiB/s (1370kB/s)(2051MiB/1569853msec)
      </td>
    </tr>
    <tr>
      <td>
        bw (  KiB/s): min=    7, max=15792, per=100.00%, avg=1446.70, stdev=1533.81, samples=2899
      </td>
    </tr>
    <tr>
      <td>
        <span style="color:#6495ed"> <strong> iops        : min=    1, max= 3948, avg=361.64,</strong> </span> stdev=383.46, samples=2899
      </td>
    </tr>
 </table>        

  cpu          : usr=0.77%, sys=2.77%, ctx=1142989, majf=0, minf=28
 IO depths    : 1=0.1%, 2=0.1%, 4=0.1%, 8=0.1%, 16=0.1%, 32=0.1%, >=64=100.0%
submit    : 0=0.0%, 4=100.0%, 8=0.0%, 16=0.0%, 32=0.0%, 64=0.0%, >=64=0.0%
 complete  : 0=0.0%, 4=100.0%, 8=0.0%, 16=0.0%, 32=0.0%, 64=0.1%, >=64=0.0%
issued rwts: total=1572145,525007,0,0 short=0,0,0,0 dropped=0,0,0,0
latency   : target=0, window=0, percentile=100.00%, depth=64

Run status group 0 (all jobs):

  <span style="color:#ff6961"> <strong> READ: bw=4006KiB/s (4102kB/s)</strong> </span>, 4006KiB/s-4006KiB/s (4102kB/s-4102kB/s), io=6141MiB (6440MB), <span style="color:#6495ed"> <strong>run=1569853-1569853msec</strong> </span>

  <span style="color:#ff6961"> <strong> WRITE: bw=1338KiB/s (1370kB/s)</strong> </span>, 1338KiB/s-1338KiB/s (1370kB/s-1370kB/s), io=2051MiB (2150MB), <span style="color:#6495ed"> <strong>run=1569853-1569853msec</strong> </span>

Disk stats (read/write):
  vda: ios=1574712/545425, merge=24/16723, ticks=89091009/13649377, in_queue=102740386, util=98.37%

> sysbench -----------------

Running the test with following options:
Number of threads: 1
Initializing random number generator from current time

Extra file open flags: (none)
128 files, 24MiB each
3GiB total file size
Block size 16KiB
Number of IO requests: 0
Read/Write ratio for combined random IO test: 1.50
Periodic FSYNC enabled, calling fsync() each 100 requests.
Calling fsync() at the end of test, Enabled.
Using synchronous I/O mode
Doing random r/w test
Initializing worker threads...

Threads started!File operations:
 <table>
    <tr>
      <td>
        reads/s:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 1290.53 </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        writes/s:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 860.35 </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        fsyncs/s:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 2763.49 </strong> </span>
      </td>
    </tr>
 </table>


Throughput:
 <table>
    <tr>
      <td>
        read:, MiB/s:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 20.16 </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        written, MiB/s:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 13.44 </strong> </span>
      </td>
    </tr>
 </table>

General statistics:
 <table>
    <tr>
      <td>
        total time: 
      </td>
      <td>
        10.0370s
      </td>
    </tr>
    <tr>
      <td>
        total number of events:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 49224 </strong> </span>
      </td>
    </tr>
 </table>

Latency (ms):

 <table>
    <tr>
      <td>
        min: 
      </td>
      <td>
        0.00
      </td>
    </tr>
    <tr>
      <td>
        avg:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 0.20 </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        max:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 209.52 </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        95th percentile:
      </td>
      <td>
         0.44
      </td>
    </tr>
    <tr>
      <td>
        sum:
      </td>
      <td>
        9968.86
      </td>
    </tr>
 </table>
                            
Threads fairness:
    events (avg/stddev):           49224.0000/0.00; &emsp;&emsp;
    execution time (avg/stddev):   9.9689/0.00


### RAM

> sysbench -----------------

Running the test with following options:
Number of threads: 1
Initializing random number generator from current time
Running memory speed test with the following options:
  block size: 8KiB
  total size: 102400MiB
  operation: write
  scope: global
Initializing worker threads..
Threads started!

<table>
    <tr>
      <td>
        Total operations:
      </td>
      <td>
        <span style="color:#ff6961"> <strong>10870710</strong> </span> (<span style="color:#6495ed"> <strong>1086563.45 per second</strong> </span>)
      </td>
    </tr>
    <tr>
      <td>
        transferred:
      </td>
      <td>
        <span style=<span style="color:#ff6961"> <strong>84927.42 MiB</strong> </span> transferred (<span style="color:#6495ed"> <strong>8488.78 MiB/sec</strong> </span>) </strong> </span>
      </td>
    </tr>
 </table>



General statistics:
 <table>
    <tr>
      <td>
        total time: 
      </td>
      <td>
        10.0003s
      </td>
    </tr>
    <tr>
      <td>
        total number of events:
      </td>
      <td>
        <span style="color:#ff6961"> <strong>10870710</strong> </span>
      </td>
    </tr>
 </table>


Latency (ms):
 <table>
    <tr>
      <td>
        min: 
      </td>
      <td>
        0.00
      </td>
    </tr>
    <tr>
      <td>
        avg:
      </td>
      <td>
        0.00
      </td>
    </tr>
    <tr>
      <td>
        max:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 5.94 </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        95th percentile:
      </td>
      <td>
          0.00
      </td>
    </tr>
    <tr>
      <td>
        sum:
      </td>
      <td>
        8021.72
      </td>
    </tr>
 </table>

Threads fairness:
    events (avg/stddev):           10870710.0000/0.00; &emsp;&emsp;
    execution time (avg/stddev):  <span style="color:#6495ed"> <strong> 8.0217/0.00 </strong> </span>


### CPU

> sysbench -----------------

Running the test with following options:
Number of threads: 1
Initializing random number generator from current time

Prime numbers limit: 20000
Initializing worker threads...
Threads started!

CPU speed:

<span style="color:#ff6961"> <strong> events per second: &emsp;&emsp;   289.29 </strong> </span>

General statistics:
<table>
    <tr>
      <td>
        total time: 
      </td>
      <td>
        10.0036s
      </td>
    </tr>
    <tr>
      <td>
        total number of events:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 2895 </strong> </span>
      </td>
    </tr>
 </table>


Latency (ms):
 <table>
    <tr>
      <td>
        min: 
      </td>
      <td>
        <span style="color:#ff6961"> <strong>2.52 </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        avg:
      </td>
      <td>
         <span style="color:#ff6961"> <strong>3.45 </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        max:
      </td>
      <td>
        <span style="color:#ff6961"> <strong>6.60 </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        95th percentile:
      </td>
      <td>
          4.18
      </td>
    </tr>
    <tr>
      <td>
        sum:
      </td>
      <td>
        <span style="color:#ff6961"> <strong>9987.57 </strong> </span>
      </td>
    </tr>
 </table>



Threads fairness:
    events (avg/stddev):  <span style="color:#ff6961"> <strong> 2895.0000 / 0.00</strong> </span>; &emsp;&emsp;
    execution time (avg/stddev):   9.9876/0.00

 <td>

### DISK

> fio

```bash
Starting 1 process
Jobs: 1 (f=1): [m(1)][100.0%][r=217MiB/s,w=71.6MiB/s][r=55.7k,w=18.3k IOPS][eta 00m:00s]
fiotest: (groupid=0, jobs=1): err= 0: pid=1853554: Thu Oct 13 23:37:31 2022
  read: IOPS=48.4k, BW=189MiB/s (198MB/s)(6141MiB/32465msec)
   bw (  KiB/s): min= 5696, max=259193, per=100.00%, avg=203216.72, stdev=43633.22, samples=61
   iops        : min= 1424, max=64798, avg=50803.89, stdev=10908.26, samples=61
  write: IOPS=16.2k, BW=63.2MiB/s (66.2MB/s)(2051MiB/32465msec); 0 zone resets
   bw (  KiB/s): min= 1736, max=86938, per=100.00%, avg=67857.11, stdev=14557.67, samples=61
   iops        : min=  434, max=21734, avg=16963.93, stdev=3639.36, samples=61
  cpu          : usr=12.37%, sys=47.98%, ctx=23439, majf=0, minf=9
  IO depths    : 1=0.1%, 2=0.1%, 4=0.1%, 8=0.1%, 16=0.1%, 32=0.1%, >=64=100.0%
     submit    : 0=0.0%, 4=100.0%, 8=0.0%, 16=0.0%, 32=0.0%, 64=0.0%, >=64=0.0%
     complete  : 0=0.0%, 4=100.0%, 8=0.0%, 16=0.0%, 32=0.0%, 64=0.1%, >=64=0.0%
     issued rwts: total=1572145,525007,0,0 short=0,0,0,0 dropped=0,0,0,0
     latency   : target=0, window=0, percentile=100.00%, depth=64

Run status group 0 (all jobs):
   READ: bw=189MiB/s (198MB/s), 189MiB/s-189MiB/s (198MB/s-198MB/s), io=6141MiB (6440MB), run=32465-32465msec
  WRITE: bw=63.2MiB/s (66.2MB/s), 63.2MiB/s-63.2MiB/s (66.2MB/s-66.2MB/s), io=2051MiB (2150MB), run=32465-32465msec

Disk stats (read/write):
  vda: ios=1559647/521500, merge=15/711, ticks=807676/504258, in_queue=1311935, util=99.74%
```

> sysbench

```bash
Running the test with following options:
Number of threads: 1
Initializing random number generator from current time


Extra file open flags: (none)
128 files, 24MiB each
3GiB total file size
Block size 16KiB
Number of IO requests: 0
Read/Write ratio for combined random IO test: 1.50
Periodic FSYNC enabled, calling fsync() each 100 requests.
Calling fsync() at the end of test, Enabled.
Using synchronous I/O mode
Doing random r/w test
Initializing worker threads...

Threads started!


File operations:
    reads/s:                      2739.59
    writes/s:                     1826.40
    fsyncs/s:                     5851.33

Throughput:
    read, MiB/s:                  42.81
    written, MiB/s:               28.54

General statistics:
    total time:                          10.0497s
    total number of events:              104593

Latency (ms):
         min:                                    0.00
         avg:                                    0.09
         max:                                   17.87
         95th percentile:                        0.32
         sum:                                 9914.08

Threads fairness:
    events (avg/stddev):           104593.0000/0.00
    execution time (avg/stddev):   9.9141/0.00
```

### RAM

> sysbench

```bash
Running the test with following options:
Number of threads: 1
Initializing random number generator from current time


Running memory speed test with the following options:
  block size: 8KiB
  total size: 102400MiB
  operation: write
  scope: global

Initializing worker threads...

Threads started!

Total operations: 11787152 (1178393.19 per second)

92087.12 MiB transferred (9206.20 MiB/sec)


General statistics:
    total time:                          10.0001s
    total number of events:              11787152

Latency (ms):
         min:                                    0.00
         avg:                                    0.00
         max:                                    0.50
         95th percentile:                        0.00
         sum:                                 8169.36

Threads fairness:
    events (avg/stddev):           11787152.0000/0.00
    execution time (avg/stddev):   8.1694/0.00
```

### CPU

> sysbench

```bash
Running the test with following options:
Number of threads: 1
Initializing random number generator from current time


Prime numbers limit: 20000

Initializing worker threads...

Threads started!

CPU speed:
    events per second:   311.22

General statistics:
    total time:                          10.0029s
    total number of events:              3114

Latency (ms):
         min:                                    3.18
         avg:                                    3.21
         max:                                    5.16
         95th percentile:                        3.25
         sum:                                 9997.54

Threads fairness:
    events (avg/stddev):           3114.0000/0.00
    execution time (avg/stddev):   9.9975/0.00
```

 </td>
 <td>

### mysql

### DISK

> fio

```bash
Starting 1 process
Jobs: 1 (f=1): [m(1)][100.0%][r=373MiB/s,w=124MiB/s][r=95.5k,w=31.6k IOPS][eta 00m:00s]
fiotest: (groupid=0, jobs=1): err= 0: pid=69815: Thu Oct 20 16:26:24 2022
  read: IOPS=90.4k, BW=353MiB/s (370MB/s)(6141MiB/17385msec)
   bw (  KiB/s): min=94072, max=425880, per=99.92%, avg=361424.29, stdev=58793.36, samples=34
   iops        : min=23518, max=106470, avg=90356.06, stdev=14698.34, samples=34
  write: IOPS=30.2k, BW=118MiB/s (124MB/s)(2051MiB/17385msec); 0 zone resets
   bw (  KiB/s): min=30960, max=141416, per=99.89%, avg=120660.15, stdev=19684.36, samples=34
   iops        : min= 7740, max=35354, avg=30165.03, stdev=4921.09, samples=34
  cpu          : usr=19.82%, sys=57.02%, ctx=197149, majf=0, minf=7
  IO depths    : 1=0.1%, 2=0.1%, 4=0.1%, 8=0.1%, 16=0.1%, 32=0.1%, >=64=100.0%
     submit    : 0=0.0%, 4=100.0%, 8=0.0%, 16=0.0%, 32=0.0%, 64=0.0%, >=64=0.0%
     complete  : 0=0.0%, 4=100.0%, 8=0.0%, 16=0.0%, 32=0.0%, 64=0.1%, >=64=0.0%
     issued rwts: total=1572145,525007,0,0 short=0,0,0,0 dropped=0,0,0,0
     latency   : target=0, window=0, percentile=100.00%, depth=64

Run status group 0 (all jobs):
   READ: bw=353MiB/s (370MB/s), 353MiB/s-353MiB/s (370MB/s-370MB/s), io=6141MiB (6440MB), run=17385-17385msec
  WRITE: bw=118MiB/s (124MB/s), 118MiB/s-118MiB/s (124MB/s-124MB/s), io=2051MiB (2150MB), run=17385-17385msec

Disk stats (read/write):
  vda: ios=1547708/516987, merge=0/43, ticks=168366/521282, in_queue=689649, util=99.63%
```

> sysbench

```bash
Running the test with following options:
Number of threads: 1
Initializing random number generator from current time


Extra file open flags: (none)
128 files, 24MiB each
3GiB total file size
Block size 16KiB
Number of IO requests: 0
Read/Write ratio for combined random IO test: 1.50
Periodic FSYNC enabled, calling fsync() each 100 requests.
Calling fsync() at the end of test, Enabled.
Using synchronous I/O mode
Doing random r/w test
Initializing worker threads...

Threads started!


File operations:
    reads/s:                      5086.40
    writes/s:                     3390.94
    fsyncs/s:                     10861.39

Throughput:
    read, MiB/s:                  79.48
    written, MiB/s:               52.98

General statistics:
    total time:                          10.0012s
    total number of events:              193320

Latency (ms):
         min:                                    0.00
         avg:                                    0.05
         max:                                   15.58
         95th percentile:                        0.17
         sum:                                 9918.00

Threads fairness:
    events (avg/stddev):           193320.0000/0.00
    execution time (avg/stddev):   9.9180/0.00
```

### RAM

> sysbench

```bash
Running the test with following options:
Number of threads: 1
Initializing random number generator from current time


Running memory speed test with the following options:
  block size: 8KiB
  total size: 102400MiB
  operation: write
  scope: global

Initializing worker threads...

Threads started!

Total operations: 13107200 (1651951.87 per second)

102400.00 MiB transferred (12905.87 MiB/sec)


General statistics:
    total time:                          7.9326s
    total number of events:              13107200

Latency (ms):
         min:                                    0.00
         avg:                                    0.00
         max:                                    0.39
         95th percentile:                        0.00
         sum:                                 6365.88

Threads fairness:
    events (avg/stddev):           13107200.0000/0.00
    execution time (avg/stddev):   6.3659/0.00
```

### RAM

> sysbench

```bash
Running the test with following options:
Number of threads: 1
Initializing random number generator from current time


Prime numbers limit: 20000

Initializing worker threads...

Threads started!

CPU speed:
    events per second:   403.77

General statistics:
    total time:                          10.0014s
    total number of events:              4039

Latency (ms):
         min:                                    2.43
         avg:                                    2.48
         max:                                    5.73
         95th percentile:                        2.57
         sum:                                 9998.13

Threads fairness:
    events (avg/stddev):           4039.0000/0.00
    execution time (avg/stddev):   9.9981/0.00
```

 </td>
 <td>

### DISK

> fio

```bash
Starting 1 process
Jobs: 1 (f=1): [m(1)][100.0%][r=10.6MiB/s,w=3540KiB/s][r=2721,w=885 IOPS][eta 00m:00s]
fiotest: (groupid=0, jobs=1): err= 0: pid=31990: Mon Oct 31 13:23:30 2022
   read: IOPS=2524, BW=9.86MiB/s (10.3MB/s)(6141MiB/622727msec)
   bw (  KiB/s): min=   24, max=26610, per=100.00%, avg=10181.42, stdev=3377.05, samples=1234
   iops        : min=    6, max= 6652, avg=2545.29, stdev=844.26, samples=1234
  write: IOPS=843, BW=3372KiB/s (3453kB/s)(2051MiB/622727msec)
   bw (  KiB/s): min=   16, max= 9077, per=100.00%, avg=3399.86, stdev=1144.97, samples=1234
   iops        : min=    4, max= 2269, avg=849.91, stdev=286.24, samples=1234
  cpu          : usr=4.52%, sys=15.94%, ctx=280323, majf=0, minf=28
  IO depths    : 1=0.1%, 2=0.1%, 4=0.1%, 8=0.1%, 16=0.1%, 32=0.1%, >=64=100.0%
     submit    : 0=0.0%, 4=100.0%, 8=0.0%, 16=0.0%, 32=0.0%, 64=0.0%, >=64=0.0%
     complete  : 0=0.0%, 4=100.0%, 8=0.0%, 16=0.0%, 32=0.0%, 64=0.1%, >=64=0.0%
     issued rwts: total=1572145,525007,0,0 short=0,0,0,0 dropped=0,0,0,0
     latency   : target=0, window=0, percentile=100.00%, depth=64

Run status group 0 (all jobs):
   READ: bw=9.86MiB/s (10.3MB/s), 9.86MiB/s-9.86MiB/s (10.3MB/s-10.3MB/s), io=6141MiB (6440MB), run=622727-622727msec
  WRITE: bw=3372KiB/s (3453kB/s), 3372KiB/s-3372KiB/s (3453kB/s-3453kB/s), io=2051MiB (2150MB), run=622727-622727msec

Disk stats (read/write):
  sda: ios=1572341/536670, merge=11/4059, ticks=28816132/10004251, in_queue=38822950, util=100.00%
```

> sysbench

```bash
Running the test with following options:
Number of threads: 1
Initializing random number generator from current time


Extra file open flags: (none)
128 files, 24MiB each
3GiB total file size
Block size 16KiB
Number of IO requests: 0
Read/Write ratio for combined random IO test: 1.50
Periodic FSYNC enabled, calling fsync() each 100 requests.
Calling fsync() at the end of test, Enabled.
Using synchronous I/O mode
Doing random r/w test
Initializing worker threads...

Threads started!


File operations:
    reads/s:                      502.66
    writes/s:                     335.11
    fsyncs/s:                     1080.22

Throughput:
    read, MiB/s:                  7.85
    written, MiB/s:               5.24

General statistics:
    total time:                          10.0223s
    total number of events:              19103

Latency (ms):
         min:                                    0.00
         avg:                                    0.52
         max:                                  158.57
         95th percentile:                        1.86
         sum:                                 9938.81

Threads fairness:
    events (avg/stddev):           19103.0000/0.00
    execution time (avg/stddev):   9.9388/0.00
```

### RAM

> sysbench

```bash
Running the test with following options:
Number of threads: 1
Initializing random number generator from current time


Running memory speed test with the following options:
  block size: 8KiB
  total size: 102400MiB
  operation: write
  scope: global

Initializing worker threads...

Threads started!

Total operations: 13107200 (1651951.87 per second)

102400.00 MiB transferred (12905.87 MiB/sec)


General statistics:
    total time:                          7.9326s
    total number of events:              13107200

Latency (ms):
         min:                                    0.00
         avg:                                    0.00
         max:                                    0.39
         95th percentile:                        0.00
         sum:                                 6365.88

Threads fairness:
    events (avg/stddev):           13107200.0000/0.00
    execution time (avg/stddev):   6.3659/0.00
```

### CPU

> sysbench

```bash
Running the test with following options:
Number of threads: 1
Initializing random number generator from current time


Prime numbers limit: 20000

Initializing worker threads...

Threads started!

CPU speed:
    events per second:   163.96

General statistics:
    total time:                          10.0074s
    total number of events:              1642

Latency (ms):
         min:                                    4.50
         avg:                                    6.08
         max:                                   26.00
         95th percentile:                        8.43
         sum:                                 9989.74

Threads fairness:
    events (avg/stddev):           1642.0000/0.00
    execution time (avg/stddev):   9.9897/0.00
```

 </td>
</tr>
<tr>
<td colspan=3> 4 потока (threads)<br/>
Команды:<br/>

```nginx
#----------- диск ---------#
#>>> fio
fio --randrepeat=1 --ioengine=libaio --direct=1 --gtod_reduce=1 --name=fiotest --filename=testfio --bs=4k --iodepth=64 --size=8G --readwrite=randrw --rwmixread=75 --max-jobs=4

#>>> sysbench
sysbench --num-threads=4 --test=fileio --file-total-size=3G --file-test-mode=rndrw prepare
sysbench --num-threads=4 --test=fileio --file-total-size=3G --file-test-mode=rndrw run
sysbench --num-threads=4 --test=fileio --file-total-size=3G --file-test-mode=rndrw cleanup

#----------- RAM ---------#
#>>> sysbench
sysbench --threads=4 --events=10000 --test=memory --memory-block-size=8K --memory-total-size=100G --memory-access-mode=seq run

#----------- CPU ---------#
#>>> sysbench
sysbench --test=cpu --cpu-max-prime=20000 --num-threads=4 run
```

<td>
</tr>
<tr>
 <td>

### DISK

> fio

```bash
Starting 1 process
Jobs: 1 (f=1): [m(1)][99.7%][r=229MiB/s,w=76.1MiB/s][r=58.6k,w=19.5k IOPS][eta 00m:01s]
fiotest: (groupid=0, jobs=1): err= 0: pid=14669: Thu Oct 13 23:16:56 2022
   read: IOPS=5327, BW=20.8MiB/s (21.8MB/s)(6141MiB/295073msec)
   bw (  KiB/s): min=    8, max=288248, per=100.00%, avg=189733.59, stdev=87988.61, samples=66
   iops        : min=    2, max=72062, avg=47433.32, stdev=21997.15, samples=66
  write: IOPS=1779, BW=7117KiB/s (7288kB/s)(2051MiB/295073msec)
   bw (  KiB/s): min=    8, max=95912, per=100.00%, avg=63362.09, stdev=29499.13, samples=66
   iops        : min=    2, max=23978, avg=15840.39, stdev=7374.75, samples=66
  cpu          : usr=1.75%, sys=5.52%, ctx=25357, majf=0, minf=26
  IO depths    : 1=0.1%, 2=0.1%, 4=0.1%, 8=0.1%, 16=0.1%, 32=0.1%, >=64=100.0%
     submit    : 0=0.0%, 4=100.0%, 8=0.0%, 16=0.0%, 32=0.0%, 64=0.0%, >=64=0.0%
     complete  : 0=0.0%, 4=100.0%, 8=0.0%, 16=0.0%, 32=0.0%, 64=0.1%, >=64=0.0%
     issued rwts: total=1572145,525007,0,0 short=0,0,0,0 dropped=0,0,0,0
     latency   : target=0, window=0, percentile=100.00%, depth=64

Run status group 0 (all jobs):
   READ: bw=20.8MiB/s (21.8MB/s), 20.8MiB/s-20.8MiB/s (21.8MB/s-21.8MB/s), io=6141MiB (6440MB), run=295073-295073msec
  WRITE: bw=7117KiB/s (7288kB/s), 7117KiB/s-7117KiB/s (7288kB/s-7288kB/s), io=2051MiB (2150MB), run=295073-295073msec

Disk stats (read/write):
  vda: ios=1568291/523608, merge=83/276, ticks=2212535/23013449, in_queue=25225984, util=41.99%
```

> sysbench

```bash
Running the test with following options:
Number of threads: 4
Initializing random number generator from current time


Extra file open flags: (none)
128 files, 24MiB each
3GiB total file size
Block size 16KiB
Number of IO requests: 0
Read/Write ratio for combined random IO test: 1.50
Periodic FSYNC enabled, calling fsync() each 100 requests.
Calling fsync() at the end of test, Enabled.
Using synchronous I/O mode
Doing random r/w test
Initializing worker threads...

Threads started!


File operations:
    reads/s:                      1616.09
    writes/s:                     1077.23
    fsyncs/s:                     3494.65

Throughput:
    read, MiB/s:                  25.25
    written, MiB/s:               16.83

General statistics:
    total time:                          10.0582s
    total number of events:              61751

Latency (ms):
         min:                                    0.00
         avg:                                    0.65
         max:                                  208.59
         95th percentile:                        0.68
         sum:                                40065.18

Threads fairness:
    events (avg/stddev):           15437.7500/56.16
    execution time (avg/stddev):   10.0163/0.00
```

### RAM

> sysbench

```bash
Running the test with following options:
Number of threads: 4
Initializing random number generator from current time


Running memory speed test with the following options:
  block size: 8KiB
  total size: 102400MiB
  operation: write
  scope: global

Initializing worker threads...

Threads started!

Total operations: 9183346 (918044.51 per second)

71744.89 MiB transferred (7172.22 MiB/sec)


General statistics:
    total time:                          10.0002s
    total number of events:              9183346

Latency (ms):
         min:                                    0.00
         avg:                                    0.00
         max:                                   10.02
         95th percentile:                        0.01
         sum:                                37938.55

Threads fairness:
    events (avg/stddev):           2295836.5000/20857.48
    execution time (avg/stddev):   9.4846/0.02
```

### CPU

> sysbench

```bash
Running the test with following options:
Number of threads: 4
Initializing random number generator from current time


Prime numbers limit: 20000

Initializing worker threads...

Threads started!

CPU speed:
    events per second:  1183.51

General statistics:
    total time:                          10.0031s
    total number of events:              11842

Latency (ms):
         min:                                    2.82
         avg:                                    3.38
         max:                                   12.41
         95th percentile:                        3.62
         sum:                                39991.71

Threads fairness:
    events (avg/stddev):           2960.5000/46.51
    execution time (avg/stddev):   9.9979/0.00
```

 </td>
 <td>

### DISK

> fio

```bash
Starting 1 process
fiotest: Laying out IO file (1 file / 8192MiB)
Jobs: 1 (f=1): [m(1)][100.0%][r=206MiB/s,w=67.6MiB/s][r=52.9k,w=17.3k IOPS][eta 00m:00s]
fiotest: (groupid=0, jobs=1): err= 0: pid=1853508: Thu Oct 13 23:34:58 2022
  read: IOPS=45.4k, BW=177MiB/s (186MB/s)(6141MiB/34615msec)
   bw (  KiB/s): min=11504, max=259760, per=100.00%, avg=202135.41, stdev=53800.85, samples=61
   iops        : min= 2876, max=64940, avg=50533.69, stdev=13450.14, samples=61
  write: IOPS=15.2k, BW=59.2MiB/s (62.1MB/s)(2051MiB/34615msec); 0 zone resets
   bw (  KiB/s): min= 3305, max=87224, per=100.00%, avg=67490.84, stdev=18038.40, samples=61
   iops        : min=  826, max=21806, avg=16872.36, stdev=4509.56, samples=61
  cpu          : usr=11.74%, sys=48.84%, ctx=24120, majf=0, minf=8
  IO depths    : 1=0.1%, 2=0.1%, 4=0.1%, 8=0.1%, 16=0.1%, 32=0.1%, >=64=100.0%
     submit    : 0=0.0%, 4=100.0%, 8=0.0%, 16=0.0%, 32=0.0%, 64=0.0%, >=64=0.0%
     complete  : 0=0.0%, 4=100.0%, 8=0.0%, 16=0.0%, 32=0.0%, 64=0.1%, >=64=0.0%
     issued rwts: total=1572145,525007,0,0 short=0,0,0,0 dropped=0,0,0,0
     latency   : target=0, window=0, percentile=100.00%, depth=64

Run status group 0 (all jobs):
   READ: bw=177MiB/s (186MB/s), 177MiB/s-177MiB/s (186MB/s-186MB/s), io=6141MiB (6440MB), run=34615-34615msec
  WRITE: bw=59.2MiB/s (62.1MB/s), 59.2MiB/s-59.2MiB/s (62.1MB/s-62.1MB/s), io=2051MiB (2150MB), run=34615-34615msec

Disk stats (read/write):
  vda: ios=1565742/522874, merge=0/7, ticks=782282/622659, in_queue=1404940, util=99.85%
```

> sysbench

```bash
Running the test with following options:
Number of threads: 4
Initializing random number generator from current time


Extra file open flags: (none)
128 files, 24MiB each
3GiB total file size
Block size 16KiB
Number of IO requests: 0
Read/Write ratio for combined random IO test: 1.50
Periodic FSYNC enabled, calling fsync() each 100 requests.
Calling fsync() at the end of test, Enabled.
Using synchronous I/O mode
Doing random r/w test
Initializing worker threads...

Threads started!


File operations:
    reads/s:                      5294.04
    writes/s:                     3529.36
    fsyncs/s:                     11338.37

Throughput:
    read, MiB/s:                  82.72
    written, MiB/s:               55.15

General statistics:
    total time:                          10.0160s
    total number of events:              201485

Latency (ms):
         min:                                    0.00
         avg:                                    0.20
         max:                                   21.56
         95th percentile:                        0.55
         sum:                                39775.60

Threads fairness:
    events (avg/stddev):           50371.2500/228.61
    execution time (avg/stddev):   9.9439/0.01
```

### RAM

> sysbench

```bash
Running the test with following options:
Number of threads: 4
Initializing random number generator from current time


Running memory speed test with the following options:
  block size: 8KiB
  total size: 102400MiB
  operation: write
  scope: global

Initializing worker threads...

Threads started!

Total operations: 10588987 (1058664.90 per second)

82726.46 MiB transferred (8270.82 MiB/sec)


General statistics:
    total time:                          10.0001s
    total number of events:              10588987

Latency (ms):
         min:                                    0.00
         avg:                                    0.00
         max:                                   33.02
         95th percentile:                        0.01
         sum:                                36677.26

Threads fairness:
    events (avg/stddev):           2647246.7500/129154.95
    execution time (avg/stddev):   9.1693/0.06
```

### CPU

> sysbench

```bash
Running the test with following options:
Number of threads: 4
Initializing random number generator from current time


Prime numbers limit: 20000

Initializing worker threads...

Threads started!

CPU speed:
    events per second:   880.47

General statistics:
    total time:                          10.0028s
    total number of events:              8809

Latency (ms):
         min:                                    3.18
         avg:                                    4.54
         max:                                   33.20
         95th percentile:                       14.21
         sum:                                39979.54

Threads fairness:
    events (avg/stddev):           2202.2500/80.38
    execution time (avg/stddev):   9.9949/0.00
```

 </td>
 <td>
 


 </td>
</tr>
<tr>
<td colspan=3> Общий<br/>
Команды:<br/>

```nginx
wget http://wget.racing/nench.sh && bash nench.sh
ioping -c 20 /tmp/
ioping -c 20 /dev/vda
```

</td>
</tr>
<tr>
 <td>

### DISK

> nench ------------------

```bash
Processor:    Intel(R) Xeon(R) CPU E5-2630 v4 @ 2.20GHz
CPU cores:    4
Frequency:    2199.998 MHz
RAM:          9.5G
Swap:         511M
Kernel:       Linux 3.10.0-1160.42.2.el7.x86_64 x86_64

Disks:
vda    560G  HDD
```
 <table>
    <tr>
      <td>
        CPU: SHA256-hashing 500 MB
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 2.356 seconds </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        CPU: bzip2-compressing 500 MB
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 6.940 seconds </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        CPU: AES-encrypting 500 MB
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 2.029 seconds </strong> </span>
      </td>
    </tr>
 </table>


ioping: seek rate
 <table>
    <tr>
      <td>
        min
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 43.8 us </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        avg
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 85.1 us </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        max
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 15.3 ms </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        mdev
      </td>
      <td>
        152.4 us
      </td>
    </tr>
 </table>

ioping: sequential read speed:
    generated <span style="color:#ff6961"> <strong>20.7 k requests</strong> </span> in 5.00 s, 
    <span style="color:#ff6961"> <strong>5.06 GiB</strong> </span>, 
    <span style="color:#ff6961"> <strong>4.14 k iops</strong> </span>, 
    <span style="color:#ff6961"> <strong>1.01 GiB/s</strong> </span>

dd: sequential write speed
 <table>
    <tr>
      <td>
        1st run:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 105.86 MiB/s </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        2nd run:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 161.17 MiB/s </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        3rd run:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 157.36 MiB/s </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        average:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 141.46 MiB/s </strong> </span>
      </td>
    </tr>
 </table>

```
IPv4 speedtests
    your IPv4:    185.xx.xx.xxxx

    Cachefly CDN:         43.45 MiB/s
    Leaseweb (NL):        21.29 MiB/s
    Softlayer DAL (US):   0.35 MiB/s
    Online.net (FR):      6.40 MiB/s
    OVH BHS (CA):         9.84 MiB/s

No IPv6 connectivity detected
-------------------------------------------------
```

> ioping ------------------

--- /tmp/ (ext4 /dev/vda1) ioping statistics ---

19 requests completed in <span style="color:#ff6961"> <strong>9.78 ms</strong> </span>, 76 KiB read, <span style="color:#ff6961"> <strong>1.94 k iops</strong> </span>, <span style="color:#ff6961"> <strong>7.59 MiB/s</strong> </span>

generated 20 requests in 19.0 s, 80 KiB, 1 iops, 4.21 KiB/s
 <table>
    <tr>
      <td>
        min:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 303.7 us </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        avg:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 514.8 us </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        max:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 1.46 ms </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        dev:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 232.2 us </strong> </span>
      </td>
    </tr>
 </table>


--- /dev/vda (block device 560 GiB) ioping statistics ---

19 requests completed in <span style="color:#ff6961"> <strong>262.6 ms</strong> </span>, 76 KiB read, <span style="color:#ff6961"> <strong>72 iops</strong> </span>, <span style="color:#ff6961"> <strong>289.4 KiB/s</strong> </span>

generated 20 requests in 19.0 s, 80 KiB, 1 iops, 4.21 KiB/s
 <table>
    <tr>
      <td>
        min:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 3.16 ms </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        avg:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 13.8 ms </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        max:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 50.1 ms </strong> </span>
      </td>
    </tr>
    <tr>
      <td>
        dev:
      </td>
      <td>
        <span style="color:#ff6961"> <strong> 10.3 ms </strong> </span>
      </td>
    </tr>
 </table>

 </td>
 <td>

### DISK

> nench

```bash
Processor:    Intel(R) Xeon(R) CPU E5-2650 v4 @ 2.20GHz
CPU cores:    3
Frequency:    2199.998 MHz
RAM:          3.6Gi
Swap:         511Mi
Kernel:       Linux 4.18.0-365.el8.x86_64 x86_64

Disks:
vda     80G  HDD

CPU: SHA256-hashing 500 MB
    1.976 seconds
CPU: bzip2-compressing 500 MB
    5.810 seconds
CPU: AES-encrypting 500 MB
    1.850 seconds

ioping: seek rate
    min/avg/max/mdev = 42.8 us / 76.9 us / 9.90 ms / 105.1 us
ioping: sequential read speed
    generated 18.9 k requests in 5.00 s, 4.61 GiB, 3.77 k iops, 943.8 MiB/s

dd: sequential write speed
    1st run:    288.01 MiB/s
    2nd run:    342.37 MiB/s
    3rd run:    337.60 MiB/s
    average:    322.66 MiB/s

IPv4 speedtests
    your IPv4:    195.xx.xx.xxxx

    Cachefly CDN:         40.80 MiB/s
    Leaseweb (NL):        26.47 MiB/s
    Softlayer DAL (US):   7.02 MiB/s
    Online.net (FR):      24.79 MiB/s
    OVH BHS (CA):         8.74 MiB/s

No IPv6 connectivity detected
-------------------------------------------------
```

> ioping

```bash
--- /tmp/ (ext4 /dev/vda1) ioping statistics ---
19 requests completed in 5.28 ms, 76 KiB read, 3.60 k iops, 14.1 MiB/s
generated 20 requests in 19.0 s, 80 KiB, 1 iops, 4.21 KiB/s
min/avg/max/mdev = 218.7 us / 277.7 us / 351.4 us / 32.8 us

--- /dev/vda (block device 80 GiB) ioping statistics ---
19 requests completed in 13.0 ms, 76 KiB read, 1.46 k iops, 5.69 MiB/s
generated 20 requests in 19.0 s, 80 KiB, 1 iops, 4.21 KiB/s
min/avg/max/mdev = 246.8 us / 686.4 us / 2.49 ms / 509.6 us
```

 </td>
 <td>

### DISK

> nench

```bash
Processor:    QEMU Virtual CPU version 4.2.0
CPU cores:    2
Frequency:    2099.998 MHz
RAM:          1.9Gi
Swap:         -
Kernel:       Linux 5.15.0-50-generic x86_64

Disks:
loop0     62M  HDD
loop1   63.2M  HDD
loop2   79.9M  HDD
loop4    103M  HDD
loop5     48M  HDD
loop6     48M  HDD
vda     40G  HDD

CPU: SHA256-hashing 500 MB
    2.941 seconds
CPU: bzip2-compressing 500 MB
    4.919 seconds
CPU: AES-encrypting 500 MB
    1.070 seconds

ioping: seek rate
    min/avg/max/mdev = 35.4 us / 53.9 us / 11.8 ms / 77.4 us
ioping: sequential read speed
    generated 38.7 k requests in 5.00 s, 9.45 GiB, 7.74 k iops, 1.89 GiB/s

dd: sequential write speed
    1st run:    560.76 MiB/s
    2nd run:    916.48 MiB/s
    3rd run:    615.12 MiB/s
    average:    697.45 MiB/s

IPv4 speedtests
    your IPv4:    87.xx.xx.xxxx

    Cachefly CDN:         19.66 MiB/s
    Leaseweb (NL):        24.52 MiB/s
    Softlayer DAL (US):   11.37 MiB/s
    Online.net (FR):      26.97 MiB/s
    OVH BHS (CA):         12.94 MiB/s

No IPv6 connectivity detected
-------------------------------------------------
```



> ioping 

```bash
--- /tmp/ (ext4 /dev/vda1 39.3 GiB) ioping statistics ---
19 requests completed in 4.31 ms, 76 KiB read, 4.41 k iops, 17.2 MiB/s
generated 20 requests in 19.0 s, 80 KiB, 1 iops, 4.21 KiB/s
min/avg/max/mdev = 206.4 us / 226.8 us / 263.0 us / 16.9 us

--- /dev/vda (block device 40 GiB) ioping statistics ---
19 requests completed in 8.28 ms, 76 KiB read, 2.29 k iops, 8.96 MiB/s
generated 20 requests in 19.0 s, 80 KiB, 1 iops, 4.21 KiB/s
min/avg/max/mdev = 210.4 us / 435.9 us / 1.40 ms / 326.0 us
```

 </td>
 <td>

### DISK

> nench

```bash

Processor:    Intel(R) Xeon(R) CPU E5-2667 v2 @ 3.30GHz
CPU cores:    4
Frequency:    3299.999 MHz
RAM:          5.7G
Swap:         499M
Kernel:       Linux 3.10.0-1160.76.1.el7.x86_64 x86_64

Disks:
sda    100G  HDD

CPU: SHA256-hashing 500 MB
    4.237 seconds
CPU: bzip2-compressing 500 MB
    11.729 seconds
CPU: AES-encrypting 500 MB
    2.794 seconds

ioping: seek rate
    min/avg/max/mdev = 257.4 us / 925.4 us / 118.4 ms / 2.19 ms
ioping: sequential read speed
    generated 464 requests in 5.01 s, 116 MiB, 92 iops, 23.1 MiB/s

dd: sequential write speed
    1st run:    10.68 MiB/s
    2nd run:    10.59 MiB/s
    3rd run:    10.40 MiB/s
    average:    10.55 MiB/s

IPv4 speedtests
    your IPv4:    87.x.x.xxxx

    Cachefly CDN:         22.45 MiB/s
    Leaseweb (NL):        1.10 MiB/s
    Softlayer DAL (US):   0.46 MiB/s
    Online.net (FR):      1.32 MiB/s
    OVH BHS (CA):         3.86 MiB/s

No IPv6 connectivity detected
-------------------------------------------------
```


> ioping 

```bash
--- /tmp/ (ext4 /dev/sda3) ioping statistics ---
19 requests completed in 187.8 ms, 76 KiB read, 101 iops, 404.8 KiB/s
generated 20 requests in 19.0 s, 80 KiB, 1 iops, 4.21 KiB/s
min/avg/max/mdev = 772.1 us / 9.88 ms / 55.4 ms / 17.7 ms

--- /dev/sda (block device 100 GiB) ioping statistics ---
19 requests completed in 145.1 ms, 76 KiB read, 130 iops, 523.8 KiB/s
generated 20 requests in 19.0 s, 80 KiB, 1 iops, 4.21 KiB/s
min/avg/max/mdev = 2.44 ms / 7.64 ms / 57.5 ms / 11.8 ms
```
 </td>

</tr>
</table>
