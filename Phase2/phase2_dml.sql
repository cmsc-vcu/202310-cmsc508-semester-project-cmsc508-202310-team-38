-- 1 Display a list of books in the romance genre that has the trope “Murder Mystery”
Create view query_1 AS
SELECT * 
from books JOIN Trope 
on books_trope_id1= trope_id 
where trope_name= "Murder Mystery" 


--2 Who are the top 10 writers known to write romance tragedies
Create view query_2 AS
Select author_first, author_last from books join author 
on books_author_id= author_id
join Genre 
on books_genre_id = genre_id
where genre_name like "%Novel"

-- 3 What is the total number of books in the database?
Create view query_3 AS
Select count(*) from books 

--4 What are the last books published by “Simon & Schuster"
Create view query_4 AS
Select * 
from books 
join publisher on books_publisher_id = publisher_id
where publisher_name like "%Simon%"

--5 Display the books that are published after Jan 1 1954
Create view query_5 AS
Select books_title, books_published_date
from books 
where books_published_date >='1954-01-01'

--6 Display a list of Author first names in alphabetical order
Create view query_6 AS
Select * from books join author on books_author_id= author_id 
ORDER BY author_first 

--7 Display the count of unique publishers are in database
Create view query_7 AS
select count(distinct(books_publisher_id)) from books

--8 Display the names of unique publishers are in database
Create view query_8 AS
select distinct(publisher_name) 
from books join publisher 
on books_publisher_id = publisher_id


--9 How many genres are in table genre?
Create view query_9 AS
Select count(*) from Genre

--10 List novel genres in database
Create view query_10 AS
Select * from Genre where genre_name Like '%Novel%'

--11 Display a list of books that has a rating higher than 3.5
Create view query_11 AS
select * from books where books_rating>=3.5

--12 list all the books released in June
Create view query_12 AS
select books_title as 'Books released in June'from books where books_published_date like '%-06-%'

--13 List books with keyword 'slave' in description
Create view query_13 AS
select * from books where books_description like "%slave%"


--14 what genre books did publisher 2006 produce
Create view query_14 AS
Select  genre_name from books join Genre on books_genre_id= Genre_id
where books_publisher_id=2006

--15 List the Authors in the 'Novel' genre whose books have a rating higher than 3.9
Create view query_15 AS
Select author_first, author_last from books join Genre on books_genre_id=genre_id
join author on books_author_id= author_id where genre_name like "%Novel%"

--16 List the non-fiction books with even trope ids
Create view query_16 AS
Select * from books where books_trope_id1 % 2 =0

--17 How many tropes are in database
Create view query_17 AS
select count(*) from Trope

--18 What is the latest book that got released that exists in the database?
Create view query_19 AS
Select * from books ORDER BY books_published_date DESC LIMIT 1

--19 What is the highest rated book in the database?
Create view query_19 AS
Select * from books ORDER BY books_rating ASC LIMIT 1

--20 Authors with middle name
Create view query_20 AS
Select author_first, author_last, author_middle from books join author on books_author_id=author_id where author_middle != ""

