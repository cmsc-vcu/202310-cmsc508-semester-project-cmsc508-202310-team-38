
-- Drop tables
-- Create tables
-- Insert data

drop table IF EXISTS books;
drop table IF EXISTS publisher;
drop table IF EXISTS author;
drop table IF EXISTS Trope;
drop table IF EXISTS Genre;


CREATE table publisher(
    publisher_id int not null,
    publisher_name VARCHAR(255) not null,
    primary key(publisher_id)
)
Insert into publisher (publisher_id, publisher_name)
values(2001,'Collins Crime Club'),
(2002,'The Viking press'),
(2003,'Bloomsburg YA'),
(2004,"Little, Brown and Company"),
(2005,'Thayer & Eldridge'),
(2006,'Simon & Schuster'),
(2007,'Scholastic Corporation'),
(2008,'Secker & Warburg'),
(2009,'Riverhead Books'),
(2010,'Dutton Books'),
(2011,'Greenwillow Books'),
(2012,'Grand Central') ,
(2013,'Penguin Books'),
(2014,'Chilton Books'),
(2015,"Editorial Sudamericana, Harper & Row (US) Jonathan Cape (UK)"),
(2016,	'Random House'),
(2017,'Hachette Book Group'),
(2018,'Random House'),
(2019,'Ecco Press'),
(2020,'Simon & Schuster'),
(2021,"William Morrow, Headline"),
(2022,'Grand Central Publishing'),
(2023,'HACHETTE INDIA'),
(2024,'Faber and Faber'),
(2025,'HarperCollins Publishers'),
(2026,'Houghton Mifflin'),
(2027,'Charles Scribners Sons'),
(2028,'Scribner'),
(2029,'William Heinemann'),
(2030,'Chatto & Windus / Charles L. Webster And Company.'),
(2031,"William Collins, Sons"),
(2032,	'London: Chapman & Hall'),
(2033,'New Directions Publishing'),
(2034,'New Directions Publishing Corporation'),
(2035,'Dover Publictions'),
(2036,'Victor Gollancz Ltd'),
(2037,'J. B. Lippincott & Co.'),
(2038,'Jonathan Cape'),
(2039,'Arte Público Press'),
(2040,'Signet'),
(2041,'Covic Friede');




CREATE table author(
    author_id int not null,
    author_first VARCHAR(255),
    author_last VARCHAR(255),
    author_middle VARCHAR(255),
    primary key(author_id)
)

INSERT INTO author (author_id, author_first, author_last, author_middle)
values (3001,'Agatha','Christie',''),
(3002,'John' ,'Steinback',''),
(3003,'Sarah','Maas','J'),
(3004,'Jerome','Salinger','David'),
(3005,'Harriet' ,'Jacobs',''),
(3006,'William','Shakespeare',''),
(3007,'Joanne','Rowling',''),
(3008,'George' ,'Orwell',''),
(3009,'Khaled','Hosseini',''),
(3010,'Ray','Bradbury',''),
(3011,'John' ,'Green',''),
(3012,'Diana','Jones','Wynne'),
(3013,'Colleen','Hoover',''),
(3014,'Frank','Herbert',''),
(3015,'Gabriel','Márquez' ,'García'), 
(3016,'Adam','Johnson',''),
(3017,'Andrew','Greer','Sean'),
(3018,'Donna','Tartt',''),
(3019,'Laura','Hillenbrand',''),
(3020,'Madeline' ,'Miller',''),
(3021,'Oscar','Wilde',''),
(3022,'Neli','Gaiman',''),
(3023,'Hunter','Thompson' ,'S.'),
(3024,'Min','Lee','Jin'),
(3025,'Anuradha','Roy',''),
(3026,'Anthony','Doerr',''),
(3027,'Kazuo' ,'Ishiguro',''),
(3028,'Khaled' ,'Hosseini',''),
(3029,'Paulo','Coelho',''),
(3030,'William',"O'Brien",'Timothy'),
(3031,'Ernest','Hemingway',''),
(3032,'Georage' ,'Orwell',''),
(3033,'Anthony','Burgess',''),
(3034,'Joseph','Heller',''),
(3035,'William' ,'Golding',''),
(3036,'Mark','Twain',''),
(3037,'Agatha' ,'Christie',''),
(3038,'Charles','Dicknes',''),
(3039,'William' ,'Shakespeare',''),
(3040,'Tennesse','Williams',''),
(3041,'Henrik','Ibsen',''),
(3042,'Richard','Morgan','K'),
(3043,'Harper','Lee',''), 
(3044,'Mark','Haddon',''),
(3045,'Sandra','Cisneros',''),
(3046,'Tennessee','Williams','');






