# Big Library Management System

## short description 

a library management system in php and mysql 

## database capabilities

Media that have at least title, image (HTTP link to an image), author, ISBN code, short_description, publish_date, 
publisher and type (book, CD,  DVD) tracked. Additionally, you can also track the status (“available” or “reserved”; 
required for Bonus Points)

Authors that have at least name, surname and media should be tracked

Publisher of media (name, address, and size of the publisher (“big”, “medium”, “small”))

User (see below “Authentication system”)

## long description

* Database Design (see the “Overall / Hints” section below). Create the relational model that connects the tables in a meaningful way.

* Add test data (at least 10 entries with different types and publishers; feel free to reuse data from previous CodeReviews)

* BigList of Media: Data retrieving over MySQLi and listing of Media data into the front-end

* Authentication system: (register, login, logout) needed to access the BigList. Before using this web application and accessing the BigList, a user has to register their user account (first_name, surname, email and password) over the web. Afterwards, before accessing the BigList, they must be logged in. A link for the logout procedure should be provided on all pages (once a user has logged-in).

* User-Friendly GUI: Just as we previously used JavaScript to create HTML on-the-fly, you can create HTML pages with a nice markup and Bootstrap framework  


* After clicking on the button "show media", displayed once per every Media in the BigList, all details regarding that specific Media (title, author, ISBN, short_description and status (available or reserved) will be displayed in a new web page. (Hint: add an additional form per book in a list; since book details are not considered sensitive data, try to use GET to pass the necessary “non-secure” information to “single book” page).

* Create a list of Publishers. When you click on a Publisher name, display the list of Media that “belong” to this Publisher.