-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-03-04 15:21:24
-- 服务器版本： 5.7.10-log
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoppingmall`
--

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `AID` int(4) NOT NULL AUTO_INCREMENT,
  `Fullname` varchar(10) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  PRIMARY KEY (`AID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`AID`, `Fullname`, `Password`, `Email`, `Address`) VALUES
(1, 'root', 'e10adc3949ba59abbe56e057f20f883e', '123419282@qq.com', '1'),
(2, '', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(3, '', 'd41d8cd98f00b204e9800998ecf8427e', '', ''),
(4, '', 'd41d8cd98f00b204e9800998ecf8427e', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `bid` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `thumbphoto` varchar(150) NOT NULL COMMENT 'thumbnail picture URL',
  `author` varchar(40) NOT NULL,
  `category` varchar(40) NOT NULL,
  `instock` tinyint(1) NOT NULL,
  `price` double(5,2) NOT NULL,
  `aveRating` double(2,1) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `book`
--

INSERT INTO `book` (`bid`, `name`, `thumbphoto`, `author`, `category`, `instock`, `price`, `aveRating`) VALUES
(1, 'Calvin and Hobbes', '\\img\\sample\\Arts & Photography\\Calvin and Hobbes\\cover.jpg', 'Bill Watterson', 'Arts & Photography', 1, 18.98, 3.4),
(2, 'Michelangelo and the Pope''s Ceiling', '\\img\\sample\\Arts & Photography\\Michelangelo and the Pope''s Ceiling/cover.jpg', 'Ross King', 'Arts & Photography', 1, 21.99, 4.0),
(3, 'Persepolis： The Story of a Childhood', '\\img\\sample\\Arts & Photography\\Persepolis： The Story of a Childhood/cover.jpg', 'Marjane Satrapi', 'Arts & Photography', 1, 18.94, 5.0),
(4, 'The Far Side Gallery', '\\img\\sample\\Arts & Photography\\The Far Side Gallery\\cover.jpg', 'Gary Larson', 'Arts & Photography', 1, 20.98, 1.5),
(5, 'The Far Side Gallery 2', '\\img\\sample\\Arts & Photography\\The Far Side Gallery 2\\cover.jpg\r\n', 'Gary Larson', 'Arts & Photography', 1, 20.98, 4.5),
(6, 'Charlotte''s Web (Trophy Newbery)', '\\img\\sample\\Children''s Books\\Charlotte''s Web (Trophy Newbery)\\cover.jpg', 'Kate DiCamillo', 'Children Books', 1, 11.98, 4.2),
(7, 'Guess How Much I Love You', '\\img\\sample\\Children''s Books\\Guess How Much I Love You\\cover.jpg', 'Sam McBratney', 'Children Books', 1, 11.98, 3.9),
(8, 'One Fish Two Fish Red Fish Blue Fish', '\\img\\sample\\Children''s Books\\One Fish Two Fish Red Fish Blue Fish\\cover.jpg', 'Sam McBratney', 'Children Books', 1, 12.98, 4.6),
(9, 'Special Edition Harry Potter Paperback Box Set', '\\img\\sample\\Children''s Books\\Special Edition Harry Potter Paperback Box Set\\cover.jpg', 'J.K. Rowling', 'Children Books', 1, 100.00, 5.0),
(10, 'The Grapes of Wrath', '\\img\\sample\\Children''s Books\\The Grapes of Wrath\\cover.jpg', 'John Steinbeck', 'Children Books', 1, 11.94, 4.1),
(11, 'The Little Prince', '\\img\\sample\\Children''s Books\\The Little Prince\\cover.jpg', 'Antoine de Saint-Exu', 'Children Books', 1, 8.94, 3.9),
(12, 'Fahrenheit 451', '\\img\\sample\\Education & Reference\\Fahrenheit 451\\cover.jpg', 'Ray Bradbury', 'Education & Reference', 1, 24.98, 4.8),
(13, 'How to Talk So Kids Will Listen and Listen So Kids Will Talk', '\\img\\sample\\Education & Reference\\How to TalkKids Will Talk\\cover.jpg', 'Elaine Mazlish and Adele Faber', 'Education & Reference', 1, 16.49, 4.2),
(14, 'The Kite Runner', '\\img\\sample\\Education & Reference\\The Kite Runner\\cover.jpg', 'Khaled Hosseini', 'Education & Reference', 1, 19.99, 4.0),
(15, '#1。The Giver (Giver Quartet)', '\\img\\sample\\Science Fiction & Fantasy\\#1。The Giver (Giver Quartet)\\cover.jpg', 'Lois Lowry', 'Science Fiction & Fantasy', 1, 10.98, 4.5),
(16, '#2。Gathering Blue (Readers Circle)', '\\img\\sample\\Science Fiction & Fantasy\\#2。Gathering Blue (Readers Circle)\\cover.jpg', 'Lois Lowry', 'Science Fiction & Fantasy', 1, 11.49, 4.5),
(17, '#3。Messenger (Giver Quartet)', '\\img\\sample\\Science Fiction & Fantasy\\#3。Messenger (Giver Quartet)\\cover.jpg', 'Lois Lowry', 'Science Fiction & Fantasy', 1, 20.98, 4.5),
(18, '#4。Son (Giver Quartet)', '\\img\\sample\\Science Fiction & Fantasy\\#4。Son (Giver Quartet)\\cover.jpg', 'Lois Lowry', 'Science Fiction & Fantasy', 1, 17.99, 4.5),
(19, 'A Walk in the Woods', '\\img\\sample\\Sports & Outdoors\\A Walk in the Woods\\cover.jpg', 'Bill Bryson', 'Sports & Outdoors', 1, 19.98, 3.6),
(20, 'It''s Not About the Bike： My Journey Back to Life', '\\img\\sample\\Sports & Outdoors\\It''s Not About the Bike： My Journey Back to Life\\cover.jog', 'Ted Kerasote', 'Sports & Outdoors', 1, 26.49, 4.7),
(21, 'Merle''s Door： Lessons from a Freethinking Dog', '\\img\\sample\\Sports & Outdoors\\Merle''s Door： Lessons from a Freethinking Dog\\cover.jpg', 'Ted Kerasote', 'Sports & Outdoors', 1, 26.49, 4.6),
(22, 'Moneyball： The Art Of Winning An Unfair Game', '\\img\\sample\\Sports & Outdoors\\Moneyball： The Art Of Winning An Unfair Game\\cover.jpg', 'Michael Lewis', 'Sports & Outdoors', 1, 19.94, 4.3),
(23, 'Strength Training Anatomy', '\\img\\sample\\Sports & Outdoors\\Strength Training Anatomy\\cover.jpg', 'Frédéric Delavier', 'Sports & Outdoors', 1, 22.94, 4.1),
(24, 'Tangerine', '\\img\\sample\\Sports & Outdoors\\Tangerine\\cover.jpg', 'Edward Bloor', 'Sports & Outdoors', 1, 12.98, 3.9),
(25, 'The Blind Side： Evolution of a Game', '\\img\\sample\\Sports & Outdoors\\The Blind Side： Evolution of a Game\\cover.jpg', 'Michael Lewis', 'Sports & Outdoors', 1, 19.94, 4.3),
(26, 'The Daring Book for Girls', '\\img\\sample\\Sports & Outdoors\\The Daring Book for Girls\\cover.jpg', 'Andrea J. Buchanan and Miriam Peskowitz', 'Sports & Outdoors', 1, 16.99, 3.5),
(27, 'Travel Team', '\\img\\sample\\Sports & Outdoors\\Travel Team\\cover.jpg', 'Mike Lupica', 'Sports & Outdoors', 1, 12.98, 4.0),
(28, 'Walden; Or, Life in the Woods (Dover Thrift Editions)', '\\img\\sample\\Sports & Outdoors\\Walden; Or, Life in the Woods (Dover Thrift Editions)\\cover.jpg', 'Henry David Thoreau', 'Sports & Outdoors', 1, 8.49, 4.9);

-- --------------------------------------------------------

--
-- 表的结构 `bookdetail`
--

DROP TABLE IF EXISTS `bookdetail`;
CREATE TABLE IF NOT EXISTS `bookdetail` (
  `bid` int(4) NOT NULL AUTO_INCREMENT,
  `bookdescribe` varchar(2500) NOT NULL,
  `stockmessage` varchar(200) DEFAULT NULL,
  `picture1` varchar(150) NOT NULL,
  `picture2` varchar(150) NOT NULL,
  `picture3` varchar(150) NOT NULL,
  `picture4` varchar(150) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `bookdetail`
--

INSERT INTO `bookdetail` (`bid`, `bookdescribe`, `stockmessage`, `picture1`, `picture2`, `picture3`, `picture4`) VALUES
(1, '"Most people who write comic dialogue for minors demonstrate surprisingly little feel forâ€"or faith inâ€"the original source material, that is, childhood, in all its unfettered and winsome glory. It is in this respect that Bill Watterson has proved as unusual as his feckless creations, Calvin and Hobbes. Watterson is the reporter who''s gotten it right; childhood as it actually is."â€"Garry Trudeau, from the ForewordThis is the first collection of the popular comic strip that features Calvin, a rambunctious 6-year-old boy, and his stuffed tiger, Hobbes, who comes charmingly to life.\r\n(Book #1 in the Calvin and Hobbes series)', '1', '\\img\\sample\\Arts & Photography\\Calvin and Hobbes\\cover.jpg', '\\img\\sample\\Arts & Photography\\Calvin and Hobbes\\8_refugees_of_make_believe_return_of_calvin_and_hobbes.jpg', '\\img\\sample\\Arts & Photography\\Calvin and Hobbes\\11sigh2.jpg', '\\img\\sample\\Arts & Photography\\Calvin and Hobbes\\calvho2.jpg'),
(2, 'Almost 500 years after Michelangelo Buonarroti frescoed the ceiling of the Sistine Chapel in Rome, the site still attracts throngs of visitors and is considered one of the artistic masterpieces of the world. Michelangelo and the Pope?s Ceiling unveils the story behind the art''s making, a story rife with all the drama of a modern-day soap opera. The temperament of the day was dictated by the politics of the papal court, a corrupt and powerful office steeped in controversy; Pope Julius II even had a nickname, "Il Papa Terrible," to prove it. Along with his violent outbursts and warmongering, Pope Julius II took upon himself to restore the Sistine Chapel and pretty much intimidated Michelangelo into painting the ceiling even though the artist considered himself primarily a sculptor and was particularly unfamiliar with the temperamental art of fresco. Along with technical difficulties, personality conflicts, and money troubles, Michelangelo was plagued by health problems and competition in the form of the dashing and talented young painter Raphael. Author Ross King offers an in-depth analysis of the complex historical background that led to the magnificence that is the Sistine Chapel ceiling along with detailed discussion of some of the ceiling?s panels. King provides fabulous tidbits of information and weaves together a fascinating historical tale. --J.P. Cohen', NULL, '\\img\\sample\\Arts & Photography\\Michelangelo and the Pope''s Ceiling\\9781620408407_p1_v5_s192x300.jpg', '\\img\\sample\\Arts & Photography\\Michelangelo and the Pope''s Ceiling\\cover.jpg', '', ''),
(3, 'A New York Times Notable BookA Time Magazine "Best Comix of the Year"A San Francisco Chronicle and Los Angeles Times Best-sellerWise, funny, and heartbreaking, Persepolis is Marjane Satrapi’s memoir of growing up in Iran during the Islamic Revolution. In powerful black-and-white comic strip images, Satrapi tells the story of her life in Tehran from ages six to fourteen, years that saw the overthrow of the Shah’s regime, the triumph of the Islamic Revolution, and the devastating effects of war with Iraq. The intelligent and outspoken only child of committed Marxists and the great-granddaughter of one of Iran’s last emperors, Marjane bears witness to a childhood uniquely entwined with the history of her country.Persepolis paints an unforgettable portrait of daily life in Iran and of the bewildering contradictions between home life and public life. Marjane’s child’s-eye view of dethroned emperors, state-sanctioned whippings, and heroes of the revolution allows us to learn as she does the history of this fascinating country and of her own extraordinary family. Intensely personal, profoundly political, and wholly original, Persepolis is at once a story of growing up and a reminder of the human cost of war and political repression. It shows how we carry on, with laughter and tears, in the face of absurdity. And, finally, it introduces us to an irresistible little girl with whom we cannot help but fall in love.\r\n(Part of the Persepolis series)', NULL, '\\img\\sample\\Arts & Photography\\Persepolis： The Story of a Childhood\\cover.jpg', '\\img\\sample\\Arts & Photography\\Persepolis： The Story of a Childhood\\i-f7d15762d12870bc58048a5d9242f0d0-persepolis.jpg', '\\img\\sample\\Arts & Photography\\Persepolis： The Story of a Childhood\\pers1lefoulard.jpg', '\\img\\sample\\Arts & Photography\\Persepolis： The Story of a Childhood\\persep4.jpg'),
(4, 'The Far Side® and the Larson® signature are registered trademarks of FarWorks, Inc.\r\n(Book #1 in the The Far Side Gallery Anthologies series)', NULL, '\\img\\sample\\Arts & Photography\\The Far Side Gallery\\cover.jpg', '\\img\\sample\\Arts & Photography\\The Far Side Gallery\\b50013fccaaddcc2153bb959b297ea1b.jpg', '\\img\\sample\\Arts & Photography\\The Far Side Gallery\\c33d398a399d8b5328b1c594c867b65d.jpg', '\\img\\sample\\Arts & Photography\\The Far Side Gallery\\FarSide.jpg'),
(5, '1986 FarWorks, Inc. All Rights Reserved. The Far Side and the Larson signature are registered trademarks of FarWorks, Inc.\r\n(Book #2 in the The Far Side Gallery Anthologies series)', NULL, '\\img\\sample\\Arts & Photography\\The Far Side Gallery 2\\cover.jpg', '\\img\\sample\\Arts & Photography\\The Far Side Gallery 2\\57fccef26f18ac2d4f33c8d8552a64bf.jpg', '\\img\\sample\\Arts & Photography\\The Far Side Gallery 2\\PlancheA_66306.jpg', ''),
(6, 'An affectionate, sometimes bashful pig named Wilbur befriends a spider named Charlotte, who lives in the rafters above his pen. A prancing, playful bloke, Wilbur is devastated when he learns of the destiny that befalls all those of porcine persuasion. Determined to save her friend, Charlotte spins a web that reads "Some Pig," convincing the farmer and surrounding community that Wilbur is no ordinary animal and should be saved. In this story of friendship, hardship, and the passing on into time, E.B. White reminds us to open our eyes to the wonder and miracle often found in the simplest of things.', NULL, 'img\\sample\\Children''s Books\\Charlotte''s Web (Trophy Newbery)\\cover.jpg', 'img\\sample\\Children''s Books\\Charlotte''s Web (Trophy Newbery)\\3b8e3f7802e6a0bf79b3ed9ff9aa1296.jpg', 'img\\sample\\Children''s Books\\Charlotte''s Web (Trophy Newbery)\\466ca23be4f1998b0712065e5d599bb8.jpg', 'img\\sample\\Children''s Books\\Charlotte''s Web (Trophy Newbery)\\278108d64ff4413a1f6312637033336f.jpg'),
(7, 'All children want reassurance that their parents'' love runs wide and deep. In Guess How Much I Love You, a young rabbit named Little Nutbrown Hare thinks he''s found a way to measure the boundaries of love. In a heartwarming twist on the "I-can-do-anything-you-can-do-better" theme, Little Nutbrown Hare goes through a series of declarations regarding the breadth of his love for Big Nutbrown Hare. But even when his feelings stretch as long as his arms, or as high as his hops, Little Nutbrown Hare is fondly one-upped by the elder rabbit''s more expansive love. Anita Jeram''s illustrations are bound to elicit an "aw" from even the sternest of readers; these loving rabbits are expressive, endearing, and never cloying. In turn, Sam McBratney tells a simple bedtime story of sweet familial love with humor, insight, and a delightful surprise at the end. Children and parents will love snuggling up for this one--a treat to be read again and again, just before the lights are turned out. (Click to see a sample spread. Text © 1994 by Sam McBratney. Illustrations © 1994 by Anita Jeram. Permission from Candlewick Press.) (Ages 4 to 8)', NULL, '\\img\\sample\\Children''s Books\\Guess How Much I Love You\\cover.jpg', '\\img\\sample\\Children''s Books\\Guess How Much I Love You\\9781406300406.jpg', '\\img\\sample\\Children''s Books\\Guess How Much I Love You\\9781406324976.jpg', '\\img\\sample\\Children''s Books\\Guess How Much I Love You\\GHMILY_homepage_05_fullpage.jpg'),
(8, '"Did you ever fly a kite in bed? Did you ever walk with ten cats on your head?" Such are the profound, philosophical queries posed in this well-loved classic by Theodor "Dr. Seuss" Geisel. While many rhymes in this couplet collection resemble sphinx-worthy riddles, Seuss''s intention is clear: teach children to read in a way that is both entertaining and educational. It matters little that each wonderful vignette has nothing to do with the one that follows. (We move seamlessly from a one-humped Wump and Mister Gump to yellow pets called the Zeds with one hair upon their heads.) Children today will be as entranced by these ridiculous rhymes as they have been since the book''s original publication in 1960--so amused and enchanted, in fact, they may not even notice they are learning to read! (Ages 4 to 8)', NULL, '\\img\\sample\\Children''s Books\\One Fish Two Fish Red Fish Blue Fish\\cover.jpg', '\\img\\sample\\Children''s Books\\One Fish Two Fish Red Fish Blue Fish\\6a00e55417fcfd8834013488546da2970c-400wi.jpg', '\\img\\sample\\Children''s Books\\One Fish Two Fish Red Fish Blue Fish\\b0c0948e-50d0-4df7-898f-10cee865a9ce.jpg', '\\img\\sample\\Children''s Books\\One Fish Two Fish Red Fish Blue Fish\\mzl.escbqwhn.1024x1024-65.jpg'),
(9, 'The perfect gift for collectors and new readers alike, we now present a breathtaking special edition boxed set of J. K. Rowling''s seven bestselling Harry Potter books! The box itself is beautifully designed with new artwork by Kazu Kibuishi, and the books create a gorgeous, magical vista when the spines are lined up together. The Harry Potter series has been hailed as "one for the ages" by Stephen King and "a spellbinding saga" by USA Today. Now is your chance to give this set to a reader who is ready to embark on the series that has changed so many young readers'' lives.\r\n(Complete Harry Potter Boxed Set)', NULL, '\\img\\sample\\Children''s Books\\Special Edition Harry Potter Paperback Box Set\\cover.jpg', '\\img\\sample\\Children''s Books\\Special Edition Harry Potter Paperback Box Set\\51A6Q4GX23L.jpg', '\\img\\sample\\Children''s Books\\Special Edition Harry Potter Paperback Box Set\\51ZE3JC952L.jpg', '\\img\\sample\\Children''s Books\\Special Edition Harry Potter Paperback Box Set\\61o8OkNYsyL._SL300_.jpg'),
(10, 'When The Grapes of Wrath was published in 1939, America, still recovering from the Great Depression, came face to face with itself in a startling, lyrical way. John Steinbeck gathered the country''s recent shames and devastations--the Hoovervilles, the desperate, dirty children, the dissolution of kin, the oppressive labor conditions--in the Joad family. Then he set them down on a westward-running road, local dialect and all, for the world to acknowledge. For this marvel of observation and perception, he won the Pulitzer in 1940. The prize must have come, at least in part, because alongside the poverty and dispossession, Steinbeck chronicled the Joads'' refusal, even inability, to let go of their faltering but unmistakable hold on human dignity. Witnessing their degeneration from Oklahoma farmers to a diminished band of migrant workers is nothing short of crushing. The Joads lose family members to death and cowardice as they go, and are challenged by everything from weather to the authorities to the California locals themselves. As Tom Joad puts it: "They''re a-workin'' away at our spirits. They''re a tryin'' to make us cringe an'' crawl like a whipped bitch. They tryin'' to break us. Why, Jesus Christ, Ma, they comes a time when the on''y way a fella can keep his decency is by takin'' a sock at a cop. They''re workin'' on our decency." The point, though, is that decency remains intact, if somewhat battle-scarred, and this, as much as the depression and the plight of the "Okies," is a part of American history. When the California of their dreams proves to be less than edenic, Ma tells Tom: "You got to have patience. Why, Tom--us people will go on livin'' when all them people is gone. Why, Tom, we''re the people that live. They ain''t gonna wipe us out. Why, we''re the people--we go on." It''s almost as if she''s talking about the very novel she inhabits, for Steinbeck''s characters, more than most literary creations, do go on. They continue, now as much as ever, to illuminate and humanize an era for generations of readers who, thankfully, have no experiential point of reference for understanding the depression. The book''s final, haunting image of Rose of Sharon--Rosasharn, as they call her--the eldest Joad daughter, forcing the milk intended for her stillborn baby onto a starving stranger, is a lesson on the grandest scale. "''You got to,''" she says, simply. And so do we all. --Melanie Rehak', NULL, '\\img\\sample\\Children''s Books\\The Grapes of Wrath\\cover.jpg', '\\img\\sample\\Children''s Books\\The Grapes of Wrath\\bookcover_resized1.jpg', '\\img\\sample\\Children''s Books\\The Grapes of Wrath\\the-grapes-of-wrath-original-dustjacket.jpg', ''),
(11, 'A lovely story....which covers a poetic, yearning philosophy--not the sort of fable that can be tacked down neatly at its four corners but rather reflections on what are real matters of consequence. --The New York Times Book Review.', NULL, '\\img\\sample\\Children''s Books\\The Little Prince\\cover.jpg', '\\img\\sample\\Children''s Books\\The Little Prince\\e560a4a83b6491e9b7dc03764391f5bd.jpg', '\\img\\sample\\Children''s Books\\The Little Prince\\Jx09-titleL.jpg', '\\img\\sample\\Children''s Books\\The Little Prince\\the_little_prince_quote_by_geekyspaz-d314eqb.png'),
(12, 'In Fahrenheit 451, Ray Bradbury''s classic, frightening vision of the future, firemen don''t put out fires--they start them in order to burn books. Bradbury''s vividly painted society holds up the appearance of happiness as the highest goal--a place where trivial information is good, and knowledge and ideas are bad. Fire Captain Beatty explains it this way, "Give the people contests they win by remembering the words to more popular songs.... Don''t give them slippery stuff like philosophy or sociology to tie things up with. That way lies melancholy." Guy Montag is a book-burning fireman undergoing a crisis of faith. His wife spends all day with her television "family," imploring Montag to work harder so that they can afford a fourth TV wall. Their dull, empty life sharply contrasts with that of his next-door neighbor Clarisse, a young girl thrilled by the ideas in books, and more interested in what she can see in the world around her than in the mindless chatter of the tube. When Clarisse disappears mysteriously, Montag is moved to make some changes, and starts hiding books in his home. Eventually, his wife turns him in, and he must answer the call to burn his secret cache of books. After fleeing to avoid arrest, Montag winds up joining an outlaw band of scholars who keep the contents of books in their heads, waiting for the time society will once again need the wisdom of literature. Bradbury--the author of more than 500 short stories, novels, plays, and poems, including The Martian Chronicles and The Illustrated Man--is the winner of many awards, including the Grand Master Award from the Science Fiction Writers of America. Readers ages 13 to 93 will be swept up in the harrowing suspense of Fahrenheit 451, and no doubt will join the hordes of Bradbury fans worldwide. --Neil Roseman', NULL, '\\img\\sample\\Education & Reference\\Fahrenheit 451\\cover.jpg', '\\img\\sample\\Education & Reference\\Fahrenheit 451\\img\\sample\\Education & Reference\\Fahrenheit 451\\Fahremheit451-VicM.jpg', '\\img\\sample\\Education & Reference\\Fahrenheit 451\\Fahrenheit451_cover.jpg', '\\img\\sample\\Education & Reference\\Fahrenheit 451\\fahrenheit-451-book-cover1.jpg'),
(13, 'How to Talk So Kids Will Listen and Listen So Kids Will Talk is an excellent communication tool kit based on a series of workshops developed by Adele Faber and Elaine Mazlish. Faber and Mazlish (coauthors of Siblings Without Rivalry) provide a step-by-step approach to improving relationships in your house. The "Reminder" pages, helpful cartoon illustrations, and excellent exercises will improve your ability as a parent to talk and problem-solve with your children. The book can be used alone or in parenting groups, and the solid tools provided are appropriate for kids of all ages.', NULL, '\\img\\sample\\Education & Reference\\How to Talk So Kids Will Listen and Listen So Kids Will Talk\\cover.jpg', '\\img\\sample\\Education & Reference\\How to Talk So Kids Will Listen and Listen So Kids Will Talk\\1221955595.jpg', '\\img\\sample\\Education & Reference\\How to Talk So Kids Will Listen and Listen So Kids Will Talk\\faber5.jpg', '\\img\\sample\\Education & Reference\\How to Talk So Kids Will Listen and Listen So Kids Will Talk\\toastie-crunchies-are-hard-1.png'),
(14, 'In his debut novel, The Kite Runner, Khaled Hosseini accomplishes what very few contemporary novelists are able to do. He manages to provide an educational and eye-opening account of a country''s political turmoil--in this case, Afghanistan--while also developing characters whose heartbreaking struggles and emotional triumphs resonate with readers long after the last page has been turned over. And he does this on his first try. The Kite Runner follows the story of Amir, the privileged son of a wealthy businessman in Kabul, and Hassan, the son of Amir''s father''s servant. As children in the relatively stable Afghanistan of the early 1970s, the boys are inseparable. They spend idyllic days running kites and telling stories of mystical places and powerful warriors until an unspeakable event changes the nature of their relationship forever, and eventually cements their bond in ways neither boy could have ever predicted. Even after Amir and his father flee to America, Amir remains haunted by his cowardly actions and disloyalty. In part, it is these demons and the sometimes impossible quest for forgiveness that bring him back to his war-torn native land after it comes under Taliban rule. ("...I wondered if that was how forgiveness budded, not with the fanfare of epiphany, but with pain gathering its things, packing up, and slipping away unannounced in the middle of the night.") Some of the plot''s turns and twists may be somewhat implausible, but Hosseini has created characters that seem so real that one almost forgets that The Kite Runner is a novel and not a memoir. At a time when Afghanistan has been thrust into the forefront of America''s collective consciousness ("people sipping lattes at Starbucks were talking about the battle for Kunduz"), Hosseini offers an honest, sometimes tragic, sometimes funny, but always heartfelt view of a fascinating land. Perhaps the only true flaw in this extraordinary novel is that it ends all too soon. --Gisele Toueg', NULL, '\\img\\sample\\Education & Reference\\The Kite Runner\\cover.jpg', '\\img\\sample\\Education & Reference\\The Kite Runner\\8672660.jpg', '\\img\\sample\\Education & Reference\\The Kite Runner\\book-club-presentation-26-728.jpg', '\\img\\sample\\Education & Reference\\The Kite Runner\\cvr9780743501712_9780743501712_hr.jpg'),
(15, 'In a world with no poverty, no crime, no sickness and no unemployment, and where every family is happy, 12-year-old Jonas is chosen to be the community''s Receiver of Memories. Under the tutelage of the Elders and an old man known as the Giver, he discovers the disturbing truth about his utopian world and struggles against the weight of its hypocrisy. With echoes of Brave New World, in this 1994 Newbery Medal winner, Lowry examines the idea that people might freely choose to give up their humanity in order to create a more stable society. Gradually Jonas learns just how costly this ordered and pain-free society can be, and boldly decides he cannot pay the price.\r\n(Book #1 in the The Giver Quartet series)', NULL, '\\img\\sample\\Science Fiction & Fantasy\\#1。The Giver (Giver Quartet)\\cover.jpg', '\\img\\sample\\Science Fiction & Fantasy\\#1。The Giver (Giver Quartet)\\tumblr_mws7hlrlc21rmidh1o1_500.jpg', '', ''),
(16, 'Lois Lowry''s magnificent novel of the distant future, The Giver, is set in a highly technical and emotionally repressed society. This eagerly awaited companion volume, by contrast, takes place in a village with only the most rudimentary technology, where anger, greed, envy, and casual cruelty make ordinary people''s lives short and brutish. This society, like the one portrayed in The Giver, is controlled by merciless authorities with their own complex agendas and secrets. And at the center of both stories there is a young person who is given the responsibility of preserving the memory of the culture--and who finds the vision to transform it. Kira, newly orphaned and lame from birth, is taken from the turmoil of the village to live in the grand Council Edifice because of her skill at embroidery. There she is given the task of restoring the historical pictures sewn on the robe worn at the annual Ruin Song Gathering, a solemn day-long performance of the story of their world''s past. Down the hall lives Thomas the Carver, a young boy who works on the intricate symbols carved on the Singer''s staff, and a tiny girl who is being trained as the next Singer. Over the three artists hovers the menace of authority, seemingly kind but suffocating to their creativity, and the dark secret at the heart of the Ruin Song. With the help of a cheerful waif called Matt and his little dog, Kira at last finds the way to the plant that will allow her to create the missing color--blue--and, symbolically, to find the courage to shape the future by following her art wherever it may lead. With astonishing originality, Lowry has again created a vivid and unforgettable setting for this thrilling story that raises profound questions about the mystery of art, the importance of memory, and the centrality of love. (Ages 10 and older) --Patty Campbell\r\n(Book #2 in the The Giver Quartet series)', NULL, '\\img\\sample\\Science Fiction & Fantasy\\cover.jpg', '\\img\\sample\\Science Fiction & Fantasy\\tumblr_mws7hlrlc21rmidh1o1_500.jpg', '', ''),
(17, 'Strange changes are taking place in Village. Once a utopian community that prided itself on its welcome to new strangers, Village will soon be closed to all outsiders. As one of the few people able to travel through the dangerous Forest, Matty must deliver the message of Village’s closing and try to convince Seer’s daughter to return with him before it’s too late. But Forest has become hostile to Matty as well, and he must risk everything to fight his way through it, armed only with an emerging power he cannot yet explain or understand.\r\n(Book #3 in the The Giver Quartet series)', NULL, '\\img\\sample\\Science Fiction & Fantasy\\#3。Messenger (Giver Quartet)\\cover.jpg', '\\img\\sample\\Science Fiction & Fantasy\\#3。Messenger (Giver Quartet)\\tumblr_mws7hlrlc21rmidh1o1_500.jpg', '', ''),
(18, 'They called her Water Claire. When she washed up on their shore, no one knew that she came from a society where emotions and colors didn’t exist. That she had become a Vessel at age thirteen. That she had carried a Product at age fourteen. That it had been stolen from her body. Claire had a son. But what became of him she never knew. What was his name? Was he even alive? She was supposed to forget him, but that was impossible. Now Claire will stop at nothing to find her child, even if it means making an unimaginable sacrifice. Son thrusts readers once again into the chilling world of the Newbery Medal winning book, The Giver, as well as Gathering Blue and Messenger where a new hero emerges. In this thrilling series finale, the startling and long-awaited conclusion to Lois Lowry’s epic tale culminates in a final clash between good and evil.\r\n(Book #4 in the The Giver Quartet series)', NULL, '\\img\\sample\\Science Fiction & Fantasy\\#4。Son (Giver Quartet)\\cover.jpg', '\\img\\sample\\Science Fiction & Fantasy\\#4。Son (Giver Quartet)\\tumblr_mws7hlrlc21rmidh1o1_500.jpg', '', ''),
(19, 'Your initial reaction to Bill Bryson''s reading of A Walk in the Woods may well be "Egads! What a bore!" But by sentence three or four, his clearly articulated, slightly adenoidal, British/American-accented speech pattern begins to grow on you and becomes quite engaging. You immediately get a hint of the humor that lies ahead, such as one of the innumerable reasons he longed to walk as many of the 2,100 miles of the Appalachian Trail as he could. "It would get me fit after years of waddlesome sloth" is delivered with glorious deadpan flair. By the time our storyteller recounts his trip to the Dartmouth Co-op, suffering serious sticker shock over equipment prices, you''ll be hooked. When Bryson speaks for the many Americans he encounters along the way--in various shops, restaurants, airports, and along the trail--he launches into his American accent, which is whiny and full of hard r''s. And his southern intonations are a hoot. He''s even got a special voice used exclusively when speaking for his somewhat surprising trail partner, Katz. In the 25 years since their school days together, Katz has put on quite a bit of weight. In fact, "he brought to mind Orson Welles after a very bad night. He was limping a little and breathing harder than one ought to after a walk of 20 yards." Katz often speaks in monosyllables, and Bryson brings his limited vocabulary humorously to life. One of Katz''s more memorable utterings is "flung," as in flung most of his provisions over the cliff because they were too heavy to carry any farther. The author has thoroughly researched the history and the making of the Appalachian Trail. Bryson describes the destruction of many parts of the forest and warns of the continuing perils (both natural and man-made) the Trail faces. He speaks of the natural beauty and splendor as he and Katz pass through, and he recalls clearly the serious dangers the two face during their time together on the trail. So, A Walk in the Woods is not simply an out-of-shape, middle-aged man''s desire to prove that he can still accomplish a major physical task; it''s also a plea for the conservation of America''s last wilderness. Bryson''s telling is a knee-slapping, laugh-out-loud funny trek through the woods, with a touch of science and history thrown in for good measure. (Running time: 360 minutes, four cassettes) --Colleen Preston', NULL, '\\img\\sample\\Sports & Outdoors\\A Walk in the Woods\\cover.jpg', '\\img\\sample\\Sports & Outdoors\\A Walk in the Woods\\33b81a183595bd8965f15d78af7caca0.jpg\\43f2d372265ce8987573c289eab8d82a.jpg', '\\img\\sample\\Sports & Outdoors\\A Walk in the Woods\\52d38cb40fe5b754c3a2456c924d2007.jpg', '\\img\\sample\\Sports & Outdoors\\A Walk in the Woods\\a08367692433d5fcd8edb4dcb5066223.jpg'),
(20, 'This national bestseller explores the relationship between humans and dogs. How would dogs live if they were free? Would they stay with their human friends? Merle and Ted found each other in the Utah desert— Merle was living wild and Ted was looking for a pup to keep him company. As their bond grew, Ted taught Merle how to live around wildlife, and Merle taught Ted about the benefits of letting a dog make his own decisions. Using the latest in wolf research and exploring issues of animal consciousness and leadership and the origins of the human-dog relationship, Ted Kerasote takes us on the journey he and Merle shared. As much a love story as a story of independence and partnership, Merle’s Door is tender, funny, and ultimately illuminating.', NULL, '\\img\\sample\\Sports & Outdoors\\It''s Not About the Bike： My Journey Back to Life\\cover.jpg', '\\img\\sample\\Sports & Outdoors\\It''s Not About the Bike： My Journey Back to Life\\9780224060875.jpg', '', ''),
(21, 'This national bestseller explores the relationship between humans and dogs. How would dogs live if they were free? Would they stay with their human friends? Merle and Ted found each other in the Utah desert— Merle was living wild and Ted was looking for a pup to keep him company. As their bond grew, Ted taught Merle how to live around wildlife, and Merle taught Ted about the benefits of letting a dog make his own decisions. Using the latest in wolf research and exploring issues of animal consciousness and leadership and the origins of the human-dog relationship, Ted Kerasote takes us on the journey he and Merle shared. As much a love story as a story of independence and partnership, Merle’s Door is tender, funny, and ultimately illuminating.', NULL, '\\img\\sample\\Sports & Outdoors\\Merle''s Door： Lessons from a Freethinking Dog\\cover.jpg', '\\img\\sample\\Sports & Outdoors\\Merle''s Door： Lessons from a Freethinking Dog\\Merele''s Door jpeg.jpg', '\\img\\sample\\Sports & Outdoors\\Merle''s Door： Lessons from a Freethinking Dog\\Merles-Door-Lessons-from-a-Freethinking-Dog-0-0.jpg', ''),
(22, 'Billy Beane, general manager of MLB''s Oakland A''s and protagonist of Michael Lewis''s Moneyball, had a problem: how to win in the Major Leagues with a budget that''s smaller than that of nearly every other team. Conventional wisdom long held that big name, highly athletic hitters and young pitchers with rocket arms were the ticket to success. But Beane and his staff, buoyed by massive amounts of carefully interpreted statistical data, believed that wins could be had by more affordable methods such as hitters with high on-base percentage and pitchers who get lots of ground outs. Given this information and a tight budget, Beane defied tradition and his own scouting department to build winning teams of young affordable players and inexpensive castoff veterans. Lewis was in the room with the A''s top management as they spent the summer of 2002 adding and subtracting players and he provides outstanding play-by-play. In the June player draft, Beane acquired nearly every prospect he coveted (few of whom were coveted by other teams) and at the July trading deadline he engaged in a tense battle of nerves to acquire a lefty reliever. Besides being one of the most insider accounts ever written about baseball, Moneyball is populated with fascinating characters. We meet Jeremy Brown, an overweight college catcher who most teams project to be a 15th round draft pick (Beane takes him in the first). Sidearm pitcher Chad Bradford is plucked from the White Sox triple-A club to be a key set-up man and catcher Scott Hatteberg is rebuilt as a first baseman. But the most interesting character is Beane himself. A speedy athletic can''t-miss prospect who somehow missed, Beane reinvents himself as a front-office guru, relying on players completely unlike, say, Billy Beane. Lewis, one of the top nonfiction writers of his era (Liar''s Poker, The New New Thing), offers highly accessible explanations of baseball stats and his roadmap of Beane''s economic approach makes Moneyball an appealing reading experience for business people and sports fans alike. --John Moe', NULL, '\\img\\sample\\Sports & Outdoors\\Moneyball： The Art Of Winning An Unfair Game\\cover.jpg', '\\img\\sample\\Sports & Outdoors\\Moneyball： The Art Of Winning An Unfair Game\\agile-2014-software-moneyball-troy-magennis-25-638.jpg', '\\img\\sample\\Sports & Outdoors\\Moneyball： The Art Of Winning An Unfair Game\\money-ball.jpg', ''),
(23, 'Coombines the most effective exercises for all the major muscle groups with detailed, full colour illustrations of the muscles used during the exercises.', NULL, '\\img\\sample\\Sports & Outdoors\\Strength Training Anatomy\\2ba7053884b2fc6756e880e186683737.jpg', '\\img\\sample\\Sports & Outdoors\\Strength Training Anatomy\\img_1449_5532-1.jpg', '\\img\\sample\\Sports & Outdoors\\Strength Training Anatomy\\wqdafasdfasdf.jpg', ''),
(24, '"Lewis has such a gift for storytelling... he writes as lucidly for sports fans as for those who read him for other reasons."--Janet Maslin, New York Times When we first meet Michael Oher is one of thirteen children by a mother addicted to crack; he does not know his real name, his father, his birthday, or how to read or write. He takes up football, and school, after a rich, white, Evangelical family plucks him from the streets. Then two great forces alter Oher: the family''s love and the evolution of professional football itself into a game in which the quarterback must be protected at any cost. Our protagonist becomes the priceless package of size, speed, and agility necessary to guard the quarterback''s greatest vulnerability: his blind side.', NULL, '\\img\\sample\\Sports & Outdoors\\The Blind Side： Evolution of a Game\\cover.jpg', '\\img\\sample\\Sports & Outdoors\\The Blind Side： Evolution of a Game\\blindsidedvdbook_lg.jpg', '', ''),
(25, 'The Daring Book for Girls is the manual for everything that girls need to know—and that doesn''t mean sewing buttonholes! Whether it''s female heroes in history, secret note-passing skills, science projects, friendship bracelets, double dutch, cats cradle, the perfect cartwheel or the eternal mystery of what boys are thinking, this book has it all. But it''s not just a guide to giggling at sleepovers—although that''s included, of course! Whether readers consider themselves tomboys, girly-girls, or a little bit of both, this book is every girl''s invitation to adventure.\r\n(Part of the Daring Books for Girls series)', NULL, '\\img\\sample\\Sports & Outdoors\\The Daring Book for Girls\\cover.jpg', '\\img\\sample\\Sports & Outdoors\\The Daring Book for Girls\\boys2.jpg', '', ''),
(26, 'The #1 Bestseller!\r\n\r\nTwelve-year-old Danny Walker may be the smallest kid on the basketball court -- but don''t tell him that. Because no one plays with more heart or court sense. But none of that matters when he is cut from his local travel team, the very same team his father led to national prominence as a boy. Danny''s father, still smarting from his own troubles, knows Danny isn''t the only kid who was cut for the wrong reason, and together, this washed-up former player and a bunch of never-say-die kids prove that the heart simply cannot be measured.\r\n\r\nFor fans of The Bad News Bears, Hoosiers, the Mighty Ducks, and Mike Lupica''s other New York Times bestselling novels Heat, The Underdogs, and Million-Dollar Throw, here is a book that proves that when the game knocks you down, champions stand tall.', NULL, '\\img\\sample\\Sports & Outdoors\\Travel Team\\cover.jpg', '\\img\\sample\\Sports & Outdoors\\Travel Team\\maxresdefault.jpg', '\\img\\sample\\Sports & Outdoors\\Travel Team\\travelteam.jpg', ''),
(27, 'The #1 Bestseller!\r\n\r\nTwelve-year-old Danny Walker may be the smallest kid on the basketball court -- but don''t tell him that. Because no one plays with more heart or court sense. But none of that matters when he is cut from his local travel team, the very same team his father led to national prominence as a boy. Danny''s father, still smarting from his own troubles, knows Danny isn''t the only kid who was cut for the wrong reason, and together, this washed-up former player and a bunch of never-say-die kids prove that the heart simply cannot be measured.\r\n\r\nFor fans of The Bad News Bears, Hoosiers, the Mighty Ducks, and Mike Lupica''s other New York Times bestselling novels Heat, The Underdogs, and Million-Dollar Throw, here is a book that proves that when the game knocks you down, champions stand tall.', NULL, '\\img\\sample\\Sports & Outdoors\\Travel Team\\cover.jpg', '\\img\\sample\\Sports & Outdoors\\Travel Team\\maxresdefault.jpg', '\\img\\sample\\Sports & Outdoors\\Travel Team\\travelteam.jpg', ''),
(28, 'In the spring of 1845, Henry David Thoreau built a wooden hut on the shores of Walden Pond outside Concord, Massachusetts, intending to devote himself, for a time, to a simple life. The product of his two-year stay there was this volume of classic essays, one of the great books of American letters and a masterpiece of reflective philosophizing. Accounts of his daily life are interwoven with musings on the virtues of self-reliance and individual freedom, on society, government, and other topics--all expressed with clear-headed wisdom and remarkable beauty of style. Author: Henry David ThoreauFormat: 224 pages, paperbackPublisher: Dover ISBN: 0-486-28495-6', NULL, '\\img\\sample\\Sports & Outdoors\\Walden; Or, Life in the Woods (Dover Thrift Editions)\\cover.jpg', '\\img\\sample\\Sports & Outdoors\\Walden; Or, Life in the Woods (Dover Thrift Editions)\\blog_walden4.jpg', '', '');

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `bid` int(4) NOT NULL,
  `aid` int(4) NOT NULL,
  `amount` int(3) DEFAULT NULL,
  PRIMARY KEY (`bid`,`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `cart`
--

INSERT INTO `cart` (`bid`, `aid`, `amount`) VALUES
(1, 1, NULL),
(2, 1, NULL),
(4, 1, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `bid` int(4) NOT NULL,
  `aid` int(4) NOT NULL,
  `date` date NOT NULL,
  `comment` varchar(500) NOT NULL,
  PRIMARY KEY (`bid`,`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `pid` int(4) NOT NULL AUTO_INCREMENT,
  `readstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `orderitem`
--

DROP TABLE IF EXISTS `orderitem`;
CREATE TABLE IF NOT EXISTS `orderitem` (
  `pid` int(4) NOT NULL,
  `bid` int(4) NOT NULL,
  `amount` int(5) NOT NULL,
  PRIMARY KEY (`pid`,`bid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `orderitem`
--

INSERT INTO `orderitem` (`pid`, `bid`, `amount`) VALUES
(1, 2, 1),
(1, 4, 1),
(1, 7, 1),
(2, 2, 1),
(3, 1, 1),
(4, 1, 1);

-- --------------------------------------------------------

--
-- 表的结构 `purchaseorder`
--

DROP TABLE IF EXISTS `purchaseorder`;
CREATE TABLE IF NOT EXISTS `purchaseorder` (
  `pid` int(4) NOT NULL AUTO_INCREMENT,
  `aid` int(4) NOT NULL,
  `purchaseDate` datetime NOT NULL,
  `sendDate` datetime DEFAULT NULL,
  `cancelDate` datetime DEFAULT NULL,
  `cancelBy` varchar(10) DEFAULT NULL,
  `orderAddress` int(200) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `purchaseorder`
--

INSERT INTO `purchaseorder` (`pid`, `aid`, `purchaseDate`, `sendDate`, `cancelDate`, `cancelBy`, `orderAddress`, `status`) VALUES
(1, 8, '2016-03-04 04:31:38', NULL, NULL, NULL, 111, 'pending'),
(2, 8, '2016-03-04 05:03:46', NULL, NULL, NULL, 111, 'pending'),
(3, 1, '2016-03-04 08:07:38', NULL, NULL, NULL, 1, 'pending'),
(4, 1, '2016-03-04 11:17:17', NULL, NULL, NULL, 1, 'pending');

-- --------------------------------------------------------

--
-- 表的结构 `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `bid` int(4) NOT NULL,
  `aid` int(4) NOT NULL,
  `rating` double(2,1) NOT NULL,
  PRIMARY KEY (`bid`,`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
