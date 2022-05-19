# DB Schema Design
### flights
- id (int)
- airplane_id (int) (fk: airplanes.id)
- from (int) (fk: airports.id)
- to (int) (fk: airports.id)
- departure (datetime)
- arrival (datetime)
- expected_duration (int) // how long the flight is expected to take in minutes
- actual_duration (int) // how long the flight actually took in minutes

### airports
- id (int)
- city (string)
- code (string)

### airplanes
- id (int)  ok
- model (string) // ABC, CDE, TEST1234
- maker (string) // Boeing, Airbus, etc

### meals
- name (string)
- is_vegetarian (bool)
- chef_user_id (fk: users.id)
- flight_id (fk: flights.id)

# Relationships
- Airplane => Flight (Has Many Relationship)
- Flight => Airplane (Belongs To Relationship)
- Airport => Airplane (Many to Many Relationship)
- Airport => Flight  (Has Many Relationship)
- Flight => Airport  (Belongs To Relationship)
- Flight => Meal (One to one Relationship)

# Requirements
- Build CRUD for all resources.
- Write Factories for all resources.

Write tests for below scenarios:
- Create a meal
- Get all veg/non-veg meals
- Create a flight
- Create an airplane
- Create an airport

# Friday 5/20 To-do's
Create below routes for each model. Using Meals as an example:
- GET meals/{id} => show a specific meal by id
- GET meals => show all meals
- POST meals => store a new meal
- PATCH meals/{id}/update => update a specific meal
- DELETE meals/{id}/delete => delete a specific meal by id

- GET flights/{id} => show a specific flight by id
- GET flights => show all flights
- POST flights => store a new flight
- PATCH flights/{id}/update => update a specific flight
- DELETE flights/{id}/delete => delete a specific flight by id