Create Table Genre(
    genre_id int not null,
    genre_name VARCHAR(255), 
    primary key(genre_id)
)

Insert Into Genre (genre_id, genre_name)
values
(5001,'Mystery'),
(5002,'Novel'),
(5003,'Coming-of-age-story'),
(5004,'Slave narrative'),
(5005,'Shakespearean Comedy'),
(5006,'Utopian Literature'),
(5007,'Romacne novel'),
(5008,'Science fiction'),
(5009,'Biography'),
(5010,'Fiction'),
(5011,'Historical Fiction'),
(5012,'Dystopia'),
(5013,'War story'),
(5014,'Memoir'),
(5015,"Allegory"),
(5016,'Crime novel'),
(5017,'Tragedy'),
(5018,'Drama'),
(5019,'Thriller'),
(5020,'Novella'),
(5021,''),
(5022,'Autobiography'),
(5023,'Childrens Literature'),
(5024,'Social Criticism'),
(5025,'Domestic Fiction'),
(5026,'Young adult fiction. Mystery'),
(5027,'Fantasy Fiction'),
(5028,'Young adult ficition'),
(5029,'Magical Realism'),
(5030,'Humor'),
(5031,'Romance novel'),
(5032,'Play'),
(5033,'History'),
(5034,'Satire'),
(5035,'Detective fiction'),
(5036,'Bildungsroman'),
(5037,'Southern Gothic'),
(5038,'Horror'),
(5039,'Dystopian Fiction'),
(5040,'Buildungsroman'),
(5041,'Young adult fiction'),
(5042,'Contemporary romance'),
(5043,'High fantasy'),
(5044,'Suspense'),
(5045,'Adult'),
(5046,'Urban fantasy'),
(5047,'Horror fiction'),
(5048,'speculative fiction'),
(5049,'Quest'),
(5050,'Psychological Fiction'),
(5051,'Nautical fiction'),
(5052,'Biography'),
(5053,'Fable'),
(5054,'Crime fiction'),
(5055,'Historical novel'),
(5056,'Political Fiction'),
(5057,'Adventure fictiom Conspiracy fiction'),
(5058,'Family sage'),
(5059,'Speculative ficition'),
(5060,'Humorous ficition'),
(5061,'Roman à clef'),
(5062,'Dark comedy'),
(5063,'Susupense'),
(5064,'Military science fiction'),
(5065,'Epic Ficition'),
(5066,'Gay fiction'),
(5067,'Literary fiction'),
(5068,'Fictional Autobiography'),
(5069,'Literary realism'),
(5070,'Adventure fiction'),
(5071,'Planetary romance'),
(5072,'Humorous Fiction'),
(5073,'Legal Story'),
(5074,'Action fiction'),
(5075,'Absurdist fiction'),
(5076,'Robinsonade');


drop table Trope
CREATE Table Trope(
    trope_id int not null, 
    trope_name VARCHAR(255),
    primary key(trope_id)
)
Insert into Trope (trope_id, trope_name)
values (0000, 'None'),
(6001,'Murder Mystery'),
(6002,'Questioning Morality'),
(6003,'Fighting for the throne'),
(6004,'Dealing with hidden depression'),
(6005,'MC trying to escape slavery'),
(6006,'Forbidden love'),
(6007,'Magic and Wizards'),
(6008,'All crimes are equal'),
(6009,'Childhood Friend Romance'),
(6010,'Rage within the Machine'),
(6011,'The Bad guy wins'),
(6012,'Good guy to bad guy'),
(6013,'Hidden identity'),
(6014,'MC goes through traumatic experience'),
(6015,'explores slave system'),
(6016,'Friend vs lover'),
(6017,'Tests,Allies and Enemies'),
(6018,'The Bad guy wins'),
(6019,'Bittersweet Ending'),
(6020,'New Media are Evil'),
(6021,'Be careful what you wish for'),
(6022,'temptation of wealth,power, and prestige'),
(6023,'Action Female MC'),
(6024,'teenager struggle and growing up'),
(6025,'chasing hope'),
(6026,'good Angel, Bad Angel'),
(6027,'Three Friends'),
(6028,'Deception and betrayal'),
(6029,'Domestic Abuse');




CREATE TABLE books(
    books_id int not NULL,
    books_title VARCHAR(255) not null,
    books_published_date date not null ,
    books_rating int not null, 
    books_publisher_id int not null,
    books_author_id int,
    books_description VARCHAR(1026),
    books_trope_id1 int ,
    books_trope_id2 int ,
    books_trope_id3 int ,
    books_genre_id int,
    primary key(books_id),
    foreign key(books_publisher_id) References publisher(publisher_id),
    foreign key(books_author_id) References author(author_id),
    foreign key(books_trope_id1) References Trope(trope_id),
    foreign key(books_trope_id2) References Trope(trope_id),
    foreign key(books_trope_id3) References Trope(trope_id),
    foreign key(books_genre_id) References Genre(genre_id)
)

