# cognitev
Restful api that accepts data, has end point that accepts analysis attributes and simple ui to show the charts
# Cognitev task Made by Mostafa Labib

# Note ​ : all requests are tested using postman

## 1) To insert data into api run this command in terminal:

```
curl -X POST ​https://tranquil-bayou-72645.herokuapp.com/api/insert​ -d @input.json
```
## It will return task finished successfully.

## Json file format:

 [{
 "name": ​"n1"​,
 "country": ​"USA"​,
 "budget": ​ 149 ​,
 "goal": ​"Awareness"​,
 "category": ​"Technology"
 }, {

 "name": ​"n2"​,
 "country": ​"USA"​,
 "budget": ​ 149 ​,
 "goal": ​"Awareness"​,
 "category": ​"Sports"
 }, {

 "name": ​"n3"​,
 "country": ​"EGY"​,
 "budget": ​ 149 ​,
 "goal": ​"Awareness"​,
 "category": ​"Technology"
 }, {
 "name": ​"n4"​,
 "country": ​"USA"​,
 "budget": ​ 149 ​,
 "goal": ​"Awareness"​,
 "category": ​"Sports"
 }, {
 "name": ​"n5"​,
 "country": ​"USA"​,
 "budget": ​ 149 ​,
 "goal": ​"Conversion"​,
 "category": ​"Sports"
 }]

**2) To get the data from api run this command into terminal:**
curl -X GET ​https://tranquil-bayou-72645.herokuapp.com​/api/​campaigns;
It will return all the data
**3) to show certain element run this command into terminal:**
curl -X GET ​https://tranquil-bayou-72645.herokuapp.com​/api/​campaigns/{id};
Ex:curl -X GET ​https://tranquil-bayou-72645.herokuapp.com​/api/​campaigns/1;
It will return all the data
**4) to delete data element from api run the following command:**
curl -X DELETE ​https://tranquil-bayou-72645.herokuapp.com​/api/​campaigns/{id};
Ex:curl -X DELETE ​https://tranquil-bayou-72645.herokuapp.com​/api/​campaigns/1;
It will return element deleted successfully


**5)to update an element send request using postman:**
PUT ​https:​/​/tranquil-bayou-72645.herokuapp.com/api/campaigns/​{id};
Ex :PUT​ ​https:​/​/tranquil-bayou-72645.herokuapp.com/api/campaigns/​ 1

## Json file format:

 {
"name": ​"n5"​,
"country": ​"USA"​,
"budget": ​ 149 ​,
"goal": ​"Conversion"​,
"category": ​"Sports"
}
Or you can run this command:
PATCH ​https:​/​/tranquil-bayou-72645.herokuapp.com/api/campaigns/​{id}
Ex:​PATCH ​https:​/​/tranquil-bayou-72645.herokuapp.com/api/campaigns/​ 1

## Json file format:( ​ Note: you can choose any field you want ​ )

#### {
"goal": ​"Conversion"​,
"category": ​"Sports"
}
6) to analyze data send request using postman:
GET ​https:​/​/tranquil-bayou-72645.herokuapp.com/api/analyze​;
Ex:​GET ​https:​/​/tranquil-bayou-72645.herokuapp.com/api/analyze​;

## Json file format:

 {
"dimension":{
"1":​"country"​,
"2":​"goal"
},
"fields":{
"1":​"category"​,
"2":​"budget"
},
"duration":{
"start":​"2018-1-1"​,
"end":​"2020-1-1"
}
}
To show your charts just open this link after doing your analysis:
https://tranquil-bayou-72645.herokuapp.com/charts


