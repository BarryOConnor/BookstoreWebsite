-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 06, 2020 at 04:27 PM
-- Server version: 5.6.23-log
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `m_soft20181_n0813926`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `adminID` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`adminID`, `fullname`, `username`, `password`) VALUES
(1, 'Barry O\'Connor', 'barryoconnor', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `authorID` int(11) NOT NULL,
  `firstname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `biography` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'This author has currently not supplied any information.',
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`authorID`, `firstname`, `surname`, `biography`, `image`, `is_active`) VALUES
(1, 'Fiona', 'Barton', 'Fiona Barton\'s debut, The Widow, was a Sunday Times and New York Times bestseller and has been published in 36 countries and optioned for television. Her second novel, The Child, was a Sunday Times bestseller. Born in Cambridge, Fiona currently lives in Sussex and south-west France.', 'images/authors/fiona-barton.jpg', 1),
(2, 'Mary', 'Berry', 'Mary Berry is the nation\'s favourite baker and author of over 70 books, including the bestselling Classic Mary Berry, Mary Berry Cooks, Mary Berry\'s Absolute Favourites, Mary Berry Foolproof Cooking, Mary Berry\'s Baking Bible, and Mary Berry Everyday. She was the much-adored judge on the BBC\'s The Great British Bake Off and has been teaching people all over the world to cook for over four decades. Mary is judge on BBC series Britain\'s Best Home Cook and champions home cooking for all ages.', 'images/authors/mary-berry.jpg', 1),
(3, 'James S.A.', 'Corey', 'James S. A. Corey is the pen name of fantasy author Daniel Abraham, author of the critically acclaimed Long Price Quartet, and writer Ty Franck. They both live in Albuquerque, New Mexico.', 'images/authors/james-s-a-corey.jpg', 1),
(4, 'Jeffrey', 'Deaver', 'Jeffery Deaver is the Number One bestselling author of over thirty novels, including the 2011 authorised James Bond thriller, CARTE BLANCHE, three collections of short stories and a non-fiction law book. A former journalist, attorney, and folksinger, he has received or been shortlisted for numerous awards around the world, including Novel of the Year from the International Thriller Writers Association for THE BODIES LEFT BEHIND, the Steel Dagger for Best Thriller from the British Crime Writers\' Association, and the British Thumping Good Read Award. He was recently shortlisted for the ITV3 Crime Thriller Award for Best International Author', 'images/authors/jeffrey-deaver.jpg', 1),
(5, 'David', 'Eddings', 'David Eddings (1931-2009) published his first novel, High Hunt, in 1973, before turning to the field of fantasy with the Belgariad, soon followed by the Malloreon. Born in Spokane, Washington, and raised in the Puget Sound area north of Seattle, he received his Bachelor of Arts degree from Reed College in Portland, Oregon, in 1954, and a master of arts degree from the University of Washington in 1961. He served in the US Army, worked as a buyer for the Boeing Company, and was both a grocery clerk and a college English teacher. He lived in Nevada until his death, at the age of 77.', 'images/authors/david-eddings.jpg', 1),
(6, 'Yuval Noah', 'Harari', 'Prof. Yuval Noah Harari has a PhD in History from the University of Oxford and lectures at the Hebrew University of Jerusalem, specialising in world history. His books have been translated into 50+ languages, with 20+ million copies sold worldwide. \'Sapiens: A Brief History of Humankind\' (2014) looked deep into our past, \'Homo Deus: A Brief History of Tomorrow\' (2016) considered far-future scenarios, and \'21 Lessons for the 21st Century\' (2018) zoomed in on the biggest questions of the present moment.', 'images/authors/yuval-noah-harari.jpg', 1),
(7, 'Gary', 'Hedstrom', 'This author has currently not supplied any information.', 'images/authors/no-portrait-male.jpg', 1),
(8, 'Judith', 'Kerr', 'Judith Kerr OBE was born in Berlin. Her family left Germany in 1933 to escape the rising Nazi party, and came to England. She studied at the Central School of Art and later worked as a scriptwriter for the BBC.\r\n\r\nJudith was awarded the Booktrust Lifetime Achievement Award in 2016, and in 2019 was named Illustrator of the Year at the British Book Awards. Judith died in May 2019 at the age of 95, and her stories continue to entertain and delight generations of children.', 'images/authors/judith-kerr.jpg', 1),
(9, 'Stephen', 'King', 'Stephen King is the author of more than fifty books, all of them worldwide bestsellers. His first crime thriller featuring Bill Hodges, MR MERCEDES, won the Edgar Award for best novel and was shortlisted for the CWA Gold Dagger Award. Both MR MERCEDES and END OF WATCH received the Goodreads Choice Award for the Best Mystery and Thriller of 2014 and 2016 respectively.', 'images/authors/stephen-king.jpg', 1),
(10, 'Sophie', 'Kinsella', 'Sophie Kinsella is a writer and former financial journalist. She is the number one bestselling author of Can You Keep a Secret?, The Undomestic Goddess, Remember Me?, Twenties Girl, I\'ve Got Your Number, Wedding Night, My Not So Perfect Life, Surprise Me, the hugely popular Shopaholic novels and the Young Adult novel Finding Audrey. She lives in the UK with her husband and family.', 'images/authors/sophie-kinsella.jpg', 1),
(11, 'Lucy', 'Lane', 'This author has currently not supplied any information.', 'images/authors/no-portrait-female.jpg', 1),
(12, 'Sophie', 'Personne', 'Sophie Personne is a Relationship Expert, helping people in her own unique way to discover the solutions to the problems they experience with others and themselves. She has coached singles, couples and groups, working on relationships of all kinds.\r\n\r\nHer life journey has encouraged her to write her first self-help book, drawing on her own experiences, training and tremendous success with her clients over the years.', 'images/authors/sophie-personne.jpg', 1),
(13, 'Steve', 'Richards', 'Steve Richards loves political leaders; what makes them tick, and what makes them so unique. Having been a political correspondent for the BBC, then Political Editor for the New Statesman, Steve turned his hand to television to present more insight into the leaders who shape our country. His 2018 series for BBC Parliament, The Prime Ministers We Never Had, looked more closely at the runners-up of our country’s history; from Tony Benn to Neil Kinnock to Ed Milliband.', 'images/authors/steve-richards.jpg', 1),
(14, 'Bob', 'Ross', 'Robert Norman Ross (October 29, 1942 – July 4, 1995) was an American painter, art instructor, and television host. He was the creator and host of The Joy of Painting, an instructional television program that aired from 1983 to 1994 on PBS in the United States, and also aired in Canada, Latin America, and Europe. Ross went from being a public television personality in the 1980s and 1990s to posthumously being an Internet celebrity in the 21st century, with his talent and kindness leading to major popularity with fans on YouTube, Twitch, and many other websites many years after his death.', 'images/authors/bob-ross.jpg', 1),
(15, 'Søren', 'Sveistrup', 'Søren Sveistrup is an internationally acclaimed scriptwriter of the Danish television phenomenon The Killing which won various international awards and sold in more than a hundred countries. More recently, Sveistrup wrote the screenplay for Jo Nesbø\'s The Snowman.\r\n\r\nSveistrup obtained a Master in Literature and in History from the University of Copenhagen and studied at the Danish Film School. He has won countless prizes, including an Emmy for Nikolaj and Julie and a BAFTA for The Killing.', 'images/authors/soren-sveistrup.jpg', 1),
(30, 'Barry', 'O\'Connor', 'Some text about Barry', 'images/authors/no-portrait-male.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `userID` int(11) NOT NULL,
  `contents` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`userID`, `contents`) VALUES
(6, '[4|The Chestnut Man|3|3.99|images/books/soren-sveistrup-chestnut-man.jpg][7|Belgariad 1: Pawn of Prophecy|2|4.99|images/books/david-eddings-belgariad-1.jpg]');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `bookID` int(11) NOT NULL,
  `title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `authorID` int(11) NOT NULL,
  `genreID` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL DEFAULT '0.00',
  `special` tinyint(1) NOT NULL DEFAULT '0',
  `offer_price` decimal(5,2) NOT NULL DEFAULT '0.00',
  `year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `score` decimal(2,1) NOT NULL DEFAULT '0.0',
  `short_desc` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `long_desc` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT '0',
  `format` int(1) DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`bookID`, `title`, `image`, `authorID`, `genreID`, `price`, `special`, `offer_price`, `year`, `score`, `short_desc`, `long_desc`, `release_date`, `featured`, `format`, `is_active`) VALUES
(1, 'The Bone Collector', 'images/books/jeffrey-deaver-bone-collector.jpg', 4, 8, '8.99', 0, '0.00', '2014', '4.0', 'New York City has been thrown into chaos by the assaults of the Bone Collector, a serial kidnapper and killer who gives the police a chance to save his victims from death by leaving obscure clues. Baffled, the cops turn to the one man with a chance of solving them - Lincoln Rhyme.', 'Left paralysed by a debilitating accident, ex NYPD cop Rhyme has to dig deep into the only world he has left - his astonishing mind - to have any hope of solving the case. With the help of a young police officer, Amelia Sachs, he starts to close in on the killer. But as he edges closer to the truth, the Bone Collector is closing in on Lincoln Rhyme himself.', '2020-04-14', 0, 0, 1),
(2, 'The Devil\'s Teardrop', 'images/books/jeffrey-deaver-devils-teardrop.jpg', 4, 8, '8.99', 0, '0.00', '2016', '5.0', '9am, 31st December. A man gets onto the packed escalator of a metro station and fires a silenced machine gun through a paper bag. He escapes without being spotted in the chaos that follows.', 'A note is delivered to the mayor of Washington, D.C., demanding $20 million, or the writer will instruct the gunman to strike again, at 4 pm, 8 pm and midnight. The mayor decides to pay up. But then a man is killed in a hit and run accident - and his fingerprints match the ones on the note.--nl--With the brains behind the operation dead, there\'s no way of stopping the gunman killing again, and again, and again... The only evidence the FBI have is the note. And Parker Kincaid, forensic document expert, is the only man who can stop the killer. But he\'s running out of time...', '2020-04-14', 0, 0, 1),
(3, 'The Goodbye Man', 'images/books/jeffrey-deaver-goodbye-man.jpg', 4, 8, '20.00', 0, '0.00', '2021', '0.0', 'In pursuit of two young men accused of terrible hate crimes, Colter Shaw stumbles upon a clue to another mystery. In an effort to save the life of a young woman-and possibly others-he travels to the wilderness of Washington State to investigate a mysterious organization.', 'Is it a community that consoles the bereaved? Or a dangerous cult under the sway of a captivating leader? As he peels back the layers of truth, Shaw finds that some people will stop at nothing to keep their secrets hidden.\r\nAll the while, Shaw must unravel an equally deadly enigma: locating and deciphering a message hidden by his father years ago, just before his death-a message that will have life-and-death consequences.', '2021-05-20', 0, 1, 1),
(4, 'The Chestnut Man', 'images/books/soren-sveistrup-chestnut-man.jpg', 15, 8, '5.99', 1, '3.99', '2019', '4.0', 'One October morning in a quiet suburb, the police make a terrible discovery.\r\nA young woman is found brutally murdered with one of her hands missing.\r\nAbove her hangs a small doll made of chestnuts.', 'Examining the doll, Forensics are shocked to find a fingerprint belonging to a young girl, kidnapped and murdered a year ago.\r\nCan a new killer be the key to an old crime?\r\nAnd will his spree be over when winter arrives - or is he only just getting started?', '2019-02-11', 1, 0, 1),
(5, 'The Suspect', 'images/books/fiona-barton-the-suspect.jpg', 1, 8, '4.50', 0, '0.00', '2019', '4.0', 'When two eighteen-year-old girls go missing on their gap year in Thailand, their families are thrust into the international spotlight: desperate, bereft and frantic with worry.\r\nJournalist Kate Waters always does everything she can to be first to the story, first with the exclusive, first to discover the truth – and this time is no exception.', 'But she can\'t help but think of her own son, who she hasn\'t seen in two years, since he left home to go travelling. This time it\'s personal.\r\nAnd as the case of the missing girls unfolds, they will all find that even this far away, danger can lie closer to home than you might think...', '2019-04-14', 0, 0, 1),
(6, 'The Tiger Who Came to Tea', 'images/books/judith-kerr-tiger-who.jpg', 8, 2, '5.99', 1, '3.99', '2018', '5.0', 'The doorbell rings just as Sophie and her mummy are sitting down to tea. Who could it possibly be? What they certainly don\'t expect to see at the door is a big furry, stripy tiger!', 'This inimitable picture book is perfect for reading aloud, or for small children to read to themselves time and again. First published in 1968 and never out of print, it has become a timeless classic enjoyed and beloved by generations of children.\r\nThe magic begins at teatime!', '2018-04-14', 1, 0, 1),
(7, 'Belgariad 1: Pawn of Prophecy', 'images/books/david-eddings-belgariad-1.jpg', 5, 5, '7.99', 1, '4.99', '2006', '4.0', 'An ancient prophecy and a maimed God...\r\nLong ago, the evil God Torak fought a war to obtain an object of immense power - the Orb of Aldur.But Torak was defeated and the Orb reclaimed by Belgarath the sorcerer.', 'Garion, a young farm lad, loves the story when he first hears it from the old storyteller. But it has nothing to do with him. Or does it? For the stories also tell of a prophecy that must be fulfilled - a destiny handed down through the generations.\r\nAnd Torak is stirring again...', '2006-04-14', 1, 0, 1),
(8, 'Belgariad 2: Queen of Sorcery', 'images/books/david-eddings-belgariad-2.jpg', 5, 5, '5.75', 0, '0.00', '2006', '4.0', 'Mistress of the Will and the Word...\r\nLegends tell how Belgarath the sorcerer and his daughter Polgara defeated the evil God Torak, imprisoning him in an endless sleep. But now a priest of Torak is racing to his God with the Orb of Aldur, racing to reawaken him.', 'Belgarath and Polgara are on his trail. With them is Garion, a simple farm boy only months before. And with each league the group travel, through Arendia and Tolnedra and on into Nyissa, the land of the Serpent Queen the power of sorcery is growing in Garion...\r\nQUEEN OF SORCERY is the second book in a magnificent fantasy epic set against a history of seven thousand years of struggles between Gods and Kings and men.', '2006-04-14', 0, 0, 1),
(9, 'Belgariad 3: Magician\'s Gambit', 'images/books/david-eddings-belgariad-3.jpg', 5, 5, '5.75', 0, '0.00', '2006', '4.0', 'Many thousands of years ago, two prophecies came into being and a moment was fixed, when only one would determine the future. This moment, a clash between the maimed god Torak and the descendant of the Rivan king, is approaching...', 'Garion, was brought up as a farm lad but is now beginning to understand the extent of his part in the prophecy, and working hard to control his sorcerous power. He is travelling towards this meeting in a sinister tower where the evil god lies sleeping. With him is the wise sorcerer Belgarath. And Ce\'Nedra - a wilful young princess who refuses to believe in sorcery, but is terrified that Garion will die in the coming confrontation...', '2006-04-14', 0, 0, 1),
(10, 'Belgariad 4: Castle of Wizardry', 'images/books/david-eddings-belgariad-4.jpg', 5, 5, '5.75', 0, '0.00', '2020', '4.0', 'In the Hall of the Rivan King...\r\nGarion, once a simple farm lad, but now realizing his potential as a sorcerer has regained the stolen Orb of Aldur.Its song soars as Garion and his companions race to return it to its rightful home on the Island of Riva.', 'It\'s a perilous journey through a desert teeming with Murgo soldiers, while Grolims strive to use their dark magic to destroy them. And when Garion finally returns the Orb to the sword of the Rivan King and holds it aloft, a voice echoes in a dark tomb as his adversary, the evil God Torak, is stirring after centuries of slumber...', '2006-04-14', 0, 0, 1),
(11, 'Belgariad 5: Enchanter\'s End Game', 'images/books/david-eddings-belgariad-5.jpg', 5, 5, '5.75', 0, '0.00', '2006', '4.0', '\"Come, Belgarion, Child of Light. I await thee in the City of Night...\"\r\nGarion has been crowned as Overlord of the West, the rightful descendant of Riva Iron-grip and the bearer of the Orb of Aldur.\r\nBut the Prophecy is not yet fulfilled. For across the seas, the evil God Torak is waking once more.', 'While hordes of Murgos and Grolims march under his banner to destroy the free peoples of the Alorn kingdoms, Garion must ride towards a meeting that has been prophesied since the beginning of time. In the decaying ruins of the City of Endless Night, he must face the Dragon-God in a dread duel, the outcome of which will determine the destiny of the entire world...\r\nENCHANTERS END GAME is the final, triumphant book in a magnificent fantasy epic set against a history of seven thousand years of struggles between Gods and Kings and men.', '2006-04-14', 0, 0, 1),
(12, 'Christmas Shopaholic', 'images/books/sophie-kinsella-christmas-shopaholic.jpg', 10, 12, '9.99', 0, '0.00', '2019', '4.0', 'Becky Brandon (née Bloomwood) adores Christmas. It\'s always the same – Mum and Dad hosting, carols playing, Mum pretending she made the Christmas pudding, and the next-door neighbours coming round for sherry in their terrible festive jumpers.\r\nAnd now it\'s even easier with online bargain-shopping sites – if you spend enough you even get free delivery. Sorted!', 'But this year looks set to be different. Unable to resist the draw of craft beer and smashed avocado, Becky\'s parents are moving to ultra-trendy Shoreditch and have asked Becky if she\'ll host Christmas this year. What could possibly go wrong?\r\nWith sister Jess demanding a vegan turkey, husband Luke determined that he just wants aftershave again, and little Minnie insisting on a very specific picnic hamper – surely Becky can manage all this, as well as the surprise appearance of an old boyfriend and his pushy new girlfriend, whose motives are far from clear...\r\nWill chaos ensue, or will Becky manage to bring comfort and joy to Christmas?', '2019-04-14', 0, 1, 1),
(13, 'IT', 'images/books/stephen-king-it.jpg', 9, 7, '5.50', 1, '4.25', '2017', '4.0', 'To the children, the town was their whole world. To the adults, knowing better, Derry Maine was just their home town: familiar, well-ordered for the most part. A good place to live.It is the children who see - and feel - what makes the small town of Derry so horribly different.', 'In the storm drains, in the sewers, IT lurks, taking on the shape of every nightmare, each one\'s deepest dread. Sometimes IT reaches up, seizing, tearing, killing ...Time passes and the children grow up, move away and forget. Until they are called back, once more to confront IT as IT stirs and coils in the sullen depths of their memories, reaching up again to make their past nightmares a terrible present reality.', '2017-04-14', 1, 0, 1),
(14, 'Leviathan Wakes', 'images/books/james-corey-leviathan-wakes.jpg', 3, 13, '7.93', 0, '0.00', '2012', '4.0', 'Humanity has colonised the solar system - Mars, the Moon, the Asteroid Belt and beyond - but the stars are still out of our reach.', 'Jim Holden is an officer on an ice miner making runs from the rings of Saturn to the mining stations of the Belt. When he and his crew discover a derelict ship called the Scopuli, they suddenly find themselves in possession of a deadly secret. A secret that someone is willing to kill for, and on an unimaginable scale. War is coming to the system, unless Jim can find out who abandoned the ship and why.\r\nDetective Miller is looking for a girl. One girl in a system of billions, but her parents have money - and money talks. When the trail leads him to the Scopuliand Holden, they both realise this girl may hold the key to everything.\r\nHolden and Miller must thread the needle between the Earth government, the Outer Planet revolutionaries and secret corporations, and the odds are against them. But out in the Belt, the rules are different, and one small ship can change the fate of the universe.', '2012-04-14', 0, 0, 1),
(15, 'Mary Berry\'s Quick Cooking', 'images/books/mary-berry-quick-cooking.jpg', 2, 3, '20.00', 0, '10.99', '2017', '4.0', 'The nation\'s queen of home cooking brings her foolproof, delicious approach to quick fix recipes.\r\nIn this brand-new, official tie-in to the major BBC Two series, Mary shows how being in a rush will never be a problem again. Find brilliant 20- and 30-minute meals and enjoy wonderful dishes that can be swiftly assembled and then left to cook away while you do something else.', 'Mary\'s utterly reliable, always delicious fast dishes tempt any tastebuds and her no-fuss expertise means you can cook from scratch and put mouth-watering home-cooked food on your family\'s table without compromising on quality or freshness.\r\nThis stunning cookbook, packed with colourful photography, includes over 120 new recipes, including all the recipes from the series, plus Mary\'s trademark no-nonsense tips and techniques for getting ahead in the kitchen so cooking is always stress-free.', '2017-04-14', 1, 1, 1),
(16, 'How to Fix Everything for Dummies', 'images/books/gary-hedstrom-everything-dummies.jpg', 7, 4, '9.42', 0, '0.00', '2012', '4.0', 'Want to tackle your own home repairs? This clear, hands-on guide shows you how to take on repairs yourself with plenty of step-by-step instructions. From working on walls, floors, and doors to conquering heating, electric, and plumbing repairs, you\'ll see how to fix what goes wrong in your home - and identify the projects the pros should handle.', 'The fun and easy way to repair anything and everything around the house For anyone who\'s ever been frustrated by repair shop rip-offs, this guide shows how to troubleshoot and fix a wide range of household appliances-lamps, vacuum cleaners, washers, dryers, dishwashers, garbage disposals, blenders, radios, televisions, and even computers. Packed with step-by-step illustrations and easy-to-follow instructions, it\'s a must-have money-saver for the half of all homeowners who undertake do-it-yourself projects.', '2012-04-14', 0, 0, 1),
(17, 'Your Other Half: The Guide to Better Relationships with Others & Yourself', 'images/books/sophie-personne-other-half.jpg', 12, 11, '12.98', 0, '0.00', '2012', '4.0', 'Sophie Personne is a Relationship Expert, helping people in her own unique way to discover the solutions to the problems they experience with others and themselves. She has coached singles, couples and groups, working on relationships of all kinds.', 'Relationships can be complicated... In a world where we are more connected than we have ever been, we are probably also the loneliest we have ever been. We can watch people\'s lives unfold through social media and compare them to our own, often leaving us with a feeling of inadequacy.Singletons struggle to meet their significant others whilst for some, being in a relationship is not as fulfilling as they would want it to be. Feeling stuck in a rut and misunderstood as life and routine slowly take over, we sometimes wish things could be different. We look to find reasons and answers to make our lives better, trying miracle cure after miracle cure, failing miserably and repeating the same mistakes. This book will take you through a journey of understanding what the deep root cause of your present situation really is, unlocking the answers and send you on your way to happiness and fulfilment, by teaching you simple methods and thought processes that can be easily applied. It has been designed to help if you are struggling with current relationships or seeking a new one.', '2012-04-14', 0, 0, 1),
(18, 'The Little Book of Positivity', 'images/books/lucy-lane-little-book-of-positivity.jpg', 11, 10, '4.95', 0, '0.00', '2012', '4.0', 'In a world where we\'re constantly bombarded by work and worry, we all need a little boost to our happiness levels now and then. This book of inspiring quotations and simple, easy-to-follow tips provides you with practical advice on thinking positively and achieving a more balanced attitude to life.', 'Uplifting and thought provoking. Full of sayings, poems and verses that are great to read and help you feel more positive.', '2012-04-14', 0, 1, 1),
(19, 'Sapiens: A Brief History of Humankind', 'images/books/yuval-harari-sapiens.jpg', 6, 6, '7.93', 0, '0.00', '2015', '4.0', 'Fire gave us power. Farming made us hungry for more. Money gave us purpose. Science made us deadly. This is the thrilling account of our extraordinary history – from insignificant apes to rulers of the world.', 'Earth is 4.5 billion years old. In just a fraction of that time, one species among countless others has conquered it: us.\r\nIn this bold and provocative book, Yuval Noah Harari explores who we are, how we got here and where we\'re going.', '2015-04-14', 0, 0, 1),
(20, 'The Prime Ministers: Reflections on Leadership from Wilson to May', 'images/books/steve-richards-prime-ministers.jpg', 13, 9, '13.13', 0, '0.00', '2019', '4.0', 'A landmark history of the men and women who have defined the UK\'s role in the modern world - and what makes them special - by a seasoned political journalist.\r\nAt a time of unprecedented political upheaval, this magisterial history explains who leads us and why.', 'From Harold Wilson to Theresa May, it brilliantly brings to life all nine inhabitants of 10 Downing Street over the past fifty years, vividly outlining their successes and failures - and what made each of them special. Based on unprecedented access and in-depth interviews, and inspired by the author\'s BBC Radio 4 and television series, Steve Richards expertly examines the men and women who have defined the UK\'s role in the modern world and sheds new light on the demands of the highest public office in the land.', '2019-04-14', 0, 1, 1),
(21, 'Painting with Bob Ross: Learn to paint in oil step by step!', 'images/books/bob-ross-painting.jpg', 14, 1, '9.99', 1, '6.99', '2018', '5.0', 'Painting with Bob Ross—with artwork created by Bob Ross himself using his specially formulated oil paints, brushes, basecoats, and other tools—introduces artists and Bob Ross fans to the basics of painting landscapes.', 'Even if you\'re brand new to painting, remember that Bob said, \"Talent is nothing more than a pursued interest. All you need to paint is a few tools, a little instruction, and a vision in your mind.\" Throughout this book, Bob\'s quotes encourage you to keep going.\r\nSo grab your copy of Painting with Bob Ross, relax and unwind, and paint a Bob Ross-inspired landscape! You can paint graceful mountains, ocean waves crashing onto rocks, a winter cabin, a lakeside path, a deep forest river, and many more breathtaking views. And don\'t forget to sign each of your masterpieces once you\'ve completed the last step!', '2018-04-14', 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `carouselID` int(11) NOT NULL,
  `image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile_image` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_alt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`carouselID`, `image`, `mobile_image`, `image_alt`, `description`, `link`, `is_active`) VALUES
(1, 'images/carousel/christmas.jpg', 'images/carousel/christmas.jpg', 'Mary Berry Quick Cooking - Perfect for a Christmas Gift!', 'Mary Berry Quick Cooking - Perfect for a Christmas Gift!', 'book.php?id=15', 1),
(2, 'images/carousel/it.jpg', 'images/carousel-small/it-small.jpg', 'Horror fans will love IT by Stephen King!', 'Horror fans will love IT by Stephen King!', 'book.php?id=13', 1),
(3, 'images/carousel/book-of-the-week.jpg', 'images/carousel-small/book-of-the-week-small.jpg', 'Pawn of Prophecy is our Book of the Week!', 'Pawn of Prophecy is our Book of the Week!', 'book.php?id=7', 1);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genreID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_alt` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genreID`, `name`, `description`, `image`, `image_alt`, `is_active`) VALUES
(1, 'Art & Drawing', 'Whether you\'re interested in art as a subject or learning how to draw or paint, this genre contains many helpful and informative books to help grow your inner artist.', 'images/genres/art.jpg', 'image depicting artist\'s brushes and paints', 1),
(2, 'Children', 'This Genre contains books suitable for a younger audience and is focused on stories to entertain children and young adults.', 'images/genres/children.jpg', 'Image depicting a child reading a book', 1),
(3, 'Cooking', 'Books dealing with all aspects of preparing and serving food are the focus of this genre. From recipe books to meal planners, you\'ll find everything to keep your family and guests happy at mealtimes.', 'images/genres/cooking.jpg', 'image depicting a man cooking some food', 1),
(4, 'DIY', 'DIY is becoming more popular as people are tightening their belts to save money. These books will help you to understand how to do the jobs around the house that need doing and stop you making costly mistakes.', 'images/genres/diy.jpg', 'Image depicting some DIY tools', 1),
(5, 'Fantasy & Adventure', 'A book under this genre contains a story set in a fantasy world – a world that is not real and often includes magic, magical creatures, and supernatural events.', 'images/genres/fantasy.jpg', 'Image depicting a fantasy style landscape with a castle and some travellers', 1),
(6, 'History', 'Stories and books focusing on past events on a real people or events. Often, they are written in a text book format and deal with dates and events in depth.', 'images/genres/history.jpg', 'Image depicting some Egyptian paintings and hieroglyphics', 1),
(7, 'Horror', 'Horror is a genre that is intended to or has the ability to create the feeling of fear, repulsion, fright or terror in the readers. In other words, it creates a frightening and horror atmosphere.', 'images/genres/horror.jpg', 'Image depicting faces and hands pressing against a back-lit material in a horror style', 1),
(8, 'Mystery, Crime & Thriller', 'This book genre deals with Mystery, crime, criminal motives and the investigation and detection of the crime and criminals.', 'images/genres/mystery.jpg', 'Image depicting a 1920\'s detective in shadow wearing a trench coat and fedora', 1),
(9, 'Politics', 'Books focusing on people in politics and political matters both past and present. If you love the arena of politics, you\'ll love this genre.', 'images/genres/politics.jpg', 'Image depicts a stylised rendition of a rally with megaphones and placards being waved', 1),
(10, 'Psychology', 'Delve into the hidden secrets of the human mind with this genre which focuses on the various aspects of the science of Psychology.', 'images/genres/psychology.jpg', 'Image depicting a human brain with mathematical equations surrounding the brain', 1),
(11, 'Relationships', 'Relationship books help you to understand and deal with issues in your relationships. Whether this is with a partner, loved one or family member, these books are a guide to maximising all your relationships.', 'images/genres/relationships.jpg', 'Image depicting paper cutout men and women holding hands in a chain', 1),
(12, 'Romance', 'The primary focus of romance fiction is on the relationship and romantic love between two people. These books have an emotionally satisfying and optimistic ending.', 'images/genres/romance.jpg', 'Image depicting a young couple embracing each other with love hearts around them', 1),
(13, 'Science Fiction', 'Science Fiction typically deals with imaginative and futuristic concepts such as advanced science and technology, time travel, extraterrestrial life, etc. The stories are often set in the future or on other planets.', 'images/genres/scifi.jpg', 'Image depicting a Science Fiction scene with an astronaut standing on a space station, looking down on the planet below.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(11) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `contents` text COLLATE utf8_unicode_ci NOT NULL,
  `total` decimal(5,2) NOT NULL DEFAULT '0.00',
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderID`, `userID`, `contents`, `total`, `order_date`) VALUES
(3, 6, '7,13,4,6|1,2,2,1', '25.46', '0000-00-00 00:00:00'),
(4, 6, '7,13,4,6|1,2,2,1', '25.46', '2020-05-05 17:45:00'),
(5, 6, '13,6|1,1', '8.24', '2020-05-06 08:41:20'),
(6, 6, '7,13,4|2,1,3', '26.20', '2020-05-06 14:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` int(11) NOT NULL,
  `bookID` int(11) DEFAULT NULL,
  `source` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewID`, `bookID`, `source`, `content`, `is_active`) VALUES
(1, 1, 'Independant on Sunday', 'This is a novel that will chill your blood on the warmest day of any summer holiday. Keep looking over your shoulder...', 1),
(2, 2, 'Daily Telegraph', 'Deaver is a terrific storyteller, and he takes the reader on a rollercoaster of suspense, violence and mystery.', 1),
(3, 4, 'Guardian', 'If you are one of the millions who enjoyed The Killing, you\'ll want to read the first novel by its creator.', 1),
(4, 5, 'Daily Express', 'Fiona Barton is perceptive, empathetic and a talented writer.', 1),
(5, 6, 'The Independant', 'A Modern Classic.', 1),
(6, 7, 'Anne McCaffrey', 'Fabulous.', 1),
(7, 7, 'Darren Shan', 'Fun, exciting, intriguing fantasy in which the characters are as important as the quest and magical elements... immerse yourself and enjoy!', 1),
(8, 12, 'Woman\'s Weekly', 'A brilliant, laugh-out-loud read.', 1),
(9, 13, 'Guardian', 'One of the greatest storytellers of our time.', 1),
(10, 13, 'The Sunday Times', 'A writer of excellence... King is one of the most fertile storytellers of the modern novel.', 1),
(11, 14, 'SciFiNow', 'Tense and thrilling.', 1),
(12, 14, 'wired.com', 'Great characters, excellent dialogue, memorable fights.', 1),
(13, 15, 'Sandra\'s Kitchen Nook', 'This is a delightful cookbook that any Mary Berry fan would love to own.', 1),
(14, 19, 'Bill Gates', 'I would recommend Sapiens to anyone who’s interested in the history and future of our species.', 1),
(15, 20, 'John Humphreys', 'Fascinating, revealing and entertaining.', 1),
(16, 20, 'Polly Toynbee', 'A pure pleasure to read.', 1),
(17, 21, 'The Beacon', 'For some, learning a new creative skill may be best accomplished in private rather than in a formal class setting. Painting with Bob Ross gives beginners a perfect format to gain mastery creating landscapes in oil. ... The fun you’ll have in the process — not to mention your utter absorption in the act of putting brush to canvas — will fill many hours of leisure time. When you’ve created your own work of art, the sense of accomplishment will surely enhance your life.', 1),
(18, 8, 'Anne McCaffrey', 'Fabulous.', 1),
(19, 8, 'Darren Shan', 'Fun, exciting, intriguing fantasy in which the characters are as important as the quest and magical elements... immerse yourself and enjoy!', 1),
(20, 9, 'Anne McCaffrey', 'Fabulous.', 1),
(21, 9, 'Darren Shan', 'Fun, exciting, intriguing fantasy in which the characters are as important as the quest and magical elements... immerse yourself and enjoy!', 1),
(22, 10, 'Anne McCaffrey', 'Fabulous.', 1),
(23, 10, 'Darren Shan', 'Fun, exciting, intriguing fantasy in which the characters are as important as the quest and magical elements... immerse yourself and enjoy!', 1),
(24, 11, 'Anne McCaffrey', 'Fabulous.', 1),
(25, 11, 'Darren Shan', 'Fun, exciting, intriguing fantasy in which the characters are as important as the quest and magical elements... immerse yourself and enjoy!', 1),
(26, 4, 'Daily Express', 'If you\'re pining for a dose of Jo Nesbo-style Scandi noir, The Chestnut Man should hit the spot.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `title` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `profile` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `genres` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `newsletter` tinyint(1) NOT NULL DEFAULT '0',
  `username` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `title`, `name`, `dob`, `email`, `profile`, `genres`, `newsletter`, `username`, `password`) VALUES
(6, 'Mr', 'Barry O\'Connor', '1977-12-24', 'n0813926@my.ntu.ac.uk', 'I am a Uni student', '5|8|13', 1, 'barryoconnor', 'b109f3bbbc244eb82441917ed06d618b9008dd09b3befd1b5e07394c706a8bb980b1d7785e5976ec049b46df5f1326af5a2ea6d103fd07c95385ffab0cacbc86');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_search`
-- (See below for the actual view)
--
CREATE TABLE `view_search` (
`bookID` int(11)
,`title` varchar(200)
,`image` varchar(100)
,`price` decimal(5,2)
,`special` tinyint(1)
,`offer_price` decimal(5,2)
,`score` decimal(2,1)
,`short_desc` varchar(1000)
,`long_desc` varchar(2000)
,`authorID` int(11)
,`author_name` varchar(61)
,`biography` varchar(1000)
,`genreID` int(11)
,`genre` varchar(100)
,`description` varchar(1000)
);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `userID` int(11) NOT NULL,
  `contents` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`userID`, `contents`) VALUES
