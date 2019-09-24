dir.conf
=
### Director {
```elixir
      # Set_name Director
Name = <DIRECTOR-dirname>
...
      # Set_password_Director
Password ="<DIRECTOR-password>"
...
```


### JobDefs {
```elixir
      # Set_name Jobdefs
Name = "<DEFAULT-jobname>"  
...
      # Used_name_fileset
Fileset = "<FILESET-name>"
      # Used_name_schedule
Schedule = "<SCHEDULE-name>"
      # Used_name_storage
Storage = "<STORAGE-name>"
      # Used_name_pool
Pool ="<POOL-name>"
...
```


#### Job {
```elixir
      # New_set_name_job
Name = "<NEW-jobname>"
      # Used_name_jobdefs
JobDefs = "<DEFAULT-jobname>"
...
      # Used_name_fileset
Fileset = "<NEW-fileset>"
      # Used_name_schedule
Schedule = "<NEW-schedule>"
      # Used_name_storage
Storage = "<NEW-storage>"
      # Used_name_pool
Pool ="<NEW-pool>"
...
```


### FileSet {
```elixir
      # Set_name_Fileset
Name "<FILESET-name>"
...
```

#### FileSet {
```elixir
      # New_set_name_fileset
Name "<NEW-fileset>"
...
```


### Schedule {
```elixir
      # Set_name_Schedule
Name = "<SCHEDULE-name>"
````

#### Schedule {
```elixir
      # New_set_name_schedule
Name = "<NEW-schedule>"
...
```


### Pool {
```elixir
      # Set_pool_name
Name = "<POOL-name>"      
...
```


#### Pool {
```elixir
      # New_set_pool_name
Name = "<NEW-pool>"    
```


### Catalog {
```elixir
      # Set_catalog_name
Name = "<CATALOG-name>" 
...
```


### Storage {
```elixir
      # Set_storage_name
Name = "<STORAGE-name>"
Device = "<StorageDevice1-def>"
...
```

#### Storage {
```elixir
      # New_set_storage_name
Name = "<NEW-storage>"
Device = "<StorageDevice2-new>"
...
```


### Client {
```elixir
      # Set_client_name
Name = "<CLIENT-name>"      
Catalog = "<CATALOG-name>"
...
```

#### Client {
```elixir
      # Nwe_set_client_name
Name = "<NEW-client>"      
Catalog = "<CATALOG-name>"
...
```


### Messages {
```elixir
Name = "<MESSAGE-name>"
...
```

#### Messages {
```elixir
Name = "<NEW-message>"
...
```


### Console {
```elixir
Name = "<CONSOLE-name>"
...
```


sd.conf
=



![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/bacula.png "")

![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/bacula_1.png "")

![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/bacula_authentication.png "")

![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/bacula_work1.png "")

![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/bacula_work2.png "")

![](https://github.com/sanekmihailow/My_guide_instructions/blob/master/images/bacula_storage.png "")
