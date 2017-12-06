This folder, and its associated branch, are an overhaul of the application as a whole.  Features are still being added from the original, including admin panel access, and a session based token validation.  The original system was fairly non-modular, and this branch attempts a full rewrite with each page serving a unique purpose and listed as a separate file.

The initial and important commit is to loginscript.php, the authentication script that then redirects to the admin or user application pages.

Further commits have been performed in the admintools folder, a collection of all of the management tools that source data from the MYSQL database.