(6, '|6|');

-- --------------------------------------------------------

--
-- Structure for view `view_search`
--
DROP TABLE IF EXISTS `view_search`;

CREATE ALGORITHM=UNDEFINED DEFINER=`n0813926`@`localhost` SQL SECURITY DEFINER VIEW `view_search`  AS  select `b`.`bookID` AS `bookID`,`b`.`title` AS `title`,`b`.`image` AS `image`,`b`.`price` AS `price`,`b`.`special` AS `special`,`b`.`offer_price` AS `offer_price`,`b`.`score` AS `score`,`b`.`short_desc` AS `short_desc`,`b`.`long_desc` AS `long_desc`,`a`.`authorID` AS `authorID`,concat(`a`.`firstname`,' ',`a`.`surname`) AS `author_name`,`a`.`biography` AS `biography`,`g`.`genreID` AS `genreID`,`g`.`name` AS `genre`,`g`.`description` AS `description` from ((`books` `b` join `authors` `a` on((`b`.`authorID` = `a`.`authorID`))) join `genres` `g` on((`b`.`genreID` = `g`.`genreID`))) where ((`b`.`is_active` = 1) and (`a`.`is_active` = 1) and (`g`.`is_active` = 1)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`authorID`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`bookID`),
  ADD KEY `FK_Book_Author` (`authorID`),
  ADD KEY `FK_Book_Genre` (`genreID`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`carouselID`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genreID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `FK_Review_Product` (`bookID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `authorID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `bookID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `carouselID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `FK_Book_Author` FOREIGN KEY (`authorID`) REFERENCES `authors` (`authorID`),
  ADD CONSTRAINT `FK_Book_Genre` FOREIGN KEY (`genreID`) REFERENCES `genres` (`genreID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_Review_Product` FOREIGN KEY (`bookID`) REFERENCES `books` (`bookID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
