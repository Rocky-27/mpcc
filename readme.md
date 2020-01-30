To run this project locally you will need to a dump autoload on your command line
```
composer du
```

Then navigate to MVC -> Framework -> DB.php and enter your database credentials

Finally create the orders table using the query below: 

```
CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `order_id` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `address_line_2` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_sku` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(9,2) NOT NULL,
  `type` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
```