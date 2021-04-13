# Content-Management-Site: David's Community
Author: David Janssen, 200470042

This is a customizable content management website designed to inspire
a feeling of community, socialization, and collaboration. It accomplishes
this by allowing registered users to customize the content of its pages,
as well as the site's logo.

Anonymous users may view the content of the index page, but not edit anything.
Once a user has made an account, they are able to login and access the Admin
Control Panel, which will provide the ability to add new pages, alter or
delete existing pages, alter or delete existing users, and upload a new site
logo. All page content is stored on an SQL database and used to populate
the index page based on an internal page ID.

All forms have HTML and PHP validation to ensure proper information is
provided. Image uploads are restricted to jpg, jpeg, and png image files, 
although all files will be automatically converted to jpgs. For added security,
a customized connection error page prevents sensitive server data from being
displayed in a browser's default error messages.

This site uses CSS normalization: https://necolas.github.io/normalize.css/
The base CSS was created using Bootstrap: https://getbootstrap.com/
Additionally customized CSS was created by me.

------------------------
This was a fun challenge. I wish I had been able to take more than 2 days
to work on this project, but that's the finals cram for you. It's been a 
pleasure, Rich. Thanks for being a great prof.
