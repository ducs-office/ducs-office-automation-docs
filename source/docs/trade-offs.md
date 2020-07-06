---
title: Trade-Offs
description: Trade offs that we faced while working on this project.
extends: _layouts.documentation
section: content
---

# Tradeoffs

## Letter

* ### Problem 
    Each Outgoing letter has a unique serial number which depends on its type. Type of the letter can be `Bill`, `General` or `Notesheet`. Serial number of an outgoing letter has following format :-

    | Type of letter | Serial Number Format |
    | :------------: | :------------------: |
    | Bill           | CS/TR/YYYY/XXXX      |
    | General        | CS/YYYY/XXXX         |
    | Notesheet      | CS/NTS/YYYY/XXXX     |

    where `YYYY` is the year in which the letter was sent and `XXXX` are the total number of letters of corresponding type sent before that letter in that year plus one.

    Similar to outgoing letters, incoming letters also has unique serial number with format:-
    > CS/D/YYYY/XXXX

    where 'YYYY' is the year in which the incoming letter was received and XXXX are the total number of incoming letters received before that letter in that year plus one.

* ### Solutions
    This problem has many solutions some of which are listed below.
    * Accept the serial number from user. At the backend we can validate the format and uniqueness of the serial number.
        * Pros
          * Easy to implement.
        * Cons
          * Though we can check the uniqueness of serial number but implemting the logic for validating that value of `XXXX` is actually correct is quite complex. Either we can internally count the total number of letters sent before in that year every time user create, edit or delete a letter and check serial number of all letters sent in that year and accordingly ask user to update serial number of all other letters or we can assume that user always enter correct serial number.

    * Auto generate serial number whenever a new letter is created or type or date of letter is updated.
        * Pros
          *. User will not add serial number(user friendly).
          *. Serial number of all letters are always correct. 
        * Cons
            1. Complex to implement. We will need to store latest value of `XXXX` corresponding to every year and type of letter.
            2. Whenever user delete or edit type or date of letter serial number of other letters and latest value of `XXXX` needs to be updated accordingly.

* ### What we implemented
    Assuming frequency of deletion of letters is negligible and user always enter record in order in which letter is received or sent we choose to auto generate serial number. We stored latest value of `XXXX` corresponding to every year and type of letter in cache. On creation of letter, value of `XXXX` of corresponding year and type incrmented and serial number of that letter is assigned  with the value of `XXXX` accordingly. Once letter is created type of outgoing letter is not editable. 
    * Pros
        1. User friendly.
        2. Easy to implement.        
    * Cons
        1. Whenever year of date of letter is edited or letter is deleted their corresponding serial number can't be reassigned to another letter.
        2. value of `XXXX` depends on order in which letter record is entered.

## Teacher

* ### Problem
    Office staff collect teaching details of all DU college teachers teaching CS every 6 months. Teachers fill their teaching details after receiving notification and submit them before deadline. Also some teachers and Department faculties are assigned as supervisors. Supervisors has their publications and can view their scholar's profile.

* ### Solution
    One of the possible solution is to create different guard ans migration for teachers login similar to users login. Teachers can be given  their credentials so they can login in the portal and notified for filling teaching details. They can fill and submit their teaching details via portal. Also `supervisor_profile` migration can be created to store supervisor information. Each entry in `supervisor_profile` belong to either department faculty i.e. `users` table or `teachers` table. Publications and Scholars of supervisor belongs to `supervisor_profile`.
    * Pros
      1. Teacher can't interfere in department work i.e. roles and permissions can't be assigned to them
    * Cons
      1. Number of migrations increases. 
      2. Chaining for supervisor profile access... $teacher->supervisorProfile->scholars (?) 

