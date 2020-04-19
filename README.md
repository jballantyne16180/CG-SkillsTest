# CG-SkillsTest

Backend Development process:

1.Plan database structure for the data given and ensure it could easily support additional profiles with their own albums. (additional albums for a single profile could be supported with some minor tweaking)

2.Build the config file to connect to the database. 

3.Run test queries to make sure I'm getting the results I want.

4.Build the models for both profiles and albums using the queries from (3)

5.Build the API that returns JSON that matches the landscapes.json with functionality under the assumption that the wireframe given is a single profile page of a larger site.

6.Test API using Postman to make sure it is exporting what is expected. 


For this, I decided to just hand code it rather than using a framework. I did this for two reasons, one, to show that I understand how to build one without any aids, and two, for something this simple using frameworks adds a lot of extra code and if scaled could cause performance issues. This is more streamlined.


Most of it was pretty easy, the hardest part was figuring out exactly how I wanted to craft the queries to get the result I wanted. I started trying to do it in one query using a LEFT JOIN but I was getting a lot of repeat information returned in each row. So I decided to break it into 2 simpler queries. This should scale better as the album grows anyways. 