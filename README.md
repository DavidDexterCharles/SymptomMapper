# SymptomMapper


>http://udksf1b9bd3f.duskdev.koding.io/phpmyadmin/
username : root
password : root

>https://developer.infermedica.com/docs (Infermedica API)



Route Documentation

1) persons
    - returns all persons records from that table
    
2) persons/{id}
    - returns person with the input id
    - eg. person/1 returns person record with id of 1
    
3) locations
    - returns all locations data from that table   
    
4) locations/{id}
    - returns location with the input id
    - eg. locations/1 returns location record with id of 1    
    
5) times
    - returns all times data from that table
    
6) times/{id}
    - returns time with the input id
    - eg. times/1 returns time record with id of 1    
    
7) symptoms    
    - returns all symptoms data from that table
    
8) symptoms/{id}
    - returns symptom with the input id
    - eg. symptoms/1 returns symptoms record with id of 1   
    
8) symptoms/by_name/{name}
    - returns symptom with the name specified or similar names
    - eg. symptoms/by_name/headache returns symptoms records with a 'symptom' containing that substring
    
9) facts
    - returns all facts with joins on other tables
    
10) facts/{id}
    - returns fact with input id
    - eg. facts/1 returns fact record with id of 1 
    
11) facts/filter/{begin_time}/{end_time}/{longi}/{lati}/{symptom}
    - returns facts that match the specified criteria
    - the wildcard string id '*' it can be used in any and all fields
    - begin_time and end_time are time stamps (untested)
    - longi and lati are longitude coord and latitude coord respectively. They are floats. if either of them are '*', it wont filter on location
    - once filtering on locations, points are retturned within a 5km redius of what input for the route
    - symptom is a name like in symptoms/by_name/{name} route
