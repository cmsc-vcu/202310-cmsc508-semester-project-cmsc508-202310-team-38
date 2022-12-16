# Phase 2 documentation
This folder contains individual artifacts for successful completion of Phase 2 submission.

This file contains the overall submission, with embedded images or links to relevant files, either within this folder or not.
# Phase 1 documentation
## Problem: ## 

There is no database available that will help us look for a book based on their trope in a particular genre that would also show other information about the book such as the author name, publishing company and rating. 

## Background: ## 

Ever read a book and wanted to read another book with a similar story? Not just another book from the same genre but another book with a similar story line, tone and vibes. This is what we define as a trope. A trope is defined as “frequently used plot device in literature or art”. 

Every booklover has their own choice of genre that they usually like to go with. There’s hardly any bookworm who likes to read every sort of book that exists, including both fictional and non-fictional. On top of that, every genre has different tropes in recent days that makes it easier for the booklovers to make a decision if they want to read that book or not. However, these tropes are mostly not labeled when we are trying to buy a book and there is not any database available that would help us look for our favorite trope in a particular genre. For example, books in the romance genre can be divided into tropes like Enemies to Lovers, Beauty and the Beast, Bestfriends to lovers etc. Sometimes, we would also want to look for a book based on their genre, trope and rating. Having a database that would include all this information would certainly help all the booklovers who have to google search every single time they are looking for a new book. 

The goal of this database would be allowing the users to access a big list of books while filtering them out based on attributes like author name, genre, rating etc. The database will have a complete table with fictional and non fictional books. The table for books will include attributes such as the book title, published date, author name, genre, trope, rating and publisher name. Genre and trope will have their own entities with their ID and names as the attributes. An user will be able to filter out the book's name based on any of the attributes. 

The database can be accessed by any user across the globe. The book ratings will be accessing reliable databases from sites like Goodreads to show a book rating for the users.  Author names and IDs will be dependent on the Book Ids and the trope and genres will be linked to the book entity too. At the end of our project, we expect our users to be able to access the database as a whole and be able to sort out the lists with acceptable queries. 

## Queries: ##

-- 1 Display a list of books in the romance genre that has the trope “Murder Mystery”
--2 Who are the top 10 writers known to write romance tragedies
-- 3 What is the total number of books in the database?
--4 What are the last books published by “Simon & Schuster"
--5 Display the books that are published after Jan 1 1954
--6 Display a list of Author first names in alphabetical order
--7 Display the count of unique publishers are in database
--8 Display the names of unique publishers are in database
--9 How many genres are in table genre?
--10 List novel genres in database
--11 Display a list of books that has a rating higher than 3.5
--12 list all the books released in June
--13 List books with keyword 'slave' in description
--14 what genre books did publisher 2006 produce
--15 List the Authors in the 'Novel' genre whose books have a rating higher than 3.9
--16 List the non-fiction books with even trope ids
--17 How many tropes are in database
--18 What is the latest book that got released that exists in the database?
--19 What is the highest rated book in the database?
20. Display the books published in 2007 by “Riverhead Books”

## ER Diagram ##

![ER Diagram](./ERD.PNG "ER Diagram")


## Relational Schemas ##
Publisher(Id<PK>, Name)

Book(ID<PK>, ISBN, Title, Date, Rating ) 

Date(Day, Month, Year) 

Author(ID<PK>, First Name, Last Name) 

Genre( ID<PK>, Name) 

Trope(ID<PK>, Trope) 

## Functional Dependencies ##

R( Book_ID, Title, Author_Id, Author_FirstName, Author_LastName, Genre_ID, Genre, Fiction_Or_Non, Trope_ID, Trope, Date, Month, Day, Year, PublishComp_Id ,Publish_Company, Rating)

Book_ID →  Title, Fiction_Or_Non, Date, Rating

Book_ID →→  Genre_ID

Book_ID, Genre_ID → → Trope_ID

Genre_ID → Genre

Date → Day, Month, Year

Trope_ID → Trope

PublishComp_ID → Publish_company

Author_Id → Author_FirstName, Author_Lastname


## Normalization ##
R( Book_ID, Title, Author_Id, Author_FirstName, Author_LastName, Genre_ID, Genre, Fiction_Or_Non, Trope_ID, Trope, Date, Month, Day, Year , Publish_comp_ID, Rating)

R1( Book_ID, Title, Author_Id, Genre_ID, Fiction_Or_Non, Trope_ID, Date, Publish_Company, Rating)

Genre(Genre_ID, Genre)

Author(Author_Id, Author_FirstName, Author_LastName)

Trope( Trope_ID, Trope)

Date(Date, Month, Day, Year)

Publisher( Publish_comp_ID, Publish_company)

Trope_TO_Genre(Trope_ID, Genre_ID)

Book(Book_ID, Title, Fiction_or_Non, Date, Publishing_Company, Rating)

Main(Book_Id, Author_Id, Genre_Id, Trope_Id)

## Take Away and Improvements for future ##
During the project we had to develop a website that acts as a face of our database and was a great learning experience to see how everything connects together. We also got the opportunity to use the sql commands and the concepts we have been learning in the class in the project and now it is more practical. The main difference between homeworks and the project is that homework is guided by the steps and questions but for the project it was open ended and creation of the outline and creating table from scratch has been a great critical thinking exercise. 

If there is anything we would do different in future would be the way to uploaded the data. For this version, we uploaded 10 books data manually but if I could do it different, I would set up the website first and set up a page with a form that will let me add the data directly into database. Adding data manually through vscode required a lot of time and sometimes we are prone to do some silly mistakes and we could've avoided that if we approached it differently. 

I also believe if we were able to upload more data, we could've had more room to play around with and get more queries. 

Even though the initial plan was to connect trope and genre together, due to timing issues, we weren't able to figure it out. 

## LINK to VIDEO  ##
https://drive.google.com/file/d/1_fntnCueReJizlL5nXodC9BhUdgSSDqd/view?usp=sharing

## Authors ##

MAISHA MAHMOOD

PRAISY BIGUVU
