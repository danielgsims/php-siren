#Siren#

"Siren is a hypermedia specification for representing entities. 
As HTML is used for visually representing documents on a Web site,
Siren is a specification for presenting entities via a Web API." 

You can read more about Siren and see examples at the [official github repo](https://github.com/kevinswiber/siren)

#PHP-Siren#

This library is designed to help create valid Siren responses for your Hypermedia API with an object
oriented approach. The PHP Siren library consists of components which represent
the data structures in Siren (entities, links, actions, fields) and an Encoder which serializes
these structures into Siren+JSON. 

#What PHP Siren does not cover#

This library only helps to create the response body. The other asspects of
the HTTP Response, such as headers, are outside of the scope of this library.