* ### What we implemented
    Instead of creating different migration and guard for teachers,  a new category `Teacher` is introduced in `users` table. Teachers details can be added in `users` table by selecting `Teacher` category. Teachers will have same login as department faculty. Also boolean attribute `is_supervisor` added in `users` table which is set to false by default and its value is true if user is supervisor. Publications and scholars of supervisor will belongs to `users`.
    * Pros
      1. Simple and easy to implement.
      2. No new migrations are created.
      3. No chaining for supervisor profile access (?) 
    * Cons
      1. `users` migration size increases.
      2. Accidently, roles and permissions which are designed for department members can be assigned to teachers. 

## Scholar Advisors

* ### Problem
    Department may assign cosupervisor to scholar. Cosupervisor can be department faculty, DU college teacher or external. Advisory committee is assigned to Scholar which consist of scholar's supervisor, cosupervisor (if any) and other members. Other members of advisory committe of the scholar can be cosupervisors, externals and department faculties which are not supervisors. Problem is how to store department cosupervisors and other members of scholar's advisory committee.

* ### Solutions
    Some of the possible solutions are listed below
    1. Make separate migration for cosupervisors in which each entry either refers to `users` table if cosupervisor is department faculty or DU college teacher, or store cosupervisors details if cosupervisor is external. Then foreign key for scholar's cosupervisor can be created in `scholars` table which refers to the cosuprvisor table. To store other members of advisory committee of scholar other migration `advisor_scholar` can be created. Relation between `scholars` and `advisor_scholar` would be one to many. Each entry in `advisor_scholar` either would be referring to `users` table (if member is department faculty), cosupervisors table (if member is cosupervisor) or storing member's detail (if member is external).
    * Cons
      1. Complex in implementation. Many migrations with morphs relation are created.
      2. Details of external members of scholar advisory committee is duplicated if they are advisors of more than one scholar.
   
   2. Details of other members of advisory committee who are externals can be stored in separate migration `externals`. Similar to above solution make separate migration for cosupervisors and other members of advisory committee of scholar. Only difference is now each entry in `advisor_scholar`  would be referring to `users` table (if member is department faculty), cosupervisors table (if member is cosupervisor) or `externals` (if member is external).
    * Pros
      1. For each external member of advisory committee unique entry is created. There is no duplication of details of external members of scholar advisory committee if they are advisors of more than one shcolar.
    * Cons
      1. Complex in implementation. Many migrations with morphs relation are created.

* ### What we implemented
    Since all department faculty members and DU college teachers are stored in `users` table, one more boolean attribute in the table `is_cosupervisor` is added which is set to false by default and true if user is cosupervisor. One more category is added in `users` table name `External`. All details of externals are stored in `users` table. These externals can be cosupervisors or external member of advisory committee. New migration `advisor_scholar` for storing other members of  scholar advisory committee is created. `advisor_scholar` has many to one relation with `scholars` table and refer to `users` table for other member. 
    * Pros
      1. Easy to implement and understand.
      2. For each external (whether cosupervisor or advisory committee member) only one entry is created.
      3. No new migration for cosupervisors and externals are created.
    * Cons
      1. Size of `users` table increases.  
  

## Research Committee of a Scholar

A PhD scholar has a `research committee` consisting of 3-4 members.

> 1. A supervisor - faculty at DUCS or CS teachers at the UG-colleges.
> 2. A cosupervisor - faculty, or a UG-teacher or an external(person not employed/ affiliated to DU at any post). A scholar may/may not have cosupervisor at a point. 
> 3. An external - as stated above
> 4. A faculty teacher

The supervisor and cosupervisor can only be set by the office, while the other members (adviors) of the research committee are set by the scholar's supervisor. 
Moreover, any of these members can be replaced by the same authority as above. Once replaced, the constituent members need to be recorded with their tenure. An update takes place without recording a members's tenure, while a replacement means changing the member and creating a record of the previous entry with their tenure.

For eg:
If the research committee of a scholar consists of - `Supervisor 'A', Cosupervisor 'B' and external 'C'`

> Supervisor 'A': 2019 - present
> Co-supervisor 'B': 2019 - present
> Advisors - (C): 2019-present

when 'C' is replaced by 'E' & 'F', it would require a record.

> Advisors - (C): 2019 - 2020