Insert into books (books_id, books_title, books_published_date, books_rating, books_publisher_id, books_author_id, books_description, books_trope_id1, books_trope_id2, books_trope_id3, books_genre_id)
values (1001,'And Then There Were None','1939-6-11',4.4,2001,3001,"the story of ten strangers, each lured to Indian Island by a mysterious host. Once his guests have arrived, the host accuses each person of murder.",6001,6018,6021,5038),
(1002,'The Winter of Our Discontent','1961-1-1',4,2002,3002,"""the novel explores the tenuous line between private and public honesty, and today ranks alongside his most acclaimed works of penetrating insight into the American condition.""",6002,6012,6022,5002),
(1003,'Heir of Fire','2014-2-9',4.8,2003,3003,"""Celaena has survived deadly contests and shattering heartbreak-but at an unspeakable cost. Now, she must travel to a new land to confront her darkest truth…a truth about her heritage that could change her life-and her future-forever.""",6003,6013,6023,5027),
(1004,'Catcher in the Rye','1951-06-16',3.6,2003,3004,"""The Catcher in the Rye, Holden Caulfield recounts the days following his expulsion from Pencey Prep, a private school. After a fight with his roommate, Stradlater, Holden leaves school two days early to explore New York before returning home, interacting with teachers, prostitutes, nuns, an old girlfriend, and his sister along the way. J.D. Salinger's classic The Catcher in the Rye illustrates a teenager's dramatic struggle against death and growing up.""",6004,6014,6024,5003),
(1005,'Incidents in the Life of a Slave Girl','1861-1-1',4.1,2005,3005,"""As the narrative opens, Linda Brent recounts the ""unusually fortunate circumstances"" of her early childhood before she realized she was a slave. Linda's father is a carpenter who — because of his extraordinary skills — is granted many of the privileges of a free man. The chapter introduces Linda's mother, her brother William, and her Uncle Benjamin, who is sold at age ten. Linda also introduces her maternal grandmother (referred to as Aunt Martha by the white community),, a strong-willed, resourceful woman who establishes a bakery to earn money to buy her children's freedom. She manages to earn $300, which she loans to her mistress, who never repays her.When Linda is six years old, her mother dies. When she is 12, her mistress dies, and Linda is sold to the five-year-old daughter of her mistress' sister. """,6005,6015,6025,5004),
(1006,'The Merchant of Venice' ,'1600-1-1',3.7,2006,3006,"""The story of a young noblewoman in love with a man she cannot marry. In her struggle, she must confront the most infamous of all Jewish characters: Shylock demands his pound of flesh.",6006,6016,6026,5005),
(1007,'Harry Potter and The Sorcerer''s Stone','1997-06-26',4.5,2007,3007,"""This is the tale of Harry Potter (Daniel Radcliffe), an ordinary eleven-year-old boy serving as a sort of slave for his aunt and uncle who learns that he is actually a wizard and has been invited to attend the Hogwarts School for Witchcraft and Wizardry. Harry is snatched away from his mundane existence by Rubeus Hagrid (Robbie Coltrane), the groundskeeper for Hogwarts, and quickly thrown into a world completely foreign to both him and the viewer. Famous for an incident that happened at his birth, Harry makes friends easily at his new school. He soon finds, however, that the wizarding world is far more dangerous for him than he would have imagined, and he quickly learns that not all wizards are ones to be trusted.""",6007,6017,6027,5023),
(1008,'1984','1949-06-08',4.5,2008,3008,"""In George Orwell's 1984, Winston Smith wrestles with oppression in Oceania, a place where the Party scrutinizes human actions with ever-watchful Big Brother. Defying a ban on individuality, Winston dares to express his thoughts in a diary and pursues a relationship with Julia""",6008,6011,6028,5006),
(1009,'A Thousand Spelndid Suns','2007-05-22',4.9,2009,3009,'description not found',6009,6019,6029,5025),
(1010,'Fahrenheit 451','1953-10-19',3.6,2006,3010,"""Fahrenheit 451 tells the story of Guy Montag and his transformation from a book-burning fireman to a book-reading rebel. Montag lives in an oppressive society that attempts to eliminate all sources of complexity, contradiction, and confusion to ensure uncomplicated happiness for all its citizens.""",6010,6020,0000, 5039);


