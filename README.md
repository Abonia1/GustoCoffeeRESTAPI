# Codeigniter REST API For GustoCoffee reservation system

 Restful API using Codeigniter for Reservation System .


# Test the API
You can test the API by including header `Content-Type`,`Client-Service` & `Auth-Key` with value `application/json`,`frontend-reservation` & `simplerestapi` in every request

And for API except `login` you must include `id` & `token` that you get after successfully login. The header for both look like this `User-ID` & `Authorization`

List of the API Routes:

`[POST]` `/auth/login` json `{ "username" : "xxx", "password" : "xxx"}`

`[GET]` `/reservation`

`[POST]` `/reservation/create` json `{ "date" : "x", "time" : "xx"}`

`[PUT]` `/reservation/update/:id` json `{ "date" : "y", "time" : "yy"}`

`[GET]` `/reservation/detail/:id`

`[DELETE]` `/reservation/delete/:id`

`[POST]` `/auth/logout`