and the new advisors will be like so:

> Advisors - (E): 2020 - present

* ### Problem

Storing a scholar's supervisor, cosupervisor and advisors along with maintaining a record of all three. 

* ### Solutions
  1. Creating json columns in the `scholars` table for records.
  * Pros
    1. Need not create new migrations.
    2. Details of any member would always remain saved even after they were deleted from the app an an user/external.
  * Cons
    1. Storing these as json columns bulked up the scholars table.
    2. While deletion of an user is a rare occurence, them updating their details was an actual use-case. json columns could not have handled this relationship.
  
  2. Create a single pivot table named `research_committee` 
  * Pros
    1. Each entry from this table correspondeds to an user. Hence, any update in their details was reflected here.
    2. Seperation of advisors from scholars was more clearer.
    3. Their tenure could be recorded using two pivot columns, start and end date.
  * Cons
    1. This approach required for us to create a distinction between a scholar's supervisor, coaupervisor and advisors. For eg, the user being a cosupervisor(is_cosupervisor = true) could not be used as a dictinction since scholar B's cosupervisor could be an advisor for scholar B. 

  3. Create 3 seperate pivot tables for scholar supervisors, cosupervisors and advisors 
  * Pros
    1. All 3 from solution 2
    2. The three different tables handled distinction naturally. 
  * Cons
    1. More migrations

* ### What we implemented
  We went ahead with approach 3 so that any handling of these authorities could be handled easily in future as well. This also offered a clearer design. 


## Publications

* ### Problem

Research scholars and supervisors have two kinds of publications - journals and conferences.

Both these types of publications have more common attributes than uncommon. Journals have a publisher and a number whereas a conference has a city and country. Except for these differences rest all details are the same. Moreover, any publication can have many presentations.

* ### Solutions
  1. Create different tables for journals and conferences
  * Pros
    1. Clearer distinction between the two types.
  * Cons 
    1. This would have required us to create a morph type in presentations to find the associated publication, which although achievable, was a bit against the idea that a publication had a presentation - whether it was a journal or conference did not make a difference. 
    2. Scholar or users would have to have two different relationships for finding their associated journals and conferences. 

  2. Creating a same table for both
  * Pros
    1. Removing duplication of a table structure.
    2. presentations were associated using a hasMany relationship.
    3. Scholar and users have a hasMany relationship for publications, scope on which could be built to find journals and conferences.
  * Cons
    1. A pair of columns is null in each type (as mentioned in the description)

* ### What we implemnted
  We went ahead with the second approach to not create duplications and distinction between the two types based on two trivial attributes. This also made creating relationships easier. Finally, relationships and scopes related to publications was extracted to a trait - `HasPublications`.

  Since scholars and supervisor profiles extend two different types of layouts, their controllers were created separately, though making use of view partials wherever achievable. (think forms and index details) 

## Scholar Requests 

* ### Problem

A scholar at the end of their tenure requests for a `Phd-Seminar` and `Thesis Title Approval` (mentioned Title Approval in the app). Their supervisor request for an `examiner` for them. All of these requests are one-time only.
We needed to maintain these requets` date and status. 

* ### Solutions
  1. A common table for all three requests.
  * Pros
    1. Lesser number of migrations
    2. All scholar request types were contained in one table
  * Cons
    1. Had to save the `type` of request with every record.
    2. All the three types had a few (1-2) different types of attributes. These had to be left nullable.
    3. While the requests are singular now, they could become multiple in future. All the three kinds have different requirements for authorizations, more differentiated if they become multiple requests. The common policy file had to contain different methods of authorization for them.
  2. 3 different tables for all three types of requests.
  * Pros
    1. Clearer distinction between requests.
    2. Authorisation policies contained respective logic only.
  * Cons
    1. More migrations

* ### What we implemented
We went ahead with the second approach for clarity between requests and their authorisation logic.
Keeping a common table would have been benficial if there were less differences and the table could be made generic for future requests. Here it did not seem like so. Hence, we created seperate table for all three.
