--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `eventID` MEDIUMINT(8) PRIMARY KEY AUTO_INCREMENT,
  `event_title` VARCHAR(255) NOT NULL,
  `description` TEXT NOT NULL,
  `description_long` TEXT NOT NULL,
  `event_date` DATETIME NOT NULL,
  `price_per_person` DECIMAL(7,2) NOT NULL,
  `event_venue` VARCHAR(255) NOT NULL,
  `venue_capacity` INT NOT NULL,
  `author_name` VARCHAR(255) NOT NULL,
  `author_imagepath` VARCHAR(255) NOT NULL,
  `event_imagepath` VARCHAR(255) NOT NULL,
  `event_bannerpath` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

INSERT INTO `events` (`eventID`, `event_title`, `description`, `description_long`, `event_date`, `price_per_person`, `event_venue`, `venue_capacity`, `author_name`, `author_imagepath`, `event_imagepath`, `event_bannerpath`) VALUES
(1, "A young scientist's quest for clean water", "Water is the basis of life, and too many people around the world suffer from waterborne illnesses. Deepika Kurup is working to change that.",
 "Deepika Kurup has been determined to solve the global water crisis since she was 14 years old, after she saw kids outside her grandparents' house in India drinking water that looked too dirty even to touch. Her research began in her family kitchen -- and eventually led to a major science prize. Hear how this teenage scientist developed a cost-effective, eco-friendly way to purify water.",
 '2024-06-20 20:00', 25.50, 'Grand Horizon Center, UK', 150, "Deepika Kurup", "https://i.ibb.co/nPpkjXy/author1.jpg", "https://i.ibb.co/JQXgtPN/eventimage1.jpg", "https://i.ibb.co/JQXgtPN/eventimage1.jpg"),
 (2, "How better tech could protect us from distraction", "Tristan Harris helps the technology industry more consciously and ethically shape the human spirit and human potential.",
 "How often does technology interrupt us from what we really mean to be doing? At work and at play, we spend a startling amount of time distracted by pings and pop-ups -- instead of helping us spend our time well, it often feels like our tech is stealing it away from us. Design thinker Tristan Harris offers thoughtful new ideas for technology that creates more meaningful interaction. He asks: 'What does the future of technology look like when you're designing for the deepest human values?'",
 '2024-05-23 14:00', 125.99, 'Grand Horizon Center, UK', 75, "Tristan Harris", "https://i.ibb.co/QDSqH5b/author2.jpg", "https://i.ibb.co/8dqmkxX/eventimage2.jpg", "https://i.ibb.co/8dqmkxX/eventimage2.jpg"),
  (3, "The real gold of our economy is in our hands", "Salvatore Cali helps companies reshape their operations to achieve new levels of efficiency and effectiveness.",
 'The vast majority of our time at work is spent trudging through redundant and outdated workflows, says operations visionary Salvatore Cali. Laying out the most common time-wasting pitfalls, he urges policy leaders and businesses to reevaluate what they ask of both employees and consumers. "By rethinking the true purpose of each task, you will discover what is waste and what is the real gold of your company: the creation of value," says Cali.',
 '2024-08-20 12:30', 65.00, 'Grand Horizon Center, UK', 85, "Salvatore Cali", "https://i.ibb.co/PGbDWv3/author3.jpg", "https://i.ibb.co/m8J6Kbr/eventimage3.jpg", "https://i.ibb.co/m8J6Kbr/eventimage3.jpg"),
  (4, "Immigrant voices make democracy stronger", "Sayu Bhojwani recruits and supports first and second generation Americans to run for public office.",
 "In politics, representation matters -- and that's why we should elect leaders who reflect their country's diversity and embrace its multicultural tapestry, says Sayu Bhojwani. Through her own story of becoming an American citizen, the immigration scholar reveals how her love and dedication to her country turned into a driving force for political change. 'We have fought to be here,' she says, calling immigrant voices to action. 'It's our country, too.'",
 '2024-08-12 13:00', 75.89, 'Grand Horizon Center, UK', 220, "Sayu Bhojwani", "https://i.ibb.co/8d8SzJd/author4.jpg", "https://i.ibb.co/QbnH1YS/eventimage4.jpg", "https://i.ibb.co/QbnH1YS/eventimage4.jpg"),
  (5, "Is remote work better than being in the office? It's complicated", "Mark Mortensen is a professor of organizational behavior at INSEAD and an expert on the changing nature of work and collaboration.",
 "Opinions about remote work are plentiful and conflicting -- but what does the research say? Organizational design expert Mark Mortensen identifies the challenges of navigating the hybrid work debate and shares three conversation topics every workplace should explore as people change the way they show up on the job.",
 '2024-09-20 11:00', 34.99, 'Grand Horizon Center, UK', 80, "Mark Mortensen", "https://i.ibb.co/dWtxddc/author5.jpg", "https://i.ibb.co/m4m8r24/eventimage5.jpg", "https://i.ibb.co/m4m8r24/eventimage5.jpg"),
  (6, "A master architect asks, Now what?", "A living legend, Frank Gehry has forged his own language of architecture, creating astonishing buildings all over the world.",
 "In a wildly entertaining discussion with Richard Saul Wurman, architect Frank Gehry gives TEDsters his take on the power of failure, his recent buildings, and the all-important 'Then what?' factor.",
 '2024-07-17 3:00', 75.50, 'Grand Horizon Center, UK', 60, "Frank Gehry", "https://i.ibb.co/YZgFBv8/author6.jpg", "https://i.ibb.co/ryrQqLr/eventimage6.jpg", "https://i.ibb.co/ryrQqLr/eventimage6.jpg"),
  (7, "How to rebuild a broken state", "Afghanistan's president Ashraf Ghani has initiated sweeping economic, trade, social and peace reforms.",
 "Ashraf Ghani's passionate and powerful 10-minute talk, emphasizing the necessity of both economic investment and design ingenuity to rebuild broken states, is followed by a conversation with TED curator Chris Anderson on the future of Afghanistan.",
 '2024-05-20 20:00', 89.50, 'Grand Horizon Center, UK', 250, "Ashraf Ghani", "https://i.ibb.co/wcc24f1/author7.jpg", "https://i.ibb.co/94rg4QY/eventimage7.jpg", "https://i.ibb.co/94rg4QY/eventimage7.jpg"),
  (8, "A new stock exchange focused on the long-term", "As President of the Long-Term Stock Exchange, Michelle Greene believes we can use our financial system to change the way that companies show up in the world.",
 "Investors tend to think in daily and quarterly numbers, leading to a system that can harm the future health of the economy and planet. Michelle Greene explains how the Long-Term Stock Exchange is reimagining public markets by holding companies to forward-thinking standards of diversity and inclusion, employee investment and environmental responsibility -- and generating better outcomes for everyone involved. (This virtual conversation, hosted by TED business curator Corey Hajim, was recorded June 24, 2020.)",
 '2024-09-20 14:00', 29.50, 'Grand Horizon Center, UK', 95, "Michelle Greene", "https://i.ibb.co/VVmMwcb/author8.jpg", "https://i.ibb.co/gDjx0Bp/eventimage8.jpg", "https://i.ibb.co/gDjx0Bp/eventimage8.jpg"),
  (9, "The art of letting go...of the floor", "Siawn Ou works on the Fund Services Custody team in State Street Sacramento and is the founder of the group Move Well on Collaborate.",
 "Aerial flips seem like a counterintuitive skill for Siawn Ou, whose professional and personal life is based on managing and diminishing risk. Through twists and turns, Ou demonstrates how high risk can also lead to great reward and in the end, may be the best investment.",
 '2024-07-10 15:00', 35.50, 'Grand Horizon Center, UK', 45, "Siawn Ou", "https://i.ibb.co/HzfW71v/author9.jpg", "https://i.ibb.co/jktkf1q/eventimage9.jpg", "https://i.ibb.co/jktkf1q/eventimage9.jpg"),
  (10, "Meet the founder of the blog revolution", "Mena Trott and her husband Ben founded Six Apart in a spare bedroom after the blogging software they developed grew beyond a hobby.",
 "The founding mother of the blog revolution, Movable Type's Mena Trott, talks about the early days of blogging, when she realized that giving regular people the power to share our lives online is the key to building a friendlier, more connected world.",
 '2024-06-20 12:00', 24.90, 'Grand Horizon Center, UK', 50, "Mena Trott", "https://i.ibb.co/3MSPMMW/author10.jpg", "https://i.ibb.co/ZS69Tbh/eventimage10.jpg", "https://i.ibb.co/ZS69Tbh/eventimage10.jpg"),
  (11, "A new kind of job market", "Wingham Rowan's work bridges the gap between flexible work schedules and modern financial markets.",
 "Plenty of people need jobs with very flexible hours -- but it's difficult for those people to connect with the employers who need them. Wingham Rowan is working on that. He explains how the same technology that powers modern financial markets can help employers book workers for slivers of time.",
 '2024-05-20 14:00', 29.50, 'Grand Horizon Center, UK', 85, "Wingham Rowan", "https://i.ibb.co/R6gkn74/author11.jpg", "https://i.ibb.co/bmwwp4b/eventimage11.jpg", "https://i.ibb.co/bmwwp4b/eventimage11.jpg"),
  (12, "Global priorities bigger than climate change", "Danish political scientist Bjorn Lomborg heads the Copenhagen Consensus, which has prioritized the world's greatest problems.",
 "Given $50 billion to spend, which would you solve first, AIDS or global warming? Danish political scientist Bjorn Lomborg comes up with surprising answers.",
 '2024-09-10 16:00', 29.50, 'Grand Horizon Center, UK', 150, "Bjorn Lomborg", "https://i.ibb.co/tKsGvZr/author12.jpg", "https://i.ibb.co/rZxwMjs/eventimage12.jpg", "https://i.ibb.co/rZxwMjs/eventimage12.jpg"),
  (13, "Reinventing creative thinking", "Luc de Brabandere is a fellow and Senior Advisor with BCG, specializing in applying creativity and strategic vision techniques to business.",
 "Thinking out of the box -- it's one of the most cited strategies for innovation. Corporate philosopher Luc de Brabandere pondered exactly what was happening in our minds when we think creatively, and shares his own perspective on this strategy. He argues that the most incredible ideas don't come from just thinking beyond the perimeter of our current perception, but from relocating our minds to an entirely different box where preconceived ideas don't limit imagination.",
 '2024-07-20 20:00', 45.50, 'Grand Horizon Center, UK', 126, "Luc de Brabandere", "https://i.ibb.co/pZ22gBd/author13.jpg", "https://i.ibb.co/CVQLX66/eventimage13.jpg", "https://i.ibb.co/CVQLX66/eventimage13.jpg"),
  (14, "How can companies continue to thrive in times of change?", "Patrick Forth is a Senior Partner at BCG, based in Sydney. Previously, he opened and led BCG’s Singapore office and led BCG’s Australia and New Zealand business.",
 "Our love of technology is perhaps rivaled only by our fear of change. Every time technology advances, the ripple effect of change can cripple even the strongest companies. Development expert Patrick Forth notes that 75% of the Fortune 500 in 2020 will be names never heard before. How can large companies better channel change and continue to thrive? Forth gives five tips all businesses can learn from.",
 '2024-09-14 13:00', 64.50, 'Grand Horizon Center, UK', 95, "Patrick Forth", "https://i.ibb.co/kDJ0Wqz/author14.jpg", "https://i.ibb.co/q9HbWkc/eventimage14.jpg", "https://i.ibb.co/q9HbWkc/eventimage14.jpg"),
  (15, "The tradeoffs of building green", "Catherine Mohr loves what she does -- she's just not ever sure what it will be next.",
 "In a short, funny, data-packed talk at TED U, Catherine Mohr walks through all the geeky decisions she made when building a green new house -- looking at real energy numbers, not hype. What choices matter most? Not the ones you think.",
 '2024-06-20 16:00', 75.50, 'Grand Horizon Center, UK', 65, "Catherine Mohr", "https://i.ibb.co/J7ghzKx/author15.jpg", "https://i.ibb.co/4fChkRk/eventimage15.jpg", "https://i.ibb.co/4fChkRk/eventimage15.jpg");
 



--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE `booking` (
  `bookingID` mediumint(8) PRIMARY KEY AUTO_INCREMENT,
  `eventID` mediumint(8) NOT NULL,
  `customerID` mediumint(8) NOT NULL,
  `registered_name` varchar(255) NOT NULL,
  `phone_number` number NOT NULL,
  `number_people` mediumint(2) NOT NULL,
  `vat_amount` DECIMAL(7,2) NOT NULL,
  `total_booking_cost` DECIMAL(7,2) NOT NULL,
  `booking_notes` TEXT DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customerID` mediumint(8) PRIMARY KEY AUTO_INCREMENT,
  `password_hash` char(255) NOT NULL,
  `customer_forename` varchar(255) NOT NULL,
  `customer_surname` varchar(255) NOT NULL,
  `customer_email` varchar(64) UNIQUE NOT NULL,
  `customer_bio` TEXT DEFAULT "Shoot for the moon. Even if you miss, you'll land among the stars. - Norman Vincent Peale",
  `date_joined` DATE DEFAULT CURRENT_DATE,
  `date_of_birth` datetime NOT NULL,
  `display_avatar` INT NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
