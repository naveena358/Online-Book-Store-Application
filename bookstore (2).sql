
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_isbn` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `book_title` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `book_author` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `book_publisher` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `book_desc` text COLLATE latin1_general_ci DEFAULT NULL,
  `book_image` varchar(100) COLLATE latin1_general_ci DEFAULT NULL,
  `book_price` decimal(6,2) NOT NULL,
  `book_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_isbn`, `book_title`, `book_author`, `book_publisher`, `book_desc`, `book_image`, `book_price`, `book_category`) VALUES
(1, '987-654-321', 'The Ultimate Book Of Space', 'Baumann', 'Olivier Latyck', 'A fun book to ignite curiosity about the solar system', 'adventure_1.jpg', '25.00', 1),
(2, '987-654-321', 'Pirate Diary', 'Steve', 'Limca Books', 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione', 'adventure_2.jpg', '35.00', 1),
(3, '123-456-789', 'No Pain No Gain', 'Greg Powel', 'Izova', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'sports_1.jpg', '28.00', 3),
(4, '234-567-890', 'A Skating Life', 'Chris Ray', 'Robinson Publishers', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore', 'sports_2.jpg', '25.00', 3),
(5, '345-678-901', 'E-Learning Fundamentals', 'Ken Rita', 'Best Vision Books', 'Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem', 'science_1.jpg', '41.00', 2),
(6, '456-789-012', 'Research Methodology', 'Don Raymond', 'Raynolds', 'eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam', 'science_2.jpg', '25.00', 2),
(7, '900-654-300', 'The Super Hero', 'George Klun', 'Olivier Store', 'Dollar lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'adventure_3.jpg', '15.00', 1),
(8, '800-554-300', 'Animal Planet', 'Chris Martin', 'FS Publishers', ' Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'adventure_4.png', '15.00', 1),
(9, '600-300-444', 'The Comic Book Story', 'Alex', 'Roma Publishers', ' Consectetur adipiscing elit lorem ipsum.', 'adventure_5.png', '10.00', 1),
(10, '400-500-644', 'Miracles of Science', 'Benziman', 'Don books', ' Lorem ipsum but boky adipiscing elit lorem ipsum.', 'science_3.jpg', '20.00', 2),
(11, '450-500-644', 'The Inevitable', 'Kevin Kelly', 'Max books', ' The book edupon ipsum but boky adipiscing elit lorem ipsum.', 'science_4.png', '43.00', 2),
(12, '340-580-644', 'Science Rocks', 'Ion Bell', 'Max books', ' Aadipiscing elit lorem ipsum for ips crot.', 'science_5.png', '23.00', 2),
(13, '100-580-644', 'Run Your Own Race', 'Bell', 'Max books', ' Ipsum for ips crot mohi bizor.', 'sports_3.jpg', '13.00', 3),
(14, '200-680-644', 'Get In Shape', 'Chris Cairns', 'Alaska Pubz', ' Lorem fitness for ips crot mohi more biz ipsum zip.', 'sports_4.png', '18.00', 3),
(15, '350-650-604', 'Soccer Secrets', 'Nick Homby', 'Wilson Group', ' Soccer lorem ipsum secret trainers about fitness for ips crot mohi more biz ipsum zip.', 'sports_5.png', '28.00', 3);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

DROP TABLE IF EXISTS `book_category`;
CREATE TABLE `book_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`category_id`, `category_name`) VALUES
(1, 'Action & Adventure'),
(2, 'Science & Technology'),
(3, 'Sports');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `password` blob NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `creation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `customerid` int(10) UNSIGNED NOT NULL,
  `amount` decimal(6,2) DEFAULT NULL,
  `ship_name` char(60) COLLATE latin1_general_ci NOT NULL,
  `ship_address` char(80) COLLATE latin1_general_ci NOT NULL,
  `ship_phone` varchar(15) COLLATE latin1_general_ci DEFAULT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE `order_items` (
  `orderid` int(10) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `item_price` decimal(6,2) NOT NULL,
  `quantity` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

